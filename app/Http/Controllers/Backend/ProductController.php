<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    //

    public function create()
    {
        return view('db_includes.add_product');
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

}
