@extends('layouts.app')       

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
  <a class="nav-arrow-link" href="{{ url('/home') }}">Home</a> > All Videos
</div>
<div class="content border bg-white rounded-2 me-lg-5 book-container">
  <div class="book-wrap px-4 pt-3 pb-1 bd-highlight">
    <div class="top d-lg-flex">
      <div>
        <h5 class="py-2">動画から探す</h5>
      </div>
      <div class="p-1 ms-auto me-2">
        <div class="input-group input-group-sm mb-3">
          <input type="text" class="form-control shadow-none search-form" placeholder="Search Recipe" aria-label="Search Recipe" value="{{ $searchKey }}">
          <button class="btn btn-outline-secondary shadow-none" type="button" id="searchRecipe"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </div>
    </div>
  </div>
  <div class="px-4">
    <ul class="nav nav-tabs ps-2">
      <li class="nav-item">
        <a class="nav-link nav-tab @if ( $sort === 'all' )active fc-active @endif" value="all" href="{{ route('allVideos', ['sort'=>'all']) }}">すべて</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-tab @if ( $sort === 'latest')active fc-active @endif" value="latest" href="{{ route('allVideos', ['sort'=>'latest']) }}">新着</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-tab @if ( $sort === 'value')active fc-active @endif" value="value" href="{{ route('allVideos', ['sort'=>'value']) }}">評価順</a>
      <li class="describe small ms-auto me-3 p-2"><span class="star-display">★</span> <span class="avg-text" style="color: #212529;">: レシピの平均評価</span></li>
    </ul>
  </div>
  <div class="px-4 py-2 my-4 container" id="contents.lazy">
    <div class="row row-cols-lg-3 row-cols-sm-1 row-cols-md-1 g-2 g-lg-3">

      @foreach ( $videos as $video )
      <div class="col video-card">
          <div class="card" style="width: 18rem;">
            <a class="video-card-link" href="{{ route('video', ['video_id'=>$video->video_id]) }}">
              <img src="{{ $video->thumbnail }}" class="card-img-top" alt="..." id="recipeImg{{ $video->video_id }}">
              <div class="card-body my-video-card">
                <h6 class="card-title card-video-name" id="video-title{{ $video->video_id }}">{{ $video->title }}</h6>
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
    <div class="mr-auto">
      {{ $videos->links() }}
    </div>
  </div>
  <input type="hidden" name="current-page" id="current-page" value="/allVideos">
  {{-- <div class="pt-2 m-3 text-center">
    {{-- <button type="submit" class="btn btn-secondary rounded-pill " id="load" style="width: 500px;">Show more videos</button> --}}
{{-- </div> --}}
</div>

@endsection