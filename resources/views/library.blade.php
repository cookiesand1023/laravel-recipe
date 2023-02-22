@extends('layouts.app')       

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
    <a class="nav-arrow-link" href="{{ url('/home') }}">Home</a> > Library</div>
    <div class="content border bg-white rounded-2 me-lg-5 mb-3">
      <div class="shelf-wrap px-4 py-3 bd-highlight">
        <h5 class="py-2">My Recipebooks</h5>
        <ul class="list-group list-group-flush">
          
          @foreach ($books as $book)

          <li class="list-group-item mb-2 align-items-center border-bottom d-flex">
            <div id="bookName{{ $book->id }}">
              <i class="fa-solid fa-book me-3"></i><a class="book-link book-title-length" href="{{ route('book', ['book_id'=>$book->id]) }}">{{ $book->name }}</a>
            </div>
            <div class="tag text-center px-1 py-auto ms-auto">     
              <i class="fa-solid fa-tag ms-1"></i>
							<span class="mx-1">

								@foreach ($categories as $category)
									@if ($category->id == $book->ctg_id){{ $category->name }}@endif
								@endforeach

              </span>
            </div>
            <div class="ms-4 d-lg-block" style="display: none;">
              <button type="button" class="btn-icon mx-2 icon-edit" value="{{ $book->id }}" data-bs-toggle="modal" data-bs-target="#editBookModal">
                <a style="color: black;"><i class="fa-solid fa-pen-to-square mt-1"></i></a>
              </button>
              <button type="button" class="btn-icon mx-2 icon-delete" data-bs-toggle="modal" data-bs-target="#deleteBookModal" value="{{ $book->id }}">
                <i class="fa-solid fa-trash-can mt-1"></i>
              </button>
            </div>
          </li>

          @endforeach

        </ul>
      </div>
      <div class="text-end py-4 pe-4">
          <button type="button" class="btn btn-purple bt-dark rounded-pill w-35" data-bs-toggle="modal" data-bs-target="#createBookModal"><i class="fa-solid fa-plus me-2"></i>Create New Recipebook</button>
      </div>
  </div>
</div>


@endsection

@extends('modal.createBookModal')
@extends('modal.deleteBookModal')
@extends('modal.editBookModal')



