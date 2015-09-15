<div class="modal fade" id="skatersModal" tabindex="-1" role="dialog" aria-labelledby="skatersModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="skatersModalLabel">Enchère d'un joueur</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="skaters_id" />
                <div class="form-group">
                    <label for="SkatersTypeahead">Joueur</label>
                    <input type="text" class="form-control skaters-typeahead">
                </div>

                <h4>Statistiques Joueur</h4>
                <table class="table">
                    <tr>
                        <th>GP</th>
                        <th>G</th>
                        <th>A</th>
                        <th>PP</th>
                    </tr>
                    <tr>
                        <td id="skater-gp">N/D</td>
                        <td id="skater-g">N/D</td>
                        <td id="skater-a">N/D</td>
                        <td id="skater-pp">N/D</td>
                    </tr>
                </table>

                <div class="forwards-panel">
                    <div class="row">
                        <div class="stat bg-primary col-md-4">
                            <span>À choisir</span>
                            {{$forwards_to_pick}}
                        </div>
                        <div class="stat bg-success col-md-4">
                            <span>Prix moyen</span>
                            {{$forwards_average_price}}
                        </div>
                        <div class="stat bg-warning col-md-4">
                            <span>Moyenne PP joueurs choisis</span>
                            {{$forwards_average_points_pool}}
                        </div>
                    </div>

                    <h4>Top 5 disponible</h4>
                    <table class="table">
                        <tr>
                            <th>Nom</th>
                            <th>GP</th>
                            <th>G</th>
                            <th>A</th>
                            <th>PP</th>
                        </tr>
                        @foreach($topForwards as $skater)
                            <tr>
                                <td>{{$skater->name}}</td>
                                <td>{{$skater->games_played}}</td>
                                <td>{{$skater->goals}}</td>
                                <td>{{$skater->assists}}</td>
                                <td>{{$skater->points_pool}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="defense-panel">
                    <div class="row">
                        <div class="stat bg-primary col-md-4">
                            <span>À choisir</span>
                            {{$defense_to_pick}}
                        </div>
                        <div class="stat bg-success col-md-4">
                            <span>Prix moyen</span>
                            {{$defense_average_price}}
                        </div>
                        <div class="stat bg-warning col-md-4">
                            <span>Moyenne PP joueurs choisis</span>
                            {{$defense_average_points_pool}}
                        </div>
                    </div>
                    <h4>Top 5 disponible</h4>
                    <table class="table">
                        <tr>
                            <th>Nom</th>
                            <th>GP</th>
                            <th>G</th>
                            <th>A</th>
                            <th>PP</th>
                        </tr>
                        @foreach($topDefensemen as $skater)
                            <tr>
                                <td>{{$skater->name}}</td>
                                <td>{{$skater->games_played}}</td>
                                <td>{{$skater->goals}}</td>
                                <td>{{$skater->assists}}</td>
                                <td>{{$skater->points_pool}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>


                <div class="form-group">
                    <label for="skaters_pooler_id">Gagnant</label>
                    {!! Form::select('pooler_id', $poolersDropdown, null, ['class' => 'form-control', 'id' => 'skaters_pooler_id']) !!}
                </div>
                <div class="form-group">
                    <label for="skaters_price">Prix</label>
                    <input type="text" class="form-control" id="skaters_price">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Annuler</button>
                <button type="button" id="skaters-submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>  Enregistrer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="goalersModal" tabindex="-1" role="dialog" aria-labelledby="goalersModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="goalersModalLabel">Enchère d'un gardien</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="goalers_id" />
                <div class="form-group">
                    <label for="GoalersTypeahead">Gardien</label>
                    <input type="text" class="form-control goalers-typeahead">
                </div>

                <h4>Statistiques Joueur</h4>
                <table class="table">
                    <tr>
                        <th>GP</th>
                        <th>W</th>
                        <th>SO</th>
                        <th>PP</th>
                    </tr>
                    <tr>
                        <td id="goaler-gp">N/D</td>
                        <td id="goaler-w">N/D</td>
                        <td id="goaler-so">N/D</td>
                        <td id="goaler-pp">N/D</td>
                    </tr>
                </table>

                <div class="row">
                    <div class="stat bg-primary col-md-4">
                        <span>À choisir</span>
                        {{$goalers_to_pick}}
                    </div>
                    <div class="stat bg-success col-md-4">
                        <span>Prix moyen</span>
                        {{$goalers_average_price}}
                    </div>
                    <div class="stat bg-warning col-md-4">
                        <span>Moyenne PP joueurs choisis</span>
                        {{$goalers_average_points_pool}}
                    </div>
                </div>
                <h4>Top 5 disponible</h4>
                <table class="table">
                    <tr>
                        <th>Nom</th>
                        <th>GP</th>
                        <th>W</th>
                        <th>SO</th>
                        <th>PP</th>
                    </tr>
                    @foreach($topGoalers as $goaler)
                        <tr>
                            <td>{{$goaler->name}}</td>
                            <td>{{$goaler->games_played}}</td>
                            <td>{{$goaler->wins}}</td>
                            <td>{{$goaler->shutouts}}</td>
                            <td>{{$goaler->points_pool}}</td>
                        </tr>
                    @endforeach
                </table>



                <div class="form-group">
                    <label for="skaters_pooler_id">Gagnant</label>
                    {!! Form::select('pooler_id', $poolersDropdown, null, ['class' => 'form-control', 'id' => 'goalers_pooler_id']) !!}
                </div>
                <div class="form-group">
                    <label for="skaters_price">Prix</label>
                    <input type="text" class="form-control" id="goalers_price">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Annuler</button>
                <button type="button" id="goalers-submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>  Enregistrer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="teamsModal" tabindex="-1" role="dialog" aria-labelledby="teamsModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="teamsModalLabel">Enchère d'une équipe</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="teams_id" />
                <div class="form-group">
                    <label for="GoalersTypeahead">Équipe</label>
                    <input type="text" class="form-control teams-typeahead">
                </div>

                <h4>Statistiques Équipe</h4>
                <table class="table">
                    <tr>
                        <th>W</th>
                        <th>OTL</th>
                        <th>PP</th>
                    </tr>
                    <tr>
                        <td id="team-w">N/D</td>
                        <td id="team-otl">N/D</td>
                        <td id="team-pp">N/D</td>
                    </tr>
                </table>

                <div class="row">
                    <div class="stat bg-primary col-md-4">
                        <span>À choisir</span>
                        {{$teams_to_pick}}
                    </div>
                    <div class="stat bg-success col-md-4">
                        <span>Prix moyen</span>
                        {{$teams_average_price}}
                    </div>
                    <div class="stat bg-warning col-md-4">
                        <span>Moyenne PP joueurs choisis</span>
                        {{$teams_average_points_pool}}
                    </div>
                </div>
                <h4>Top 5 disponible</h4>
                <table class="table">
                    <tr>
                        <th>Nom</th>
                        <th>W</th>
                        <th>SO</th>
                        <th>PP</th>
                    </tr>
                    @foreach($topTeams as $team)
                        <tr>
                            <td>{{$team->name}}</td>
                            <td>{{$team->wins}}</td>
                            <td>{{$team->otl}}</td>
                            <td>{{$team->points_pool}}</td>
                        </tr>
                    @endforeach
                </table>

                <div class="form-group">
                    <label for="teams_pooler_id">Gagnant</label>
                    {!! Form::select('pooler_id', $poolersDropdown, null, ['class' => 'form-control', 'id' => 'teams_pooler_id']) !!}
                </div>
                <div class="form-group">
                    <label for="skaters_price">Prix</label>
                    <input type="text" class="form-control" id="teams_price">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Annuler</button>
                <button type="button" id="teams-submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>  Enregistrer</button>
            </div>
        </div>
    </div>
</div>