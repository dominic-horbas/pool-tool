<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Skater extends Model
{
    protected $appends = array('points_pool');

    public function getPointsPoolAttribute(){
        $total = 0;
        if($this->position_id == 1){
            $label = 'forwards';
        }else{
            $label = 'defense';
        }
        $total += $this->goals * \Config::get('rules.' . $label . '_goals');
        $total += $this->assists * \Config::get('rules.' . $label . '_assists');

        return $total;
    }

    public static function calculatePointsPoolAverage(Collection $skaters){
        if($skaters->count() == 0){
            return 0;
        }else{
            return round($skaters->sum('points_pool') / $skaters->count(), 2);
        }
    }


}
