$(function() {
    // 削除ボタンが押されたときにモーダルに値を渡す
    $('.icon-delete').on('click', function() {
        
        const recipeId = $(this).val();
        const recipeTitle = $('#recipe-title' + recipeId).text();
        const recipeImg = $('#recipeImg' + recipeId).attr('src');
        
        $('#deleteRecipeTitle').text(recipeTitle);
        $('#deleteThumbnail').attr('src', recipeImg);
        $('#deleteThumbnail').show();

        $('#deleteRecipeId').val(recipeId);
    })

    $('#deleteRecipe').click(function() {
        
        const recipeId = $('#deleteRecipeId').val();
        const book_id = $('#book_id').val();
        const book_name = $('#book_name').val();
        const currentPage = $('#current-page').val();

        $.ajax({
            // GET通信を指定
            type : "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // 通信先ファイル名
            url : "/book",
            // 通信データ
            data: {
                id:recipeId,
                _method: 'DELETE',
            },

        }).then(
            // 1つめは通信成功時のコールバック処理
            function(data) {
                if (data === 'OK') {
                    // モーダルを閉じて再読み込み
                    $('#deleteRecipeModal').modal('hide');

                    if (currentPage === '/recipe') {

                        location.href = "/book?book_id=" + book_id;

                    } else if (currentPage === '/myRecipe') {

                        location.reload();

                    } else if (currentPage === '/book') {
                        location.reload();

                    }
                }
            },
            // 2つめは通信失敗時のコールバック処理
            function(data) {
                alert("削除に失敗しました")
            },
        )
    });
});
