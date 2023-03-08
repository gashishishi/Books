jQuery(function($){
    // クリック時のイベント
    $(document).click(function(event) {
        closeNav(event);
    });

    // ハンバーガーメニュー展開中にメニュー以外がクリックされたらメニューを閉じる
    function closeNav(event){
        if($('.navbar-collapse').hasClass('show')){
            // クリックされた箇所の親要素にnavが無ければ、ハンバーガーメニューを閉じる
            if(!$(event.target).closest('nav').length) {
                $('.navbar-toggler').trigger('click');
            }
        }
    }

});