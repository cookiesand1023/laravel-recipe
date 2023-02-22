$(function() {
    $('#create').click(function() {
        const title = $('#book_title').val();
        const bookName = $.trim(title);
        const book_ctg = $('#book_ctg').val();
        const user_id = $('#user_id').val();
        const book_detail = $('#book_detail').val();

        // console.log(bookName.length);

        if (bookName === '') {
            alert('タイトルを入力してください');
            return false; // ページを遷移しない
        
        } else if (title.length > 30) {
            alert('タイトルは30文字以内で入力してください');
            return false;

        } else {
            $.ajax({
                // GET通信を指定
                type : "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // 通信先ファイル名
                url : "/library",
                // 通信データ
                data: {
                    name:bookName,
                    ctg_id:book_ctg,
                    user_id:user_id,
                    detail:book_detail,
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
        }
    });
});
