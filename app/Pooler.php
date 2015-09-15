<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pooler extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'poolers';
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function forwards()
    {
        return $this->hasMany('App\Skater')->where(['position_id' => 1]);
    }

    public function defensemen(){
        return $this->hasMany('App\Skater')->where(['position_id' => 2]);
    }

    public function goalers()
    {
        return $this->hasMany('App\Goaler');
    }

    public function teams(){
        return $this->hasMany('App\Team');
    }

    public function getRemainingCashAttribute(){
        $total = 0;
        $total += round($this->forwards()->sum('price'), 2);
        $total += round($this->defensemen()->sum('price'), 2);
        $total += round($this->goalers()->sum('price'), 2);
        $total += round($this->teams()->sum('price'), 2);
        $total = round(\Config::get('rules.poolers_cash') - $total, 2);
        return $total;
    }

    public function getRemainingPicksAttribute(){
        $total = 0;
        //Les choix totaux a faire
        $total += \Config::get('rules.forwards_per_pooler');
        $total += \Config::get('rules.defense_per_pooler');
        $total += \Config::get('rules.goalies_per_pooler');
        $total += \Config::get('rules.teams_per_pooler');

        $total -= $this->forwards()->count();
        $total -= $this->defensemen()->count();
        $total -= $this->goalers()->count();
        $total -= $this->teams()->count();

        return $total;
    }

    public function getPointsPoolAverageAttribute(){
        $sum = 0;
        $sum += $this->forwards()->count();
        $sum += $this->defensemen()->count();
        $sum += $this->goalers()->count();
        $sum += $this->teams()->count();

        if($sum == 0){
            return 0;
        }else{
            $sumPoints = 0;
            $sumPoints += $this->forwards()->get()->sum('points_pool');
            $sumPoints += $this->defensemen()->get()->sum('points_pool');
            $sumPoints += $this->goalers()->get()->sum('points_pool');
            $sumPoints += $this->teams()->get()->sum('points_pool');
            return round($sumPoints / $sum, 2);
        }
    }

}
