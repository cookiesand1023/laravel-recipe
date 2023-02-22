$(function() {
    $('#edit_image').on('change', function (e) {
        var $fr = new FileReader();
        $fr.onload = function(){
            $('.editThumb').attr('src', $fr.result);
        }
        $fr.readAsDataURL(this.files[0]);
        $(".editThumb").val('ok');
    });

    $('#editProfile').click(function() {
        const userId = $('#user_id').val();
        const inputName = $('#edit-user-name').val();
        const userName = $.trim(inputName);

        const namePattern = /^[a-zA-Z0-9\._-]{8,20}$/;

        if (userName === '') {
            alert('ユーザー名を入力してください');
            return false;
        } else if (!namePattern.test(userName)) {
            alert('ユーザー名を正しい形式で入力してください');
        }

        var fd = new FormData();

        fd.append("id", userId);
        fd.append("name",userName);

        if ($(".editThumb").val()!== ''){
            fd.append("file",$("#edit_image").prop("files")[0]);
        }
    
        $.ajax({
            // GET通信を指定
            type : "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // 通信先ファイル名
            url : "/setting",
            // 通信データ
            data: fd,
            cache       : false,
            contentType : false,
            processData : false,

        }).then(
            // 1つめは通信成功時のコールバック処理
            function(data) {
                console.log(data)
                if (data == 'ok') {
                    location.reload();
                }
            },
            // 2つめは通信失敗時のコールバック処理
            function(data) {
                alert("プロフィールの更新に失敗しました")
            },
        );
        
    });

});