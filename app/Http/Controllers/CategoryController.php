<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories')); // передаём переменную articles в blade, которую
    }                                                                       // можем получить по соответствующему имени

    public function create() {
        return view('categories.create');
    }                                                            // можем получить по соответствующему имени

    public function store() {
        $data = request()->validate([
            'name' => 'string',
        ]);
        Category::create($data);
        return redirect()->route('categories.index');
    }

    public function show(Category $category) {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category) {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category) {
        $data = request()->validate([
            'name' => 'string',
        ]);
        $category->update($data);
        return redirect()->route('categories.show', compact('category'));
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
