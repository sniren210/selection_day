@extends('layouts.auth',['title' => 'Login'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="exampleInputEmail1" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <div class="input-group mb-3">

                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="pass" name="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="eye" onclick="toggle()"><i
                                                    class="fas fa-eye"></i></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="row mb-3 px-3 mx-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" style="width: 100%">Submit</button>
                            </div>


                        </form>
                    </div>
                    <p class="mb-1">
                        Belum punya akun
                        <a href="{{ route('register') }}">Klik disini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var state = false;

        function toggle() {
            if (state) {
                document.getElementById("pass").setAttribute("type", "password");
                document.getElementById("eye").style.color = "#7a797e";
                state = false;
            } else {
                document.getElementById("pass").setAttribute("type", "text");
                document.getElementById("eye").style.color = "#5887ef";
                state = true;
            }
        }
    </script>
@endsection
