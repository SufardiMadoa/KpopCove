<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductDetailsController extends Controller
{
    public function showProductDetails($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        return view('pages.users.product_detail', compact('product'));
    }
}
