<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function destroy($id)
    {
        // Найдите товар по его ID и удалите его
        $product = Product::find($id);
        if (!$product) {
            // Товар не найден
            return redirect()->route('products.index')->with('error', 'Товар не найден.');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Товар успешно удален.');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'amount' => 'required',
    ]);

    $product = Product::findOrFail($id);

    $product->update($request->only(['name', 'price', 'amount']));
    Log::info('Updated product: ' . $product);

   
}


}
