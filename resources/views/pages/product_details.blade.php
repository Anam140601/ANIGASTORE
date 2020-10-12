@extends('layouts.app')
@section('content')
@include('layouts.menubar')
   <!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{ asset($product->image_1) }}"><img src="{{ asset($product->image_1) }}" alt=""></li>
						<li data-image="{{ asset($product->image_2) }}"><img src="{{ asset($product->image_2) }}" alt=""></li>
						<li data-image="{{ asset($product->image_3) }}"><img src="{{ asset($product->image_3) }}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset($product->image_1) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category text-uppercase">{{ $product->category_name }}</div>
						<div class="product_name text-uppercase">{{ $product->name }}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>{!! str_limit($product->detail, $limit = 450) !!}</p></div>
						<div class="order_info d-flex flex-row">
                     <form action="{{ url('cart/product/add/'.$product->id) }}" method="post">
                        @csrf
								<div class="clearfix" style="z-index: 1000;">
                           <div class="row">
                              @if($product->color == null)
                              @else
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="color">Warna</label>
                                    <select name="color" class="form-control input-lg" id="color">
                                       @foreach ($color as $color)
                                          <option value="{{ $color }}">{{ $color }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              @endif
                              @if($product->size == null)
                              @else
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="size">Ukuran</label>
                                    <select name="size" class="form-control input-lg" id="size">
                                       @foreach ($size as $size)
                                          <option value="{{ $size }}">{{ $size }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              @endif
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="qty">Jumlah</label>
                                    <input type="number" name="qty" min="1" class="form-control" value="1" pattern="[0-9]" id="qty">
                                 </div>
                              </div>
                           </div>
								</div>

                        @if($product->discount_price == null)
                        <div class="product_price" style="color: red">@rupiah($product->selling_price)</div>
                        @else
                        <div class="product_price" style="color: red">@rupiah($product->discount_price) <h4 style="color: black"><del>@rupiah($product->selling_price)</del></h4></div>
                        @endif
								<div class="button_container">
									<button type="submit" class="button cart_button">Masukan Ke Keranjang</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								<!-- Go to www.addthis.com/dashboard to customize your tools -->
								<div class="mt-5 addthis_inline_share_toolbox_ncu4"></div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Deskripsi Produk</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Deskripsi</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Video</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Review</a>
                  </li>
               </ul>
               <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab"><br>{!! $product->detail !!}</div>
                  <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab"><br><a href="{{ $product->video_link }}">{{ $product->video_link }}</a></div>
						<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab"><br>
							<div id="fb-root"></div>
							<h3>Ulasan Produk</h3>
							<div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width=""></div>
						</div>
               </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_1.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_2.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_3.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_4.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_5.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_6.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_7.jpg') }}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend/images/brands_8.jpg') }}" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="{{ asset('public/frontend/images/send.png" al') }}t=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/product_responsive.css')}}">
@endpush
@push('js')
<script src="{{ asset('public/frontend/js/product_custom.js')}}"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e9e4256855b7795"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v8.0" nonce="5gHMkqnz"></script>
@endpush