@extends('layouts.app')       

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
  <a class="nav-arrow-link" href="{{ url('/home') }}">Home</a>
  <a class="nav-arrow-link" href="{{ url('/setting') }}"> > Setting</a> > emailReset
</div>
<div class="content border bg-white rounded-2 me-lg-5">
  <div class="px-4 py-3 bd-highlight">
    <h5 class="py-2">メールアドレス変更</h5>
  </div>
  <div class="container setting-form mb-5">

    @if (session('flash_message'))
    <div class="alert alert-success" role="alert">
        {{ session('flash_message') }}
    </div>
    @endif

    <form action="/emailReset" method="post">
      @csrf
    <div class="mb-4 row">
      <div class="col-lg-4 pt-2">
          <span class="form-label small">新しいメールアドレス</span>
      </div>

        <div class="col-lg-8">
            <input type="email" class="form-control" name="newEmail" size="30" value="">
        </div>
        
      </div>
      <div class="text-end mb-4">
        <button type="submit" class="btn btn-purple rounded-pill" name="editProfile" data-bs-toggle="modal" data-bs-target="#editModal">メールを送信</button>
      </div>
    </form>
  </div>
</div>

@endsection