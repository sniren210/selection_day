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
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">

                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('img/profile') }}/{{ $candidate->image }}"
                                        alt="{{ $candidate->name }} profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $candidate->name }} </h3>

                                <a href="{{ url('/candidate/' . $candidate->id . '/edit') }}"
                                    class="btn btn-primary btn-block"><b>Edit</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Fakultas</strong>

                                <p class="text-muted">
                                    {{ $candidate->fakultas }}
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Jurusan</strong>

                                <p class="text-muted">{{ $candidate->jurusan }}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Visi</strong>

                                <p class="text-muted">{{ $candidate->visi }}</p>


                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> Misi</strong>

                                <p class="text-muted">{{ $candidate->misi }}</p>


                                <hr>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
