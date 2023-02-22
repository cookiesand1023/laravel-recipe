<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Recipe;
use App\Models\Category;
use App\Lib\Youtube;
use Illuminate\Support\Facades\Auth;

class allRecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // show all recipes in 'allRecipes' page
    public function index(Request $request) {

        $recipes = Recipe::sortAndSearchAllRecipes($request);
        $categories = Category::all();
        $users = User::all();

        $ctg_id = (isset($request->ctg_id) === true) ? $request->ctg_id : '';
        $sort = (isset($request->sort) === true) ? $request->sort : 'all';
        $searchKey = (isset($request->search) === true) ? $request->search : '';

        return view('allRecipes', [
            'recipes' => $recipes,
            'categories' => $categories,
            'ctg_id' => $ctg_id,
            'sort' => $sort,
            'searchKey' => $searchKey,
            'users' => $users
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
