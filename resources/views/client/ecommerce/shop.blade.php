@extends('layouts.client.master')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <form action="">
                        <h5>Filter</h5>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow p-3 rounded">
                            <form class="d-flex" action="">
                                <input class="form-control" type="text" placeholder="Search here...">
                                <button class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    @php
                        $items = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
                    @endphp
                    @foreach ($items as $item)
                        <div class="col-lg-3 col-md-6 my-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="team-item">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{ asset('assets/img/tyre.png') }}" alt="">
                                    <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                        <a class="btn btn-square mx-1" href=""><i
                                                class="fas fa-shopping-cart"></i></a>
                                        <a class="btn btn-square mx-1" href=""><i
                                                class="fas fa-shopping-bag"></i></a>
                                        <a class="btn btn-square mx-1" href=""><i class="fas fa-info"></i></a>
                                    </div>
                                </div>
                                <div class="bg-light text-center p-2">
                                    <h5 class="fw-bold mb-0">Lorem ipsum dolor sit amet</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
