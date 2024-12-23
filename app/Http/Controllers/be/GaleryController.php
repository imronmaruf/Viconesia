<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;

class GaleryController extends Controller
{
    public function index()
    {
        $galeries = Galery::orderBy('created_at', 'desc')->get();
        return view('be.pages.galery.index', compact('galeries'));
    }

    public function create()
    {
        return view('be.pages.galery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|array',
            'file.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            DB::beginTransaction();

            if (!$request->hasFile('file')) {
                throw new Exception('Tidak ada file yang diunggah');
            }

            foreach ($request->file('file') as $image) {
                $path = $image->store('gallery', 'public');

                Galery::create([
                    'title' => $request->title,
                    'image_path' => 'storage/' . $path
                ]);
            }

            DB::commit();
            return redirect()->route('be/galery.index')->with('success', 'Galeri berhasil ditambahkan');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $gallery = Galery::findOrFail($id);
            return view('be.pages.galery.edit', compact('gallery'));
        } catch (Exception $e) {
            return redirect()->route('be/galery.index')->with('error', 'Galeri tidak ditemukan');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            DB::beginTransaction();

            $gallery = Galery::findOrFail($id);
            $oldImagePath = str_replace('/storage', 'public', $gallery->image_path);

            if ($request->hasFile('image')) {
                $newImagePath = $request->file('image')->store('gallery', 'public');
                $gallery->image_path = 'storage/' . $newImagePath;

                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
            }

            $gallery->title = $request->title;
            $gallery->save();

            DB::commit();
            return redirect()->route('be/galery.index')->with('success', 'Galeri berhasil diupdate');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $ids = explode(',', $id);
            $galleries = Galery::whereIn('id', $ids)->get();

            foreach ($galleries as $gallery) {
                $imagePath = str_replace('/storage', 'public', $gallery->image_path);

                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }

                $gallery->delete();
            }

            DB::commit();
            return redirect()->route('be/galery.index')->with('success', 'Galeri berhasil dihapus');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('be/galery.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
