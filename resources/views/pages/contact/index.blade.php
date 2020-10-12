@extends('layouts.app')
@section('content')
@include('layouts.menubar')
@php
   $site = DB::table('sitesettings')->first();
@endphp
<div class="contact_info">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1">
            <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

               <!-- Contact Item -->
               <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                  <div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
                  <div class="contact_info_content">
                     <div class="contact_info_title">No Telepon</div>
                     <div class="contact_info_text">{{ $site->phone_1 }} / {{ $site->phone_2 }}</div>
                  </div>
               </div>

               <!-- Contact Item -->
               <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                  <div class="contact_info_image"><img src="images/contact_2.png" alt=""></div>
                  <div class="contact_info_content">
                     <div class="contact_info_title">Email</div>
                     <div class="contact_info_text">{{ $site->email }}</div>
                  </div>
               </div>

               <!-- Contact Item -->
               <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                  <div class="contact_info_image"><img src="images/contact_3.png" alt=""></div>
                  <div class="contact_info_content">
                     <div class="contact_info_title">Alamat</div>
                     <div class="contact_info_text">{{ $site->address }}</div>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
</div>

<!-- Contact Form -->

<div class="contact_form">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1">
            <div class="contact_form_container">
               <div class="contact_form_title">Get in Touch</div>

               <form action="{{ route('contact.form') }}" method="POST" id="contact_form">
                  @csrf
                  <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                     <input name="name" type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Namamu" required="required" data-error="Nama harus dimasukan">
                     <input name="email" type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="Emailmu" required="required" data-error="Email harus dimasukan">
                     <input name="phone" type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Nomor Teleponmu" required="required" data-error="Nomor Telepon harus dimasukan">
                  </div>
                  <div class="contact_form_text">
                     <textarea name="message" id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Pesan" required="required" data-error="Tolong Berikan Pesan Anda"></textarea>
                  </div> 
                  <div class="contact_form_button">
                     <button type="submit" class="button contact_submit_button">Send Message</button>
                  </div>
               </form>

            </div>
         </div>
      </div>
   </div>
   <div class="panel"></div>
</div>

<!-- Map -->

<div class="contact_map">
   <div id="google_map" class="google_map">
      <div class="map_container">
         <div id="map"></div>
      </div>
   </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">
@endpush
@push('js')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="{{ asset('public/frontend/js/contact_custom.js') }}"></script>
@endpush