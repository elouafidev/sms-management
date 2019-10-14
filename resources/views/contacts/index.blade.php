@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <ul class="list-group">
                  @foreach ($contacts as $contact)
                     <li class="list-group-item">{{$contact->name}}</li>
                  @endforeach
               </ul>
           </div>
       </div>
   </div>
</div>
@endsection