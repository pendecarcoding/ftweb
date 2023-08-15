@extends('acewebfront.layouts')
@section('content')
<main>
    <section class="ace-investor">

        <div class="col-md-12">
            <div class="banner-static">
                <img class="img-responsive-banner" src="/public/aceweb/assets/img/contact-banner.png" alt="ACE-BANNER-PRODUCT">
            </div>
        </div>
    </section>
    <section class="gtp-ann">
        <div class="container-fluid">
            <div class="row">
                @include('backstaff.sidebar')


                <br>




            <div class="col-sm-9" style="padding: 36px;">
                 <div style="display: flex;"><input style="width:100%" type="text" class="form-control" placeholder="Announcement"><span><button class="btn btn-primary">SEARCH</button></span>
                 </div>
                <div class="well" style="margin-top:50px;height: 100vh;overflow: auto;">
                    <h2 style="font-weight: bold;color:#1D5189">Announcement</h2>
                    <br>
                    @foreach($announce as $i =>$v)
                    <div class="list-content">
                      <a style="text-decoration: none;" href="{{route('staff.detailannouncements',base64_encode($v->id))}}">
                        <p style="color: black;">{{$v->title}}</p>
                        <p style="color:#1D5189">{{$v->created_at}}</p>
                        <hr style="border: 1px solid #b1b0b0;">
                      </a>
                    </div>
                    @endforeach

                    </div>







            </div>
        </div>
        </div>
    </section>
</main>


    @endsection
