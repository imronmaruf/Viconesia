<?php

namespace App\Http\Controllers\be;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $dataProduct = Product::all();
        return view('be.pages.product.index', compact('dataProduct'));
    }

    public function create()
    {
        return view('be.pages.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.*' => 'required|string|max:255',
            'description.*' => 'nullable|string',
            'price.*' => 'required|numeric|min:0',
            'market_link.*' => 'required|url',
            'image_path.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->name as $key => $name) {
                $product = new Product();
                $product->name = $name;
                $product->description = $request->description[$key] ?? null;
                $product->price = $request->price[$key];
                $product->market_link = $request->market_link[$key];

                // Handle image upload if present
                if (isset($request->file('image_path')[$key])) {
                    $image = $request->file('image_path')[$key];
                    $imageName = 'product_' . time() . '_' . $key . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('images/products', $imageName, 'public');
                    $product->image_path = $path;
                }

                $product->save();
            }

            DB::commit();

            session()->flash('success', 'Data Product Berhasil Disimpan');
            return redirect()->route('be/product.index');
        } catch (\Exception $e) {
            DB::rollBack();

            // If there was an error and images were uploaded, clean them up
            if (isset($path)) {
                Storage::disk('public')->delete($path);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data = Product::find($id);
        if (!$data) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'market_link' => 'required|url',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            // Update basic fields
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->market_link = $request->market_link;

            // Handle image upload if new image is provided
            if ($request->hasFile('image_path')) {
                // Delete old image if exists
                if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                    Storage::disk('public')->delete($product->image_path);
                }

                // Store new image
                $image = $request->file('image_path');
                $imageName = 'product_' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images/products', $imageName, 'public');
                $product->image_path = $path;
            }

            $product->save();

            DB::commit();

            session()->flash('success', 'Data Product Berhasil Diperbarui');
            return redirect()->route('be/product.index');
        } catch (\Exception $e) {
            DB::rollBack();

            // If there was an error and a new image was uploaded, clean it up
            if (isset($path)) {
                Storage::disk('public')->delete($path);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            // Delete associated image if exists
            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }
            // Delete the product
            $product->delete();

            DB::commit();

            session()->flash('success', 'Product Berhasil Dihapus');
            return redirect()->route('be/product.index');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus product: ' . $e->getMessage());
        }
    }
}
