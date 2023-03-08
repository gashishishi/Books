jQuery(function($){
    // 読み込み
    initSearchBtn();

    // value属性を反映させるため読み込んでから実行
    window.addEventListener('load', function(){
        activeSearchBtn();
      });

    // 検索入力欄に入力があったとき
    $('#search-input').keyup(function(){
        activeSearchBtn();
    });

    // 検索方法が選択された場合
    $('#search-form .dropdown-item').click(function(event){
        changeSearchBtn(event);
    });

    // 検索方法を指定するボタンの初期設定
    function initSearchBtn(){
        // 検索方法テキストの初期値を設定。  
        const targetLabel = $('input[name = "search_target"]:checked').parent().text().trim();
        const typeLabel = $('input[name = "search_type"]:checked').parent().text().trim();

        const targetClass = 'text-info';
        const typeClass = 'text-success';
        const border = 'border-success';
        
        // ボタンの見た目を変える
        $('#search-target-button').text(targetLabel);
        $('input[name="search_target"]:checked').parent().addClass(targetClass);

        $('#search-type-button').text(typeLabel);
        $('input[name="search_type"]:checked').parent().addClass(typeClass + ' ' + border);

        // borderを設定
        $('#search-target-button').addClass(border);
        $('#search-type-button').addClass(border);
    }

    // 検索方法設定ボタンの見た目を変える
    function changeSearchBtn(event){
        const targetButton = '#search-target-button';
        const typeButton = '#search-type-button';

        // #search-target-dropdownのとき
        let radio = 'input[name = "search_target"]';
        // search-type-buttonのとき
        if($(event.target).attr('name') === 'search_type'){
            radio = 'input[name = "search_type"]';
            
        }

        // 追加するクラス
        const targetColor = 'text-info';
        const typeColor = {and : 'text-success', or : 'text-warning'};
        const border = {and : 'border-success', or : 'border-warning'};

        // クリックされた要素のテキストを取得。
        // input要素の親要素であるlabelタグのテキストを取り出す。
        const label = $(event.target).parent().text().trim();
        // 選択されたラジオボタンの背景色と文字色を変更する。
        for(let i=0; i < $(radio).length; i++){
            let val = $(radio + `:eq(${i})`).val();

            // 選択されていればクラスを追加
            if($(radio + `:eq(${i})`).prop('checked')){
                if(val === 'and'){
                    $(typeButton).addClass(typeColor['and'] + ' ' + border['and']).text(label);
                    // label要素にクラスを追加
                    $(radio + `:eq(${i})`).parent().addClass(typeColor['and'] + ' ' + border['and']);
                    $(targetButton).addClass(border['and']);
                } else if(val === 'or'){
                    $(typeButton).addClass(typeColor['or'] + ' ' + border['or']);
                    // label要素にクラスを追加
                    $(radio + `:eq(${i})`).parent().addClass(typeColor['or'] + ' ' + border['or']);
                    $(targetButton).addClass(border['or']);
                } else {

                    //label要素のテキストの色を変える
                    $(radio + `:eq(${i})`).parent().addClass(targetColor);
                    $(targetButton).text(label);
                }

            // 選択されてないならクラスを削除
            } else {
                if(val === 'and'){
                    $(typeButton).removeClass(typeColor['and'] + ' ' + border['and']).text(label);
                    // label要素にクラスを追加
                    $(radio + `:eq(${i})`).parent().removeClass(typeColor['and'] + ' ' + border['and']);
                    $(targetButton).removeClass(border['and']);

                } else if(val === 'or'){
                    $(typeButton).removeClass(typeColor['or'] + ' ' + border['or']);
                    // label要素にクラスを追加
                    $(radio + `:eq(${i})`).parent().removeClass(typeColor['or'] + ' ' + border['or']);
                    $(targetButton).removeClass(border['or']);

                } else {

                    //label要素のテキストの色を変える
                    $(radio + `:eq(${i})`).parent().removeClass(targetColor);
                    $(targetButton).text(label);
                }
            }             
        }
    }

        // テキストが入力されているならば検索ボタンを押せるようにする。
        function activeSearchBtn(){
            let str = $('#search-input').val();
            str.replace('　',' ');
            if(str.trim()){
                $('#search-button').prop('disabled',false)
            } else {
                $('#search-button').prop('disabled',true);
            }
        }
});