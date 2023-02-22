@extends('layouts.app')

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
  <a class="nav-arrow-link" href="{{ url('/home') }}">Home</a>
</div>
<div class="content border bg-white rounded-2 me-lg-5 book-container mb-5">
  <div class="book-wrap px-4 pt-3 pb-1 bd-highlight">
    <div class="top d-lg-flex">
      <div>
        <h5 class="py-2 page-title">ピックアップレシピ</h5>
      </div>
    </div>
  </div>
  <div class="px-4 pt-2 container">
    <div class="row row-cols-lg-3 row-cols-sm-1 row-cols-md-1 g-2 g-lg-3">

      @foreach ( $pickups as $pickup )
      <div class="col recipe-card">
          <div class="card mx-auto" style="width: 18rem;">
            <a class="recipe-card-link" href="{{ route('othersRecipe', ['recipe_id'=> $pickup->id]) }}">
              <img src="{{ $pickup->image }}" class="card-img-top" alt="..." id="recipeImg{{ $pickup->id }}">
              <div class="card-body my-recipe-card">
                <h6 class="card-title card-recipe-name" id="recipe-title{{ $pickup->id }}">{{ $pickup->name }}</h6>
                <div class="card-tag text-center px-1 py-auto my-1">     
                    <i class="fa-solid fa-tag ms-1"></i>
                    <span class="mx-1">

                    @foreach ( $categories as $category )
                      @if ( $category->id === $pickup->ctg_id ) {{ $category->name }} @endif
                    @endforeach

                    </span>
                </div>
                <div class="mt-1 d-flex">
                  <div>
                    <span class="star-display">
                      @for ($i = 0; $i < $pickup->value; $i++)★ @endfor
                    </span>
                  </div>
                  <div class="ms-auto">
  
                    @foreach ( $users as $user )
                      @if ( $user->id === $pickup->user_id )
                      <img src="storage/images/{{ $user->image }}" class="rounded-circle" width="25" height="25">
                      @endif
                    @endforeach
  
                  </div>
                </div>
              </div>
            </a>
          </div>
        </a>
      </div>
      @endforeach

    </div>
  </div>

  <div class="text-end p-3 me-3"><a href="{{ route('allRecipes', ['sort'=> 'all']) }}">レシピ一覧を見る ></a></div>

  <div class="book-wrap px-4 pt-3 pb-1 bd-highlight">
    <div class="top d-lg-flex">
      <div>
        <h5 class="py-2 page-title">ピックアップ動画</h5>
      </div>
    </div>
  </div>
  <div class="px-4 py-2 container">
    <div class="row row-cols-lg-3 row-cols-sm-1 row-cols-md-1 g-2 g-lg-3">
  
      @foreach ( $videos as $video )
      <div class="col recipe-card">
          <div class="card mx-auto" style="width: 18rem;">
            <a class="recipe-card-link" href="{{ route('video', ['video_id'=> $video->video_id]) }}">
              <img src="{{ $video->thumbnail }}" class="card-img-top" alt="...">
              <div class="card-body my-recipe-card">
                <h6 class="card-title card-recipe-name" id="recipe-title{{ $video->id }}">{{ $video->title }}</h6>
                <div class="mt-1 d-flex">
                  <div class="ms-auto">
                    <span class="star-display">★</span> <span style="color: #212529;">{{ $video->value_avg }}</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </a>
      </div>
      @endforeach
  
    </div>
  </div>

  <div class="text-end p-3 me-3 mb-3"><a href="{{ route('allVideos', ['sort'=> 'all']) }}">動画一覧を見る ></a></div>
</div>






@endsection
