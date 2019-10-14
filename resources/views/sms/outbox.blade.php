{{-- Scheduled.blade for texts which is scheduled --}}

@extends('layouts.app')

@section('page-title')
   SMS Keluar
@endsection

@section('css')
   
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <h2><strong>@yield('page-title')</strong></h2>
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="table-responsive-md">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">No Tujuan</th>
                     <th scope="col">Isi</th>
                     <th scope="col">Status</th>
                     <th scope="col">Waktu Kirim</th>
                     <th scope="col"></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($outboxes as $key => $outbox)
                     <tr>
                        <th scope="row">{{$key + 1 + (($outboxes->currentPage() - 1) * $outboxes->perPage())}}</th>
                        <td>{{$outbox->DestinationNumber}}</td>
                        <td>{{$outbox->TextDecoded}}</td>
                        <td>{{$outbox->Status}}</td>
                        <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($outbox->SendingDateTime))->diffForHumans()}}</td>
                        <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                     </tr>
                  @endforeach
               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="6">
                        {{$outboxes->appends(Request::all())->links()}}
                     </td>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection