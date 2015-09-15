@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($poolers as $pooler)
                <div class="col-lg-3">

                    <div class="well">
                        <a class="toggle-list" href="#">
                            <h3>{{$pooler->name}}</h3>
                            <div class="stat bg-primary">
                                <span>À choisir</span>
                                {{$pooler->remaining_picks}}
                            </div>
                            <div class="stat bg-success">
                                <span>Argent restant</span>
                                {{$pooler->remaining_cash}} $
                            </div>
                            <div class="stat bg-warning">
                                <span>Moyenne PP des joueurs choisis</span>
                                {{$pooler->points_pool_average}}
                            </div>
                        </a>
                        <div class="players-list" style="display:none">
                            <h4>Attaquants</h4>
                            <table class="table">
                                <tr>
                                    <th>Nom</th>
                                    <th>PP</th>
                                    <th>Prix</th>
                                </tr>
                                @foreach($pooler->forwards as $forward)
                                    <tr>
                                        <td>{{$forward->name}}</td>
                                        <td>{{$forward->points_pool}}</td>
                                        <td>{{$forward->price}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <h4>Défenseurs</h4>
                            <table class="table">
                                <tr>
                                    <th>Nom</th>
                                    <th>PP</th>
                                    <th>Prix</th>
                                </tr>
                                @foreach($pooler->defensemen as $defense)
                                    <tr>
                                        <td>{{$defense->name}}</td>
                                        <td>{{$defense->points_pool}}</td>
                                        <td>{{$defense->price}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <h4>Gardiens</h4>
                            <table class="table">
                                <tr>
                                    <th>Nom</th>
                                    <th>PP</th>
                                    <th>Prix</th>
                                </tr>
                                @foreach($pooler->goalers as $goaler)
                                    <tr>
                                        <td>{{$goaler->name}}</td>
                                        <td>{{$goaler->points_pool}}</td>
                                        <td>{{$goaler->price}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <h4>Équipes</h4>
                            <table class="table">
                                <tr>
                                    <th>Nom</th>
                                    <th>PP</th>
                                    <th>Prix</th>
                                </tr>
                                @foreach($pooler->teams as $team)
                                    <tr>
                                        <td>{{$team->name}}</td>
                                        <td>{{$team->points_pool}}</td>
                                        <td>{{$team->price}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        $('.toggle-list').on('click', function(){
            $(this).next().slideToggle();
        })
    </script>
@stop