@extends('layouts.app')
<style>
        main{
            max-width: 1500px;
            width: 100%;
            margin: 30px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin: auto;
            gap: 20px;
        }
        .card{
            margin: auto;
            text-align: center;
        }
        </style>
@section('promo')
    <div class="row">
        <div class="col mt-4">
            <div class="carousel slide" id="carouselExampleSlidesOnly" data-bs-ride="carousel">
                <div class="carousel-inner rounded-3" id="promo-banner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('img/promo-banner/banner1.jpg') }}" alt="" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/promo-banner/banner2.jpg') }}" alt="" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/promo-banner/banner3.jpg') }}" alt="" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/promo-banner/banner4.jpg') }}" alt="" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/promo-banner/banner5.jpg') }}" alt="" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/promo-banner/banner6.jpg') }}" alt="" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/promo-banner/banner7.jpg') }}" alt="" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/promo-banner/banner8.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('categories')
<div class="row">
        <div class="col mt-4">
            <h5 class="fw-semibold mt-3">CATEGORIES</h5>
        </div>
    </div>
    <div class="row">
        <div class="d-flex mt-3 mb-4 align-items-center justify-content-between text-center">
            <ul class="list-group list-group-horizontal list-unstyled">
                @foreach($category as $category)
                <li class="list-group-item flex-item">
                    <img class="rounded-circle border border-2 border-dark p-2 border-opacity-25" id="ctg1"
                    img src="products/{{$category->gambar}}" alt="" style="width: 70px" />
                    <label class="fw-semibold mt-2" for="ctg1">{{$category->nama_kategori}}</label>
                </li>
                @endforeach
                
            </ul>
        </div>
    </div>
@endsection

@section('recommendations')
    <!-- RECOMMENDATIONS -->
    <h5 class="fw-semibold mt-4 mb-5">RECOMMENDATIONS</h5>
    {{-- Row 1 --}}
    <main>
    <div class="container">
        <div class="row">
        @foreach ($product as $products)
        <div class="card h-100" style="width: 240px; height: 400px">
            <div class="image-wrapper">
                <img class="card-img-top img-thumbnail mx-auto d-block mt-2"
                img src="products/{{$products->gambar}}" alt=""
                    style="height: 220px; width: 70%" />
            </div>
            <h5 class="card-title ms-2 me-2 fs-6 px-4 mb-auto mt-auto">
                <p style="text-align:center">
                {!!Str::limit($products->judul,35)!!}
                 </p>
                 <p style="text-align:center" class="text-muted">
                 {!!Str::limit($products->penulis,18)!!}
                 </p>  
                <span class="position-absolute top-0 start-50 translate-middle badge bg-primary text-light">{{$products->kategori}}</span>
            </h5>
            <div class="card-footer border-0">
                <div class="row mt-auto mb-auto">
                    <div class="col">
                        <small style="color: rgb(67, 170, 255)">Rp. </small><big class="me-1"
                            style="color: rgb(67, 170, 255)">{{number_format($products->harga,0,',','.')}}</big>
                    </div>
                    <div class="col-md-auto me-3">
                        <small>{{$products->jumlah}}</small>
                        <small>Pcs</small>
                    </div>
                </div>
            </div>
            <a class="stretched-link" href="{{url('deskripsi', $products->id)}}"></a>
        </div>
        @endforeach
        </div>
        </div>
        </main>
        </div>
@endsection