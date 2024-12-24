<?php

namespace App\Http\Controllers\fe;

use App\Models\Hero;
use App\Models\Teams;
use App\Models\Galery;
use App\Models\Profile;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Product;
use App\Models\Testimonials;

class LandingController extends Controller
{
    public function index()
    {
        // $testimonials = Testimonials::latest()->get();
        $testimonials = Testimonials::latest()->paginate(4);
        $blogs = BlogPost::with('blogCategory') // Mengambil data dengan kategori
            ->where('status', 'published') // Hanya menampilkan post dengan status 'published'
            ->latest()
            ->paginate(6); // Pagination 6 data per halaman
        $image = Galery::first(); // Mengambil satu data pertama
        $images = Galery::all();

        // Mengambil satu data hero yang statusnya aktif
        $heroes = Hero::where('status', 1)->get();
        // dd($hero);
        return view('fe.index', compact('image', 'images', 'blogs', 'heroes', 'testimonials'));
    }



    public function contactIndex()
    {
        return view('fe.pages.contact.index');
    }

    public function aboutIndex()
    {
        $image = Galery::inRandomOrder()->first(); // Ambil satu gambar secara acak
        $teams = Teams::all();
        // $images = Galery::inRandomOrder()->take(2)->get(); // Ambil dua gambar secara acak
        return view('fe.pages.about.index', compact('image', 'teams'));
    }


    public function productIndex()
    {
        $products = Product::all();
        return view('fe.pages.product.index', compact('products'));
    }

    public function testimonialIndex()
    {
        $testimonials = Testimonials::latest()->paginate(4);

        return view('fe.pages.testimonial.index', compact('testimonials'));
    }

    public function blogIndex(Request $request)
    {
        $search = $request->input('search');

        $blogs = BlogPost::with('blogCategory') // Mengambil data dengan kategori
            ->where('status', 'published') // Hanya menampilkan post dengan status 'published'
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(6); // Pagination 6 data per halaman

        return view('fe.pages.blog.index', compact('blogs'));
    }


    public function blogDetail($slug)
    {
        $blog = BlogPost::where('slug', $slug)->firstOrFail();
        $widgetBlog = BlogPost::latest()->take(6)->get();
        $categories = BlogCategory::withCount(['blog' => function ($query) {
            $query->where('status', 'published'); // Filter berita yang publish
        }])->get();
        return view('fe.pages.blog.detail', compact('blog', 'categories', 'widgetBlog'));
    }
}
