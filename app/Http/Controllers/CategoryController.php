<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $users = User::all();
        $categories = Category::all();
        return view('categories.index', compact('categories','users','orders'));
    }

    public function create()
    {
        $orders = Order::all();
        $users = User::all();
        return view('categories.create',compact('users','orders'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        $orders = Order::all();
        $users = User::all();
        return view('categories.edit', compact('category','users','orders'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
