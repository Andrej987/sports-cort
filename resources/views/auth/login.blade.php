<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<body>
    <div class="page-wrapper">
        <div class="header">
            <a href="/" class="link-btn back-btn">Back</a>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="page-title">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" class="cities-create-form">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="form-group-items">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-group-items form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail address" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="error-msg">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="form-group-items">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-group-items form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="error-msg">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="form-group-items form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    <input class="form-group-items form-control form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                </div>

                                <div class="button-container">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>