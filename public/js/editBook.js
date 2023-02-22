$(function() {
    $('.icon-edit').on('click', function() {
            
        const bookId = $(this).val();

        $.ajax({
            // POST通信を指定
            type : "GET",
            // 通信先ファイル名
            url : "/editBook",
            // 通信データ
            data: {
                id:bookId,
            },

        }).then(
            // 1つめは通信成功時のコールバック処理
            function(data) {
                try {
                    // jsonデータをオブジェクトに変換
                    let data_arr = JSON.parse(data);
                    
                    const id = data_arr.id;
                    $('#editBook').val(id);

                    const name = data_arr.name;
                    $('#edit_book_title').val(name);

                    const ctg_id = data_arr.ctg_id;
                    $('#edit_book_ctg').val(ctg_id);

                    const detail = data_arr.detail;
                    const decode_detail = detail.replace('<br />', '');
                    $('#edit_book_detail').val(decode_detail);


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


    $('#editBook').click(function() {
        const id = $(this).val();
        const inputTitle = $('#edit_book_title').val();
        const name = $.trim(inputTitle);
        const ctg_id = $('#edit_book_ctg').val();
        const detail = $('#edit_book_detail').val();

        if (name === '') {
            alert('タイトルを入力してください');
            return false;
        
        } else if (name.length > 30) {
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
                    id:id,
                    name:name,
                    ctg_id:ctg_id,
                    detail:detail,
                    _method: 'PUT',
                },

            }).then(
                // 1つめは通信成功時のコールバック処理
                function(data) {
                    if (data === 'ok') {
                        // モーダルを閉じて再読み込み
                        $('#editBookModal').modal('hide');
                        location.reload();
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
