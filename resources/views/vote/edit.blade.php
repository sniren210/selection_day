@extends('layouts.home')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Vote</h1>
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
                                <h3 class="card-title">Vote edit</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="/vote-user/{{ $user->id }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Jenis Kandidat BEM</label>
                                        <select class="custom-select @error('candidate') is-invalid @enderror" name="BEM">
                                            @foreach ($candidate_BEM as $item)
                                                <option {{ $item->id == $BEM->candidate_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('candidate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Kandidat DPM</label>
                                        <select class="custom-select @error('candidate') is-invalid @enderror" name="DPM">
                                            @foreach ($candidate_DPM as $item)
                                                <option {{ $item->id == $DPM->candidate_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('candidate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    @if (isset($HIMA))
                                        <div class="form-group">
                                            <label>Jenis Kandidat HIMA</label>
                                            <select class="custom-select @error('candidate') is-invalid @enderror"
                                                name="HIMA">
                                                @foreach ($candidate_HIMA as $item)
                                                    <option {{ $item->id == $HIMA->candidate_id ? 'selected' : '' }}
                                                        value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('candidate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endif

                                    @if (isset($HIMAKU))
                                        <div class="form-group">
                                            <label>Jenis Kandidat HIMAKU</label>
                                            <select class="custom-select @error('candidate') is-invalid @enderror"
                                                name="HIMAKU">
                                                @foreach ($candidate_HIMAKU as $item)
                                                    <option {{ $item->id == $HIMAKU->candidate_id ? 'selected' : '' }}
                                                        value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('candidate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endif

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url('/vote-user') }}" class="btn btn-link">Kembali</a>
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
