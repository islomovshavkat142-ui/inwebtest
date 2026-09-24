<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(
            Product::with('category')->get(),
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json(
                ['message' => 'Product not found'],
                404,
                [],
                JSON_UNESCAPED_UNICODE
            );
        }

        return response()->json(
            $product,
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
