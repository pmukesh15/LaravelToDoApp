@extends('layouts.app')
@push('styles')
<style>
 .m-l-150{
     margin-left:150px;
 }
 .m-l-50{
     margin-left:50px;
 }
 .m-l-0{
    margin-left:0 !important;
 }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2 col-sm-12 col-xs-12 m-l-150">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body row">
                    <div class="col-md-5 col-md-offset-2 m-l-50 col-sm-12 col-xs-12">
                        <img src="/images/loginimg.jpg">
                    </div>
                    <div class="col-md-5 col-md-offset-2 m-l-0 col-sm-12 col-xs-12">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <label for="email" class="control-label">E-Mail</label>
                                <br>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <label for="password" class="control-label">Password</label>
                                <br>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
