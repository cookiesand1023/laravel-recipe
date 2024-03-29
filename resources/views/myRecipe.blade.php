@extends('layouts.app')       

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
  <a class="nav-arrow-link" href="{{ url('/home') }}">Home</a>
  <a class="nav-arrow-link" href="">> My Recipe</a>
</div>
<div class="content border bg-white rounded-2 me-lg-5 book-container">
  <div class="book-wrap px-4 pt-3 pb-1 bd-highlight">
    <div class="top d-lg-flex">
      <div>
        <h5 class="py-2 page-title">マイレシピ</h5>
      </div>
      <div class="p-1 ms-auto me-2">
        <div class="input-group input-group-sm mb-3">
          <input type="text" class="form-control shadow-none search-form" placeholder="Search Recipe" aria-label="Search Recipe" value="{{ $searchKey }}">
          <button class="btn btn-outline-secondary shadow-none" type="button" id="searchRecipe"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </div>
      <div class="">
        <button type="button" class="btn btn-orange bt-dark rounded-circle" data-bs-toggle="modal" data-bs-target="#createRecipeModal"><p class="mb-0">+</p></button>
      </div>
    </div>
  </div>
  <div class="px-4">
    <ul class="nav nav-tabs ps-2">
      <li class="nav-item">
        <a class="nav-link nav-tab @if ( $sort === 'all' && strlen($ctg_id) === 0)active fc-active @endif" value="all" href="{{ route('myRecipe', ['sort'=>'all']) }}">すべて</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-tab @if ( $sort === 'latest')active fc-active @endif" value="latest" href="{{ route('myRecipe', ['sort'=>'latest']) }}">新着</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-tab @if ( $sort === 'value')active fc-active @endif" value="value" href="{{ route('myRecipe', ['sort'=>'value']) }}">評価順</a>
      </li>
        <li class="nav-item dropdown my-auto">
          <button class="nav-link dropdown-toggle nav-tab nav-tag-ctg @if ( strlen($ctg_id) !== 0 ) active fc-active @endif" data-bs-toggle="dropdown" value="category" role="button" aria-expanded="false">
          @if ( $ctg_id ===  '' )<span class="ctg-tag-link">カテゴリーを選択</span> @endif

          @foreach ( $categories as $category )
            @if ( $ctg_id == $category->id ) <span class="ctg-tag-link-selected">{{ $category->name }}</span> @endif
          @endforeach
          
          </button>
          <ul class="dropdown-menu">

            @foreach ( $categories as $category )
            <li class=""><a class="dropdown-item tag-category" href="{{ route('myRecipe', ['ctg_id'=> $category->id]) }}">{{ $category->name }}</a></li>
            @endforeach
            
          </ul>
        </li>
    </ul>
  </div>
  <div class="px-4 py-2 my-4 container">
    <div class="row row-cols-lg-3 row-cols-sm-1 row-cols-md-1 g-2 g-lg-3">

      @foreach ( $recipes as $recipe )
      <div class="col recipe-card">
          <div class="card mx-auto" style="width: 18rem;">
            <a class="recipe-card-link" href="{{ route('recipe', ['recipe_id'=> $recipe->id]) }}">
              <img src="{{ $recipe->image }}" class="card-img-top" alt="..." id="recipeImg{{ $recipe->id }}">
              <div class="card-body my-recipe-card">
                <h6 class="card-title card-recipe-name" id="recipe-title{{ $recipe->id }}">{{ $recipe->name }}</h6>
                <div class="card-tag text-center px-1 py-auto my-1">     
                    <i class="fa-solid fa-tag ms-1"></i>
                    <span class="mx-1">

                    @foreach ( $categories as $category )
                      @if ( $category->id === $recipe->ctg_id ) {{ $category->name }} @endif
                    @endforeach

                    </span>
                </div>
                <div class="mt-1">
                <span class="star-display">
                  @for ($i = 0; $i < $recipe->value; $i++)★ @endfor
                </span>
                </div>
              </div>
            </a>
            <button type="button" class="btn-icon icon-delete recipe-card-trash" data-bs-toggle="modal" data-bs-target="#deleteRecipeModal" value="{{ $recipe->id }}">
              <i class="fa-solid fa-trash-can mt-1"></i>
            </button>
          </div>
        </a>
      </div>
      @endforeach

    </div>
  </div>
  <input type="hidden" name="current-page" id="current-page" value="/myRecipe">
</div>

@endsection

@extends('modal.createRecipeFromMyRecipeModal')
@extends('modal.deleteRecipeModal')