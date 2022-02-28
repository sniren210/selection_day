@extends('layouts.auth',['title' => 'Home'])

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">User edit</h3>
                            </div>
                            <!-- /.card-header -->

                            @if (session('failed'))
                                <div class="content mt-2">
                                    <div class="alert alert-danger">
                                        {{ session('failed') }}
                                    </div>
                                </div>
                            @endif

                            <!-- form start -->
                            <form method="POST" action="/user/edit/{{ $user->id }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="exampleInputEmail1" name="name" value="{{ $user->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_old">Password Lama</label>
                                        <div class="input-group mb-3">

                                            <input type="password"
                                                class="form-control @error('password_old') is-invalid @enderror"
                                                id="password_old" name="password_old">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="eye_pass_old" onclick="toggle3()"><i
                                                        class="fas fa-eye"></i></span>
                                            </div>
                                            @error('password_old')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group mb-3">

                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="eye_pass" onclick="toggle1()"><i
                                                        class="fas fa-eye"></i></span>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control " id="password_confirmation"
                                                name="password_confirmation">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="eye_pass_con" onclick="toggle2()"><i
                                                        class="fas fa-eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url('/user') }}" class="btn btn-link">Kembali</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var state1 = false;
        var state2 = false;
        var state3 = false;

        function toggle1() {
            if (state1) {
                document.getElementById("password").setAttribute("type", "password");
                document.getElementById("eye_pass").style.color = "#7a797e";
                state1 = false;
            } else {
                document.getElementById("password").setAttribute("type", "text");
                document.getElementById("eye_pass").style.color = "#5887ef";
                state1 = true;
            }
        }

        function toggle2() {
            if (state2) {
                document.getElementById("password_confirmation").setAttribute("type", "password");
                document.getElementById("eye_pass_con").style.color = "#7a797e";
                state2 = false;
            } else {
                document.getElementById("password_confirmation").setAttribute("type", "text");
                document.getElementById("eye_pass_con").style.color = "#5887ef";
                state2 = true;
            }
        }

        function toggle3() {
            if (state3) {
                document.getElementById("password_old").setAttribute("type", "password");
                document.getElementById("eye_pass_old").style.color = "#7a797e";
                state3 = false;
            } else {
                document.getElementById("password_old").setAttribute("type", "text");
                document.getElementById("eye_pass_old").style.color = "#5887ef";
                state3 = true;
            }
        }

        function readURLKtn(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    console.log(e.target);
                    $('#img-ktn').attr('src', e.target.result);
                    $('#label-ktn').text(e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLSelfi(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    console.log(e.target);
                    $('#img-selfi').attr('src', e.target.result);
                    $('#label-selfi').text(e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
