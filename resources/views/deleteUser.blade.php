@extends('layouts.app')       

@section('content')

<div class="p-3 me-lg-5 mb-2 bd-highlight bg-white border rounded-2">
  <a class="nav-arrow-link" href="{{ url('/home') }}">Home</a>
  <a class="nav-arrow-link" href="{{ url('/setting') }}"> > Setting</a> > Delete Account
</div>
<div class="content border bg-white rounded-2 me-lg-5">
  <div class="px-4 py-3 bd-highlight">
    <h5 class="py-2">アカウントの削除</h5>
  </div>
  <div class="container mb-4">
      <div class="py-3 px-5 mb-3">
            <div class="profile text-center image-wrap ">
            <label class="mx-auto">
                <img src="storage/images/{{ $user->image }}" class="rounded-circle img-thumbnail deleteThumb" width="100" height="100">
            </label>
            </div>
        <div class="p-2 text-center">{{ $user->name }}</div>
      </div>
      <div class="px-lg-5">
          <div class="text-center mb-4">
              <h6 class="fw-bolder">アカウント削除に関する注意事項</h6>
          </div>
          <ul class="px-lg-5 ps-0">
              <li class="my-3 px-lg-3 small" style="list-style: none">
                  ・アカウントを削除すると、登録されていたメールアドレス、パスワードではログインができなくなります。
              </li>
              <li class="my-3 px-lg-3 small"  style="list-style: none">
                  ・アカウントに紐づいているレシピ本及びレシピが削除されます。
              </li>
              <li class="my-3 px-lg-3 small"  style="list-style: none">
                  ・アカウント削除後は削除をキャンセルすることはできません。
              </li>
          </ul>
      </div>
  </div>
  <div class="container setting-form mb-5 px-0">
    <div class="text-end mb-4">
      <button type="button" class="btn btn-red rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteUserModal">アカウントを削除</button>
    </div>
  </div>
  <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
</div>

@endsection

{{-- {# モーダル #} --}}
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">本当に削除しますか？</h5>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-red" id="deleteUser">はい</button>
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>