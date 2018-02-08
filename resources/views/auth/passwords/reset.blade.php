{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Reset Password</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('password.request') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<input type="hidden" name="token" value="{{ $token }}">--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}

                                {{--@if ($errors->has('password_confirmation'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Reset Password--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div id ="loginCard" style="margin-top:-90px;">
                    <div class="card">
                        <div class="card-header">
                            RESET  PASSWORD
                        </div>

                        <div class="card-body">
                            <br/>
                            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}" id="resetForm" v-on:submit="resetPassword">
                                {{ csrf_field() }}
                                <input type="hidden" name="token" value="{{ $token }}">


                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">E-mail</label>

                                    <div class="col-md-6">

                                        <input name="email" v-validate="'email'"  value="{{old('email')}}" class="form-control" :class="{'input': true, 'is-danger': errors.has('email') }" type="text" autocomplete="off" v-model="email">
                                        <i v-show="errors.has('email')" class="fa fa-warning" style="color:red;"></i>
                                        <span v-show="errors.has('email')" v-cloak class="help is-danger" style="color:red;">@{{errors.first('email') }}</span>
                                        <span class="help-block"  v-cloak v-if="submition && wrongEmail" style="color:red;">@{{emailFB}}</span>

                                        <div class="bar"></div>
                                        @if ($errors->has('email'))
                                            <span class="help-block"  v-bind:class="{hidden :isHidden}" style="color:red;">
                                  {{ $errors->first('email') }}
                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"  v-model="password">
                                        <span class="help-block"  v-cloak v-if="submition && wrongPassword" style="color:red;">@{{passwordFB}}</span>

                                        <div class="bar"></div>
                                        @if ($errors->has('password'))
                                            <span class="help-block"  v-bind:class="{hidden :isHidden}" style="color:red;">
                                                              {{ $errors->first('password') }}
                                                          </span>
                                        @endif

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="password_confirmation">
                                        <span class="help-block"  v-cloak v-if="submition && wrongConfirmPassword" style="color:red;">@{{confirmPwdB}}</span>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block"  v-bind:class="{hidden :isHidden}" style="color:red;">
                                       {{ $errors->first('password_confirmation') }}
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Reset Password
                                        </button>
                                    </div>
                                </div>


                            </form>

                        </div>

                        <div class="card-footer text-muted">
                        </div>
                    </div>

                </div>

                <div style="margin-top:120px;">
                    <p style="margin-bottom: -20px; text-align: center;"><a>COPY RIGHTS </a> | <a>TERMS & CONDITIONS</a> | <a>HOW MINE</a></p>
                    <hr>
                </div>
            </div>

        </div>

    </div>


@endsection


