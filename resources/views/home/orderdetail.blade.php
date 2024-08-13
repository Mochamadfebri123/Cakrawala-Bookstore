@extends('layouts.app')
@section('order')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">

                        <h4 class="text-primary">
                            <i class="fa fa-shopping-bag text-dark"></i> Pesanan Saya
                            <a href="/orderuser" class="btn btn-danger btn-sm float-end">Kembali</a>
                        </h4>
                        <hr>
                        
                        @foreach($order as $order)
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Detail Pesanan</h5>
                                <hr>
                                <h6>Nomor Pesanan: {{$order->order_number}} </h6>
                                <h6>Tanggal Pesanan: {{$order->created_at}}</h6>
                                <h6>Metode Pembayaran: {{$order->payment_method}}</h6>
                                <h6>Status Pembayaran: {{$order->payment_status}}</h6>
                                @if($order->status == 'new')
                                <h6 class="border p-2 text-primary">
                                    Status  Pesanan: DITERIMA<span class="text-uppercase"></span>
                                </h6>
                                @elseif($order->status =='process')
                                <h6 class="border p-2 text-warning">
                                    Status  Pesanan: DALAM PERJALANAN<span class="text-uppercase"></span>
                                </h6>
                                @else
                                <h6 class="border p-2 text-success">
                                    Status  Pesanan: PAKET TELAH SAMPAI<span class="text-uppercase"></span>
                                </h6>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h5>Detail Pelanggan: </h5>
                                <hr>
                                <h6>Nama: {{$order->first_name}} {{$order->last_name}}</h6>
                                <h6>Email: {{$order->email}}</h6>
                                <h6>Nomor Telepon: {{$order->phone}}</h6>
                                <h6>Alamat: {{$order->address}}</h6>
                                <h6>Kode Pos: {{$order->post_code}}</h6>
                            </div>
                        </div>
                        @endforeach
   
                        
                        <br/>
                        <h5>Barang Pesanan</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th><b><center>Gambar</center></b></th>
                                    <th><b><center>Judul Buku</center></b></th>
                                    <th><b><center>Penulis</center></b></th>
                                    <th><b><center>Harga</center></b></th>
                                    <th><b><center>Jumlah</center></b></th>
                                    <th><b><center>Total</center></b></th>
                                    
                                </thead>
                                <tbody>
                                @php
                                $total_harga=0;

                                @endphp
                                 @foreach($data as $data)
                                    <tr>
                                        @php
                                        $harga_diskon=($data->product->harga-(($data->product->harga*$data->product->diskon)/100));
                                        @endphp
                                        <td>
                                        <img width="100" src="/products/{{$data->product->gambar}}"> </td>
                                        <td>{{$data->product->judul}}</td>
                                        <td>{{$data->product->penulis}}</td>
                                        <td>Rp. {{number_format($harga_diskon,0,',','.')}}</td>
                                        <td>{{$data->quantity}}</td>
                                        <td>Rp. {{number_format($data->total_amount,0,',','.')}}</td>
                                        @php
                                            $total_harga += $data->total_amount;
                                        @endphp
                                    </tr>
                                 @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Harga</td>
                                        <td colspan="1" class="fw-bold">Rp. {{number_format($total_harga,0,',','.')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
