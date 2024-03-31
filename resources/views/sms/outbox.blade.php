{{-- Scheduled.blade for texts which is scheduled --}}

@extends('layouts.app')

@section('page-title')
   {{__("Outgoing SMS")}}
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
                     <th scope="col">{{__("No Destination")}}</th>
                     <th scope="col">{{__("they")}}</th>
                     <th scope="col">{{__("Status")}}</th>
                     <th scope="col">{{__("Delivery Time")}}</th>
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
                        <td>
                           <a name="" id="" class="btn btn-danger btn-sm" href="{{route('sms.outbox.delete', ['id' => $outbox->ID])}}" role="button">Delete</a>
                        </td>
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
