<?php

namespace App\Http\Controllers\be;

use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Teams;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $profile = Profile::first();
        $productCount = Product::count();
        $teamsCount = Teams::count();
        $blogCount = BlogPost::count();
        return view('be.index', compact('productCount', 'teamsCount', 'blogCount'));
    }
}
