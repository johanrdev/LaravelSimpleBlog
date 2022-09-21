<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $categories = Auth::user()->categories()
            ->orderBy('name', 'desc')
        ->paginate(10);

        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request) {
        Category::create([
            'name' => $request->input('name'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('categories.index');
    }

    public function show(Category $category) {
        //
    }

    public function edit(Category $category) {
        return view('categories.edit');
    }

    public function update(Request $request, Category $category) {
        //
    }

    public function destroy(Category $category) {
        //
    }
}
