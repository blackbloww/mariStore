<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\ProductColor;
use Illuminate\Pagination\Paginator;
use App\Models\Cart;
use App\Models\Command;

class HomeController extends Controller
{
    public function index()
    {
            $cartItems = Cart::all();

            $productsCategory1 = Product::where('category_id',1)
                                        ->orderBy('created_at', 'desc')
                                        ->take(4)
                                        ->get();
            
            $productsCategory2 = Product::where('category_id', 2)
                                        ->orderBy('created_at', 'desc')
                                        ->take(4)
                                        ->get();
            
            $productsCategory3 = Product::where('category_id', 3)
                                        ->orderBy('created_at', 'desc')
                                        ->take(4)
                                        ->get();
            $products = Product::orderBy('created_at', 'desc')
                                        ->take(4)
                                        ->get();

            return view('home.index', compact('productsCategory1', 'productsCategory2', 'productsCategory3','products','cartItems'));

    }

    public function show($id)
    {
        $commands = Command::all();
        $cartItems = Cart::all();
        $product = Product::findOrFail($id);
        return view('home.detail', compact('product','cartItems','commands'));
    }

    public function products()
    {
        $cartItems = Cart::all();
        $products = Product::paginate(3);
        return view('home.products',compact('products','cartItems'));
    }

    public function sort(Request $request)
{
    $cartItems = Cart::all();
    $sortField = $request->query('field', 'price');
    $sortOrder = $request->query('sort', 'asc');

    // Sắp xếp sản phẩm theo trường và thứ tự được chỉ định
    $products = Product::orderBy($sortField, $sortOrder)->paginate(8);
    $products->appends($request->query());

    return view('home.products', compact('products', 'cartItems'));
}

    public function filter(Request $request)
    {
        $cartItems = Cart::all();
        $query = Product::query();
        //  price
        if ($request->has('price')) {
            $price = $request->query('price');
            if ($price == '< 500.000đ') {
                $query->where('price', '<', 500000);
            } elseif ($price == '< 1.000.000đ') {
                $query->where('price', '<', 1000000);
            }
        }
        // // color
        // if ($request->has('color')) {
        //     $colorName = $request->query('color');
        //     $color = Color::where('name', $colorName)->firstOrFail();

        //     $query->whereHas('colors', function ($q) use ($color) {
        //         $q->where('color_id', $color->id);
        //     });
        // }
        $products = $query->paginate(8);
        return view('home.products', ['products' => $products,'cartItems'=>$cartItems]);
    }
}
