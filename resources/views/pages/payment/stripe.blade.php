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
                  <li class="list-group-item">Kupon Diskon : ({{ Session::get('coupon')['name'] }} {{ Session::get('coupon')['discount'] }}%) <a href="{{ route('coupon.remove') }}" class="btn btn-sm btn-danger">x</a><span style="float: right">@rupiah(Session::get('coupon')['balance'])</span></li>
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
                  <div class="contact_form_title text-center">Metode Pembayaran</div>
                  
                  <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
                     @csrf
                     <div class="form-row">
                        <label for="card-element">
                           Kartu Kredit atau Debit
                        </label>
                        <div id="card-element">
                           <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                     </div>

                     <input type="hidden" name="shipping" value="{{ $charge }}">
                     <input type="hidden" name="vat" value="{{ $ppn*Cart::Subtotal() }}">
                     @if(Session::has('coupon'))
                     <input type="hidden" name="total" value="{{ Cart::Subtotal()-Session::get('coupon')['balance']+$charge+$ppn*Cart::Subtotal() }}">
                     @else
                     <input type="hidden" name="total" value="{{ Cart::Subtotal()+$charge+$ppn*Cart::Subtotal() }}">
                     @endif
                     <input type="hidden" name="ship_name" value="{{ $data['name'] }}">
                     <input type="hidden" name="ship_phone" value="{{ $data['phone'] }}">
                     <input type="hidden" name="ship_email" value="{{ $data['email'] }}">
                     <input type="hidden" name="ship_city" value="{{ $data['city'] }}">
                     <input type="hidden" name="ship_address" value="{{ $data['address'] }}">
                     <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">

                     <button class="btn btn-success mt-3">Bayar Sekarang!</button>
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
<style>
      /**
   * The CSS shown here will not be introduced in the Quickstart guide, but shows
   * how you can use CSS to style your Element's container.
   */
   .StripeElement {
   box-sizing: border-box;

   height: 40px;
   width: 100%;

   padding: 10px 12px;

   border: 1px solid transparent;
   border-radius: 4px;
   background-color: white;

   box-shadow: 0 1px 3px 0 #e6ebf1;
   -webkit-transition: box-shadow 150ms ease;
   transition: box-shadow 150ms ease;
   }

   .StripeElement--focus {
   box-shadow: 0 1px 3px 0 #cfd7df;
   }

   .StripeElement--invalid {
   border-color: #fa755a;
   }

   .StripeElement--webkit-autofill {
   background-color: #fefde5 !important;}
</style>
@endpush
@push('js')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('public/frontend/js/contact_custom.js') }}"></script>
<script>
   // Create a Stripe client.
   var stripe = Stripe('pk_test_51HVdBaHq9i7NsMLEbDdWOdwviv0Ou0bAHi0Ho14PAGpoJ9crH0qIKTsAvIdbumngE08z4R9Yj4ceK0JjE0hEDXCJ00cYcVnjGa');

   // Create an instance of Elements.
   var elements = stripe.elements();

   // Custom styling can be passed to options when creating an Element.
   // (Note that this demo uses a wider set of styles than the guide below.)
   var style = {
      base: {
         color: '#32325d',
         fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
         fontSmoothing: 'antialiased',
         fontSize: '16px',
         '::placeholder': {
            color: '#aab7c4'
         }
      },
      invalid: {
         color: '#fa755a',
         iconColor: '#fa755a'
      }
   };

   // Create an instance of the card Element.
   var card = elements.create('card', {style: style});

   // Add an instance of the card Element into the `card-element` <div>.
   card.mount('#card-element');
   // Handle real-time validation errors from the card Element.
   card.on('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
         displayError.textContent = event.error.message;
      } else {
         displayError.textContent = '';
      }
   });

   // Handle form submission.
   var form = document.getElementById('payment-form');
   form.addEventListener('submit', function(event) {
      event.preventDefault();

      stripe.createToken(card).then(function(result) {
         if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
         } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
         }
      });
   });

   // Submit the form with the token ID.
   function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      // Submit the form
      form.submit();
   }
</script>
@endpush
