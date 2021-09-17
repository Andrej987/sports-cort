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

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" class="cities-create-form">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="form-group-items">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-group-items form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="error-msg">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="form-group-items">{{ __('User Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-group-items form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="error-msg">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="form-group-items">{{ __('Country') }}</label>

                                    <div class="col-md-6">
                                        <select style="width: 200px" class="form-group-items form-control" id="country_id" name="country_id">
                                            {{ $countries = App\Models\Country::all()}}

                                            <option value="N/A">--SELECT--</option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="email" class="form-group-items">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-group-items form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail address" required autocomplete="email">

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
                                        <input id="password" type="password" class="form-group-items form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="error-msg">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="form-group-items">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-group-items form-control" name="password_confirmation" placeholder="Confirm Pass" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="button-container">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>