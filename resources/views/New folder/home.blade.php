@extends('layouts.app')

@section('categories')

    <div class="portofolio-menu mt-2 mb-3 ml-4" id="buttons">
        <button class="button-value">Popular</button>
        <button class="button-value">Top Selling</button>
        <button class="button-value">Following</button>
        <button class="button-value">New</button>
    </div>
@endsection

@section('recommendations')
    <!-- RECOMMENDATIONS -->
    <h5 class="fw-semibold mt-4">Popular</h5>
    {{-- Row 1 --}}
    <div class="d-flex justify-content-between d-block text-center mt-3">
        
        <div class="ms-3">
            <div class="card" style="width: 240px; height: 360px">
                <div class="image-wrapper">
                    <img class="card-img-top img-thumbnail mx-auto d-block mt-2"
                        src="{{ asset('img/recommendations/Yang Bertahan dan Binasa Perlahan.jpg') }}" alt=""
                        style="height: 220px; width: 70%" />
                </div>
                <h5 class="card-title ms-2 me-2 fs-6 px-3">
                    Yang Bertahan dan ...
                    <span
                        class="position-absolute top-0 start-50 translate-middle badge bg-primary text-light">Novel</span>
                </h5>
                <div class="card-footer mb-3 border-0">
                    <div class="row mt-auto">
                        <div class="col">
                            <small style="color: rgb(67, 170, 255)">Rp</small><big class="me-1"
                                style="color: rgb(67, 170, 255)">73.000</big>
                        </div>
                        <div class="col-md-auto me-3">
                            <small>3,8RB Terjual</small>
                        </div>
                    </div>
                </div>
                <a class="stretched-link" href="#"></a>
        </div>
    </div>
    
@endsection
