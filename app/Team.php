<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $appends = array('points_pool');
    public function getPointsPoolAttribute(){
        $total = 0;
        $total += $this->wins * \Config::get('rules.teams_wins');
        $total += $this->otl * \Config::get('rules.teams_otl');
        return $total;
    }
}
