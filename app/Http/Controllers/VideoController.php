<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Recipe;
use App\Models\Category;
use App\Lib\Youtube;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{


    public function showVideo(Request $request)
    {
        $video = Video::showVideoDetail($request);
        $categories = Category::all();
        $books = Book::where('user_id', Auth::user()->id)->get();

        return view('video', [
            'video' => $video[0],
            'categories' => $categories,
            'books' => $books
        ]);
    }

    // show all Videos in 'allVideos' page
    public function showAllVideos (Request $request) {

        $videos = Video::sortAndSearchAllVideos($request);
        $categories = Category::all();
        $users = User::all();

        $ctg_id = (isset($request->ctg_id) === true) ? $request->ctg_id : '';
        $sort = (isset($request->sort) === true) ? $request->sort : 'all';
        $searchKey = (isset($request->search) === true) ? $request->search : '';

        return view('allVideos', [
            'videos' => $videos,
            'categories' => $categories,
            'ctg_id' => $ctg_id,
            'sort' => $sort,
            'searchKey' => $searchKey,
            'users' => $users
        ]);
    }

}
