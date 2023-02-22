$(function() {
    $('#deleteUser').click(function() {
        const user_id = $('#user_id').val();

        $.ajax({
            // GET通信を指定
            type : "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // 通信先ファイル名
            url : "/deleteUser",
            // 通信データ
            data: {
                id:user_id,
                _method:"delete",
            },

        }).then(
            // 1つめは通信成功時のコールバック処理
            function(data) {

                $('#delteUserModal').modal('hide');
                location.href = "/";
            },
            // 2つめは通信失敗時のコールバック処理
            function(data) {
                alert("削除に失敗しました")
            },
        );
    });
});