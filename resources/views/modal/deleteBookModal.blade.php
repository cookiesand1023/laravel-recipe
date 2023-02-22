{{-- {# deleteBookモーダル #} --}}
<div class="modal fade" id="deleteBookModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display: none">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="deleteBookTitle"></h5>
      </div>
      <div class="modal-footer border-0">
          <button type="button" class="btn btn-red" id="deleteBook">はい</button>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">キャンセル</button>
          <input type="hidden" id="deleteBookId" value="">
      </div>
    </div>
  </div>
</div>