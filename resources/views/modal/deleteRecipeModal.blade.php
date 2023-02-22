  {{-- {# deleteRecipeモーダル #} --}}
  <div class="modal fade" id="deleteRecipeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">レシピを削除しますか？</h5>
        </div>
        <div class="modal-body border-bottom">
          <div class="text-center p-3">
            <h6 class="card-title card-recipe-name py-3" id="deleteRecipeTitle"></h6>
            <img src="" class="my-3 modal-recipe-image" alt="..." style="display: none;" id="deleteThumbnail">
          </div>
        </div>
        <div class="modal-footer border-0">
            <button type="button" class="btn btn-red" id="deleteRecipe">はい</button>
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">キャンセル</button>
            <input type="hidden" id="deleteRecipeId" value="">
        </div>
      </div>
    </div>
  </div>