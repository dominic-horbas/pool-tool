<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pooler;
use App\Skater;
use App\Goaler;
use App\Team;
class PoolersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $poolers = Pooler::all();
        $poolersCount = $poolers->count();
        $data['poolers'] = $poolers;
        $data['poolersDropdown'] = Pooler::lists('name', 'id');


        //DOnnées des modals
        $forwards = Skater::where(['position_id' => 1, 'pooler_id' => null])->limit(50)->get();
        $pickedForwards = Skater::where(['position_id' => 1])->whereNotNull('pooler_id');
        $data['forwards_to_pick'] =  \Config::get('rules.forwards_per_pooler') * $poolersCount - $pickedForwards->count();
        $data['forwards_average_price'] = $pickedForwards->avg('price') == null ? 0 :  round($pickedForwards->avg('price'),2) ;
        $data['forwards_average_points_pool'] = Skater::calculatePointsPoolAverage($pickedForwards->get());


        $defense = Skater::where(['position_id' => 2, 'pooler_id' => null])->limit(50)->get();
        $pickedDefense = Skater::where(['position_id' => 2])->whereNotNull('pooler_id');
        $data['defense_to_pick'] =  \Config::get('rules.defense_per_pooler') * $poolersCount - $pickedDefense->count();
        $data['defense_average_price'] = $pickedDefense->avg('price') == null ? 0 :  round($pickedDefense->avg('price'),2) ;
        $data['defense_average_points_pool'] = Skater::calculatePointsPoolAverage($pickedDefense->get());

        $goalers = Goaler::where('pooler_id', null)->limit(50)->get();
        $pickedGoalers = Goaler::whereNotNull('pooler_id');
        $data['goalers_to_pick'] =  \Config::get('rules.goalies_per_pooler') * $poolersCount - $pickedGoalers->count();
        $data['goalers_average_price'] = $pickedGoalers->avg('price') == null ? 0 :  round($pickedGoalers->avg('price'),2) ;
        $data['goalers_average_points_pool'] = Skater::calculatePointsPoolAverage($pickedGoalers->get());

        $teams = Team::where('pooler_id', null)->limit(50)->get();
        $data['teams'] = $teams->sortByDesc('points_pool');

        $pickedTeams = Team::whereNotNull('pooler_id');
        $data['teams_to_pick'] =  \Config::get('rules.teams_per_pooler') * $poolersCount - $pickedTeams->count();
        $data['teams_average_price'] = $pickedTeams->avg('price') == null ? 0 :  round($pickedTeams->avg('price'),2) ;
        $data['teams_average_points_pool'] = Skater::calculatePointsPoolAverage($pickedTeams->get());

        $data['poolersDropdown'] = Pooler::lists('name', 'id');

        $data['skatersTypeahead'] = Skater::where(['pooler_id' => null])->select('name', 'id', 'goals', 'assists', 'games_played', 'position_id')->get()->toJson();
        $data['topForwards'] = $forwards->sortByDesc('points_pool')->splice(0,5);
        $data['topDefensemen'] = $defense->sortByDesc('points_pool')->splice(0,5);

        $data['goalersTypeahead'] = Goaler::where(['pooler_id' => null])->get()->toJson();
        $data['topGoalers'] = $goalers->sortByDesc('points_pool')->splice(0,5);

        $data['teamsTypeahead'] = Team::where(['pooler_id' => null])->get()->toJson();
        $data['topTeams'] = $teams->sortByDesc('points_pool')->splice(0,5);


        return view('poolers', $data );

    }



}
