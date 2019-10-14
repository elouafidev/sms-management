{{-- Scheduled.blade for texts which is scheduled --}}

@extends('layouts.app')

@section('page-title', 'SMS Terkirim')

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
                     <th scope="col">Waktu Kirim</th>
                     <th scope="col">Tujuan</th>
                     <th scope="col">Isi</th>
                     <th scope="col">Status</th>
                     <th scope="col"></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($sentItems as $key => $sentItem)
                     <tr>
                        <th scope="row">{{$key + 1 + (($sentItems->currentPage() - 1) * $sentItems->perPage())}}</th>
                        <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($sentItem->SendingDateTime))->isoFormat('LLLL')}}</td>
                        <td>{{$sentItem->DestinationNumber}}</td>
                        <td>{{$sentItem->TextDecoded}}</td>
                        <td>{{$sentItem->Status}}</td>
                        {{-- <td>{{$inbox->created_at->diffForHumans()}}</td> --}}
                        <td>
                           <a name="" id="" class="btn btn-danger btn-sm" href="{{route('sms.sent.delete', ['id' => $sentItem])}}" role="button">Delete</a>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="6">
                        {{$sentItems->appends(Request::all())->links()}}
                     </td>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection