@extends('layouts.base')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Definições</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="{{ active('settings.profile') }}">
                                <a href="{{ route('settings.profile') }}">Perfil</a>
                            </li>
                            <li class="{{ active('settings.password') }}">
                                <a href="{{ route('settings.password') }}">Palavra-passe</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @include('layouts._alerts')

                @yield('content')
            </div>
        </div>
    </div>
@endsection
