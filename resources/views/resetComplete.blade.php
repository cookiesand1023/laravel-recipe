@extends('layouts.app')       

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
  <a class="nav-arrow-link" href="{{ url('/home') }}">Home</a>
  <a class="nav-arrow-link" href="{{ url('/setting') }}"> > Setting</a> > resetComplete
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
  </div>
</div>

@endsection