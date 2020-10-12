@extends('layouts.app')
@section('content')
@include('layouts.menubar')
<div class="cart_section">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="cart_container">
               <div class="cart_title">Wishlist</div>
               <div class="cart_items">
                  <ul class="cart_list">
                     @foreach ($product as $row)
                     <li class="cart_item clearfix">
                        <div class="cart_item_image text-center"><img src="{{ asset($row->image_1)}}" alt=""></div>
                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                           <div class="cart_item_name cart_info_col">
                              <div class="cart_item_title">Nama</div>
                              <div class="cart_item_text text-uppercase">{{ $row->name }}</div>
                           </div>
                           @if($row->color == null)
                           @else
                           <div class="cart_item_color cart_info_col">
                              <div class="cart_item_title">Warna</div>
                              <div class="cart_item_text text-uppercase">{{ $row->color }}</div>
                           </div>
                           @endif
                           @if($row->size == null)
                           @else
                           <div class="cart_item_size cart_info_col">
                              <div class="cart_item_title">Ukuran</div>
                              <div class="cart_item_text text-uppercase">{{ $row->size }}</div>
                           </div>
                           @endif
                           <div class="cart_item_total cart_info_col text-center">
                              <div class="cart_item_title">Action</div>
                              <a href="" class="btn btn-primary btn-sm cart_item_text">Masukan Ke Keranjang</a>
                           </div>
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">
@endpush
@push('js')
<script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>
@endpush