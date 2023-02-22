@extends('layouts.app')       

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
  <a class="nav-arrow-link" href="{{ url('/home') }}">Home ></a>
  <a class="nav-arrow-link" href="{{ url('/allRecipes') }}">All Recipes</a>
</div>
<div class="content border bg-white rounded-2 me-lg-5 book-container mb-5">
  <div class="book-wrap px-4 pt-3 pb-1 bd-highlight">
    <div class="video-wrap text-center mt-4 py-3">
      <iframe width="784" height="441" class="youtube" src="https://www.youtube.com/embed/{{ $recipe->video_id }}" title="YouTube video player" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <img id="recipeImg{{ $recipe->id }}" src="{{ $recipe->image }}" style="display: none;">
    </div>
    <div class="top">
      <div class="tag text-center px-1 py-auto ms-lg-5 mb-2">     
          <i class="fa-solid fa-tag ms-1"></i>
          <span class="mx-1">

          @foreach ($categories as $category)
            @if ($category->id == $recipe->ctg_id){{ $category->name }}@endif
          @endforeach

          </span>
      </div>
      <div class="mx-lg-5">
        <div class="py-2 px-2 mx-auto border-bottom recipe-name text-start" id="recipe-title{{ $recipe->id }}" style="width: 100%;">{{ $recipe->name }}</div>
      </div>
    </div>
  </div>
  <div class="book-detail px-lg-5">
    <div class="d-flex">
      <div class="user-info mb-2">

        @foreach ( $users as $user )
          @if ( $user->id === $recipe->user_id )
          <img src="storage/images/{{ $user->image }}" class="rounded-circle ms-4 recipe-user-image" width="25" height="25">
          <span class="small ms-1">{{ $user->name }}</span>
          @endif
        @endforeach

      </div>
      <div class="eval ms-auto me-4">
        <span class="star-display">
        @for ($i = 0; $i < $recipe->value; $i++)★ @endfor
        </span>
      </div>
    </div>
    <div class="mx-3 px-4 py-2 detail-text small">
      {!! $recipe->detail !!}
    </div>
      <div class="text-end mb-4 me-4 pb-2">
        <span class="me-lg-4 update-date">Last updated : {{ $recipe->updated_at }}</span>
      </div>
    </div>
  </div>
  <input type="hidden" name="current-page" id="current-page" value="/othersRecipe">
</div>


@endsection

