<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index() {
        return view('admin.categories.index');
    }

    public function show() {
        $categories = Category::all();
        return view('admin.categories.show', compact('categories'));
    }

    public function create() {
        return view('admin.categories.edit-add');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.show')
            ->with('success', '¡Categoría creada con éxito!');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin.categories.update', compact('category'));
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => "required|max:255|unique:categories,name,$id"
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.show')
            ->with('success', '¡Categoría actualizada con éxito!');
    }

    public function deleteCategory($id) {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.categories.show')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}

