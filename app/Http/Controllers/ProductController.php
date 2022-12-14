<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Mime\Message;
use DB;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    public function show($id)
    {
        $produk = Product::find($id);

        return response()->json($produk);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'warna' => 'required|string',
            'kondisi' => 'required|in:baru,lama',
            'deskripsi' => 'string'
        ]);

        $data = $request->all();
        $product = Product::create($data);

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if(!$product)
        {
            return response()->json(['message' => 'Product Not Found!'], 404);
        }

        $this->validate($request, [
            'nama' => 'string',
            'harga' => 'integer',
            'warna' => 'string',
            'kondisi' => 'in:baru, lama',
            'deskripsi' => 'string'
        ]);

        $data = $request->all();

        $product->fill($data);

        $product->save();
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product)
        {
            return response()->json(['message' => 'Product Not Found!'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted!']);
    }
}
