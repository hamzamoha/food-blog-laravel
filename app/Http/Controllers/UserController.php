<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function postLogin(Request $request)
    {
        $request->validate([
            "username" => ["required"],
            "password" => ["required"],
        ]);
        $username = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt([$username => $request->input("username"), "password" => $request->input("password")], $request->input("remember"))) return response()->redirectTo("/");
        else return back()->withErrors(["error" => "Username or password is not correct !"])->withInput();
    }
    public function login()
    {
        return view("auth.login");
    }
    public function register()
    {
        return view("auth.register");
    }
    public function store(Request $request)
    {
        $request->validate([
            "firstname" => ["required", "max:255"],
            "lastname" => ["required", "max:255"],
            "username" => ["required", "max:255", "unique:users"],
            "email" => ["required", "email", "max:255", "unique:users"],
            "password" => ["required", "confirmed", Password::min(6)],
        ]);
        $user = User::create([
            "firstname" => Str::title($request->input("firstname")),
            "lastname" => Str::title($request->input("lastname")),
            "username" => strtolower($request->input("username")),
            "email" => strtolower($request->input("email")),
            "password" => $request->input("password")
        ]);
        auth()->login($user, $request->input("remember"));
        return redirect()->route('home');
    }
    public function profile()
    {
        return view("auth.profile");
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('home');
    }
    public function index()
    {
        return response()->json(
            DB::table('users')
                ->crossJoinSub(function ($query) {
                    $query->from('saved')
                        ->select('user_id', DB::raw("count(*) as recipes_count"))
                        ->where('savable_table', '=', 'recipes')
                        ->groupBy('user_id');
                }, 't2')
                ->crossJoinSub(function ($query) {
                    $query->from('saved')
                        ->select('user_id', DB::raw("count(*) as articles_count"))
                        ->where('savable_table', '=', 'articles')
                        ->groupBy('user_id');
                }, 't3')
                ->select('*')
                ->where('users.id', '=', DB::raw('t2.user_id'))
                ->where('users.id', '=', DB::raw('t3.user_id'))
                ->get()
        );
    }
    private function compress($source_image)
    {
        $compress_image = $source_image;
        $image_info = getimagesize($source_image);
        if ($image_info['mime'] == 'image/jpeg') {
            $source_image = imagecreatefromjpeg($source_image);
            imagejpeg($source_image, $compress_image, 20);             //for jpeg or gif, it should be 0-100
        } elseif ($image_info['mime'] == 'image/png') {
            $source_image = imagecreatefrompng($source_image);
            imagepng($source_image, $compress_image, 3);
        }
        return $compress_image;
    }
    public function update(Request $request)
    {
        $user = auth()->user();
        if ($request->hasFile("image")) {
            $request->validate(["image" => [File::image()]]);
            if ($user->photo_url && Storage::exists($user->photo_url)) {
                Storage::delete($user->photo_url);
            }
            $new_image = Image::make($this->compress($request->file('image')->getRealPath()));
            $temp = min($new_image->width(), $new_image->height());
            $new_image = $new_image->crop($temp, $temp);
            $temp = "/uploads/user-" . $user->username . "-" . $user->id . "." . $request->file('image')->getClientOriginalExtension();
            $new_image->save(storage_path('app' . $temp));
            $user->photo_url = $temp;
            $user->save();
            return response()->redirectToRoute("auth.profile");
        }
        if ($request->has("email")) {
            $request->validate([
                "firstname" => ["required", "max:255"],
                "lastname" => ["required", "max:255"],
                "username" => ["required", "max:255"],
                "email" => ["required", "email", "max:255"],
            ]);
            if ($request->username != $user->username)
                $request->validate([
                    "username" => ["unique:users"]
                ]);
            $user->username = strtolower($request->input("username"));
            if ($request->email != $user->email)
                $request->validate([
                    "email" => ["unique:users"]
                ]);
            $user->email = strtolower($request->input("email"));
            $user->firstname = Str::title($request->input("firstname"));
            $user->lastname = Str::title($request->input("lastname"));
            $user->save();
            return response()->redirectToRoute("auth.profile");
        }
        if ($request->has("old_password")) {
            $request->validate([
                "old_password" => ["required"],
                "new_password" => ["required", "confirmed", Password::min(6)],
            ]);
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->with("error", "Old Password Doesn't match!");
            }
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->redirectToRoute("auth.profile");
        }
    }
}
