<?php

namespace App\Http\Controllers;

use App\Classes\RentalTime;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Rental;
use App\Models\User;
use DateTimeImmutable;
use Illuminate\Http\Request;
use PDOException;

class RentController extends Controller
{
    public function index(){
        return view('rent.result');
    }

    public function rent(Request $request)
    {
        
        // DB接続開始
        try {
            $userId = Auth::id();
            $bookId = $request->id;
    
            // ログインしていない場合
            if(empty($userId)){
                return view('rent.result',
                    ['msg'=>'レンタルにはログインが必要です。']);
            }

            // ユーザーを取得
            $user = User::find($userId);
            if($user->limit() < 1){
                return view('rent.result',['msg'=>'レンタル数が上限です。']);
            }

            // 本のidからbooksテーブルのレコードを取得
            $book = Book::find($bookId);
            // idが存在しない場合
            if(empty($book->id)){
                return view('rent.result',['msg'=>'エラーが発生しました。']);
            }

            // 在庫がない場合
            if(1 > $book->stock){
                return view('rent.result',['msg'=>'在庫がありません。']);
            }

            // ユーザーがレンタル中の本で、未返却かつ
            // book_idがレンタルしようとしてるものと同じものを取得
            $userHas = $user->rentals()
                        ->where('returned',null)
                        ->where('book_id',$bookId)
                        ->first();
            // すでに所持している場合はエラー
            if(!empty($userHas)){
                return view('rent.result',['msg'=>'その本はすでに所持しています。']);
            }

            // レンタル処理の開始

            unset($request['_token']);

            // レンタル日時の設定
                //userランクによって時間を変える予定。
            // rentalsテーブルの変更
            $time = new RentalTime;
            $rental = new Rental; 

            $rental->user_id = $userId;
            $rental->book_id = $bookId;
            $rental->checkout = $time->getTime();
            $rental->expected_return = $time->getExpectedReturn();
            $rental->save();

            // usersテーブルnumber_of_rentalsの変更
            $user->number_of_rentals++;
            $user->save();

            // booksテーブルstockの変更
            $book->stock--;
            $book->save();

            return view(
                'rent.result',
                [
                    'title'=>$book->title,
                    'author'=>$book->author,
                    'time'=>$rental->expected_return
                ]
            );

        } catch (PDOException $e){
            return view('rent.result',['msg'=>'エラーが発生しました。']);
        }
    }

    public function return(Request $request){
            $id = $request->id;
        try {
            // 指定のidのrentalsレコードを取得
            $rental = Rental::find($id);
            $userId = $rental->user_id;
            $bookId = $rental->book_id;

            $user = User::find($userId);
            $book = Book::find($bookId);
            
            // レンタル数を減らし、在庫数を増やす。
            $user->number_of_rentals--;
            $user->save();
            $book->stock++;
            $book->save();

            // returnedフィールドに返却日時を追加する
            $now = new RentalTime();
            $rental->returned = $now->getTime();
            $rental->save();
            return redirect('/mypage');


        } catch (PDOException $e){
            return view('mypage.index');
        }
    }
    
    public static function returnOver(){
        
    }
}