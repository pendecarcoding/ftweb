 @extends('acewebfront.layouts')
 @section('meta')
     <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
 @endsection
 @section('content')
     <main>
         @include('acewebfront.widget.allbaner')
         <section class="gtp-anouncements">
             <div class="content-ace">
                 <div class="wrap-content">
                     <div style="padding-top: 0px" class="ace-isi about">
                         <div class="col-md-12">
                             <div data-aos="fade-up" class="title-ace">
                                 STAY CONNECTED
                                 <span class="h-dash" style="font-weight: bold">—</span>
                             </div>
                         </div>
                         <div data-aos="fade-up" class="col-md-12 col-sm-12">
                             <h1>We’d love to hear from you</h1>
                         </div>


                         @foreach ($devision as $i => $v)
                             @if ($v->short == '1')
                                 @foreach (getContactByDevision($v->id) as $ic => $vc)
                                     <div class="row">
                                         <div data-aos="fade-up" class="col-md-12">
                                             <div class="contact-wrap">
                                                 <h2 class="contact_h2">{{ $v->name }}</h2>
                                             </div>
                                         </div>
                                         <div data-aos="fade-up" class="col-md-6">
                                             <div class="contact-wrap">

                                                 <img class="img-responsive" src="{{ getimage($vc->img) }}"
                                                     alt="{{ $vc->title }}" />
                                             </div>
                                         </div>
                                         <div data-aos="fade-up" class="col-md-6">
                                             <div class="contact-wrap">
                                                 <div class="list-contact">
                                                     <h5 class="title-corporate">{{ $vc->title }}</h5>
                                                     <br>
                                                     {!! $vc->content !!}
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 @endforeach
                             @else
                                 <div class="row">
                                     <div data-aos="fade-up" class="col-md-12">
                                         <div class="contact-wrap">
                                             <h2 class="contact_h2">{{ $v->name }}</h2>
                                         </div>
                                     </div>
                                     @foreach (getContactByDevision($v->id) as $ic => $vc)
                                         <div data-aos="fade-up" class="col-md-6">
                                             <div class="contact-wrap">
                                                 <div class="img-wrap-contact">
                                                     <img style="height: 100%;" class="img-responsive"
                                                         src="{{ getimage($vc->img) }}" alt="{{ $vc->title }}" />
                                                 </div>
                                                 <div class="list-contact">
                                                     <h5 class="title-corporate">{{ $vc->title }}</h5>
                                                     <br>
                                                     {!! $vc->content !!}
                                                 </div>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             @endif
                         @endforeach
                     </div>
                 </div>
             </div>
         </section>
         <section class="ace-conected" style="position: relative;overflow: hidden;">
            <div id="loading">
                <img  src="{{ static_asset('aceweb') }}/assets/img/loading-gif.gif" alt="Loading">
            </div>
            <div class="content-ace">

                <div class="wrap-content">

                    <div class="ace-isi about"></div>
                    <div class="container contact">

                        <div class="row">
                        <div class="col-md-5">
                        <div class="contact-info">
                        <div class="title-ace">
                            STAY CONNECTED
                            <span class="h-dash" style="font-weight: bold">—</span>
                          </div>
                        <h1>Leave us a message</h1>
                        <h4>Your message is valuable to us, we will get back to you as soon as we can</h4>

                        </div>

                        </div>
                        <div class="col-md-7">
                        <div class="contact-form">

                    <form id="contact-form" method="post">
                                @csrf
                        <div class="form-group">
                        <label class="control-label col-sm-12" for="fname">Select an Option:</label>
                        <div class="col-sm-10">
                        <select name="type" id="" class="form-control">
                            <option value="Complain">Complain</option>
                            <option value="Feedback">Feedback</option>
                            <option value="General Enquery">General Enquiry</option>
                            <option value="Other">Others</option>
                        </select>
                        </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="comment">Your Message:</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                            </div>
                            </div>
                        <div class="form-group">
                        <label class="control-label col-sm-2" for="lname">Your Name:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="name">
                        </div>
                        </div>
                        <div class="form-group">
                            <h5>Thank you. How would you like us to get in touch <br>with you ?</h5>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email me:</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Call me:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
                            </div>
                            </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LdcFusnAAAAAO345wsQQNNeO7NTP8-dITus2JwJ"></div>
                        </div>
                        <div class="form-group">
                            <div id="alertpatner" class="alert alert-warning alert-dismissible fade show" role="alert">

                                <strong>Thanks for your Message</strong> we will reply soon


                            </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="ace-button-black" style="width: 100%;">Send
                            </button>
                        </div>
                        </div>
                    </form>
                        </div>
                        </div>
                        </div>
                </div>
            </div>
         </section>
     </main>
     <script>

        $(document).ready(function () {
            $('#contact-form').submit(function (event) {
                event.preventDefault(); // Prevent the default form submission
                $('#loading').show();
                // Get the form data
                var formData = $(this).serialize();

                // Make the AJAX request
                $.ajax({
                    url: '{{route('message.users')}}', // Change this to your Laravel route
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        if (response == "success") {

                            $("#alertpatner").show();
                            $("#contact-form")[0].reset();
                            }
                    },
                    error: function (error) {
                        // Handle the error response (if needed)
                        console.error('Error submitting form:', error);
                    },
                    complete: function () {
                        // Hide the loading spinner when the request is complete
                        $('#loading').hide();
                    }
                });
            });
        });


         </script>
 @endsection
