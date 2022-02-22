@extends('layouts.auth',['title' => 'Home'])

@section('content')
    <form action="/vote" method="POST">
        @csrf

        <div class="container">
            <section class="content">
                <div class="row justify-content-between">
                    @foreach ($candidate as $data)
                        <div class="col-4" id="accordion">
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100 collapsed" data-toggle="collapse"
                                    href="#collapseOne{{ $data->id }}" aria-expanded="false">
                                    <div class="card-header">
                                        <img src="{{ asset('./img/candidate/' . $data->image) }}" class="img card-img-top"
                                            alt="Product Image">
                                        <h4 class="font-weight-bold text-center my-2">{{ $data->name }} </h4>
                                    </div>
                                </a>
                                <div id="collapseOne{{ $data->id }}" class="collapse" data-parent="#accordion"
                                    style="">
                                    <div class="card-body">
                                        <h5>Visi</h5>
                                        <p>{{ $data->visi }}</p>
                                        <h5>Misi</h5>
                                        <p>{{ $data->misi }}</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio"
                                            id="customRadio2{{ $data->id }}" name="candidate"
                                            value="{{ $data->id }}">
                                        <label for="customRadio2{{ $data->id }}" class="custom-control-label">Vote
                                            Kandidat ini</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 mt-3 text-center">
                        <button type="button" class="btn btn-primary" style="width:100%" data-toggle="modal"
                            data-target="#vote">Submit</button>
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <p class="lead">
                            Vote kandidat dengan jujur dan baik<br>
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <div class="modal fade" id="vote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Vote kandidat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        apakah anda yakin dengan pilihan anda ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary">Vote Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
