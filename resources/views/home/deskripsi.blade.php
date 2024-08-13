@extends('layouts.app')
@section('deskripsi')
    <section class="home deskripsi section">
                <div class="card">
                    <div class="card-body p-4">
                                <h5 class="mb-3"><a class="text-body" href="/dashboard"><i
                                            class="fas fa-long-arrow-alt-left me-2"></i>Kembali</a></h5>
                                <hr>							
								<div class="row">
									<div class="col-lg-6 col-12">
										<!-- Product Slider -->
										<div class="product-gallery">
											<!-- Images slider -->
											<div class="flexslider-thumbnails">
                                                <ul class="slides">
                                                        <img src="/products/{{$data->gambar}}" alt="" height="400px" width="300px">		
												</ul>
											</div>
											<!-- End Images slider -->
										</div>
										<!-- End Product slider -->
									</div>
									<div class="col-lg-6 col-12">
										<div class="product-des">
											<!-- Description -->
											<div class="short">
												<h4>{{$data->judul}}</h4>
                                                <h5>{{$data->penulis}}</h5>
												<div class="rating-main">
                                                <ul class="rating">
                                                    <i><svg fill="#FCE205" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg></i>
                                                    <i><svg fill="#FCE205" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg></i>
                                                    <i><svg fill="#FCE205" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg></i>
                                                    <i><svg fill="#FCE205" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                    </svg></i>
                                                    <i><svg fill="#FCE205" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                                    </svg></i>
                                                    </ul>
													<a href="#" class="total-review">  (0) Ulasan Pelanggan</a>
                                                </div>
                                                @php
                                                  $harga_diskon=($data->harga-(($data->harga*$data->diskon)/100));
                                                @endphp
												<p class="price"><span class="discount">Rp. {{number_format($harga_diskon,2,",",".")}}</span>
                                                @if(!empty($data->diskon))
                                                <s>Rp.{{number_format($data->harga,2,",",".")}}</s>
                                                @endif 
                                            </p>
												<p class="description">{!!($data->deskripsi)!!}</p>
											</div>

                                            <p class="cat">Category : <a href="">{{$data->kategori}}</a></p>
											<p class="availability"> Stock : {{$data->jumlah}}
                                            </p>
                                            <div class="product-buy">
												<form action="{{url('singleAddToCart')}}" method="POST">
													@csrf 
													<div class="quantity">
														<h6>Quantity :</h6>
														<!-- Input Order -->
														<div class="input-group">
															<div class="button minus">
																<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
																	<i class="bi bi-dash"></i>
																</button>
															</div>
															<input type="hidden" name="id_produk" value="{{$data->id}}">
															<input type="text" name="quant[1]" class="form-control input-number"  min="1" max="100" value="1" id="quantity">
															<div class="button plus">
																<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
																	<i class="bi bi-plus"></i>
																</button>
															</div>
														</div>
													<!--/ End Input Order -->
													</div>
													<div class="add-to-cart mt-4">
													<button type="submit" class="btn">Add to cart</button>
														<a href="{{url('bookmark',$data->id)}}" class="btn min"><i class="bi bi-bookmark"></i></a>
													</div>
												</form>
												</div>
									</div>
</section>
@endsection

