<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index() {
        $product = product::all();

        return view('product.product', compact('product'));
    }

    public function show($id) {
        $product = product::findOrFail($id);

        return view('product.update-product', compact('product'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'keterangan' => 'required|string|max:100',
            'price' => 'required|string|max:100',
            'image' => 'required|image|max:2048',
        ]);

        if($validatedData){
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->category = $validatedData['category'];
        $product->keterangan = $validatedData['keterangan'];
        $product->price = $validatedData['price'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return back()->with('success', 'Product added.');
    }else{
        return back()->withErrors(['error'=>'Failed to add the product.']);
    }
}


    public function update(Request $request, $id) {
        $request -> validate([
            'name' => 'nullable|string|max:100',
            'category' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string|max:100',
            'price' => 'nullable|string|max:100',
            'image' => 'nullable|string|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->has('name')) {
            $product->name = $request->input('name');
            }

            if ($request->has('category')) {
            $product->category = $request->input('email');
            }

            if ($request->has('keterangan')) {
            $product->keterangan = $request->input('about');
            }

            if ($request->has('price')) {
            $product->price = $request->input('company');
            }

            if ($request->hasFile('product')) {
                $myFile = 'product/'.$product->image;
                if(File::exists($myFile))
                {
                    File::delete($myFile);
                }

                $request->file('image')->move('product/', $request->file('image')->getClientOriginalName());
                $product->image=$request->file('image')->getClientOriginalName();
            }

                $product->save();

                return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Request $request, $id) {
        $product = Product::findOrFail($id);

        if ($product->image) {
            $oldFilePath = public_path('product/'.$product->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $product -> delete();

        return back()->with('message', 'Product deleted.');
    }
}
