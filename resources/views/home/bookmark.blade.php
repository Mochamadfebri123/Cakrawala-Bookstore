@extends('layouts.app')

@section('cart')
<div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card">
                    <div class="card-body p-4">
                                <h5 class="mb-3"><a class="text-body" href="/home"><i
                                            class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                <hr>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Daftar Bookmark</p>
                                        <p class="mb-0">Ada {{$count_b}} Buku Yang Anda Bookmark</p>
                                    </div>
                                   
                                </div>
								@foreach($data as $datas)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row">
                                                <div>
                                                    <img class="img-fluid rounded-3"
                                                        src="Products/{{$datas->product->gambar}}"
                                                        alt="Shopping item" style="width: 100px;">
														<a href = "{{url('deskripsi',$datas->product->id)}}"><h6 class="secondary mt-3 ml-3" style="color:blue;">Lihat Detail</h6></a>
                                                </div>
                                                <div class="ms-3">
                                                    <h5 class="mt-3" style="color:blue;" >{{$datas->product->judul}}</h5>
                                                    <p class="small mb-0">a {{$datas->product->kategori}} by {{$datas->product->penulis}}</p>
													
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <a href= "{{url('hapus_bookmark',$datas->id)}}" class= "btn btn-danger"><i> X Hapus Bookmark</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								@endforeach
								
                                
                            


                    

                 
                
            </div>
 
    </div>
@endsection

