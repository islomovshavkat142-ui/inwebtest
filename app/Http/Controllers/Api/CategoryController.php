<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::with('products')->get(), 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id)
    {
        $category = Category::with('products')->find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json($category, 200, [], JSON_UNESCAPED_UNICODE);
    }

    // Доп. задача: Создание категории
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|string',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
        ]);

        $category = Category::create($validated);

        return response()->json($category, 201, [], JSON_UNESCAPED_UNICODE);
    }

    // Доп. задача: Редактирование категории
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'image' => 'nullable|string',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
        ]);

        $category->update($validated);

        return response()->json($category, 200, [], JSON_UNESCAPED_UNICODE);
    }

    // Доп. задача: Удаление категории
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
