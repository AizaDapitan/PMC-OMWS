@extends('layouts.login')

@section('content')

    <form method="POST" action="{{ route('login.submit') }}" class="login-form">
        @csrf

        <h3 class="form-title">
            <strong>Login to your domain</strong>
        </h3>
        @if($message = Session::get('error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i data-feather="alert-circle" class="mg-r-10"></i> {{ $message }}
            </div>
            @endif

            @if($message = Session::get('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i data-feather="alert-circle" class="mg-r-10"></i> {{ $message }}
            </div>
            @endif
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <div class="form-group @error('username') has-error @enderror">

            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" 
                    autocomplete="off" placeholder="Username" name="username" required
                    value="{{ old('username') }}" autofocus />
            </div>
            
            @error('username')
                <span for="username" class="help-block">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group">

            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required="required" />
            </div>

            @error('password')
                <span for="password" class="help-block">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-actions">

            <div class="form-actions">

                <button type="submit" class="btn green pull-right">
                    Login <i class="m-icon-swapright m-icon-white"></i>
                </button>
                
            </div>

        </div>
        
    </form>

@endsection
