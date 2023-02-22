@extends('layouts.app')       

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
  <a class="nav-arrow-link" href="{{ url('/home') }}">Home</a>
  <a class="nav-arrow-link" href="{{ route('allVideos', ['sort'=>'all']) }}">> All Videos</a> >
</div>
<div class="content border bg-white rounded-2 me-lg-5 book-container mb-5">
  <div class="book-wrap px-4 pt-lg-3 pb-1 bd-highlight">
    <div class="video-wrap text-center mt-4 py-3">
        <iframe width="784" height="441" class="youtube" src="https://www.youtube.com/embed/{{ $video->video_id }}" title="YouTube video player" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <img id="videoImg{{ $video->video_id }}" src="{{ $video->thumbnail }}" style="display: none;">
    </div>
    <div class="top">
        <div class="px-1 py-auto ms-lg-5 d-flex me-lg-5">     
            <span class="text-muted small pt-3 mb-2">タイトル</span>
            {{-- {# 追加ボタン #} --}}
            <div class="ms-auto">
                <button type="button" class="btn btn-purple bt-dark rounded-pill w-35" data-bs-toggle="modal" data-bs-target="#createRecipeModal" id="addRecipeFromVideo"><i class="fa-solid fa-plus me-2"></i>Add To Recipebook</button>
            </div>
        </div>
        <div class="mx-lg-5">
          <div class="py-2 px-2 mx-auto border-bottom recipe-name text-start" id="video-title{{ $video->video_id }}" style="width: 100%;">{{ $video->title }}</div>
        </div>
    </div>
    <div class="book-detail px-lg-5">
      <div class="d-flex">
        <div class="eval ms-auto me-4 mt-2">
            <div>
                <span class="small text-muted" style="color: #212529;">平均評価</span> <span class="star-display me-1">★</span> <span style="color: #212529;">{{ $video->value_avg }}</span>
            </div>
        </div>
      </div>
      <div class="mx-3 py-2 detail-text small mb-3 mt-3">
      {!! $video->description !!}
      </div>
    </div>
  </div>
  <input type="hidden" id="current-page" value="/video">
  <input type="hidden" id="video_id" value="{{ $video->video_id }}">
</div>

@endsection

@extends('modal.createRecipeFromVideoModal')

