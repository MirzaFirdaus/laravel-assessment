<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product/createProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required','decimal:2','regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
            'details' => ['required'],
            'publish' => ['required'],
        ]);
        Product::create($request->all());
        return redirect()->route('product.index')
            ->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::find($id);
        return view('product/showProduct', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::find($id);
        return view('product/editProduct', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required','decimal:2','regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
            'details' => ['required'],
            'publish' => ['required'],
        ]);
        $data = Product::find($id);
        $data->update($request->all());
        return redirect()->route('product.index')
            ->with('success', 'Data updated successfully.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('product.index')
            ->with('success', 'Data deleted successfully');
    }

    /**
     * Added search function for viewing specified resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $product = Product::whereAny(['name','price','details','publish'], 'like', "%$search%")->get();

        return view('product.index', ['product' => $product]);
    }
}
