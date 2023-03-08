jQuery(function($){
    // アイコン表示で一瞬置換前が映るのでフェードインする。
    if($('.rental-icon').length > 0){
        $('.rental-icon').fadeIn('slow');
    }
    if($('.return-icon').length > 0){
        $('.return-icon').fadeIn('slow');
    }

    // 読み込み
    createIcon();
    checkDeadline();

    // クリック時のイベント
    $('.rental-icon').click(function(event){
        submitId(event);
    });
    $('.return-icon').click(function(event){
        submitId(event);
    });

    // iconボタンをクリックしたら、ボタンと対応する本のidを送信する。
    function submitId(event){
        $(event.target).parent('form').submit();
    }

    // 検索ページのレンタルボタンとマイページの返却ボタンを設定する。
    function createIcon(){
        const rentalIcons = $('.rental-icon');
        const returnIcons = $('.return-icon');

        // レンタルボタンの表示
        for(let icon of rentalIcons){
            let stocks = parseInt($(icon).text(), 10);
            if (0 < stocks){
                $(icon).html('<i class="fa-regular fa-circle text-info"></i>レンタルする');
            } else {
                $(icon).html('<i class="fa-solid fa-xmark text-danger"></i>貸出中');
            }
        }

        // // 返却ボタンの表示
        // for(let i = 0; i < 100; i++){
        //     $(icon).html('<i class="fa-solid fa-xmark text-danger"></i>返却');
        // }
        
    }

    // mypageでのレンタルリスト表示時に、返却日時によってクラスを追加する
    function checkDeadline(){
        const over = $('.time-over').length;
        const within = $('.time-within').length;
        if(over){
            // 期限切れテーブルに追加
            $('.time-over').addClass('bg-danger text-light');
        }
        if(within){
            // レンタル中テーブルに追加
            $('.time-within').addClass('bg-info text-light');
        }
    }

});