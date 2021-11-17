<x-guest-layout>
    <body class="login-page">
        <div class="login-header box-shadow">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="brand-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="">
                    </a>
                </div>
                <div class="login-menu">
                    <ul>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-7">
                        <img src="{{ asset('vendors/images/login-page-img.png') }}" alt="">
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title">
                                <h2 class="text-center text-primary">Login To DeskApp</h2>
                            </div>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="input-group custom">
                                    <x-input id="text" class="form-control-lg" type="text" name="email"
                                        :value="old('email')" placeholder="Email" autofocus />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom">
                                    <x-input id="password" class="form-control-lg" type="password" name="password"
                                        :value="old('password')" placeholder="**********" autofocus />

                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                    </div>
                                </div>
                                <div class="row pb-30">
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox">
                                            <input name="remember" type="checkbox" class="custom-control-input"
                                                id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">{{ __('Remember me')
                                                }}</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="forgot-password"><a href="{{ route('password.request') }}">{{
                                                __('Forgot your password?') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-0">
                                            <!--
                                                use code for form submit
                                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                            -->
                                            <input type="submit" class="btn btn-primary btn-lg btn-block"
                                                value="Sign In" />
                                        </div>
                                        <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR
                                        </div>
                                        <div class="input-group mb-0">
                                            <a class="btn btn-outline-primary btn-lg btn-block"
                                                href="{{ route('register') }}">Register To Create Account</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</x-guest-layout>
