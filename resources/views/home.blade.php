@extends('layouts.app')
@section('content')
<div class="contact_form">
   <div class="container">
      <div class="row">
         <div class="col-8 card">
            <table class="table table-response">
               <thead>
                  <tr>
                     <th scope="col">Bayar Dengan</th>
                     {{-- <th scope="col">Kode Pembayaran</th> --}}
                     <th scope="col">Jumlah</th>
                     <th scope="col">Kode Status</th>
                     <th scope="col">Status</th>
                     <th scope="col">Tanggal</th>
                     <th scope="col"></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($order as $row)
                  <tr>
                     <td scope="col" class="text-uppercase">{{ $row->payment_type }}</td>
                     {{-- <td scope="col">{{ $row->payment_id }}</td> --}}
                     <td scope="col">@rupiah($row->total)</td>
                     <td scope="col">{{ $row->status_code }}</p></td>
                     <td scope="col">
                        @if($row->status == 0)
                        <span class="badge badge-warning">Menunggu Konfirmasi</span>
                        @elseif($row->status == 1)
                        <span class="badge badge-info">Sedang Diproses</span>
                        @elseif($row->status == 2)
                        <span class="badge badge-primary">Sedang Dikirim</span>
                        @elseif($row->status == 3)
                        <span class="badge badge-success">Selesai</span>
                        @else
                        <span class="badge badge-danger">Batal</span>
                        @endif
                     </td>
                     <td scope="col">{{ $row->date }}</td>
                     <td scope="col">
                        <a href="" class="btn btn-sm btn-primary">Lihat</a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         <div class="col-4">
            <div class="card">
               <img src="{{ asset(Auth::user()->avatar) }}" alt="" class="card-img-top" style="border-radius: 50%;height: 90px;width: 90px;margin-left: 37%">
               <div class="card-body">
                  <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
               </div>
               <ul class="list-group list-group-flush">
                  <li class="list-group-item"><a href="{{ route('password.change') }}" style="color: black">Ubah Kata Sandi</a></li>
                  <li class="list-group-item"><a href="{{ route('password.change') }}" style="color: black">Edit Profil</a></li>
                  <li class="list-group-item"><a href="{{ route('success.order.list') }}" style="color: black">Pengembailan Pesanan</a></li>
               </ul>
               <div class="card-body">
                  <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block"><i class="fas fa-power-off"></i> Keluar</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
