@extends('layouts.home')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
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
                                        src="{{ asset('img/profile') }}/{{ $user->selfi }}"
                                        alt="{{ $user->name }} profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }} </h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $user->email }} </a>
                                    </li>
                                </ul>

                                <a href="{{ url('/user/' . $user->id . '/edit') }}"
                                    class="btn btn-primary btn-block"><b>Edit</b></a>
                                @if (!$user->user_verified_at)
                                    <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                                        data-target="#verify{{ $user->id }}">Verify</button>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tentang user</h3>
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
        <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="verify{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    yakin ingin verifikasi user ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="/user-verified/{{ $user->id }}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-success">Verifikasi Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
