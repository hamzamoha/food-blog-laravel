<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaverController extends Controller
{
    private static function get($table, $id): Builder {
        return DB::table("saved")->where("savable_table", $table)->where("savable_id", $id)->where("user_id", auth()->user()->id);
    }
    function save(Request $request)
    {
        if(auth()->check()){
            $check =self::get($request->input("table"), $request->input("id"));
            if ($check->exists()) {$check->delete();$saved="unsaved";}
            else {DB::table("saved")->insert([
                "savable_table" => $request->input("table"),
                "savable_id" => $request->input("id"),
                "user_id" => auth()->user()->id
            ]);$saved="saved";}
            return response()->json([
                "saved" => "$saved"
            ]);
        }
        return response()->json([
            "type" => "error"
        ]);
    }
    public static function is_saved($table, $id): bool {
        return self::get($table, $id)->exists();
    }
}
