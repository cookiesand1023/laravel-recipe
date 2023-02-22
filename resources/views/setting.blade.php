@extends('layouts.app')       

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
  <a class="nav-arrow-link" href="{{ url('/home') }}">Home</a> > Setting
</div>
<div class="content border bg-white rounded-2 me-lg-5">
  <div class="px-4 py-3 bd-highlight">
    <h5 class="py-2">アカウントの設定</h5>
  </div>
  <form>
  <div class="container mb-4">
      <div class="py-3 px-5">
            <div class="profile text-center image-wrap ">
            <label class="mx-auto">
                <a class="a-thumbnail"><img src="storage/images/{{ $user->image }}" class="rounded-circle img-thumbnail editThumb" width="100" height="100"></a>
                <input type="file" class="d-none" id="edit_image" name="thumbnail">
            </label>
            </div>
        <div class="p-2 text-center">{{ $user->name }}</div>
      </div>
  </div>
  <div class="container setting-form mb-5">
    <div class="mb-4 row">
      <div class="col-lg-4 pt-2">
          <span class="form-label small">ユーザー名</span>
      </div>
      <div class="col-lg-8">
          <input type="text" class="form-control" id="edit-user-name" size="30" value="{{ $user->name }}">
      </div>
    </div>
    <div class="text-end mb-4">
      <button type="button" class="btn btn-purple rounded-pill" name="editProfile" data-bs-toggle="modal" data-bs-target="#editModal">アカウント情報を変更</button>
    </div>
    <div class="row pt-4">
      <div class="col-lg-4">
        メールアドレス
      </div>
      <div class="col-lg-8 text-end">
        {{ $user->email }}
      </div>
    </div>
    <div class="text-end mt-3">
      <button type="button" class="btn btn-blue rounded-3 btn-sm" onclick="location.href='{{ route('emailReset') }}'">メールアドレス変更</button>
    </div>
    <div class="text-end mt-5 pt-3">
      <a class="small" href="{{ route('deleteUser') }}">アカウント削除 ></a>
    </div>
  </div>
  <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
</div>

@endsection

{{-- {# モーダル #} --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">プロフィールを変更しますか？</h5>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-purple" id="editProfile">変更</button>
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>