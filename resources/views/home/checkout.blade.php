@extends('layouts.app')

@section('cart')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row">

                        <section class="shop checkout section">
        <div class="container">
         
                <form class="form" method="POST" action="{{url('order')}}">
                    @csrf
                    <div class="row"> 

                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                                <h2>Complete Your Purchase</h2>
                                <p>Just a few more steps to complete your purchase securely!</p>
                                <!-- Form -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>First Name<span>*</span></label>
                                            <input type="text" name="first_name" placeholder="" value="" value="" required>
                                            @error('first_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Last Name<span>*</span></label>
                                            <input type="text" name="last_name" placeholder="" value="{{Auth::user()->name}}" required>
                                            @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email<span>*</span></label>
                                            <input type="email" name="email" placeholder="" value="{{Auth::user()->email}}" required>
                                            @error('email')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nomor Telepon <span>*</span></label>
                                            <input type="number" name="phone" placeholder="" required value="{{Auth::user()->phone}}">
                                            @error('phone')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Kabupaten/Kota<span>*</span></label>
                                            <input type="text" name="kab" placeholder="" value="" required>
                                            @error('email')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Kecamatan<span>*</span></label>
                                            <input type="text" name="kec" placeholder="" value="" required>
                                            @error('email')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Alamat<span>*</span></label>
                                            <input type="text" name="address" placeholder="" value="{{Auth::user()->address}}">
                                            @error('address1')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                  
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Kode Pos</label>
                                            <input type="text" name="post_code" placeholder="" value="">
                                            @error('post_code')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                        
                                <!--/ End Form -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                        <div class="shipping">

                                <div class="card text-white rounded-3" style="background-color:rgb(67, 170, 255)">
                                    <div class="card-body">
                                        <div class="order-details">

                                    <div class="single-widget">
                                    <h2 style="color:white;">Total Belanja</h2>
                                    <div class="content">

                                    <div class="d-flex justify-content-between mt-3">
                                        <p class="mb-2">Subtotal</p>
                                        <p class="mb-2" name="subtotal">Rp. {{number_format($harga,0,',','.')}}</p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Ongkos Kirim</p>
                                        <p class="mb-2">Gratis Ongkir</p>
                                    </div>

                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-2">Total</p>
                                        <p class="mb-2" name="total" value="{{$harga}}">Rp. {{number_format(($harga),0,',','.')}}</p>
                                    </div>

                                    <hr class="my-2">

                                    <div class="single-widget">
                                    <h2 style="color:white;">Payment Methods</h2>
                                    <div class="content">

                                    <div class="checkbox">
                                    {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                    <form-group>
                                        <input name="payment_method"  type="radio" value="cod" required> <label> Cash On Delivery</label><br>
                                        <!-- <input name="payment_method"  type="radio" value="paypal"> <label> PayPal</label><br> -->
                                        <input name="payment_method"  type="radio" value="cardpay" required> <label> Card Payment</label><br>
                                
                                    <div id="creditCardDetails" style="display: none;">
                                      <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
                                            <h5 class="mb-0">Card details</h5>
                                            <img class="img-fluid rounded-3"
                                                src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Avatar"
                                                style="width: 45px;">
                                        </div>

                                        <p class="small mb-2">Card type</p>
                                        <a class="text-white" type="submit" href="#!"><i
                                                class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                        <a class="text-white" type="submit" href="#!"><i
                                                class="fab fa-cc-visa fa-2x me-2"></i></a>
                                        <a class="text-white" type="submit" href="#!"><i
                                                class="fab fa-cc-amex fa-2x me-2"></i></a>
                                        <a class="text-white" type="submit" href="#!"><i
                                                class="fab fa-cc-paypal fa-2x"></i></a>

                                        <form class="mt-5">
                                            <div class="form-outline form-white mb-4 mt-3">
                                                <input class="form-control form-control-lg" type="text" id="cardName" name="card_name"/>
                                                <label class="form-label" for="typeName">Cardholder's Name</label>
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <input class="form-control form-control-lg" id="cardNumber" name="card_number" maxlength="16" />
                                                <label class="form-label" for="typeText">Card Number</label>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input class="form-control form-control-lg" type="text" id="expirationDate" name="expiration_date" maxlength="5" />
                                                        <label class="form-label" for="typeExp">Expiration</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input class="form-control form-control-lg" type="text" id="cvv" name="cvv" maxlength="3" />
                                                        <label class="form-label" for="typeText">Cvv</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    @php
                                    $random = 'ORD-'.strtoupper(Str::random(10));
                                    @endphp
                                    <input type="hidden" name="order_number" class="value" value="{{$random}}">

                                            </form-group>

                                            <button class="btn btn-dark btn-block btn-lg mt-3" type="submit">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Rp. {{number_format(($harga),0,',','.')}}</span>
                                                <span>Order <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                            </div>
                                        </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                    </section>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('input[name="payment_method"]').change(function() {
            if ($(this).val() === 'cardpay') {
                $('#creditCardDetails').show();
            } else {
                $('#creditCardDetails').hide();
            }
        });
    });
</script>
@endpush