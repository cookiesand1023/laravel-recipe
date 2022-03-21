$(function() {

    $('#addRecipe').click(function() {
        // 入力内容を取得
        const inputURL = $('#recipe_URL').val();
        if (inputURL === '') {
            alert('動画のURLを入力して下さい');
            return false;
        }

        const image = $('#thumbnailGotByURL').attr('src');
        
        const inputTitle = $('#recipe_title').val();
        if (inputTitle === '') {
            alert('タイトルを入力して下さい');
            return false;
        } 
        const title = $.trim(inputTitle);

        const recipe_ctg = $('#recipe_ctg').val();

        let recipe_value = $("input[name='recipe_value']:checked").val();
        if (recipe_value === undefined) {
            alert('評価は1以上で入力して下さい');
            return false;
        }

        const recipe_detail = $('#recipe_detail').val();
        const book_id = $('#book_id').val();
        const user_id = $('#user_id').val();

        const video_title = $('#video_title').val();
        let description = $('#video_description').val();

        $.ajax({
            // POST通信を指定
            type : "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            rocessData: false,
            // 通信先ファイル名
            url : "/book",
            // 通信データ
            data: {
                name:title,
                ctg_id:recipe_ctg,
                image:image,
                video_id:inputURL,
                user_id:user_id,
                book_id:book_id,
                detail:recipe_detail,
                value:recipe_value,
                video_title:video_title,
                description:description,
            },

        }).then(
            // 1つめは通信成功時のコールバック処理
            function(data) {
                console.log(data);
                if (data === 'ok') {
                    // モーダルを閉じて再読み込み
                    $('#createBookModal').modal('hide');
                    location.reload()
                }
            },
            // 2つめは通信失敗時のコールバック処理
            function(data) {
                alert("作成に失敗しました")
            },
        );
    });

    // myRecipe.phpから追加する
    $('#addRecipeFromRecipes').click(function() {
        // 入力内容を取得
        const inputURL = $('#recipe_URL').val();
        if (inputURL === '') {
            alert('動画のURLを入力して下さい');
            return false;
        }

        const image = $('#thumbnailGotByURL').attr('src');
        
        const inputTitle = $('#recipe_title').val();
        if (inputTitle === '') {
            alert('タイトルを入力して下さい');
            return false;
        } 
        const title = $.trim(inputTitle);

        const user_id = $('#user_id').val();

        const book_id = $('#book').val();

        const recipe_ctg = $('#recipe_ctg').val();

        let recipe_value = $("input[name='recipe_value']:checked").val();
        if (recipe_value === undefined) {
            alert('評価は1以上で入力して下さい');
            return false;
        }

        const recipe_detail = $('#recipe_detail').val();

        const video_title = $('#video_title').val();
        const description = $('#video_description').val();

        $.ajax({
            // POST通信を指定
            type : "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            rocessData: false,
            // 通信先ファイル名
            url : "/myRecipe",
            // 通信データ
            data: {
                name:title,
                video_id:inputURL,
                image:image,
                ctg_id:recipe_ctg,
                user_id:user_id,
                book_id:book_id,
                value:recipe_value,
                detail:recipe_detail,
                video_title:video_title,
                description:description,
            },

        }).then(
            // 1つめは通信成功時のコールバック処理
            function(data) {
                if (data === 'ok') {
                    // モーダルを閉じて再読み込み
                    $('#createBookModal').modal('hide');
                    location.reload()
                }
            },
            // 2つめは通信失敗時のコールバック処理
            function(data) {
                alert("作成に失敗しました")
            },
        );
    });

    $('#addRecipeFromVideoOK').click(function() {
        // 入力内容を取得
        const video_id = $('#video_id').val();
        const videoURL = 'https://www.youtube.com/watch?v=' + video_id;

        const image = $('#thumbnailGotByURL').attr('src');
        
        const inputTitle = $('#recipe_title').val();
        if (inputTitle === '') {
            alert('タイトルを入力して下さい');
            return false;
        } 
        const title = $.trim(inputTitle);

        const user_id = $('#user_id').val();

        const book_id = $('#book').val();

        const recipe_ctg = $('#recipe_ctg').val();

        let recipe_value = $("input[name='recipe_value']:checked").val();
        if (recipe_value === undefined) {
            alert('評価は1以上で入力して下さい');
            return false;
        }

        const recipe_detail = $('#recipe_detail').val();

        $.ajax({
            // POST通信を指定
            type : "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // 通信先ファイル名
            url : "/video",
            // 通信データ
            data: {
                name:title,
                video_id:videoURL,
                image:image,
                ctg_id:recipe_ctg,
                user_id:user_id,
                book_id:book_id,
                detail:recipe_detail,
                value:recipe_value,
            },

        }).then(
            // 1つめは通信成功時のコールバック処理
            function(data) {
                if (data === 'ok') {
                    // モーダルを閉じて再読み込み
                    $('#createRecipeModal').modal('hide');
                }
            },
            // 2つめは通信失敗時のコールバック処理
            function(data) {
                alert("作成に失敗しました")
            },
        );
    });
    
});

