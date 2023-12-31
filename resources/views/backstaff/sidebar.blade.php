 <?php
 use App\Models\Stuff;
 $data = Stuff::where('id',session()->get('id_staff'))->first();
 ?>
 <div class="col-md-3 col-sm-12"
     style="background-color: #FFFFFF80;
             padding: 36px;
             overflow: auto;">
     <div class="image-rounded">
       <center>
       <div class="name-login">
        <h4 style="color:#929292">{{$data['display_name']}}</h4>
        <h5 style="color:#929292">{{$data['position']}}</h5>
    </div>
    </center>
     </div>
     <ul class="nav  nav-stacked" style="margin-top: 50px;display: contents;">
         <li style="margin-top: 5px;" class="active"><a class="menu-href" href="{{route('staff.announcements')}}"><i class="fa fa-bell" aria-hidden="true"></i> Announcement</a></li>
         <li style="margin-top: 10px;"><a class="menu-href" href="{{route('staff.handbook')}}"><i class="fa fa-book" aria-hidden="true"></i> Employee Handbook</a></li>
         <li style="margin-top: 10px;"><a class="menu-href" @if(agree('handbook') > 0)href="{{route('staff.anti')}}" @else onclick="alert('You must accept and read the contents of the handbook first')" @endif><i class="fa fa-book" aria-hidden="true"></i> Anti-Bribery and Corruption Policy</a></li>
         <li style="margin-top: 10px;"><a class="menu-href" @if(agree('antibribery') > 0) href="{{route('staff.ethic')}}" @else onclick="alert('You must accept and read the contents of the Anti-Bribery and Corruption Policy first')" @endif><i class="fa fa-book" aria-hidden="true"></i> Ethics and Compliance Whistleblowing Policy and Procedures
         </a></li>
         <li style="margin-top: 10px;"><a class="menu-href" href="{{route('staff.setting')}}"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>

     </ul>
     <br>


 </div>


