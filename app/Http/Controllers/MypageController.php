<?php

namespace App\Http\Controllers;

use App\Classes\RentalTime;
use App\Models\Book;
use App\Models\Rental;
use App\Models\User;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDOException;

class MypageController extends Controller
{
    // paginate付けたいが面倒なことになっている気がする。
    public function index(){
        $rentalNum = '';
        $items = '';

        // リレーションをつかうときはrentals()のように()はつかない
        // ユーザーidからレンタル情報を取得
        try{
            $rentals = Rental::with(['user','book'])->where('user_id',Auth::id())->get();
            $user = User::find(Auth::id());

            // レンタル数の情報を設定
            $rentalNum = [
                'num' => $user->number_of_rentals,
                'limit' => $user->limit()
            ];
            $items = [
                'over' => null,
                'within' => null,
            ];

            $over = [];
            foreach($rentals as $rental){
                // $rentalは$rental->id(rentalsテーブルのid)
                //          $rental->book->id(booksテーブルのid(book_id))
                //          $rental->user->id(usersテーブルのid(user_id))
                // になっている

                
                if(!empty($rental->returned)){
                    continue;
                } else {
                    $now = new RentalTime;
                    $expectedReturn = new RentalTime($rental->expected_return);
                    
                    // 返却日がまだのとき
                    if($expectedReturn > $now){
                        // レンタル情報を配列にまとめる
                        $item = [
                            'id' => $rental->id,
                            'title'=> $rental->book->title,
                            'author' => $rental->book->author,

                            // 日時は書式を整える
                            'checkout' => RentalTime::formatTime($rental->checkout),
                            'expectedReturn' => RentalTime::formatTime($rental->expected_return),
                            'returned' => $rental->returned, //デバッグ用
                        ];
                        $items['within'][] = $item;

                    // 過ぎているとき
                    } else {
                        $items['over'][] = $rental->id;
                    }
                }
            }
            RentController::returnOver($over);
        } catch(PDOException $e) {
            $errorMsg = 'エラーが発生しました。';
            return view('mypage.index',['errorMsg'=>$errorMsg]);
        }
        return view('mypage.index',['items'=>$items,'rentalNum'=>$rentalNum]);
    }

    /**
     * レンタル履歴を表示する
     *
     * @return void
     */
    public function history()
    {
        try{
            $items = Rental::with(['user','book'])
                        ->where('user_id',Auth::id())
                        ->where('returned','!=', null)
                        ->orderBy('checkout','desc')
                        ->paginate(10);
            
            // レンタル時間を整形する
            for($i = 0; $i < count($items); $i++){
                $item = $items[$i];
                $item->checkout = RentalTime::formatTime($item->checkout);
                $item->returned = RentalTime::formatTime($item->returned);
                $items[$i] = $item;
            }
            return view('mypage.history',['items'=>$items]);
            
        } catch(PDOException $e) {
            return view('mypage.history',['msg'=>'エラーが発生しました。']);
        }
    }


}
