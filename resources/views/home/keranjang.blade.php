@extends('layouts.app')

@section('cart')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4 ">

                        <div class="row">

                            <div class="col-lg-7">
                                <h5 class="mb-3"><a class="text-body" href="/dashboard"><i
                                            class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                <hr>

                                @if($count_c < 1)
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Keranjang Belanja</p>
                                        <p class="mb-0">Anda Punya Tidak Memiliki Barang di Keranjang</p>
                                    </div>
                                    <div>
                                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a class="text-body"
                                                href="#!">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                    </div>
                                </div>
                                @else
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Keranjang Belanja</p>
                                        <p class="mb-0">Anda Punya {{$count_c}} barang di Keranjang</p>
                                    </div>
                                    
                                </div>
                                @endif

                                <?php 
                                
                                $value= 0;
                                
                                ?>

                                @foreach($cart as $key=>$cart)
                               
                                <div class="card mb-3 produk">
                                    <tr>
                                         <div class="card-body">
                                   
                                        <div class="col-lg-6 col-12">
                                            <div class="d-flex flex-row align-items-center data">
                                                <div>
                                                    <img class=" rounded-3"
                                                        src="products/{{$cart->product->gambar}}"
                                                        alt="Shopping item" style="width: 65px;">
                                                </div>
                                                <div class="ms-3">
                                                    <h5>{{$cart->product->judul}}</h5>
                                                    <p class="small mb-0">a {{$cart->product->kategori}} by {{$cart->product->penulis}}</p>
                                                    <h5 class="small mt-3 mb-0 fs-6" style="color:blue;">Rp. {{number_format($cart->price,0,',','.')}}</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="input-group">
                                                   
															<div class="button minus">
																<button type="button" class="btn btn-primary btn-number change" data-type="minus" data-field="quant[{{$key}}]">
																	<i class="bi bi-dash"></i>
																</button>
															</div>
                                                           
                                                            <input type="hidden" class="prodId" value="{{$cart->product_id}}">
															<input type="text" name="quant[{{$key}}]" class="input-number qty" harga="{{$cart->price}}" min="1" max="100" price="{{$cart->price}}" value="{{$cart->quantity}}" id="quantity">
															
                                                            <div class="button plus">
																<button type="button" class="btn btn-primary btn-number change " data-type="plus" data-field="quant[{{$key}}]">
																	<i class="bi bi-plus"></i>
																</button>
															</div>
														</div>
                                                <div class="harga" style="width: 120px;">
                                                    
                                                    <h5 class="mb-0 ms-3 mt-3 fs-6 stotal" style="color:blue;">Rp. {{number_format($cart->amount,0,',','.')}}</h5>
                                                </div>
                                                <a href="{{url('hapus_keranjang',$cart->id)}}" style="color: #cecece;"><i
                                                        class="mt-3 fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <?php
                                
                                $value += $cart->price * $cart->quantity;

                                ?>
                                </tr>
                                @endforeach

                            </div>

                            <div class="mt-auto col-lg-5">

                                <div class="card text-white rounded-3" style="background-color:rgb(67, 170, 255)">
                                    <div id="totalajaxcall" class="card-body">
                                        <div class="totalpricingload">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Total Harga</h5>
                                            <img class="img-fluid rounded-3 mt-3"
                                                src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Avatar"
                                                style="width: 45px;">
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2 total">Subtotal</p>
                                            <input type="hidden" class="value" value="{{$value}}">
                                            <p class="mb-2 totalharga">Rp. {{number_format($value,0,',','.')}}</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Ongkir</p>
                                            <p class="mb-2">Gratis Ongkir</p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Total</p>
                                            <p class="mb-2">Rp. {{number_format($value,0,',','.')}}</p>
                                        </div>

                                      

                                        <button class="btn btn-dark btn-block btn-lg" type="button">
                                            <div class="d-flex justify-content-between align-items-center ">
                                                <span>Rp. {{number_format($value,0,',','.')}}</span>
                                        
                                                <a href=" {{url('checkout')}} " ><span class="form" style="color: White;"> Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span></a>
                                            </div>
                                        </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(()=>{
    TotalHarga()
  })

  $(".input-number").on('change keyup',(e)=>{
    let jumlah = $(e.target).val()
    if(jumlah <= 0){
      $(e.target).val(1)
    }
    jumlahTotal(e.target)
  })

  $(".minus").on('click',(e)=>{
    let ar = $(e.target).parent().parent().find(".input-number")
    jumlahTotal(ar)
  })
  $(".plus").on('click',(e)=>{
    let ar = $(e.target).parent().parent().find(".input-number")
    jumlahTotal(ar)
  })

  let jumlahTotal = (e)=>{
    let stotal = parseInt($(e).attr('harga')) * parseInt($(e).val())
    let ss = $(e).parent().parent().parent().find(".stotal").html(rupiah(stotal))
    TotalHarga()
  }

  let rupiah = (num)=>{
    return "Rp. "+num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }

  let TotalHarga = ()=>{
    let totalH = 0
    $("produk").each((i,tr)=>{
      let t = $(tr).find(".qty").val()
      let h = $(tr).find(".qty").attr('price')
      totalH = totalH + parseInt(t)*parseInt(h)
    })
    $(".totalall").html(rupiah(totalH))
  }
  
  let proses = ()=>{
    let sas = $("produk").length
    if(sas >=1){
      $("form").submit()
    }
  }

</script>
@endpush


