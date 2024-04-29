
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/feather.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

        <!-- Scripts -->
         
    </head>
    <body class="font-sans text-gray-900 antialiased">
<div class="main-wrapper login-body">
		<div class="container-fluid px-0">
			<div class="row">

				<div class="col-lg-6 login-wrap">
					<div class="login-sec">
						<div class="log-img">
							<img class="img-fluid" src="{{asset('images/login_logo_image.png')}}" alt="Logo">
						</div>
					</div>
				</div>
				<div class="col-lg-6 login-wrap-bg">
					<div class="login-wrapper">
						<div class="loginbox">
							<div class="login-right">
								<div class="login-right-wrap">
									<div class="account-logo">
										Welcome to <span> NEOCAD</span> Dental Lab
									</div>
									<h2>Login</h2>

									<form method="POST" action="{{ route('login') }}">
                                        @csrf
										<div class="input-block">
											<label>Email <span class="login-danger">*</span></label>
											<input id="email"  class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                          <x-input-error :messages="$errors->get('email')" class="mt-2" />

										</div>
										<div class="input-block">
											<label>Password <span class="login-danger">*</span></label>
											<input class="form-control pass-input"  id="password"  type="password"
                            name="password"
                            required autocomplete="current-password" >
											<span class="profile-views feather-eye-off toggle-password"></span>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
										</div>

										<div class="forgotpass">
											<div class="remember-me">
												<label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
													<input id="remember_me" type="checkbox" name="remember">
													<span class="checkmark"></span>
                                                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
												</label>
											</div>

                                            @if (Route::has('password.request'))
                                            <a  href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                              @endif

										</div>
										<div class="input-block login-btn">
											<button class="btn btn-primary btn-block" type="submit">Login</button>
										</div>
									</form>

									<div class="next-sign">

										<p class="account-subtitle">Need an account? @if (Route::has('register'))
                                            <a href="{{ route('register') }}" >
                                            Sign Up
                                            </a>
                                        @endif</p>



									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
	<script src="{{asset('js/bootstrap.bundle.min.js')}}" type="49c4791ebff34edf6a97ebba-text/javascript"></script>
	<script src="{{asset('js/feather.min.js')}}" type="49c4791ebff34edf6a97ebba-text/javascript"></script>
	<script src="{{asset('js/app.js')}}" type="49c4791ebff34edf6a97ebba-text/javascript"></script>
    </body>
</html>

