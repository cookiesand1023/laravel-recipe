{{-- {# editBookモーダル #} --}}
<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display: none">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">レシピ本を編集する</h4>
      </div>
      <div class="modal-body py-2 px-4">
        <div class="form-floating">
          <div class="mb-3">
              <label for="edit_book_title" class="form-label mt-3">タイトル</label>
              <input type="text" class="form-control" placeholder="title" id="edit_book_title">
              <label for="edit_book_ctg" class="form-label mt-3">カテゴリー</label>
              <select class="form-select w-50" id="edit_book_ctg" placeholder="カテゴリーを選択">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
              <label for="book_detail" class="form-label mt-3">コメント</label>
              <textarea class="form-control" placeholder="Leave a comment here" id="edit_book_detail"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-purple" id="editBook">編集</button>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">キャンセル</button>
          <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
      </div>
    </div>
  </div>
</div>