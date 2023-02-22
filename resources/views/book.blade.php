@extends('layouts.app')       

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
  <a class="nav-arrow-link" href="{{ url('/home') }}">Home</a>
  <a class="nav-arrow-link" href="{{ url('/library') }}">> Library</a> > {{ $book->name }}
</div>
<div class="content border bg-white rounded-2 me-lg-5 book-container mb-5">
  <div class="book-wrap px-4 pt-3 pb-1 bd-highlight">
    <div class="top d-flex">
      <div>
        <h5 class="py-2" id="bookName{{ $book->id }}">{{ $book->name }}</h5>
      </div>
      <div class="ms-auto me-lg-4 d-flex align-items-center">
        <button type="button" class="btn-icon mx-2 pb-2 icon-edit" data-bs-toggle="modal" data-bs-target="#editBookModal" value="{{ $book->id }}">
          <a style="color: black;"><i class="fa-solid fa-pen-to-square fa-lg mt-1"></i></a>
        </button>
        <button type="button" class="btn-icon mx-2 pb-2 icon-delete" data-bs-toggle="modal" data-bs-target="#deleteBookModal" value="{{ $book->id }}">
          <i class="fa-solid fa-trash-can fa-lg mt-1"></i>
        </button>
      </div>
    </div>
  </div>
  <div class="book-detail">
    <div class="book-info small text-muted text-start">
      <div class="tag text-center px-1 py-auto ms-4">     
          <i class="fa-solid fa-tag ms-1"></i>
          <span class="mx-1">

          @foreach ($categories as $category)
            @if ($category->id == $book->ctg_id){{ $category->name }}@endif
          @endforeach

          </span>
      </div>
    </div>
    <div class="mx-3 px-4 py-2 mt-2">
      {!! $book->detail !!}
    </div>
  </div>
  <div class="px-4 py-2 my-4 container">
    <div class="row row-cols-lg-3 row-cols-sm-1 row-cols-md-1 g-2 g-lg-3">

      @foreach ($recipes as $recipe)
      <div class="col recipe-card">
          <div class="card mx-auto" style="width: 18rem;">
            <a class="recipe-card-link" href="{{ route('recipe', ['recipe_id'=>$recipe->id]) }}">
              <img src="{{ $recipe->image }}" class="card-img-top" alt="..." id="recipeImg{{ $recipe->id }}">
              <div class="card-body my-recipe-card">
                <h6 class="card-title card-recipe-name" id="recipe-title{{ $recipe->id }}">{{ $recipe->name }}</h6>
                <div class="card-tag text-center px-1 py-auto my-1">     
                    <i class="fa-solid fa-tag ms-1"></i>
                    <span class="mx-1">

                      @foreach ($categories as $category)
                        @if ($category->id == $recipe->ctg_id){{ $category->name }}@endif
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
  <div class="zindex-fixed">
    <button type="button" class="btn btn-orange bt-dark rounded-circle" data-bs-toggle="modal" data-bs-target="#createRecipeModal"><p class="mb-0">+</p></button>
  </div>
</div>
<input type="hidden" id="current-page" value="/book">


@endsection
@extends('modal.deleteBookModal')
@extends('modal.editBookModal')
@extends('modal.createRecipeModal')
@extends('modal.deleteRecipeModal')

