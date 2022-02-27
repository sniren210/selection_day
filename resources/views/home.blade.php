@extends('layouts.auth',['title' => 'Home'])

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center my-1">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="font-weight-bold">Pemilu Raya FEB TEL-U</h3>
                    </div>
                    <div class="card-body">

                        <p class="card-text">Pemilihan Raya Fakultas Ekonomi dan BIsnis Telkom University.</p>
                        <a href="{{ url('vote-start') }}" class="btn btn-primary">Vote Sekarang</a>
                    </div>
                </div>

            </div>
            <div class="col-lg-7">
                <img src="{{ asset('./img/dashboard_illustration.png') }}" class="product-image" alt="Product Image">
            </div>
        </div>
        <hr>
        <div class="row my-1">
            <div class="container">

                <h3 class="font-weight-bold">Kandidat BEM FEB</h3>
                <p> Berikut adalah daftar Kandidat yang akan dipilih, silahkan dibaca Visi & Misi, dan pilihlah dengan
                    bijak!</p>
            </div>
        </div>
        <div class="row justify-content-around">
            @foreach ($candidate_BEM as $key => $data)
                <div class="col-lg-4 col-md-6 col-sm-12 " id="accordion">
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne{{ $data->id }}"
                            aria-expanded="false">
                            <div class="card-header">
                                <img src="{{ asset('./img/candidate/' . $data->image) }}" class="img card-img-top"
                                    alt="Product Image">
                                <h4 class="font-weight-bold text-center my-2">{{ $data->name }} </h4>
                            </div>
                        </a>
                        <label class="text-center">{{ $data->jurusan }} </label>
                        <label class="text-center">{{ $data->fakultas }} </label>
                        <div id="collapseOne{{ $data->id }}" class="collapse " data-parent="#accordion" style="">
                            <div class="card-body">
                                <h5>Visi</h5>
                                <p>{{ $data->visi }}</p>
                                <h5>Misi</h5>
                                <p>{{ $data->misi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="row my-1">
            <div class="container">

                <h3 class="font-weight-bold">Kandidat DPM FEB</h3>
                <p> Berikut adalah daftar Kandidat yang akan dipilih, silahkan dibaca Visi & Misi, dan pilihlah dengan
                    bijak!</p>
            </div>
        </div>
        <div class="row justify-content-around">
            @foreach ($candidate_DPM as $key => $data)
                <div class="col-lg-4 col-md-6 col-sm-12 " id="accordion">
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne{{ $data->id }}"
                            aria-expanded="false">
                            <div class="card-header">
                                <img src="{{ asset('./img/candidate/' . $data->image) }}" class="img card-img-top"
                                    alt="Product Image">
                                <h4 class="font-weight-bold text-center my-2">{{ $data->name }} </h4>
                            </div>
                        </a>
                        <label class="text-center">{{ $data->jurusan }} </label>
                        <label class="text-center">{{ $data->fakultas }} </label>
                        <div id="collapseOne{{ $data->id }}" class="collapse " data-parent="#accordion" style="">
                            <div class="card-body">
                                <h5>Visi</h5>
                                <p>{{ $data->visi }}</p>
                                <h5>Misi</h5>
                                <p>{{ $data->misi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="row my-1">
            <div class="container">

                <h3 class="font-weight-bold">Kandidat HIMA MBTI</h3>
                <p> Berikut adalah daftar Kandidat yang akan dipilih, silahkan dibaca Visi & Misi, dan pilihlah dengan
                    bijak!</p>
            </div>
        </div>
        <div class="row justify-content-around">
            @foreach ($candidate_HIMA as $key => $data)
                <div class="col-lg-4 col-md-6 col-sm-12 " id="accordion">
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne{{ $data->id }}"
                            aria-expanded="false">
                            <div class="card-header">
                                <img src="{{ asset('./img/candidate/' . $data->image) }}" class="img card-img-top"
                                    alt="Product Image">
                                <h4 class="font-weight-bold text-center my-2">{{ $data->name }} </h4>
                            </div>
                        </a>
                        <label class="text-center">{{ $data->jurusan }} </label>
                        <label class="text-center">{{ $data->fakultas }} </label>
                        <div id="collapseOne{{ $data->id }}" class="collapse " data-parent="#accordion" style="">
                            <div class="card-body">
                                <h5>Visi</h5>
                                <p>{{ $data->visi }}</p>
                                <h5>Misi</h5>
                                <p>{{ $data->misi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="row my-1">
            <div class="container">

                <h3 class="font-weight-bold">Kandidat HIMAKU</h3>
                <p> Berikut adalah daftar Kandidat yang akan dipilih, silahkan dibaca Visi & Misi, dan pilihlah dengan
                    bijak!</p>
            </div>
        </div>
        <div class="row justify-content-around">
            @foreach ($candidate_HIMAKU as $key => $data)
                <div class="col-lg-4 col-md-6 col-sm-12 " id="accordion">
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne{{ $data->id }}"
                            aria-expanded="false">
                            <div class="card-header">
                                <img src="{{ asset('./img/candidate/' . $data->image) }}" class="img card-img-top"
                                    alt="Product Image">
                                <h4 class="font-weight-bold text-center my-2">{{ $data->name }} </h4>
                            </div>
                        </a>
                        <label class="text-center">{{ $data->jurusan }} </label>
                        <label class="text-center">{{ $data->fakultas }} </label>
                        <div id="collapseOne{{ $data->id }}" class="collapse " data-parent="#accordion" style="">
                            <div class="card-body">
                                <h5>Visi</h5>
                                <p>{{ $data->visi }}</p>
                                <h5>Misi</h5>
                                <p>{{ $data->misi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="row my-1">
            <div class="container">

                <h3 class="font-weight-bold">Tutorial</h3>
                <p> Berikut adalah tutorial singkat untuk melakukan pillihan di Pemira FEB Tel-U. </p>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-lg-2">
                <div class="row align-items-center">
                    <div class="card align-items-center" style="width: 18rem;">

                        <img src="{{ asset('./img/register.png') }}" style="width: 150px" class="img card-img-top"
                            alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Daftar</h4>
                            <p>Daftarkan akun anda, dan tunggu di verifikasi oleh Admin. </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2">
                <div class="row align-items-center">

                    <div class="card align-items-center" style="width: 18rem;">

                        <img src="{{ asset('./img/login.png') }}" style="width: 150px" class="img card-img-top"
                            alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Masuk</h4>
                            <p>Setelah di verifikasi, masuk dengan akun anda.</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2">
                <div class="row align-items-center">
                    <div class="card align-items-center" style="width: 18rem;">

                        <img src="{{ asset('./img/choose.png') }}" style="width: 150px" class="img card-img-top"
                            alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Pilih</h4>
                            <p> Pilih kandidat anda, dan pilihlah dengan bijak.</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2">
                <div class="row align-items-center">
                    <div class="card align-items-center" style="width: 18rem;">

                        <img src="{{ asset('./img/done.png') }}" style="width: 150px" class="img card-img-top"
                            alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Selesai</h4>
                            <p>Pilihan kamu akan dihitung oleh sistem, terima kasih!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
