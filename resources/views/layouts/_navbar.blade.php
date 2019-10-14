@guest
@else
<ul class="navbar-nav ml-auto">
   <li class="nav-item">
      <a class="nav-link btn btn-light" href="{{route('phone.index')}}">Dashboard <span class="sr-only">(current)</span></a>
   </li>
   <li class="nav-item">
      <div class="dropdown">
         <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            SMS
         </button>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('sms.index')}}">SMS Sekarang</a>
            <a class="dropdown-item" href="{{route('sms.schedule')}}">Penjadwalan SMS</a>
            <a class="dropdown-item" href="{{route('sms.inbox')}}">SMS Masuk</a>
            <a class="dropdown-item" href="{{route('sms.outbox')}}">SMS Keluar</a>
            <a class="dropdown-item" href="{{route('sms.sent')}}">SMS Terkirim</a>
         </div>
      </div>
      
   </li>

</ul>
@endguest