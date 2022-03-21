{{-- {# createBookモーダル #} --}}
<div class="modal fade" id="createBookModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display: none">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">レシピ本を作成する</h4>
      </div>
      <div class="modal-body py-2 px-4">
        <div class="form-floating">
            <div class="mb-3">
              <label for="book_title" class="form-label mt-3">タイトル</label>
                <input type="text" class="form-control" name="book_title" placeholder="title" id="book_title">
              <label for="book_ctg" class="form-label mt-3">カテゴリー</label>
                <select class="form-select w-50" id="book_ctg" placeholder="カテゴリーを選択" name="book_ctg">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              <label for="book_detail" class="form-label mt-3">コメント</label>
              <textarea class="form-control" placeholder="Leave a comment here" id="book_detail" name="book_detail"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-purple" name="create" id="create">作成</button>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">キャンセル</button>
          <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
      </div>
    </div>
  </div>
</div>