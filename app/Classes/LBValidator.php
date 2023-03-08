<?php
namespace App\Classes;

use Illuminate\Validation\Validator;
use App\Http\Controllers\LBController;

class LBValidator extends Validator{
//validateXXXという名前でメソッドを用意すると、「XXX」というバリデートルールとして適用される。
//returnはbool規定

    /**
     * 入力された文字列のスペースを整形する。App\Http\Controllers\LBControllerでも利用する。
     *
     * @param string $keywords 入力された文字列
     * @return array $keywords 引数の文字列を、スペースを半角+連続したものを1つにし、
     *                          スペース区切りで分割したもの。
     */
    public static function createKeywords(string $keywords):array {
        // 全角空白を半角に変換。
        $keywords = str_replace('　', ' ', $keywords);
        // 検索文字列全体の前後の空白を削除。
        $keywords = trim($keywords);
        // 連続する半角スペースを一つにする。
        $keywords = preg_replace('/\s+/', ' ', $keywords);
        // 文字列を分割。
        $keywords = explode(' ', $keywords);

        return $keywords;
    }

    /**
     * 検索フォーム用。ajaxでチェックし、送信ボタンを押せるかどうかや、
     * 検索結果数をリアルタイムで反映するのに使う。予定。
     *
     * @param [type] $attribute
     * @param [type] $value
     * @param [type] $parameters
     * @return bool
     */
    public function validateSearch($attribute, $value, $parameters)
    {
        $value = self::createKeywords($value);
        if(empty($value)){
            return false;
        }
        return true; 
    }
}