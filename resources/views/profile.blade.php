@extends('layouts.auth',['title' => 'Home'])

@section('content')
    <div class="container my-3">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">

                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('img/profile') }}/{{ $user->selfi }}"
                                        alt="{{ $user->name }} profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }} </h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $user->email }} </a>
                                    </li>
                                </ul>

                                <a href="{{ url('/user/edit') }}" class="btn btn-primary btn-block"><b>Edit</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tentang saya</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Jurusan</strong>

                                <p class="text-muted">{{ $user->jurusan }}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> KTM/KTM Digital</strong>

                                <div class="row justify-content-start">
                                    <img class="profile-user-img img-circle" style="margin: unset;" id="img-selfi"
                                        src="/img/ktn/{{ $user->ktn }}" alt="Photo">
                                </div>

                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> selfie dengan KTM</strong>

                                <div class="row justify-content-start">

                                    <img class="profile-user-img img-circle" style="margin: unset;" id="img-selfi"
                                        src="/img/profile/{{ $user->selfi }}" alt="Photo">
                                </div>

                                <hr>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
