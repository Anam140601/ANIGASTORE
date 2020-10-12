@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<div class="contact_form">
   <div class="container">
      <div class="row">
         <div class="col-lg-7" style="border:1px solid grey; padding:20px; border-radius:25px;">
            <div class="contact_form_container">
               <div class="contact_form_title text-center">Daftar Produk</div>
               <div class="cart_items">
                  <ul class="cart_list">
                     @foreach ($cart as $row)
                     <li class="cart_item clearfix">
                        
                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between text-center">
                           <div class="cart_item_name cart_info_col">
                              <div class="cart_item_image text-center"><img src="{{ asset($row->options->image)}}" alt="" width="70px"></div>
                           </div>
                           <div class="cart_item_name cart_info_col">
                              <div class="cart_item_title font-weight-bold">Nama</div>
                              <div class="cart_item_text text-uppercase">{{ $row->name }}</div>
                           </div>
                           @if($row->options->color == null)
                           @else
                           <div class="cart_item_color cart_info_col">
                              <div class="cart_item_title font-weight-bold">Warna</div>
                              <div class="cart_item_text text-uppercase">{{ $row->options->color }}</div>
                           </div>
                           @endif
                           @if($row->options->size == null)
                           @else
                           <div class="cart_item_size cart_info_col">
                              <div class="cart_item_title font-weight-bold">Ukuran</div>
                              <div class="cart_item_text text-uppercase">{{ $row->options->size }}</div>
                           </div>
                           @endif
                           <div class="cart_item_quantity cart_info_col">
                              <div class="cart_item_title font-weight-bold">Jumlah</div>
                              <div class="cart_item_text">{{ $row->qty }}</div>
                           </div>
                           <div class="cart_item_price cart_info_col">
                              <div class="cart_item_title font-weight-bold">Harga</div>
                              <div class="cart_item_text">@rupiah($row->price)</div>
                           </div>
                           <div class="cart_item_total cart_info_col">
                              <div class="cart_item_title font-weight-bold">Total</div>
                              <div class="cart_item_text">@rupiah($row->price*$row->qty)</div>
                           </div>
                        </div>
                     </li>
                     @endforeach
                  </ul>
               </div>
               <ul class="list-group col-md-8" style="float: right">
                  <li class="list-group-item">Subtotal : <span style="float: right">@rupiah(Cart::Subtotal())</span></li>
                  @if(Session::has('coupon'))
                  <li class="list-group-item">Kupon Diskon : ({{ Session::get('coupon')['name'] }} {{ Session::get('coupon')['discount'] }}%) <span style="float: right">@rupiah(Session::get('coupon')['balance'])</span></li>
                  @else
                  <li class="list-group-item">Kupon Diskon : <span style="float: right">Rp. 0</span></li>
                  @endif
                  <li class="list-group-item">Ongkos Kirim : <span style="float: right">@rupiah($charge)</span></li>
                  <li class="list-group-item">Pajak ({{ $vat }}%) dari Subtotal : <span style="float: right">@rupiah($ppn*Cart::Subtotal())</span></li>
                  @if(Session::has('coupon'))
                  <li class="list-group-item">Total : <span style="float: right">@rupiah(Cart::Subtotal()-Session::get('coupon')['balance']+$charge+$ppn*Cart::Subtotal())</span></li>
                  @else
                  <li class="list-group-item">Total : <span style="float: right">@rupiah(Cart::Subtotal()+$charge+$ppn*Cart::Subtotal())</span></li>
                  @endif
               </ul>
            </div>
         </div>
         <div class="col-lg-5" style="border:1px solid grey; padding:20px; border-radius:25px;">
               <div class="contact_form_container">
                  <div class="contact_form_title text-center">Alamat Penerima</div>
                  <form action="{{ route('payment.process') }}" method="POST">
                     @csrf
                     <div class="form-group">
                        <label >Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Masukan Nama Lengkap">
                        @error('name')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label >Nomor Telepone</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Masukan No Telepon">
                        @error('phone')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label >Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukan Email">
                        @error('email')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label >City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="Masukan Kota">
                        @error('city')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label >Alamat Lengkap</label>
                        <textarea name="address" id="" cols="30" rows="4" class="form-control @error('address') is-invalid @enderror" required autocomplete="address" value="{{ old('address') }}" placeholder="Masukan Alamat Lengkap"></textarea>
                        @error('address')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <div class="contact_form_title text-center">Bayar Dengan </div>
                        <ul class="logos_list">
                           <label><input type="radio" name="payment" value="stripe"><img src="{{ asset('public/frontend/images/mastercard.png') }}" alt="" height="80px"></label>
                           <label><input type="radio" name="payment" value="paypal"><img src="{{ asset('public/frontend/images/paypal.png') }}" alt="" height="70px"></label>
                           <label><input type="radio" name="payment" value="ideal"><img src="{{ asset('public/frontend/images/mollie.png') }}" alt="" height="70px"></label>
                        </ul>
                     </div>
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary">Bayar</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   <div class="panel"></div>
</div>
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">
<style type="text/css">
   label > input{
      visibility: hidden; 
      position: absolute; 
   }
   label > input + img{
      cursor:pointer;
      border:2px solid transparent;
   }
   label > input:checked + img{
      border:2px solid rgb(0, 132, 255);
   }
</style>
@endpush
@push('js')
<script src="{{ asset('public/frontend/js/contact_custom.js') }}"></script>
@endpush
