<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;


class ProductController extends Controller
{


    public function dashboard()
    {
        $data=Product::all();
        return view('dashboard.dashboard', compact('data'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('db_includes.product_view', compact('product'));
    }


    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'image' => 'required|image'
        ]);

        $imageName = null;

        if($request->hasFile('image'))
        {

            $image = $request->file('image');

            $imageName = time().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/products'),$imageName);
        }

        Product::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'price' => $request->price,

            'qty' => $request->qty,

            'description' => $request->description,

            'image' => $imageName,

            'status' => $request->status ?? 1
        ]);

        return redirect()->back()
        ->with('success','Product Added Successfully');
    }

    public function edit($id)
{
    $product = Product::findOrFail($id);

    return view('db_includes.product_edit', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name'  => 'required',
        'price' => 'required',
        'qty'   => 'required'
    ]);

    $imageName = $product->image;

    if ($request->hasFile('image')) {

        if ($product->image &&
            file_exists(public_path('uploads/products/'.$product->image))) {

            unlink(public_path('uploads/products/'.$product->image));
        }

        $image = $request->file('image');

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('uploads/products'), $imageName);
    }

    $product->update([

        'name' => $request->name,

        'slug' => \Illuminate\Support\Str::slug($request->name),

        'price' => $request->price,

        'qty' => $request->qty,

        'description' => $request->description,

        'image' => $imageName,

        'status' => $request->status

    ]);

    return redirect()->route('dashboard')->with('success', 'Product updated Successfully.');

}

        public function delete($id)
    {
        $product = Product::findOrFail($id);

        $product = Product::findOrFail($id);

    // Delete image
    if ($product->image && file_exists(public_path('uploads/products/' . $product->image))) {
        unlink(public_path('uploads/products/' . $product->image));
    }

    // Delete record
    $product->delete();

    return redirect()->back()->with('success', 'Product Deleted Successfully.');
    }


}
