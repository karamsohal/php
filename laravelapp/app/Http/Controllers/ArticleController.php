<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
class ArticleController extends Controller
{
    function __construct(){
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    public function index()
    {
        // Use Eloquent to get paginated articles instead of the DB facade
        $articles = Article::paginate(7);
        return view('articles.index', compact("articles"));
    }
    public function show(Article $article)
    {
        //$article = Article::find($article);
        return View("articles.show", compact("article"));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('articles.create', compact('tags', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', // Ensure you have validation rules as needed
            'body' => 'required',
            'file' => 'nullable|image|max:2048', // Validate the file is an image and not larger than 2MB
        ]);

        $article = new Article($request->except('file')); // Exclude the file from mass assignment
        $article->author_id = auth()->id();

        // Handle file upload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->store('images', 'public'); // Change 'images' to your desired folder within storage/app/public
            $article->file = $path;
        }

        $category = Category::findOrFail($request->category_id);
        $article->category()->associate($category);
        $article->save();

        if ($request->has('tags')) {
            $tags = Tag::find($request->tags);
            $article->tags()->sync($tags);
        }

        return redirect('articles');
    }
    public function destroy(Article $article){
        $article->delete();
        return redirect('articles');
    }
}
