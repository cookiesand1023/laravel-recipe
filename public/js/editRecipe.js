$(function() {
    $('#editRecipe').click(function() {
        // ID
        const recipeId = $('#recipe_id').val();
        // title
        const inputTitle = $('#edit_recipe_title').val();
        if (inputTitle === '') {
            alert('タイトルを入力して下さい');
            return false;
        } 
        const recipeName = $.trim(inputTitle);

        //category
        const recipe_ctg = $('#edit_recipe_ctg').val();
        // value
        let recipe_value = $("input[name='edit_recipe_value']:checked").val();
        if (recipe_value === undefined) {
            alert('評価は1以上で入力して下さい');
            return false;
        }
        // detail
        const recipe_detail = $('#edit_recipe_detail').val();


        $.ajax({
            // GET通信を指定
            type : "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // 通信先ファイル名
            url : "/recipe",
            // 通信データ
            data: {
                id:recipeId,
                name:recipeName,
                ctg_id:recipe_ctg,
                value:recipe_value,
                detail:recipe_detail,
                _method:"PUT",
            },

        }).then(
            // 1つめは通信成功時のコールバック処理
            function(data) {
                if (data == 'ok') {
                    // モーダルを閉じて再読み込み
                    $('#editRecipeModal').modal('hide');
                    location.reload();
                }
            },
            // 2つめは通信失敗時のコールバック処理
            function(data) {
                alert("作成に失敗しました")
            },
        );
    });
});