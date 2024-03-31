{{-- Scheduled.blade for texts which is scheduled --}}

@extends('layouts.app')

@section('page-title')
   {{__("Incoming SMS")}}
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
                     <th scope="col">{{__("Sender")}}</th>
                     <th scope="col">{{__("they")}}</th>
                     <th scope="col">{{__("Accepted")}}</th>
                     <th scope="col"></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($inboxes as $key => $inbox)
                     <tr>
                        <th scope="row">{{$key + 1 + (($inboxes->currentPage() - 1) * $inboxes->perPage())}}</th>
                        <td>{{$inbox->SenderNumber}}</td>
                        <td>{{$inbox->TextDecoded}}</td>
                        <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($inbox->ReceivingDateTime))->diffForHumans()}}</td>
                        {{-- <td>{{$inbox->created_at->diffForHumans()}}</td> --}}
                        <td>
                           <a name="" id="" class="btn btn-danger btn-sm" href="{{route('sms.inbox.delete', ['id' => $inbox->ID])}}" role="button">Delete</a>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="5">
                        {{$inboxes->appends(Request::all())->links()}}
                     </td>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection
