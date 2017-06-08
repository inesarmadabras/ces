<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <title>Plataforma de Ideias</title>
    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-editable.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery.upvote.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('eastgate/comment/css/comment.css') }}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/sticky-footer-navbar.css') }}">

    <link rel="shortcut icon" href="{{ URL::asset('assetssns/favicon.ico" type="image/x-icon') }}">


    <link rel="stylesheet" href="{{ URL::asset('assetssns/css/bootstrap.css') }}">
   
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,900" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>
    <div id="navs"></div>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="#">Reddit</a>-->
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ URL::action('HomeController@index') }}">Últimas publicações</a>
                    </li>
                    <li class="{{ Request::is('subreddit') ? 'active' : '' }}"><a href="{{ URL::action('SubredditController@index') }}">Tópicos</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                    <!-- Só para mods -->
                    <!--<li class="{{ Request::is('subreddit/create') ? 'active' : '' }}"><a href="{{ URL::action('SubredditController@create') }}"><span class="glyphicon glyphicon-plus"></span> Tópico</a></li>-->
                    <li class="{{ Request::is('posts/create') ? 'active' : '' }}"><a href="{{ URL::action('PostsController@create') }}"><span class="glyphicon glyphicon-plus"></span> Publicação</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::getUser()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ action('ProfilesController@edit', Auth::getUser()->id) }}">Editar Perfil</a>
                            </li>
                            <li><a href="{{ route('mysubreddits') }}">Meus Tópicos</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('auth/logout') }}">Terminar Sessão</a>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="{{ Request::is('auth/register') ? 'active' : '' }}"><a href="{{ url('auth/register') }}">Registo</a>
                    </li>
                    <li class="{{ Request::is('auth/login') ? 'active' : '' }}"><a href="{{ url('auth/login') }}">Login</a>
                    </li>
                    @endif

                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
        @yield('content')
    </div>

    <hr> <div id="footer"></div>



    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->





    <script>
        $("#navs").load("assetssns/canvas.html nav");
    </script>
    <script>
        $("#footer").load("assetssns/canvas.html #footer");
    </script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('eastgate/comment/js/comment.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap-editable.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.upvote.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.jscroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/sweetalert.min.js') }}"></script>
    <!-- wysihtml5 -->
    <link rel="stylesheet" href="{{ URL::asset('assets/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5-0.0.2.css') }}">
    <script type="text/javascript" src="{{ URL::asset('assets/wysihtml5/bootstrap-wysihtml5-0.0.2/wysihtml5-0.3.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5-0.0.2.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/wysihtml5/wysihtml5.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
        // CSRF token setup for jQuery
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
            switch (options['type'].toLowerCase()) {
                case "post":
                case "delete":
                case "put":
                    // add leading ampersand if `data` is non-empty
                    if (options.data != '') {
                        options.data += '&';
                    }
                    // add _token entry
                    options.data += "_token=" + csrf_token;
                    break;
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.topic').upvote();
        $('.comment').upvote();

        $.get("/data/islogged", function(data) {
            data.status == false ? console.log('not logged in') : console.log('logged in');

            $('.vote').on('click', function(e) {
                e.preventDefault();
                var $button = $(this);
                var postId = $button.data('post-id');
                var value = $button.data('value');

                if (data.status == false) {

                    sweetAlert("Oops...", "Ainda não iniciou sessão!", "error");

                    window.setInterval(function() {
                        $('a.upvote').removeClass('upvote-on');
                        $('a.downvote').removeClass('downvote-on');
                    }, 500);

                } else {
                    $.post('votes', {
                        postId: postId,
                        value: value
                    }, function(data) {
                        // success here
                    }).fail(function() {
                        sweetAlert("Oops...", "Algo correu mal...", "error");
                    }, 'json');
                }
            });

            $('.commentvote').on('click', function(e) {
                e.preventDefault();
                var $button = $(this);
                var commentId = $button.data('comment-id');
                var value = $button.data('value');

                if (data.status == false) {
                    sweetAlert("Oops...", "Ainda não iniciou sessão!", "error");

                    window.setInterval(function() {
                        $('a.commentvote').removeClass('upvote-on');
                        $('a.commentvote').removeClass('downvote-on');
                    }, 500);

                } else {
                    $.post('commentvotes', {
                        commentId: commentId,
                        value: value
                    }, function(data) {
                        // success here
                    }).fail(function() {
                        sweetAlert("Oops...", "Algo correu mal...", "error");
                    }, 'json');
                }
            });
        });

        $.fn.editable.defaults.mode = 'inline';
    </script>
    @yield('scripts')


</body>

</html>