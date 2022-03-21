$(function() {
    const textCnt = 30;
    $('.card-recipe-name').each(function () { 
        let thisText = $(this).text();
        let textLength = thisText.length;
        if (textLength > textCnt) {
            let showText = thisText.substring(0, textCnt);
            let insertText = showText += '…';
            $(this).text(insertText);
        }
    });

    $('.card-video-name').each(function () { 
        let thisText = $(this).text();
        let textLength = thisText.length;
        if (textLength > textCnt) {
            let showText = thisText.substring(0, textCnt);
            let insertText = showText += '…';
            $(this).text(insertText);
        }
    });

    let windowWidth = $(window).width();

    const bookCnt = 10;
    if(windowWidth <= 479){

        $('.book-title-length').each(function () {
            let thisText = $(this).text();
            let textLength = thisText.length;
            if (textLength > bookCnt) {
                let showText = thisText.substring(0, bookCnt);
                let insertText = showText += '…';
                $(this).text(insertText);
            }
        });

    }

});


