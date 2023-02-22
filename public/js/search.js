$(function() {

    $('#searchRecipe').on('click', function() {
        let searchKey = $('.search-form').val();
        let addParam = 'search=' + searchKey;

        let url = new URL(document.location);
        let params = url.searchParams;
        let search = params.get('search');

        // getパラメータを持っていないとき
        if (location.href.match(/\?/g) === null) {
    
            let linkURL = url + "?" + addParam;
            location.href = linkURL;

        // getパラメータを持っているとき
        } else {

            // searchパラメータを持っていなければパラメータ追加
            if (search === null) {
                let linkURL = url + "&" + addParam;
                location.href = linkURL;

            // searchパラメータを持っていれば更新
            } else {
                params.set('search', searchKey);
                location.href = url;
            }
        }

    });
});