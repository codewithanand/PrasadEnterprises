@extends('layouts.client.master')

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @php
                        $items = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
                    @endphp
                    @foreach ($items as $item)
                        <div class="col-md-12 mb-3">
                            <div class="card rounded p-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-fluid" src="{{ asset('assets/img/tyre.png') }}" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mb-3">Lorem ipsum dolor sit amet</h5>
                                        <label for="" class="fw-bold mb-2">Quantity</label>
                                        <input type="number" min="1" value="1" class="form-control">
                                        <h3 class="text-primary mt-3">₹ 50,000</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex flex-column gap-2">
                                            <button class="btn btn-primary"><i class="fas fa-trash"></i> Delete</button>
                                            <button class="btn btn-warning"><i class="fas fa-shopping-bag"></i> Buy
                                                Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection