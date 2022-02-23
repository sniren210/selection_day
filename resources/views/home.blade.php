@extends('layouts.auth',['title' => 'Home'])

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center my-1">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="font-weight-bold">Election Day</h3>
                    </div>
                    <div class="card-body">

                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="{{ url('vote-start') }}" class="btn btn-primary">Vote Sekarang</a>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <img src="{{ asset('./img/dashboard_illustration.png') }}" class="product-image" alt="Product Image">
            </div>
        </div>
        <hr>
        <div class="row my-1">
            <div class="container">

                <h3 class="font-weight-bold">Candidate</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse aliquid et? </p>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-lg-3">
                <div class="row align-items-center">

                    <div class="card">

                        <img src="{{ asset('./img/candidate/default.png') }}" style="margin:auto; width: 150px"
                            class="img card-img-top" alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Candidate</h4>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse aliquid et? </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="row align-items-center">

                    <div class="card">

                        <img src="{{ asset('./img/candidate/default.png') }}" style="margin:auto; width: 150px"
                            class="img card-img-top" alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Candidate</h4>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse aliquid et? </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="row align-items-center">

                    <div class="card">

                        <img src="{{ asset('./img/candidate/default.png') }}" style="margin:auto; width: 150px"
                            class="img card-img-top" alt="Product Image">
                        <div class="card-body">

                            <h4 class="font-weight-bold">Candidate</h4>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem esse aliquid et? </p>
                        </div>
                    </div>
                </div>

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
