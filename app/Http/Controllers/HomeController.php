<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Video;
use App\Models\User;

class HomeController extends Controller
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
        $recipes = Recipe::pickupRecipes();

        $videos = Video::pickupVideos();

        $categories = Category::all();

        $users = User::all();

        return view('home', [
            'pickups' => $recipes,
            'categories' => $categories,
            'videos' => $videos,
            'users' => $users
        ]);
    }
}
