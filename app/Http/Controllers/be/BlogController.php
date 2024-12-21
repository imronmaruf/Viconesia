<?php

namespace App\Http\Controllers\be;

use App\Models\BlogPost;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $dataBlog = BlogPost::all();

        return view('be.pages.blog.index', compact('dataBlog'));
    }

    // public function show($id)
    // {
    //     $dataBlog = BlogPost::find($id);
    //     // dd($dataBlog);
    //     return view('be.pages.blog.show', compact('dataBlog'));
    // }


    public function show($id)
    {
        $dataBlog = BlogPost::find($id);
        $dataCategory = $dataBlog->blogCategory;
        return view('be.pages.blog.show', compact('dataBlog', 'dataCategory'));
    }

    public function create()
    {
        $dataCategory = BlogCategory::all();
        return view('be.pages.blog.create', compact('dataCategory'));
    }

    public function store(Request $request)
    {
        $dataBlog = $request->validate([
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required',
            'content' => 'required',
            'image_path' => 'nullable|mimes:png,jpg,jpeg|max:4096',
            'status' => 'required|in:published,draft',
        ]);

        $dataBlog['slug'] = Str::slug($dataBlog['title']);

        try {
            DB::beginTransaction();

            $blog = new BlogPost();
            $blog->blog_category_id = $dataBlog['blog_category_id'];
            $blog->slug = $dataBlog['slug'];
            $blog->content = $dataBlog['content'];
            $blog->title = $dataBlog['title'];
            $blog->status = $dataBlog['status'];

            if ($request->hasFile('image_path')) {
                $image = $request->file('image_path');
                $imageName = 'blog_' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images/blog', $imageName, 'public');
                $blog->image_path = $path;
            }


            $blog->save();

            DB::commit();
            session()->flash('success', 'Data Blog Berhasil Disimpan');
            return redirect()->route('be/blog.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $dataBlog = BlogPost::find($id);
        $dataCategory = BlogCategory::all();
        return view('be.pages.blog.edit', compact('dataBlog', 'dataCategory'));
    }

    public function update(Request $request, $id)
    {
        $blog = BlogPost::findOrFail($id);

        $dataBlog = $request->validate(
            [
                'blog_category_id' => 'required|exists:blog_categories,id',
                'title' => 'required',
                'content' => 'required',
                'image_path' => 'nullable|mimes:png,jpg,jpeg|max:4096',
                'status' => 'required|in:published,draft',
                'slug' => 'required|unique:blog_posts,slug,' . $id,
            ]
        );

        $dataBlog['slug'] = Str::slug($dataBlog['title']);

        try {
            DB::beginTransaction();

            $blog->blog_category_id = $dataBlog['blog_category_id'];
            $blog->slug = $dataBlog['slug'];
            $blog->content = $dataBlog['content'];
            $blog->title = $dataBlog['title'];
            $blog->status = $dataBlog['status'];

            if ($request->hasFile('image_path')) {
                if ($blog->image_path && Storage::disk('public')->exists($blog->image_path)) {
                    Storage::disk('public')->delete($blog->image_path);
                }
                $image = $request->file('image_path');
                $imageName = 'blog_' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images/blog', $imageName, 'public');
                $blog->image_path = $path;
            }

            $blog->save();

            DB::commit();
            session()->flash('success', 'Data Berita Berhasil Disimpan');
            return redirect()->route('be/blog.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            // Cari record Blog berdasarkan ID
            $blog = BlogPost::findOrFail($id);

            // cari gambar jika ada 
            if ($blog->image_path && Storage::disk('public')->exists($blog->image_path)) {
                // Hapus gambar blog dari penyimpanan
                Storage::disk('public')->delete($blog->image_path);
            }

            // Hapus record blog dari database
            $blog->delete();

            DB::commit();

            // Menampilkan pesan sukses
            session()->flash('success', 'Hero Berhasil Dihapus');
            return redirect()->route('be/blog.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // Menampilkan pesan error jika terjadi kesalahan
            return redirect()->back()->with('error', 'Gagal menghapus Blog: ' . $e->getMessage());
        }
    }
}
