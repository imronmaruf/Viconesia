<?php

namespace App\Http\Controllers\be;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $dataCategories = BlogCategory::all();
        return view('be.pages.blog-category.index', compact('dataCategories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:blog_categories,name',
        ]);
        $data['slug'] = Str::slug($data['name']);
        try {
            DB::beginTransaction();
            $newCategory = new BlogCategory();
            $newCategory->name = $data['name'];
            $newCategory->slug = $data['slug'];
            $newCategory->save();

            DB::commit();
            Session::flash('success', 'Kategori Blog Berhasil Ditambahkan');
            return redirect()->route('be/blog/category.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:blog_categories,name,' . $id,
        ]);
        $data['slug'] = Str::slug($data['name']);
        try {
            DB::beginTransaction();

            $category = BlogCategory::findOrFail($id);
            $category->name = $data['name'];
            $category->slug = $data['slug'];
            $category->save();

            DB::commit();

            Session::flash('success', 'Kategori blog Berhasil Diubah');
            return redirect()->route('be/blog/category.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $category = BlogCategory::findOrFail($id);
            $category->delete();
            DB::commit();
            Session::flash('success', 'Kategori Blog Berhasil Dihapus');
            return redirect()->route('be/blog/category.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
