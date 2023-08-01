@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        <section class="ace-investor">

            <div class="col-md-12">
                <div class="banner-static">
                    <img class="img-responsive-banner" src="/public/aceweb/assets/img/contact-banner.png"
                        alt="ACE-BANNER-PRODUCT" />
                </div>
            </div>
        </section>

        <section class="gtp-anouncements" style="background-color: rgb(247, 246, 246);">
            <div class="content-ace">
                <div class="wrap-content">

                    <div style="padding-top: 0px" class="ace-isi">


                        <div class="container">
                            <div class="row">
                                <center><h2>Logo Design</h2>
                                <h5>Customized Logo, Logo Upload Area. If you have any<br> questions, please contact our <span style="color:red">customer service.</span></h5>
                                </center>
                                <div style="display: flex; flex-direction: column; align-items: center; border: 2px dashed #ccc; padding: 10px;">
                                    <label for="imageUpload" style="cursor: pointer;">
                                        <div style="width: 200px;">
                                            <img id="uploadedImage" style="width: 100%" src="/public/go_system/images/uploads.png" alt="">
                                        </div>
                                    </label>
                                    <p>Upload your <span style="color: red">car seat</span> photo...</p>
                                    <input type="file" id="imageUpload" style="display: none;">
                                </div>
                                <div style="display: flex; flex-direction: row; align-items: center; justify-content: center; padding: 10px;">
                                    <a href="{{route('gosford.front.choice_design')}}" style="padding: 0px 30px;" type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                        Back
                                    </a>
                                    <a href="{{route('gosford.emblem.detail')}}" style="padding: 0px 30px;" type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                        Next
                                    </a>
                                </div>



                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </section>
        <!-- <div class="wa-floating-button" onclick="openWhatsApp()">
                <span class="whatsapp-icon"><i class="fa fa-phone"></i></span>
            </div> -->

    </main>

    <script>
        const imageUpload = document.getElementById('imageUpload');
        const uploadedImage = document.getElementById('uploadedImage');

        uploadedImage.addEventListener('click', function() {
            imageUpload.click();
        });

        imageUpload.addEventListener('change', function() {
            if (imageUpload.files && imageUpload.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    uploadedImage.setAttribute('src', e.target.result);
                };

                reader.readAsDataURL(imageUpload.files[0]);
                // Clear the input value to allow selecting the same image again if needed
                imageUpload.value = '';
            }
        });
    </script>
@endsection
