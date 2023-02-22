$(function() {

    // 削除ボタンが押されたときにモーダルに値を渡す
    $('.icon-delete').on('click', function() {
        const bookId = $(this).val();
        const bookName = $('#bookName' + bookId).text();
        $('#deleteBookId').val(bookId);
        $('#deleteBookTitle').text(bookName + 'を削除しますか？');
      })

    $('#deleteBook').click(function() {
        const bookId = $('#deleteBookId').val();

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
                id:bookId,
                _method: 'DELETE',
            },

        }).then(
            // 1つめは通信成功時のコールバック処理
            function(data) {
                if (data === 'OK') {
                    // モーダルを閉じて再読み込み
                    $('#deleteBookModal').modal('hide');
                    location.href = "/library";
                }
            },
            // 2つめは通信失敗時のコールバック処理
            function(data) {
                alert("削除に失敗しました")
            },
        )
    });
});
