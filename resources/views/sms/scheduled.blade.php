{{-- Scheduled.blade for texts which is scheduled --}}

@extends('layouts.app')

@section('page-title', __("SMS Scheduling"))

@section('css')

@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center mb-4">
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
                     <th scope="col">{{__("Destination")}}</th>
                     <th scope="col">{{__("they")}}</th>
                     <th scope="col">{{__("Repeat")}}</th>
                     <th scope="col">{{__("Delivery Time")}}</th>
                     <th scope="col">{{__("Time Made")}}</th>
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
                        <td>
                           <form action="{{route('sms.scheduled.delete')}}" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{$sms->id}}">
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                           </form>
                           <a name="" id="" class="btn btn-primary btn-sm mt-1" href="{{route('sms.scheduled.edit', ['id' => $sms->id])}}" role="button">Edit</a>
                        </td>
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
