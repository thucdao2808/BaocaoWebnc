<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function index() {
         
        $categories = Category::paginate(5);

        return view('project_1.admin.categories.index' , compact('categories'));
    }

    public function create() {

        return view('project_1.admin.categories.create');
    }

    public function store(StoreCategoryRequest $request) {

       $data = $request->name;

        Category::create([
            'name' => $data
        ]);

        return redirect()->route('categories.create')->with('success', 'Thêm danh mục thành công');
    }

    public function destroy(Category $category) {
        
        $category->delete();
        return redirect()->route('categories.index');

    }

    public function show(Category $category) {

    }

    public function update(Request $request, Category $category) {

        $request->validate([
            'name' => 'required|unique:Categories',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'cập nhật dữ liệu thành công');
    }

    public function edit(Category $category) {

        return view('project_1.admin.categories.update', compact('category'));
    }




}
