@extends('acewebfront.layouts')
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <section class="gtp-anouncements about-company">
            <div class="content-ace">
                <div class="wrap-content">
                    <div style="padding-top: 0px" class="ace-isi about">
                        <div class="row">
                            <div data-aos="fade-up" class="col-md-12">
                                <div class="title-ace">
                                    ABOUT -> Vision-Mission
                                    <span class="h-dash" style="font-weight: bold">—</span>
                                </div>
                                <div style="text-align: center;" data-aos="fade-up" data-aos-delay="200"
                                    class="col-md-12 col-sm-12 aos-init aos-animate">
                                    <h1>Vision & Mission
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-vmm" style="margin-top: 20px;">
                            <div>
                                <h1>Vision</h1>
                                <p>To become a world class automotive parts and service provider.</p>
                            </div>
                            <br>
                            <br>
                            <div>
                                <h1>Vision</h1>
                                <p>By leverage our capabilities create value added solution to customers.</p>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </section>

    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".toggle-button").click(function() {
                var contentContainer = $(this).prev(".toggle-content");
                contentContainer.toggleClass("expanded");

                if (contentContainer.hasClass("expanded")) {
                    $(this).text("Read less");
                } else {
                    $(this).text("Read more");
                }
            });
        });
    </script>
@endsection
