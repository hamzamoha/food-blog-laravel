<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.index', [
            "articles" => Article::orderByDesc('id')->paginate(8)
        ]);
    }
    public function index_api()
    {
        return response()->json(Article::with("categories")->orderByDesc('id')->get());
    }
    public function index_category($category)
    {
        return view('articles.search')->with("articles", Article::whereRelation('categories', 'slug', $category)->orderByDesc('id')->paginate(8))->with("search_message", "Articles in the Category '" . Str::title($category) . "'");
    }
    public function index_tag($tag)
    {
        return view('articles.search')->with("articles", Article::where(DB::raw("lower(tags)"), 'like', "%$tag%")->orderByDesc('id')->paginate(8))->with("search_message", "Articles Tagged '" . Str::title($tag) . "'");;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->input("title", ""));
        if (Article::where('slug', $slug)->exists()) {
            $count = 1;
            while (Article::where('slug', "$slug-$count")->exists()) {
                $count += 1;
            }
            $slug = $slug - $count;
        }
        $article = Article::create([
            "title" => Str::title($request->input("title", "")),
            "slug" => $slug,
            "tags" => Str::lower(trim($request->input("tags", ""))),
            "content" => (new HTMLPurifier(HTMLPurifier_Config::createDefault()))->purify($request->input("content")),
            "image_url" => '',
        ]);
        foreach (explode(",", $request->input("categories")) as $id) {
            if (($category = Category::find($id)) && $category->for === "articles")
                DB::table("articles_categories")->insert([
                    "category_id" => $id,
                    "article_id" => $article->id
                ]);
        }
        $article->image_url = "/" . $request->file('image')->storeAs("uploads", "article-" . $article->slug . "-" . $article->id . "." . $request->file('image')->getClientOriginalExtension());
        $article->save();
        return redirect("/admin")->withFragment("#/articles");
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        if (Article::where('slug', $slug)->exists()) {
            $article = Article::where('slug', $slug)->first();
            return view('articles.show', [
                'article' => $article,
                'views' => ViewerController::viewAndGet($article->id, 'articles'),
            ]);
        }
        return response()->redirectTo('/articles');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
