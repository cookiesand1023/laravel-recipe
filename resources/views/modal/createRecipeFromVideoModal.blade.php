{{-- {# createRecipeモーダル #} --}}
<div class="modal fade" id="createRecipeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display: none">
  <div class="modal-dialog modal-dialog-centered create-dialog mx-auto">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">レシピを追加する</h4>
      </div>
      <div class="modal-body py-2 px-4">
        <div class="form-floating">
            <div class="mb-3">
              <div class="text-center p-3 mt-3">
                <img src="" class="modal-recipe-image" alt="..." style="display: none;" id="thumbnailGotByURL">
              </div>
              <label for="recipe_title" class="form-label mt-3">タイトル</label>
                <input type="text" class="form-control" placeholder="title" id="recipe_title" autocomplete="off">
              <label for="book" class="form-label mt-3">追加先ブック</label>

                <select class="form-select w-50" id="book" placeholder="レシピ本を選択" name="recipe_ctg">
                    @foreach ( $books as $book )
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>

              <label for="book_ctg" class="form-label mt-3">カテゴリー</label>
                <select class="form-select w-50" id="recipe_ctg" placeholder="カテゴリーを選択" name="recipe_ctg">

                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>

              <label for="evaluation" class="form-label mt-3">評価</label>
                <div class="evaluation" id="recipe_value">
                <input id="star1" type="radio" name="recipe_value" value="5" />
                <label for="star1">★</label>
                <input id="star2" type="radio" name="recipe_value" value="4" />
                <label for="star2">★</label>
                <input id="star3" type="radio" name="recipe_value" value="3" />
                <label for="star3">★</label>
                <input id="star4" type="radio" name="recipe_value" value="2" />
                <label for="star4">★</label>
                <input id="star5" type="radio" name="recipe_value" value="1" />
                <label for="star5">★</label>
              </div>
              <label for="recipe_detail" class="form-label mt-3">コメント</label>
              <textarea class="form-control" placeholder="コツやアレンジなど" id="recipe_detail" name="recipe_detail" autocomplete="off"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-purple" id="addRecipeFromVideoOK">追加</button>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">キャンセル</button>
          <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
      </div>
    </div>
  </div>
 </div>
