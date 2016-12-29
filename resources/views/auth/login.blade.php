@extends('master')

@section('body')

    <div class="row">

        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <form method="post" action="{{ route('login::post') }}">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                   placeholder="s1234567" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="correct horse battery staple" required>
                        </div>
                        <p>
                            <sub>
                                Please log-in using your {{ env('ORGANIZATION_NAME','organization') }} credentials.
                            </sub>
                        </p>
                    </div>
                    <div class="panel-footer clearfix">
                        <button type="submit" class="btn btn-success pull-right">Log-in</button>
                        <a href="{{ env('ORGANIZATION_RESETPASS_URL','#') }}" type="submit" class="btn btn-default"
                           target="_blank">
                            Forgot your password?
                        </a>
                    </div>
                </div>
            </form>

            @if(Session::has('notification'))
                <div class="alert alert-{{ Session::get('notification')['type'] }}" role="alert">
                    {{ Session::get('notification')['message'] }}
                </div>
            @endif

        </div>

    </div>

@endsection