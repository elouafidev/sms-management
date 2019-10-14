@extends('layouts.app')

@section('page-title')
    SMS Sekarang
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
         @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>{{ session('status')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         @endif
      </div>
   </div>
   <div class="row justify-content-center">
       <div class="col-md-8">
           <form action="{{route('sms.store')}}" method="post">
            @csrf
               <div class="form-group">
                  <label for="phone_number">Nomor Handphone</label>
                  <input type="text"
                     class="form-control" name="phone_number" id="phone_number" aria-describedby="helpId" placeholder="081234567891">
                  <small id="helpId" class="form-text text-muted"></small>
               </div>
               <div class="form-group">
                  <label for="sms_content">Isi SMS</label>
                  <textarea class="form-control" name="sms_content" id="sms_content" rows="3"></textarea>
               </div>
               <button type="submit" class="btn btn-primary">Kirim</button>
           </form>
       </div>
   </div>
</div>
@endsection