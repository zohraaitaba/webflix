<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|unique:categories|min:3',
        ]);

        // Model / Insertion base de données
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        // On pourra faire ça plus tard...
        // Category::create($request->all());

        return redirect('/categories');
    }
}