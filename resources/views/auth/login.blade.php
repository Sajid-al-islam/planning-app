@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form action="javascript:void(0)" onsubmit="login_submit(event)">
                            {{-- @csrf --}}

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('custom_js')    
        <script>
            function login_submit(event) {
                console.log('herere');
                event.preventDefault();
                let formData = new FormData(event.target);

                fetch("/api/v1/api-login", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: formData
                }).then(async res => {
                    let response = {}
                    response.status = res.status
                    response.data = await res.json();
                    return response;
                }).then(async res => {
                    if (res.status == 422) {
                        // console.log(res.status);
                        
                    }
                    if (res.status === 200) {
                        localStorage.setItem('token', res.data.access_token);
                        localStorage.setItem('auth_user', JSON.stringify(res.data.user));

                        let user_roles = res.data.user.roles
                        user_roles.forEach(element => {
                            if(element.name == 'admin') {
                                location.href = '/dashboard#/admin'
                            }
                            if(element.name == 'user') {
                                location.href = '/dashboard#/user'
                            }
                            if(element.name == 'visitor') {
                                location.href = '/dashboard#/visitor'
                            }
                            if(element.name == 'cp') {
                                location.href = '/dashboard#/cp-admin'
                            }
                            if(element.name == 'sg') {
                                location.href = '/dashboard#/sg-admin'
                            }
                        });
                        console.log(res.data.user);
                    }
                })
            }
        </script>
    @endpush
@endsection
