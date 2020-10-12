@extends('layouts.app')
@section('content')
@include('layouts.menubar')
<div class="cart_section">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="cart_container">
               <div class="cart_title">Keranjang</div>
               <div class="cart_items">
                  <ul class="cart_list">
                     @foreach ($cart as $row)
                     <li class="cart_item clearfix">
                        <div class="cart_item_image text-center"><img src="{{ asset($row->options->image)}}" alt=""></div>
                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                           <div class="cart_item_name cart_info_col">
                              <div class="cart_item_title text-center">Nama</div>
                              <div class="cart_item_text text-uppercase">{{ $row->name }}</div>
                           </div>
                           @if($row->options->color == null)
                           @else
                           <div class="cart_item_color cart_info_col">
                              <div class="cart_item_title text-center">Warna</div>
                              <div class="cart_item_text text-uppercase">{{ $row->options->color }}</div>
                           </div>
                           @endif
                           @if($row->options->size == null)
                           @else
                           <div class="cart_item_size cart_info_col">
                              <div class="cart_item_title text-center">Ukuran</div>
                              <div class="cart_item_text text-uppercase">{{ $row->options->size }}</div>
                           </div>
                           @endif
                           <div class="cart_item_quantity cart_info_col">
                              <div class="cart_item_title text-center">Jumlah</div>
                              <form action="{{ route('update.cartItem') }}" method="post" class="cart_item_text">
                                 @csrf
                                 <input type="hidden" name="productId" value="{{ $row->rowId }}">
                                 <input type="number" name="qty" min="1" value="{{ $row->qty }}" style="width: 50px">
                                 <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                              </form>
                           </div>
                           <div class="cart_item_price cart_info_col">
                              <div class="cart_item_title text-center">Harga</div>
                              <div class="cart_item_text">@rupiah($row->price)</div>
                           </div>
                           <div class="cart_item_total cart_info_col">
                              <div class="cart_item_title text-center">Total</div>
                              <div class="cart_item_text">@rupiah($row->price*$row->qty)</div>
                           </div>
                           <div class="cart_item_total cart_info_col text-center">
                              <div class="cart_item_title text-center">Action</div>
                              <a href="{{ url('remove/cart/'.$row->rowId) }}" class="btn btn-danger btn-sm cart_item_text">X</a>
                           </div>
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
               
               <!-- Order Total -->
               <div class="order_total">
                  <div class="order_total_content text-md-right">
                     <div class="order_total_title">Total Pesanan:</div>
                     <div class="order_total_amount">@rupiah(Cart::Subtotal())</div>
                  </div>
               </div>

               <div class="cart_buttons">
                  <button type="button" class="button cart_button_clear">Hapus Semua</button>
                  <a href="{{ route('user.checkout') }}" class="button cart_button_checkout">Checkout</a>
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