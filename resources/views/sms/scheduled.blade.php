{{-- Scheduled.blade for texts which is scheduled --}}

@extends('layouts.app')

@section('page-title')
   Penjadwalan SMS
@endsection

@section('css')
   
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <h2><strong>@yield('page-title')</strong></h2>
         <button type="button" class="btn btn-light float-right">Daftar SMS Terjadwal</button>
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="table-responsive-md">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Tujuan</th>
                     <th scope="col">Isi</th>
                     <th scope="col">Ulangi</th>
                     <th scope="col">Wkt Kirim</th>
                     <th scope="col">Wkt Dibuat</th>
                     <th scope="col"></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($smses as $key => $sms)
                     <tr>
                        <th scope="row">{{$key + 1 + (($smses->currentPage() - 1) * $smses->perPage())}}</th>
                        <td>{{$sms->phone_number}}</td>
                        <td>{{$sms->sms_content}}</td>
                        <td>{{$sms->repeat ? app('PhpEmoji')->decode('\u2714') : app('PhpEmoji')->decode('\u274c') }}</td>
                        <td>{{$sms->day . " " . substr($sms->time, 0, -3)}}</td>
                        <td>{{$sms->created_at->diffForHumans()}}</td>
                        <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                     </tr>
                  @endforeach
               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="7">
                        {{$smses->appends(Request::all())->links()}}
                     </td>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection