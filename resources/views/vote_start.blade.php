@extends('layouts.auth',['title' => 'Home'])

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center my-1">
            <div class="col-lg-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    Anda hanya punya kesempatan 1 kali untuk vote, dan tidak akan bisa merubah vote atau melakukan vote
                    kedua kalinya, jadi pilihlah dengan bijak!
                </div>
                <a href="{{ url('vote') }}" class="btn btn-primary btn-block .btn-lg">Vote
                    Sekarang</a>

            </div>
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
