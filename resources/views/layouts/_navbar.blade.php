@guest
@else
<ul class="navbar-nav ml-auto">
   <li class="nav-item">
      <a class="nav-link btn btn-light" href="{{route('phone.index')}}">{{__("Dashboard")}} <span class="sr-only">(current)</span></a>
   </li>
   <li class="nav-item">
      <div class="dropdown">
         <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            SMS
         </button>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('sms.index')}}">{{__("Text Now")}}</a>
            <a class="dropdown-item" href="{{route('sms.schedule')}}">{{__("SMS Scheduling")}}</a>
            <a class="dropdown-item" href="{{route('sms.inbox')}}">{{__("Incoming SMS")}}</a>
            <a class="dropdown-item" href="{{route('sms.outbox')}}">{{__("Outgoing SMS")}}</a>
            <a class="dropdown-item" href="{{route('sms.sent')}}">{{__("SMS Sent")}}</a>
             <a class="dropdown-item" href="{{route('settings.api.index')}}">{{__("API Settings")}}</a>
         </div>
      </div>

   </li>

</ul>
@endguest
