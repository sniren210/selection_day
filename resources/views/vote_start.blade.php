@extends('layouts.auth',['title' => 'Home'])

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center my-1">
            <div class="col-lg-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    Sekali vote anda tidak akan bisa vote untuk kedua kalinya jadi pilih dengan hati-hati
                </div>
                <a href="{{ url('user/vote') }}" class="btn btn-primary btn-block .btn-lg"><i
                        class="fa fa-bell"></i>Vote
                    Sekarang</a>

            </div>
        </div>
        <hr>
        <div class="row my-1">
            <div class="container">

                <h3 class="font-weight-bold">Tutorial</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse aliquid et? </p>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-lg-2">
                <div class="row align-items-center">
                    <div class="card" style="width: 18rem;">

                        <img src="{{ asset('./img/register.png') }}" style="width: 150px" class="img card-img-top"
                            alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Register</h4>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse aliquid et? </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2">
                <div class="row align-items-center">

                    <div class="card" style="width: 18rem;">

                        <img src="{{ asset('./img/login.png') }}" style="width: 150px" class="img card-img-top"
                            alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Login</h4>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse aliquid et? </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2">
                <div class="row align-items-center">
                    <div class="card" style="width: 18rem;">

                        <img src="{{ asset('./img/choose.png') }}" style="width: 150px" class="img card-img-top"
                            alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Choose</h4>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse aliquid et? </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2">
                <div class="row align-items-center">
                    <div class="card" style="width: 18rem;">

                        <img src="{{ asset('./img/done.png') }}" style="width: 150px" class="img card-img-top"
                            alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Done</h4>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse aliquid et? </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
