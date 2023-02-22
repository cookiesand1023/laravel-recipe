{{-- {# editRecipeモーダル #} --}}
<div class="modal fade" id="editRecipeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display: none">
  <div class="modal-dialog modal-dialog-centered create-dialog mx-auto">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">レシピを編集する</h4>
      </div>
      <div class="modal-body py-2 px-4">
        <div class="form-floating">
          <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
              <div class="text-center p-3 mt-3">
                <img src="" class="modal-recipe-image" alt="..." style="display: none;" id="editRecipeThumbnail">
              </div>
              <label for="edit_recipe_title" class="form-label mt-3">タイトル</label>
                <input type="text" class="form-control" placeholder="title" id="edit_recipe_title" autocomplete="off">
              <label for="edit_book_ctg" class="form-label mt-3">カテゴリー</label>
                <select class="form-select w-50" id="edit_recipe_ctg" placeholder="カテゴリーを選択" name="edit_recipe_ctg">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              <label for="edit_recipe_value" class="form-label mt-3">評価</label>
                <div class="evaluation" id="edit_recipe_value">
                <input id="star1" type="radio" name="edit_recipe_value" value="5" />
                <label for="star1">★</label>
                <input id="star2" type="radio" name="edit_recipe_value" value="4" />
                <label for="star2">★</label>
                <input id="star3" type="radio" name="edit_recipe_value" value="3" />
                <label for="star3">★</label>
                <input id="star4" type="radio" name="edit_recipe_value" value="2" />
                <label for="star4">★</label>
                <input id="star5" type="radio" name="edit_recipe_value" value="1" />
                <label for="star5">★</label>
              </div>
              <label for="edit_recipe_detail" class="form-label mt-3">コメント</label>
              <textarea class="form-control" placeholder="コツやアレンジなど" id="edit_recipe_detail" autocomplete="off"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-purple" name="editRecipe" id="editRecipe">編集</button>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">キャンセル</button>
          <input type="hidden" name="recipe_id" id="recipe_id" value="{{ $recipe->id }}">
      </div>
      </form>
    </div>
  </div>
</div>