<?php
namespace App\Classes;

use DateTimeImmutable;

class RentalTime extends DateTimeImmutable
{

    /**
     * 現在日時を返す。
     *
     * @return string format('Y/m/d H:i')
     */
    public function getTime(): string {
        return $this->format('Y/m/d H:i');
    }
    /**
     *  会員ランクに応じた返却予定日時を返す。という予定。
     *
     * @return string 会員ランクに応じた返却日時('Y/m/d H:i')
     */
    public function getExpectedReturn(): string {
        // 会員ランク1。5分後返却。
        return $this->modify('+5 minutes')->format('Y/m/d H:i');
    }

    /**
     * DBに登録されている日時'Y/m/d H:i:00'形式を'Y/m/d H:i'にする。
     *
     * @param [type] $time
     * @return string
     */
    public static function formatTime($time): string
    {
        return substr($time, 0, -3);        
    }

}