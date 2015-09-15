@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="well">
                    <h3>Attaquants</h3>

                    <div class="stat bg-primary">
                        <span>À choisir</span>
                        {{$forwards_to_pick}}
                    </div>

                    <div class="stat bg-success">
                        <span>Prix moyen</span>
                        {{$forwards_average_price}} $
                    </div>

                    <div class="stat bg-warning">
                        <span>Moyenne PP des joueurs choisis</span>
                        {{$forwards_average_points_pool}}
                    </div>
                </div>
                <h4>Top 50 disponible</h4>
                <table class="table">
                    <tr>
                        <th>Joueur</th>
                        <th>GP</th>
                        <th>G</th>
                        <th>A</th>
                        <th>PP</th>
                    </tr>
                    @foreach($forwards as $skater)
                        <tr>
                            <td>{{ $skater->name }}</td>
                            <td>{{ $skater->games_played }}</td>
                            <td>{{ $skater->goals }}</td>
                            <td>{{ $skater->assists }}</td>
                            <td>{{ $skater->points_pool }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
            <div class="col-lg-3">
                <div class="well">
                    <h3>Défenseurs</h3>

                    <div class="stat bg-primary">
                        <span>À choisir</span>
                        {{$defense_to_pick}}
                    </div>

                    <div class="stat bg-success">
                        <span>Prix moyen</span>
                        {{$defense_average_price}} $
                    </div>

                    <div class="stat bg-warning">
                        <span>Moyenne PP des joueurs choisis</span>
                        {{$defense_average_points_pool}}
                    </div>

                </div>
                <h4>Top 50 disponible</h4>
                <table class="table">
                    <tr>
                        <th>Joueur</th>
                        <th>GP</th>
                        <th>G</th>
                        <th>A</th>
                        <th>PP</th>
                    </tr>
                    @foreach($defense as $skater)
                        <tr>
                            <td>{{ $skater->name }}</td>
                            <td>{{ $skater->games_played }}</td>
                            <td>{{ $skater->goals }}</td>
                            <td>{{ $skater->assists }}</td>
                            <td>{{ $skater->points_pool }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-lg-3">
                <div class="well">
                    <h3>Gardiens</h3>

                    <div class="stat bg-primary">
                        <span>À choisir</span>
                        {{$goalers_to_pick}}
                    </div>

                    <div class="stat bg-success">
                        <span>Prix moyen</span>
                        {{$goalers_average_price}} $
                    </div>

                    <div class="stat bg-warning">
                        <span>Moyenne PP des joueurs choisis</span>
                        {{$goalers_average_points_pool}}
                    </div>

                </div>
                <h4>Top 50 disponible</h4>
                <table class="table">
                    <tr>
                        <th>Joueur</th>
                        <th>GP</th>
                        <th>W</th>
                        <th>SO</th>
                        <th>PP</th>
                    </tr>
                    @foreach($goalers as $goaler)
                        <tr>
                            <td>{{ $goaler->name }}</td>
                            <td>{{ $goaler->games_played }}</td>
                            <td>{{ $goaler->wins }}</td>
                            <td>{{ $goaler->shutouts }}</td>
                            <td>{{ $goaler->points_pool }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="col-lg-3">
                <div class="well">
                    <h3>Équipes</h3>

                    <div class="stat bg-primary">
                        <span>À choisir</span>
                        {{$teams_to_pick}}
                    </div>

                    <div class="stat bg-success">
                        <span>Prix moyen</span>
                        {{$teams_average_price}} $
                    </div>

                    <div class="stat bg-warning">
                        <span>Moyenne PP des équipes choisis</span>
                        {{$teams_average_points_pool}}
                    </div>

                </div>
                <h4>Top 50 disponible</h4>
                <table class="table">
                    <tr>
                        <th>Équipe</th>
                        <th>W</th>
                        <th>OTL</th>
                        <th>PP</th>
                    </tr>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->wins }}</td>
                            <td>{{ $team->otl }}</td>
                            <td>{{ $team->points_pool }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@stop