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
                            <div class="container">
                                <a href="{{ url('product_project') }}" style="float:right" class="btn btn-danger"><i
                                        class="fa fa-times"></i></a>

                                <center>
                                    <h5 style="color: black;font-weight: bold;">Logo Design</h5>
                                </center>
                                <br>
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div style="position: relative;">
                                            <div class="card">
                                                <div class="slider-product"
                                                    style="height: 550px;overflow: hidden;position: relative;">
                                                    <div
                                                        style="display: flex;flex-direction: column;padding: 73px;align-items: center;">
                                                        <img id="uploadedImage" style="height: 400px;width: 400px;"
                                                            class="img-responsive" src="" alt="">




                                                    </div>

                                                </div>

                                            </div>
                                            <div
                                                style="top: 20px;
                                            right: 20px;display: flex;flex-direction: column;width:50px;position: absolute;">
                                                <button class="btn btn-danger" id="zoomButton" style="margin-top: 10px;"><i
                                                        class="fa fa-search-plus" aria-hidden="true"></i></button>
                                                <button class="btn btn-danger" id="zoomoutButton"
                                                    style="margin-top: 10px;"><i class="fa fa-search-minus"
                                                        aria-hidden="true"></i></button>
                                                <button class="btn btn-danger" id="moveUpButton"
                                                    style="margin-top: 10px;"><i class="fa fa-arrow-up"
                                                        aria-hidden="true"></i></button>
                                                <button class="btn btn-danger" id="moveDownButton"
                                                    style="margin-top: 10px;"><i class="fa fa-arrow-down"
                                                        aria-hidden="true"></i></button>
                                                <button class="btn btn-danger" id="moveLeftButton"
                                                    style="margin-top: 10px;"><i class="fa fa-arrow-left"
                                                        aria-hidden="true"></i></button>
                                                <button class="btn btn-danger" id="moveRightButton"
                                                    style="margin-top: 10px;"><i class="fa fa-arrow-right"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div style="padding:20px;height: 550px;">
                                                <div
                                                    style="display: flex;flex-direction: row;justify-content: space-between;margin: 0px 10%;">
                                                    <div style="display: flex;flex-direction: column;">
                                                        <h6 class="title-right-product">Make:</h6>
                                                        <p class="content-right-product"> BMW</p>
                                                    </div>
                                                    <div style="display: flex;flex-direction: column;">
                                                        <h6 class="title-right-product">Model:</h6>
                                                        <p class="content-right-product">2-Series</p>
                                                    </div>
                                                    <div style="display: flex;flex-direction: column;">
                                                        <h6 class="title-right-product">Year:</h6>
                                                        <p class="content-right-product">2017</p>
                                                    </div>
                                                </div>


                                                <form action="{{ route('gosford.order_comfirmed') }}" method="post">@csrf

                                                    <div style="display: flex;flex-direction: column;">
                                                        <hr class="hr-product-detail">
                                                    </div>



                                                    Step-1 | Choose Logo Position
                                                    <!--COLOR OPTION-->
                                                    <div
                                                        style="justify-content: space-between; display: flex;flex-direction: row;">
                                                        <button type="button"
                                                            class="btn btn-outline-secondary btn-sm">Upper Panel</button>
                                                        <button type="button" class="btn btn-outline-danger btn-sm">Head
                                                            Rest</button>
                                                    </div>

                                                    <!--END COLOR OPTION-->
                                                    <!--COLOR 2 Option-->
                                                    <br>
                                                    Step-2 | Upload Your Logo

                                                    <div style="display: flex;flex-direction: row;">
                                                        <input id="stickerUpload" type="file" class="from-control">
                                                    </div>

                                                    <!--END COLOR 2 OPTION-->
                                                    <br>
                                                    Step-3 | Seat Details
                                                    <p>Please select how many seats you want it adding to?</p>
                                                    <select style="font-weight: bold;color: #7C7979;"
                                                        class="select-order mdl-textfield__input" type="text"
                                                        name="material" id="material" required>

                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                        <option value="">4</option>
                                                        <option value="">5</option>
                                                        <option value="">6</option>
                                                        <option value="">7</option>
                                                        <option value="">8</option>

                                                    </select>
                                                    <div style="display: flex;flex-direction: column;">
                                                        <hr class="hr-product-detail">
                                                    </div>

                                                    <div style="display: flex;flex-direction: column;">
                                                        <div style="display: flex;justify-content: space-between;">
                                                            <h4 style="font-weight: bold;">Total</h4>
                                                            <h4 id="total" style="color:#BF1D2C;font-weight:bold;">RM
                                                                XXXX</h4>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;">
                                                            <a href="{{ route('gosford.emblem') }}"
                                                                style="padding: 0px 30px;" type="submit"
                                                                class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                                data-upgraded=",MaterialButton">
                                                                Back
                                                            </a>
                                                            <a href="{{ route('gosford.finish.design') }}"
                                                                style="padding: 0px 30px;" type="submit"
                                                                class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                                                data-upgraded=",MaterialButton">
                                                                Submit
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>


                                        </div>
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
        const uploadedImage = document.getElementById('uploadedImage');
        const zoomButton = document.getElementById('zoomButton');
        const zoomoutButton = document.getElementById('zoomoutButton');
        const moveUpButton = document.getElementById('moveUpButton');
        const moveDownButton = document.getElementById('moveDownButton');
        const moveLeftButton = document.getElementById('moveLeftButton');
        const moveRightButton = document.getElementById('moveRightButton');
        const stickerUpload = document.getElementById('stickerUpload');

        let zoomLevel = 1;
        let isDraggingImage = false;
        let startXImage;
        let startYImage;
        let translateXImage = 0;
        let translateYImage = 0;

        let isDraggingSticker = false;
        let startXSticker;
        let startYSticker;

        // Load saved image from session, if available
        const savedImageData = sessionStorage.getItem('uploadedImageData');
        if (savedImageData) {
            uploadedImage.setAttribute('src', savedImageData);
        }

        zoomButton.addEventListener('click', function() {
            zoomLevel += 0.1;
            uploadedImage.style.transform =
                `scale(${zoomLevel}) translate(${translateXImage}px, ${translateYImage}px)`;
        });

        zoomoutButton.addEventListener('click', function() {
            zoomLevel -= 0.1;
            if (zoomLevel < 0.1) {
                zoomLevel = 0.1;
            }
            uploadedImage.style.transform =
                `scale(${zoomLevel}) translate(${translateXImage}px, ${translateYImage}px)`;
        });

        moveUpButton.addEventListener('click', function() {
            translateYImage -= 10;
            uploadedImage.style.transform =
                `scale(${zoomLevel}) translate(${translateXImage}px, ${translateYImage}px)`;
        });

        moveDownButton.addEventListener('click', function() {
            translateYImage += 10;
            uploadedImage.style.transform =
                `scale(${zoomLevel}) translate(${translateXImage}px, ${translateYImage}px)`;
        });

        moveLeftButton.addEventListener('click', function() {
            translateXImage -= 10;
            uploadedImage.style.transform =
                `scale(${zoomLevel}) translate(${translateXImage}px, ${translateYImage}px)`;
        });

        moveRightButton.addEventListener('click', function() {
            translateXImage += 10;
            uploadedImage.style.transform =
                `scale(${zoomLevel}) translate(${translateXImage}px, ${translateYImage}px)`;
        });

        uploadedImage.addEventListener('mousedown', (e) => {
            e.preventDefault();
            isDraggingImage = true;
            startXImage = e.clientX - translateXImage;
            startYImage = e.clientY - translateYImage;
        });

        window.addEventListener('mousemove', (e) => {
            if (!isDraggingImage) return;
            translateXImage = e.clientX - startXImage;
            translateYImage = e.clientY - startYImage;
            uploadedImage.style.transform =
                `scale(${zoomLevel}) translate(${translateXImage}px, ${translateYImage}px)`;
        });

        window.addEventListener('mouseup', () => {
            isDraggingImage = false;
        });

        stickerUpload.addEventListener('change', function() {
            if (stickerUpload.files && stickerUpload.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const sticker = document.createElement('img');
                    sticker.classList.add('sticker');
                    sticker.setAttribute('src', e.target.result);
                    sticker.style.left = '50px';
                    sticker.style.top = '50px';
                    sticker.addEventListener('mousedown', startStickerDrag);

                    const stickerContainer = document.createElement('div');
                    stickerContainer.classList.add('sticker-container');
                    stickerContainer.appendChild(sticker);

                    const controlTL = document.createElement('div');
                    controlTL.classList.add('control', 'top-left');
                    stickerContainer.appendChild(controlTL);

                    const controlTR = document.createElement('div');
                    controlTR.classList.add('control', 'top-right');
                    stickerContainer.appendChild(controlTR);

                    const controlBL = document.createElement('div');
                    controlBL.classList.add('control', 'bottom-left');
                    stickerContainer.appendChild(controlBL);

                    const controlBR = document.createElement('div');
                    controlBR.classList.add('control', 'bottom-right');
                    stickerContainer.appendChild(controlBR);

                    uploadedImage.parentElement.appendChild(stickerContainer);

                    // New code to handle the click event for the sticker
                    sticker.addEventListener('click', function(e) {
                        const selectedSticker = e.target;
                        const controls = stickerContainer.querySelectorAll('.control');

                        controls.forEach(control => {
                            control.style.display = 'none';
                        });

                        controls.forEach(control => {
                            const controlClass = control.classList[1];
                            switch (controlClass) {
                                case 'top-left':
                                    control.style.left = selectedSticker.offsetLeft + 'px';
                                    control.style.top = selectedSticker.offsetTop + 'px';
                                    break;
                                case 'top-right':
                                    control.style.left = selectedSticker.offsetLeft +
                                        selectedSticker.offsetWidth + 'px';
                                    control.style.top = selectedSticker.offsetTop + 'px';
                                    break;
                                case 'bottom-left':
                                    control.style.left = selectedSticker.offsetLeft + 'px';
                                    control.style.top = selectedSticker.offsetTop +
                                        selectedSticker.offsetHeight + 'px';
                                    break;
                                case 'bottom-right':
                                    control.style.left = selectedSticker.offsetLeft +
                                        selectedSticker.offsetWidth + 'px';
                                    control.style.top = selectedSticker.offsetTop +
                                        selectedSticker.offsetHeight + 'px';
                                    break;
                            }
                            control.style.display = 'block';
                        });
                    });
                };

                reader.readAsDataURL(stickerUpload.files[0]);
                stickerUpload.value = '';
            }
        });



        function startStickerDrag(e) {
            e.preventDefault();
            isDraggingSticker = true;
            startXSticker = e.clientX - parseInt(e.target.style.left);
            startYSticker = e.clientY - parseInt(e.target.style.top);

            e.target.addEventListener('mousemove', moveSticker);
            e.target.addEventListener('mouseup', endStickerDrag);
        }

        function moveSticker(e) {
            if (!isDraggingSticker) return;
            e.target.style.left = e.clientX - startXSticker + 'px';
            e.target.style.top = e.clientY - startYSticker + 'px';
        }

        function endStickerDrag(e) {
            isDraggingSticker = false;
            e.target.removeEventListener('mousemove', moveSticker);
            e.target.removeEventListener('mouseup', endStickerDrag);
        }
    </script>
@endsection
