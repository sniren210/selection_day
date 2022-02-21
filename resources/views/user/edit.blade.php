@extends('layouts.home')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

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
                            <!-- form start -->
                            <form method="POST" action="/user/{{ $user->id }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            id="exampleInputEmail1" name="email" value="{{ $user->email }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
                                        <label for="password">Password</label>
                                        <div class="input-group mb-3">

                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="eye_pass" onclick="toggle1()"><i
                                                        class="fas fa-eye"></i></span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control " id="password_confirmation"
                                                name="password_confirmation">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="eye_pass_con" onclick="toggle2()"><i
                                                        class="fas fa-eye"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>User Level</label>
                                        <select class="custom-select @error('level') is-invalid @enderror" name="level">
                                            <option checked value="">Pilih user level</option>
                                            <option {{ $user->level == 0 ? 'selected' : '' }} value="0">User</option>
                                            <option {{ $user->level == 1 ? 'selected' : '' }} value="1">Admin</option>
                                        </select>
                                        @error('level')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Fakultas</label>
                                        <select class="custom-select @error('fakultas') is-invalid @enderror"
                                            name="fakultas">
                                            <option checked value="">Pilih Fakultas</option>
                                            <option {{ $user->fakultas == 'ekonomi' ? 'selected' : '' }} value="ekonomi">
                                                Ekonomi
                                            </option>
                                            <option {{ $user->fakultas == 'bisnis' ? 'selected' : '' }} value="bisnis">
                                                Bisnis
                                            </option>
                                        </select>
                                        @error('fakultas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <select class="custom-select @error('jurusan') is-invalid @enderror" name="jurusan">
                                            <option checked value="">Pilih Jurusan</option>
                                            <option {{ $user->jurusan == 'MBTI' ? 'selected' : '' }} value="MBTI">MBTI
                                            </option>
                                            <option {{ $user->jurusan == 'ICT' ? 'selected' : '' }} value="ICT">ICT
                                            </option>
                                            <option {{ $user->jurusan == 'Akuntansi' ? 'selected' : '' }}
                                                value="Akuntansi">Akuntansi</option>
                                        </select>
                                        @error('jurusan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="exampleInputFile">Upload KTN</label>
                                                <div class="card">
                                                    <img class="img card-img-top" id="img-ktn"
                                                        src="{{ asset('img/ktn') }}/{{ $user->ktn }} " alt="Photo"
                                                        style="width:50%;margin:auto;">

                                                    <div class="card-body">

                                                        <div class="input-group">
                                                            <div class="custom-control custom-file flex-wrap">
                                                                <input type="file"
                                                                    class="custom-file-input  @error('ktn') is-invalid @enderror"
                                                                    id="exampleInputFile" onchange="readURLKtn(this);"
                                                                    name="ktn">
                                                                <label id="label-ktn" class="custom-file-label"
                                                                    for="exampleInputFile">Choose
                                                                    file</label>
                                                                @error('ktn')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="exampleInputFile">Upload Selfi</label>
                                                <div class="card">
                                                    <img class="img card-img-top" id="img-selfi"
                                                        src="{{ asset('img/profile') }}/{{ $user->selfi }} "
                                                        alt="Photo" style="width:50%;margin:auto;">

                                                    <div class="card-body">

                                                        <div class="input-group">
                                                            <div class="custom-control custom-file flex-wrap">
                                                                <input type="file"
                                                                    class="custom-file-input  @error('selfi') is-invalid @enderror"
                                                                    id="exampleInputFile" onchange="readURLSelfi(this);"
                                                                    name="selfi">
                                                                <label id="label-selfi" class="custom-file-label"
                                                                    for="exampleInputFile">Choose
                                                                    file</label>
                                                                @error('selfi')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script type="text/javascript">
        var state1 = false;
        var state2 = false;

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
