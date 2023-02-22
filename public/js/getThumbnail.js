$(function() {
    $('#getThumbnail').click(function() {
        const inputURL = $('#recipe_URL').val();
        const trimedURL = $.trim(inputURL);
        
        if (trimedURL === '') {
            alert('動画URLを入力してください');
            return false; // ページを遷移しない

        } else {
            $.ajax({
                // GET通信を指定
                type : "GET",
                // 通信先ファイル名
                url : "/getThumbnail",
                // 通信データ
                data: {
                    URL:trimedURL,
                },

            }).then(
                // 1つめは通信成功時のコールバック処理
                function(data) {
                    try {
                        // jsonデータをオブジェクトに変換
                        let data_arr = JSON.parse(data);

                        let title = data_arr.title;
                        let thumbnail = data_arr.thumbnail;
                        let description = data_arr.detail;

                        $('#recipe_title').val(title);
                        $('#video_title').val(title);
                        $('#thumbnailGotByURL').attr('src', thumbnail);
                        $('#thumbnailGotByURL').show();
                        $('#video_description').val(description);
                        
                    } catch (e) {
                        return false
                    }
                },
                // 2つめは通信失敗時のコールバック処理
                function(data) {
                    alert("作成に失敗しました")
                },
            );
        }
    });
});