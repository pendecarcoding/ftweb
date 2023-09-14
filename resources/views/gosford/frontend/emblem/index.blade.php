@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <section class="gtp-anouncements" style="background-color: rgb(247, 246, 246);">
            <div class="content-ace">
                <div class="wrap-content">

                    <div style="padding-top: 0px" class="ace-isi">


                        <div class="container">
                            <a href="{{ url('product_project') }}" style="float:right" class="btn btn-danger"><i
                                    class="fa fa-times"></i></a>

                            <center>
                                <h5 style="color: black;font-weight: bold;">Logo Design</h5>
                            </center>
                            <br>
                            <div class="row">
                                <center>
                                    <h5>Customized Logo, Logo Upload Area. If you have any<br> questions, please contact our
                                        <span style="color:red">customer service.</span>
                                    </h5>
                                </center>
                                <br>
                                <br>
                                <div
                                    style="display: flex; flex-direction: column; align-items: center; border: 2px dashed #ccc; padding: 10px;">
                                    <label for="imageUpload" style="cursor: pointer;">
                                        <div style="width: 200px;">
                                            <img id="uploadedImage" style="width: 100%"
                                                src="/public/go_system/images/uploads.png" alt="">

                                        </div>
                                    </label>
                                    <p>Upload your <span style="color: red">car seat</span> photo...</p>
                                    <input type="file" id="imageUpload" style="display: none;">
                                </div>
                                <div
                                    style="display: flex; flex-direction: row; align-items: center; justify-content: center; padding: 10px;gap: 20px;">
                                    <a href="{{ route('gosford.front.choice_design') }}" style="padding: 0px 30px;"
                                        type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                        Back
                                    </a>
                                    <a href="{{ route('gosford.emblem.detail') }}" style="padding: 0px 30px;" type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                        Next
                                    </a>
                                </div>



                            </div>

                            <div style="text-align: center;padding: 20px 0px;">
                                <h2>Other Product Option</h2>
                                <br>
                                <div style="display: flex;flex-direction: row;justify-content: space-between;gap:10px">
                                    <div class="card" style="padding: 10px;width:100%"><a
                                            href="{{ route('gosford.twotowncolor') }}" class="menu-href">Two Tone Color</a>
                                    </div>

                                    <div class="card" style="padding: 10px;width:100%"><a
                                            href="{{ route('gosford.piping') }}" class="menu-href">Piping</a></div>
                                    <div class="card" style="padding: 10px;width:100%"><a
                                            href="{{ route('gosford.patterndesign') }}" class="menu-href">Pattern Design</a>
                                    </div>
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

        // Load saved image from session, if available
        const savedImageData = sessionStorage.getItem('uploadedImageData');
        if (savedImageData) {
            uploadedImage.setAttribute('src', savedImageData);
        }

        imageUpload.addEventListener('change', function() {
            if (imageUpload.files && imageUpload.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    uploadedImage.setAttribute('src', e.target.result);

                    // Save the image data in the session
                    sessionStorage.setItem('uploadedImageData', e.target.result);
                };

                reader.readAsDataURL(imageUpload.files[0]);
                // Clear the input value to allow selecting the same image again if needed
                imageUpload.value = '';
            }
        });
    </script>
@endsection
