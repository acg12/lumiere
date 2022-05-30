<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $data = Product::paginate(9);
        $search_query = null;
        return view('products', compact('data', 'search_query'));
    }

    public function search(Request $request) {
        $search_query = $request->query('q');
        $data = Product::query()
            ->where('product_name', 'LIKE', "%$search_query%")
            ->paginate(9)->appends(['q' => $search_query]);
        return view('products', compact('data', 'search_query'));
    }

    public function details($id) {
        $data = Product::query()
            ->where('id', '=', "$id")
            ->get()->first();
        return view('details', compact('data'));
    }
}
