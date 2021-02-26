<x-guest-layout>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
				<img src="{{ asset('images/login-page-img.png')}}" alt="">
			</div>
            
            <div class="col-md-6 col-lg-5">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Login Carf Produtos</h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group custom">
                            <input class="form-control form-control-lg" type="email" name="email" :value="old('email')" placeholder="E-mail" required autofocus />
                        </div>

                        <div class="input-group custom">
                            <input  class="form-control form-control-lg" type="password" name="password" placeholder="**********" required autocomplete="current-password" />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>

                        <div class="row pb-30">
                            <div class="col-6">
                                <label for="remember_me" class="flex items-center">
                                    <input type="checkbox" id="remember_me" class="custom-control-input"  name="remember" />
                                    <span class="custom-control-label">{{ __('Lembre-me') }}</span>
                                </label>
                            </div>
                            <div class="col-6">
                                @if (Route::has('password.request'))
                                    <a class="forgot-password" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a>
                                @endif
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <x-jet-button class="btn btn-primary btn-lg btn-block">{{ __('Login') }}</x-jet-button>
                                </div>
                                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">Ou</div>
                                <div class="input-group mb-0">
                                    <a class="btn btn-outline-primary btn-lg btn-block" href="/register">Crie sua conta</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
