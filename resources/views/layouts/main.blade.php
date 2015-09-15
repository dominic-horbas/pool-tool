<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Pool tool</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Pool Tool</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/players">Joueurs disponibles</a></li>
                <li><a href="/poolers">Poolers</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Boutons d'ajout -->
                <li><button data-toggle="modal" data-target="#skatersModal" type="button" class="btn btn-primary navbar-btn"><i class="fa fa-user"></i> Patineur</button></li>
                <li><button data-toggle="modal" data-target="#goalersModal" type="button" class="btn btn-success navbar-btn"><i class="fa fa-times-circle"></i> Gardien</button></li>
                <li><button data-toggle="modal" data-target="#teamsModal" type="button" class="btn btn-warning navbar-btn"><i class="fa fa-users"></i> Équipe</button></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    @yield('content')

</div> <!-- /container -->

@include('modals')



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/js/jquery-2.1.4.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/bootstrap-typeahead.min.js"></script>
<script type="text/javascript">
    $('.skaters-typeahead').typeahead({
        source: {!! $skatersTypeahead !!}
    });
    $('.skaters-typeahead').change(function() {
        var current = $('.skaters-typeahead').typeahead("getActive");
        if (current) {
            if (current.name == $('.skaters-typeahead').val()) {
                $('#skaters_id').val(current.id);
                $('#skater-gp').text(current.games_played);
                $('#skater-g').text(current.goals);
                $('#skater-a').text(current.assists);
                $('#skater-pp').text(current.points_pool);

                if(current.position_id == 1){
                    $('.forwards-panel').show();
                    $('.defense-panel').hide();
                }else{
                    $('.forwards-panel').hide();
                    $('.defense-panel').show();
                }

                //Fetch des stats

            }
        }
    });
    $('#skaters-submit').on('click', function(){
        $.ajax({
            url: '/skaters/' + $('#skaters_id').val(),
            type: 'PUT',
            data: {"_token": "{{ csrf_token() }}", "pooler_id": $('#skaters_pooler_id').val(), "price": $('#skaters_price').val()},
            success: function(result) {
                location.reload();
            }
        });
    });
    $('.goalers-typeahead').typeahead({
        source: {!! $goalersTypeahead !!}
    });
    $('.goalers-typeahead').change(function() {
        var current = $('.goalers-typeahead').typeahead("getActive");
        if (current) {
            if (current.name == $('.goalers-typeahead').val()) {
                $('#goalers_id').val(current.id);
                $('#goaler-gp').text(current.games_played);
                $('#goaler-w').text(current.wins);
                $('#goaler-so').text(current.shutouts);
                console.log(current);
                $('#goaler-pp').text(current.points_pool);

            }
        }
    });
    $('#goalers-submit').on('click', function(){
        $.ajax({
            url: '/goalers/' + $('#goalers_id').val(),
            type: 'PUT',
            data: {"_token": "{{ csrf_token() }}", "pooler_id": $('#goalers_pooler_id').val(), "price": $('#goalers_price').val()},
            success: function(result) {
                location.reload();
            }
        });
    });
    $('.teams-typeahead').typeahead({
        source: {!! $teamsTypeahead !!}
    });
    $('.teams-typeahead').change(function() {
        var current = $('.teams-typeahead').typeahead("getActive");
        if (current) {
            if (current.name == $('.teams-typeahead').val()) {
                $('#teams_id').val(current.id);
                $('#team-w').text(current.wins);
                $('#team-otl').text(current.otl);
                $('#team-pp').text(current.points_pool);

            }
        }
    });
    $('#teams-submit').on('click', function(){
        $.ajax({
            url: '/teams/' + $('#teams_id').val(),
            type: 'PUT',
            data: {"_token": "{{ csrf_token() }}", "pooler_id": $('#teams_pooler_id').val(), "price": $('#teams_price').val()},
            success: function(result) {
                location.reload();
            }
        });
    });
</script>
@yield('scripts')
</body>
</html>
