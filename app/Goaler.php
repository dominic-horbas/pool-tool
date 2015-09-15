<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goaler extends Model
{
    protected $appends = array('points_pool');
    public function getPointsPoolAttribute(){
        $total = 0;
        $total += $this->goals * \Config::get('rules.goalies_goals');
        $total += $this->shutouts * \Config::get('rules.goalies_shutouts');
        $total += $this->wins * \Config::get('rules.goalies_wins');
        return $total;
    }
}
