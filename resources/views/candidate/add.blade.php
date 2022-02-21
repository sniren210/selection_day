@extends('layouts.home')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kandidat</h1>
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
                                <h3 class="card-title">Kandidat Create</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="/candidate" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="exampleInputEmail1" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Visi</label>
                                        <textarea name="visi" class="form-control @error('visi') is-invalid @enderror"
                                            rows="3" placeholder="Enter ...">{{ old('visi') }}</textarea>
                                        @error('visi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Misi</label>
                                        <textarea name="misi" class="form-control @error('misi') is-invalid @enderror"
                                            rows="3" placeholder="Enter ...">{{ old('misi') }}</textarea>
                                        @error('misi')
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
                                            <option value="ekonomi">Ekonomi</option>
                                            <option value="bisnis">Bisnis</option>
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
                                            <option value="MBTI">MBTI</option>
                                            <option value="ICT">ICT</option>
                                            <option value="Akuntansi">Akuntansi</option>
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
                                                <label for="exampleInputFile">File input</label>
                                                <div class="input-group">
                                                    <div class="custom-control custom-file flex-wrap">
                                                        <input type="file"
                                                            class="custom-file-input  @error('image') is-invalid @enderror"
                                                            id="exampleInputFile" onchange="readURL(this);" name="image">
                                                        <label id="label" class="custom-file-label"
                                                            for="exampleInputFile">Choose
                                                            file</label>
                                                        @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img class="img-fluid pad" id="img" src="/img/candidate/default.png"
                                                alt="Photo">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url('/candidate') }}" class="btn btn-link">Kembali</a>
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    console.log(e.target);
                    $('#img').attr('src', e.target.result);
                    $('#label').text(e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
