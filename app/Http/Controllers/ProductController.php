<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $users = User::all();
        $products = Product::all();
        return view('product.index', compact('products','users','orders'));
    }

    public function create()
    {
        $orders = Order::all();
        $users = User::all();
        $categories = Category::all();
        return view('product.create',compact('categories','users','orders'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale=$request->sale;
        $product->quantity = $request->quantity;
        $product->img =str_replace("public","storage", $request->img->store('public/img'));
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('products.create')->with('success', 'Sản phẩm đã được thêm thành công!');;
    }

    public function edit($id)
    {
        $orders = Order::all();
        $users = User::all();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product.edit', compact('product','categories','users','orders'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->sale=$request->sale;
        $product->quantity=$request->quantity;
        if ($request->hasFile('img')) {
            if ($product->img) {
                $oldImagePath = str_replace("storage", "public", $product->img);
                Storage::delete($oldImagePath);
            }
            $product->img = str_replace("public", "storage", $request->img->store('public/img'));
        }
        $product->category_id=$request->category_id;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }

    public function search(Request $request)
    {
        $cartItems = Cart::all();
        $orders = Order::all();
        $users = User::all();
        $searchTerm = $request->input('search');
        $products = Product::where('name', 'like', '%'.$searchTerm.'%')->get();
        return view('product.search_results', ['products' => $products,'searchTerm' => $searchTerm,'cartItems'=>$cartItems]);
    }

    public function admin_search(Request $request)
    {
        $orders = Order::all();
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        return view('product.admin_search', compact('products','orders'));
    }
}
