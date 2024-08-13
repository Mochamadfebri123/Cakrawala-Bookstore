@extends('layouts.app')
@section('order')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                                <h5 class="mb-3"><a class="text-body" href="/dashboard"><i
                                            class="fas fa-long-arrow-alt-left me-2"></i>Kembali</a></h5>
                                <h4 class="mb-4">Pesanan Saya</h4>
                                <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th><b><center>NO</center></b></th>
                                    <th><b><center>ORDER ID</center></b></th>
                                    <th><b><center>NAMA</center></b></th>
                                    <th><b><center>METODE PEMBAYARAN</center></b></th>
                                    <th><b><center>STATUS PEMBAYARAN</center></b></th>
                                    <th><b><center>TANGGAL PESANAN</center></b></th>
                                    <th><b><center>STATUS PESANAN</center></b></th>
                                    <th><b><center> AKSI </center></b></th>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($order as $order)
                                    <tr>
                                        <td><center>{{$no++}} </center></td>
                                        <td><center>{{$order->order_number}}</center></td>
                                        <td><center>{{$order->first_name}} {{$order->last_name}}</center></td>
                                        <td><center>{{$order->payment_method}}</center></td>
                                        <td><center>{{$order->payment_status}}</center></td> 
                                        <td><center>{{$order->created_at}}</center></td>
                                      
                                        <td>
                                            @if($order->status=='new')
                                            <center><span class="badge badge-primary">NEW</cente></span>
                                            @elseif($order->status=='process')
                                            <center><span class="badge badge-warning">PROCESSING</center></span>
                                            @elseif($order->status=='delivered')
                                            <center><span class="badge badge-success">DELIVERED</center></span>
                                            @else
                                            <center><span class="badge badge-danger">{{$order->status}}</center></span>
                                            @endif
                                        </td>
                                        <td>
                                        <a href="{{url('detail', $order->order_number)}}" class="btn btn-warning btn-sm " style="height:30px; width:35px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>

                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
