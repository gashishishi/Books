<?php

namespace App\Http\Controllers;

use App\Classes\LBValidator;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PDOException;

class LBController extends Controller
{
    public function index()
    {
        $items = '';
        $DBMsg = '';
        try{
            $book = new Book;
            $items = $book->paginate(10);
        } catch(PDOException $e) {
            $DBMsg = 'エラーが発生しました。';
        }
        return view('LB.index', compact('items','DBMsg'));
    }

    /**
     * 検索フォームから送信された文字列をもとにsql文を作り、DBの検索結果を返す。
     *
     * @param Request $request
     * @return view
     */
    public function search(Request $request)
    {
        $target = $request->search_target;
        $type = $request->search_type;
        $keywords = $request->keywords;
        $items = [];

        if(isset($request->keywords)){
            // 検索の下準備
            $keywords = LBValidator::createKeywords($keywords);            

            // sql文、バインド用配列の用意
            $sql = '';
            $param = [];
            $column = '';

            if($target === 'title_author'){
                $column = "concat(title, ' ', author) LIKE ? ";
            } else if($target === 'title') {
                $column = 'title LIKE ? ';
            } else if($target === 'author'){
                $column = 'author LIKE ? ';
            }

            // where文を作る
            // xxxx LIKE ? OR xxxx LIKE ? OR ....
            for ($i=0; $i < count($keywords); $i++){
                if(0 < $i){
                    $sql .= $type .' ';
                }
                $sql .= $column;
                $param[] = '%' .$keywords[$i] .'%';
            }

            // DB接続
            $items = DB::table('books')
                ->whereRaw($sql, $param)
                ->paginate(3);

        }
        return view('LB.search',['items'=>$items,'sql'=>$sql]);
    }
}
