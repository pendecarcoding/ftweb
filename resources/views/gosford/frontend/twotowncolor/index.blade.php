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
                            <center>
                                <h5 style="color: black;font-weight: bold;">Two Tone Color</h5>
                            </center>
                            <br>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <a href="{{ route('gosford.twotowncolor.detail') }}" class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard2.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard3.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard2.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard3.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard2.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard3.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard2.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card towncard">
                                        <div class="card-body">
                                            <!-- Card content goes here -->
                                            <img style="width:100%" src="/public/go_system/images/twotowncard3.png"
                                                alt="">
                                            <p class="card-text center" style="margin-top:2px">A011 <br>Catana Leather</p>
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
        function updateCarModels() {
            // Get selected car make
            const carMakeSelect = document.getElementById('carMakeSelect');
            const selectedCarMake = carMakeSelect.value;

            // Get the car model dropdown element
            const carModelSelect = document.getElementById('carModelSelect');

            // Clear existing car model options
            carModelSelect.innerHTML = '<option value="select">Select Car Model</option>';

            // Fetch car models from the database using PHP
            if (selectedCarMake !== '') {
                fetchCarModels(selectedCarMake);
            }
        }

        function fetchCarModels(carMake) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Make a request to the server using AJAX
            fetch('{{ route('gosford.front.getmodelfrommake', ['make' => '__carMake__']) }}'.replace('__carMake__',
                    carMake), {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json'
                    },
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    // Add car model options to the dropdown
                    data.forEach(car => {
                        addCarModelOption(car.id, car.name, carModelSelect);
                    });
                })
                .catch(error => {
                    console.error('Error fetching car models:', error);
                });
        }


        function addCarModelOption(carId, carName, selectElement) {
            const option = document.createElement('option');
            option.text = carName;
            option.value = carId; // Use the car's ID as the option value
            selectElement.add(option);
        }


        function searchYear() {
            // Get selected car make
            const carModelSelect = document.getElementById('carModelSelect');
            const selectedCarmodel = carModelSelect.value;

            // Get the car model dropdown element
            const carYearSelect = document.getElementById('carYearSelect');

            // Clear existing car model options
            carYearSelect.innerHTML = '<option value="">Year</option>';

            // Fetch car models from the database using PHP
            if (selectedCarmodel !== '') {
                fetchYear(selectedCarmodel);
            }
        }


        function fetchYear(caryear) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Make a request to the server using AJAX
            fetch('{{ route('gosford.front.getyearfrommodel', ['model' => '__caryear__']) }}'.replace('__caryear__',
                    caryear), {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json'
                    },
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    // Add car model options to the dropdown
                    data.forEach(car => {
                        addCarYearOption(car.year, carYearSelect);
                    });
                })
                .catch(error => {
                    console.error('Error fetching car Year:', error);
                });
        }


        function addCarYearOption(yearName, selectElement) {
            const option = document.createElement('option');
            option.text = yearName;
            option.value = yearName; // Use the car's ID as the option value
            selectElement.add(option);
        }
    </script>
@endsection
