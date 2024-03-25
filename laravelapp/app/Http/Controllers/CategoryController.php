<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create','edit']]);
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    public function index()
    {
        // Paginate the categories, 3 per page
        $categories = Category::paginate(3);
        return view('categories.index', compact('categories'));
    }
    public function show( $id)
    {
        $category = Category::find($id);
        return View("categories.show", compact("category"));

    }
    public function create(){
        return View("categories/create");
    }

    public function store(CategoryRequest $request){
        $formData = $request->all();
        Category::create($formData);
        return redirect('categories');
    }
    public function edit($category){
        $category = Category::findOrFail($category);
        return view('categories.edit', compact("category"));
    }
    public function update(CategoryRequest $request, $category){
        $formData = $request->all();
        $category = Category::findOrFail($category);
        $category->update($formData);
        return redirect('categories');
    }
    public function destroy(Category $category){
        $category->delete();
        $category->articles()->delete();
        return redirect('categories');
    }
    public function manage(){
        $categories = Category::onlyTrashed()->get();
        return view('categories.manage', compact("categories"));
    }
    public function restore($category){
        Category::withTrashed()->where('id', $category)->restore();
        Category::findOrFail($category)->articles()->restore();

        return redirect('categories');
    }
    public function forcedelete($category){
        Category::onlyTrashed()->where('id', $category)->forceDelete();
        return redirect('categories');
    }
}
