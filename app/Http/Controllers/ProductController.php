<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view ('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'productid'=>'required|string|max:50|unique:products',
            'name' => 'required',
            'category_id' =>'required',
            'price' =>'required',
            'description' =>'required'
        ]);
        // var_dump($request->name);
        // // Product::insert([
        // //     'productid' => $request->get('productid'),
        // //     'name' => $request->get('name'),
        // //     'category' => $request->get('category'),
        // //     'price' => $request->get('price'),
        // //     'description' => $request->get('description')
        // // ]);
        
        Product::create($request->except('_token'));

        return redirect(route('product.index'))->with(['success' =>'Product Berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('product.edit', compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required|integer',
            'category_id' => 'required',
            'description' => 'required'
            
            
        ]);
       
        $product->update($request->all());
        // // $product->update([
        // //     'productid' => $request->get('productid'),
        // //     'name' => $request->get('name'),
        // //     'category' => $request->get('category'),
        // //     'price' => $request->get('price'),
        // //     'description' => $request->get('description')
        // // ]);

        return redirect()->route('product.index')->with('success', 'Product Berhasil diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        // $product = Product::find($id)->delete();

        // $category = Category::find($id)->delete();
        // return redirect(route('product.index'))->with('success','Data berhasil dihapus');
        $product->delete();

        return redirect(route('product.index'))->with('success','Product berhasil didelete !');
    }
}
