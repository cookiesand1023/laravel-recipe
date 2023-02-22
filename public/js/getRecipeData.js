$(function() {
    $('.icon-edit').on('click', function() {

        const recipeId = $(this).val();

        $.ajax({
            // POST通信を指定
            type : "GET",
            // 通信先ファイル名
            url : "/editRecipe",
            // 通信データ
            data: {
                id:recipeId,
            },

        }).then(
            // 1つめは通信成功時のコールバック処理
            function(data) {
                try {
                    // jsonデータをオブジェクトに変換
                    let data_arr = JSON.parse(data);

                    let recipe_id = data_arr.id;
                    let recipe_img = data_arr.image;
                    let recipe_name = data_arr.name;
                    let recipe_ctg = data_arr.ctg_id;
                    let recipe_value = data_arr.value;
                    let recipe_detail = data_arr.detail;
                    let decode_detail = recipe_detail.replace('<br />', '');


                    $('#editRecipeThumbnail').attr('src',recipe_img);
                    $('#editRecipeThumbnail').show();
                    $('#edit_recipe_title').val(recipe_name);
                    $('#edit_recipe_ctg').val(recipe_ctg);
                    $('#edit_recipe_value').val(recipe_value);
                    $('#edit_recipe_detail').val(decode_detail);

                    $('#editRecipe').val(recipe_id);

                } catch (e) {
                    return false
                } 
            },
            // 2つめは通信失敗時のコールバック処理
            function(data) {
                return false;
            },
        );

    })

    $('#addRecipeFromVideo').click(function() {
        const video_id = $('#video_id').val();
        const thumbnail = $('#videoImg' + video_id).attr('src');
        const title = $('#video-title' + video_id).text();

        $('#recipe_title').val(title);
        $('#thumbnailGotByURL').attr('src', thumbnail);
        $('#thumbnailGotByURL').show();
    });
});