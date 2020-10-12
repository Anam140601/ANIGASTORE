@extends('layouts.app')
@section('content')
<div class="contact_form"></div>
   <div class="container">
      <div class="row">
         <div class="col-5 offset-lg-1">
            <div class="contact_form_title"><h4>Status Pesananmu</h4></div>
            <div class="progress">
               @if($track->status == 0)
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger " role="progressbar" style="width: 12%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
               @elseif($track->status == 1)
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger " role="progressbar" style="width: 12%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning " role="progressbar" style="width: 23%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
               @elseif($track->status == 2)
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger " role="progressbar" style="width: 12%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning " role="progressbar" style="width: 23%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-info " role="progressbar" style="width: 28%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
               @elseif($track->status == 3)
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger " role="progressbar" style="width: 12%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning " role="progressbar" style="width: 23%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-info " role="progressbar" style="width: 28%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-success " role="progressbar" style="width: 37%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
               @else
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger " role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
               @endif
            </div>
            <div class="mt-4">
               @if($track->status == 0)
               <h4>Menunggu Konfirmasi Admin</h4>
               @elseif($track->status == 1)
               <h4>Pesananmu Sedang Diproses</h4>
               @elseif($track->status == 2)
               <h4>Pesananmu Sedang Dikirim</h4>
               @elseif($track->status == 3)
               <h4>Pesananmu Selesai</h4>
               @else
               <h4>Pesananmu Dibatalkan</h4>
               @endif
            </div>
         </div>
         <div class="col-5">
            <div class="contact_form_title"><h4>Detil Pesananmu</h4></div>
            <ul class="list-group col-md-12">
               <li class="list-group-item"><b>Bayar Dengan : </b>{{ $track->payment_type }}</li>
               <li class="list-group-item"><b>Kode Transaksi : </b>{{ $track->payment_id }}</li>
               <li class="list-group-item"><b>Kode Balance : </b>{{ $track->blnc_transaction }}</li>
               <li class="list-group-item"><b>Jumlah : </b>@rupiah($track->subtotal)</li>
               <li class="list-group-item"><b>Ongkos Kirim : </b>@rupiah($track->vat)</li>
               <li class="list-group-item"><b>Total : </b>@rupiah($track->total)</li>
               <li class="list-group-item"><b>Tanggal Pemesanan : </b>{{ $track->date }}</li>
               <li class="list-group-item"><b>Bulan Pemesanan : </b>{{ $track->month }}</li>
               <li class="list-group-item"><b>Tahun Pemesanan : </b>{{ $track->year }}</li>
            </ul>
         </div>
      </div>
   </div>
</div>
@endsection