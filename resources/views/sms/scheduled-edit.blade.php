@extends('layouts.app')

@section('page-title')
   {{__("SMS Scheduling")}}
@endsection

@section('css')

@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <h2><strong>@yield('page-title')</strong></h2>
         <a name="" id="" class="btn btn-light float-right" href="{{route('sms.scheduled')}}" role="button">{{__("Scheduled SMS List")}}</a>
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-8">
         @if (session('status'))
            {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>{{ session('status')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div> --}}
         @endif
      </div>
   </div>
   <div class="row justify-content-center">
       <div class="col-md-8">
           <form action="{{route('sms.scheduled.update')}}" method="post">
            @csrf
               <input type="hidden" name="id" value="{{$sms->id}}">
               <input type="hidden" name="prev_page" value="{{$prev_page}}">
               <div class="form-group">
                  <label for="phone_number">{{__("phone number ")}}</label>
                  <input type="text"
                     class="form-control" name="phone_number" id="phone_number" aria-describedby="helpId" placeholder="081234567891"
                     value="{{$sms->phone_number}}">
                  <small id="helpId" class="form-text text-muted"></small>
               </div>
               <div class="form-group">
                  <label for="sms_content">{{__("Contents of SMS")}}</label>
                  <textarea class="form-control" name="sms_content" id="sms_content" rows="3">{{$sms->sms_content}}</textarea>
               </div>
               <div class="form-group">
                  <div class="custom-control custom-radio custom-control-inline">
                     <input type="radio" id="once" name="repeat" class="custom-control-input" value="0"  {{( $sms->repeat == 0) ? 'checked=checked' : "" }}>
                     <label class="custom-control-label" for="once">{{__("Only once")}}</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                     <input type="radio" id="repeated" name="repeat" class="custom-control-input" value="1" {{( $sms->repeat == 1) ? 'checked=checked' : ""}}>
                     <label class="custom-control-label" for="repeated">{{__("Repeat Every Month")}}</label>
                  </div>
               </div>

               <div class="form-group">
                 <label for="">{{__("Date and Time")}}</label>
                 <input value="{{$sms->day . " " . date("H:i", strtotime($sms->time))}}" type='text' name="date" class="datepicker-here form-control" id="datepicker1" data-position="bottom right" data-timepicker="true" data-language='en' aria-describedby="helpId"/>
                 {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
               </div>

               <button type="submit" class="btn btn-primary">{{__("Send")}}</button>
           </form>
       </div>
   </div>
</div>
@endsection

@section('js')
<script>
$('#datepicker1').datepicker({
       navTitles: {
           days: '<h3>Check in date:</h3> MM, yyyy'
       }
   })
</script>
@endsection
