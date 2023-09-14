@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="description-service">We are delighted to present our latest
                            masterpiece to you – high-quality automotive leather. This copy will showcase the true charm of
                            this exquisite creation.
                            Designed exclusively for car owners, our top-tier leather embodies our unwavering commitment to
                            perfection. Each piece of leather material undergoes rigorous selection, ensuring that only the
                            finest, handpicked leather finds its way into our car interiors. Your distinguished status
                            deserves nothing less than the most elegant indulgence.
                            The high-quality leather boasts an astonishingly soft touch, providing a luxurious sensation
                            that soothes both body and mind. Selected from the finest raw materials, the leather's
                            durability surpasses ordinary standards, maintaining its shine and color as if new for a
                            prolonged period. Whether your journey is long or short, this elegance and refinement will
                            accompany you all the way.
                            Our leather represents more than just beauty; it exemplifies practicality and functionality.
                            Robust leather fibers and impeccable craftsmanship ensure outstanding abrasion resistance,
                            making it capable of withstanding daily wear while retaining a fresh appearance.
                            Excellence in quality goes hand in hand with our commitment to protecting the Earth. We are
                            dedicated to promoting environmental consciousness by adopting sustainable production methods,
                            ensuring that the leather manufacturing process is as eco-friendly as possible, without
                            unnecessary resource wastage. By choosing our leather, you are also contributing to a greener
                            future for our planet.
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <section class="pt-5 pb-5">
            <div class="wrap-content">
                <div class="card">
                    <div class="row">

                        <div class="col-md-6 col-sm-12">

                            <div class="slider-product">
                                <div style="display: flex;flex-direction: column;">
                                    <img src="/public/assets/img/seat-detail.png" alt="">
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6 col-sm-12">

                            <div style="padding:20px;">
                                <h5 style="color: black;font-weight: bold;">Car Seat Leather</h5>

                                <form action="{{ route('gosford.detail.selectmake') }}" method="post">@csrf

                                    <div style="display: flex;flex-direction: column;">
                                        <hr class="hr-product-detail">

                                        Material: <span style="color: #BF1D2C;" id="name-material">Full leather</span>

                                        <div class="list-leather" style="gap: 15px;
                                        display: flex;
                                        flex-wrap: wrap;
                                        position: relative;
                                        white-space: nowrap;">
                                            @foreach($leather as $i => $vl)
                                            <div id="material{{$vl->id}}" data-id="{{$vl->id}}" class=" material">
                                                <center><img src="{{getimage($vl->img)}}" alt=""></center>
                                                <center>{{$vl->name_leather}}</center>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!--END COLOR OPTION-->
                                        <!--COLOR 2 Option-->


                                        <!--END COLOR 2 OPTION-->





                                        <div style="display: flex;flex-direction: column;padding: 50px 0px;">
                                            <div style="display: flex;gap:20px">
                                                <h4 style="font-weight: bold;"></h4>
                                                <h4 id="total" style="color:#BF1D2C;font-weight:bold;">
                                                    </h4>
                                            </div>
                                            <br>
                                            <div style="    text-align: justify;">
                                                <p>We are delighted to present our latest masterpiece to you high quality
                                                    automotive leather. This copy will showcase the true charm of this exquisite
                                                    creation.</p>
                                            </div>
                                            <br>
                                            <div  style="    text-align: justify;" >
                                                <p style="color:#BF1D2C;">Prices display are subject to change without prior
                                                    notice, price display are without customisation.</p>
                                            </div>
                                            <div style="display: flex;gap:20px">
                                                <a href="{{ url('product_project') }}" style="padding: 0px 30px;" type="submit"
                                                    class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                    data-upgraded=",MaterialButton">
                                                    Back
                                                </a>
                                                <button type="submit" style="padding: 0px 30px;" type="submit"
                                                    class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                                    data-upgraded=",MaterialButton">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>




                                </form>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-5 pb-5">
            <div style="text-align: center;font-weight: bold;padding: 20px;">
                <h2 style="font-weight: bold;">Styling Customisation</h2>
            </div>
            <div class="row d-flex" style="justify-content: center;">
                <div class="col-sm-6 col-md-2  d-flex " id="gallery">
                    <a href="/public/go_system/images/menu/colors.jpg" class="card card-body border-light justify-content-between text-white shadow">
                        <div class="dlab-media dlab-img-overlay1">
                            <img style="height: 100%;border-radius: 10px;" src="/public/go_system/images/menu/menu-new.jpg" alt="">
                        </div>
                        <div class="title-menu-style">Color</div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-2  d-flex ">

                    <a href="{{ route('gosford.twotowncolor') }}"
                        class="card  card-body border-light  justify-content-between text-white shadow">
                        <!-- <a >  -->
                        <div class="dlab-media dlab-img-overlay1">
                            <img src="/public/go_system/images/menu/menu_1.png" alt="">
                        </div>
                        <!-- </a> -->
                        <div class="title-menu-style">Two Tone Color</div>
                    </a>

                </div>

                <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="{{ route('gosford.patterndesign') }}"
                        class="card  card-body border-light  justify-content-between  text-white shadow">
                        <div class="dlab-media dlab-img-overlay1">
                            <img src="/public/go_system/images/menu/menu_3.png" alt="">
                        </div>
                        <div class="title-menu-style">Pattern Design</div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-2  d-flex ">

                    <a href="{{ route('gosford.piping') }}"
                        class="card  card-body border-light  justify-content-between  text-white shadow">
                        <div class="dlab-media dlab-img-overlay1">
                            <img src="/public/go_system/images/menu/menu_4.png" alt="">
                        </div>
                        <div class="title-menu-style">Piping</div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-2  d-flex ">
                    <a href="{{ route('gosford.emblem') }}"
                        class="card  card-body border-light  justify-content-between  text-white shadow">
                        <div class="dlab-media dlab-img-overlay1">
                            <img src="/public/go_system/images/menu/menu_5.png" alt="">
                            <div class="title-menu-style">Logo / Emblem</div>
                        </div>

                    </a>
                </div>

            </div>


            </div>
        </section>
        <section>
            <div class="section-full about-box content-inner section-bg-gosford-color">
                <div class="container">
                    <div class="row">
                        <div data-aos="fade-right" data-aos-delay="100" class="col-sm-12 col-lg-6 m-b30 p-r50">
                            <div class="section-head text-left" style="    margin: 15% 0px;">
                                <h2 class="text-capitalize" style="color: black;font-family: 'Space Grotesk';font-weight: bold;">MISSION</h2>
                                <p class="font-patner" style="color:black">Combining people innovation with most cutting edge manufacturing solution and provide best design with highest quality product to customers.</p>
                            </div>

                        </div>
                        <div class="col-sm-12 col-lg-6 m-b30">
                            <div class="video-box" style="padding: 50px 0px;">
                                <iframe width="100%" height="450px" src="https://www.youtube.com/embed/WEQDCxT6RFY" title="Gosford, Johor Bahru" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

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
            // Mengambil token CSRF dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('.material').click(function() {
                var materialId = $(this).data('id');
                $.ajax({
                    type: 'POST', // Ganti ke metode POST
                    url: "{{url('fetch_price/sys/price')}}", // Ganti dengan URL yang sesuai di dalam Laravel
                    data: {
                        _token: csrfToken, // Menggunakan token CSRF
                        id: materialId
                    },
                    success: function(response) {
                        // Menampilkan data yang diterima dalam elemen dengan id 'priceContainer'
                        $('#name-material').html(response.name_leather);
                        $('#total').html('RM '+response.price);
                        // Anda dapat menambahkan baris ini untuk menampilkan atribut lainnya
                        // $('#priceContainer').append('Atribut Lain: ' + response.nama_atribut_lain);
                    }
                });
            });
        });
    </script>

    <script>
    // Initialize LightGallery
    lightGallery(document.getElementById('gallery'), {
    thumbnail: true,
    download:false
});

</script>

@endsection
