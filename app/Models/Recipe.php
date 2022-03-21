<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Lib\Youtube;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recipes';

    protected $fillable = [
        'name', 'video_id', 'image', 'ctg_id', 'user_id', 'book_id', 'detail', 'value'
    ];

    // get all recipes by book_id
    public static function getRecipesInBook($book_id){
        $recipes = Recipe::where('book_id', $book_id)->get();

        return $recipes;
    }

    public static function getRecipeData($recipe_id) {
        $recipe = Recipe::where('id', $recipe_id)->get();

        return $recipe;
    }

    public static function pickupRecipes() {
        $recipes = Recipe::inRandomOrder()->take(6)->get();

        return $recipes;
    }

    // create new recipe (ajax)
    public static function insert($request) {

        $data = [
            'name' => $request->name,
            'video_id' => Youtube::getVideoID($request->video_id),
            'image' => $request->image,
            'ctg_id' => $request->ctg_id,
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'detail' => nl2br($request->detail),
            'value' => $request->value
        ];

        $res = Recipe::create($data);

        return $res;
    }

    // get recipe data when user edit certain recipe (ajax)
    public static function getRecipeDataAjax($request) {
        $id = $request->id;

        $data = Recipe::where('id', $id)->get();

        if (isset($data[0]) === true) {

            $jsonData = json_encode($data[0], JSON_UNESCAPED_UNICODE);
    
            return $jsonData;

        } else {
            return false;
        }
    }

    // search and sort recipes in 'myRecipe' page
    public static function sortAndSearchMyRecipe($request) {

        $ctg_id = (isset($request->ctg_id) === true) ? $request->ctg_id : '';
        $sort = (isset($request->sort) === true) ? $request->sort : '';
        $searchKey = (isset($request->search) === true) ? $request->search : '';

        $query = Recipe::query();
        $query->where('user_id', Auth::user()->id);
        
        if ($ctg_id !== '') {
            $query->where('ctg_id', $ctg_id);
        }

        switch ($sort) {
            case 'all':
                $query->orderBy('created_at', 'desc');
                break;
            
            case 'latest':
                $query->orderBy('updated_at', 'desc');
                break;
            
            case 'value':
                $query->orderBy('value', 'desc')->orderBy('updated_at', 'desc');;
                break;
        }

        if ($searchKey !== '') {
            $pat = '%' . addcslashes($searchKey, '%_\\') . '%';
            $query->where('name', 'LIKE', $pat);
        }

        $data = $query->get();

        if (isset($data[0]) !== true) {
            $data = [];
        }

        return $data;
    }

    // search and sort recipes in 'allRecipe' page
    public static function sortAndSearchAllRecipes($request) {

        $ctg_id = (isset($request->ctg_id) === true) ? $request->ctg_id : '';
        $sort = (isset($request->sort) === true) ? $request->sort : '';
        $searchKey = (isset($request->search) === true) ? $request->search : '';

        $query = Recipe::query();
        
        if ($ctg_id !== '') {
            $query->where('ctg_id', $ctg_id);
        }

        switch ($sort) {
            case 'all':
                $query->orderBy('created_at', 'desc');
                break;
            
            case 'latest':
                $query->orderBy('updated_at', 'desc');
                break;
            
            case 'value':
                $query->orderBy('value', 'desc')->orderBy('updated_at', 'desc');;
                break;
        }

        if ($searchKey !== '') {
            $pat = '%' . addcslashes($searchKey, '%_\\') . '%';
            $query->where('name', 'LIKE', $pat);
        }

        $data = $query->paginate(12)->withQueryString();

        if (isset($data[0]) !== true) {
            $data = [];
        }

        return $data;
    }

    // edit my recipe
    public static function editRecipe($request) {
        $id = $request->id;
        $data = [
            'name' => $request->name,
            'ctg_id' => $request->ctg_id,
            'value' => $request->value,
            'detail' => nl2br($request->detail),
        ];

        $res = Recipe::where('id', $id)->update($data);

        return $res;
    }

    // delete existing recipe (ajax)
    public static function deleteRecipe($request) {
        $id = $request->id;
        
        $res = Recipe::where('id', $id)->delete();

        return $res;
    }

    // // show recipe detail in 'recipe' page
    // public static function showRecipe()
}
