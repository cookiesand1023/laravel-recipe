<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Video;
use App\Lib\Youtube;
use Illuminate\Support\Facades\Auth;


class RecipeController extends Controller
{

    // constructer
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    // index
    public function index(Request $request)
    {
        //
        $book_id = $request->book_id;
        $book = Book::getBookData($book_id);
        $categories = Category::all();
        $recipes = Recipe::getRecipesInBook($book_id);


        return view('book', [
            'book' => $book[0],
            'recipes' => $recipes,
            'categories' => $categories
        ]);
    }

    // show recipe detail in 'recipe' page
    public function showRecipe(Request $request) {
        $recipe_id = $request->recipe_id;
        $recipe = Recipe::getRecipeData($recipe_id);
        $book_id = $recipe[0]['book_id'];
        $book = Book::getBookData($book_id);
        $categories = Category::all();

        return view('recipe', [
            'book' => $book[0],
            'recipe' => $recipe[0],
            'categories' => $categories
        ]);
    }

    // show recipe detail in 'othersRecipe' page
    public function showOthersRecipe(Request $request) {
        $recipe_id = $request->recipe_id;
        $recipe = Recipe::getRecipeData($recipe_id);
        $categories = Category::all();
        $users = User::all();

        return view('othersRecipe', [
            'users' => $users,
            'recipe' => $recipe[0],
            'categories' => $categories
        ]);
    }

    // get thumbnail of video by Youtube URL
    public function getThumbnail(Request $request) {
        $url = $request->URL;

        $jsonData = Youtube::getYoutubeData($url);

        echo $jsonData;
    }

    // create new recipe
    public function create(Request $request)
    {
        //
        $recipe = Recipe::insert($request);

        if (isset($request->video_title)) {

            $video = Video::insert($request);
        }


        if ($recipe !== false) {
            echo 'ok';
        }
    }

    // get recipe data when you edit recipe
    public function getEditData(Request $request) {

        $res = Recipe::getRecipeDataAjax($request);

        if ($res !== false) {
            echo $res;
        }
    }

    // update recipe
    public function update(Request $request)
    {
        $res = Recipe::editRecipe($request);

        if ($res !== false) {
            echo 'ok';
        }
    }


    // delete recipe
    public function destroy(Request $request)
    {
        //
        $res = Recipe::deleteRecipe($request);

        if ($res !== false) {
            echo 'OK';
        }
    }
}
