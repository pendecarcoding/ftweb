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
                            <div class="container">
                                <center>
                                    <h5 style="color: black;font-weight: bold;">Logo Design</h5>
                                </center>
                                <br>
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="card">
                                            <div class="slider-product"
                                                style="height: 550px;overflow: hidden;position: relative;">
                                                <div style="display: flex;flex-direction: column;padding: 73px;align-items: center;">
                                                    <img style="height: 400px;width: 400px;" class="img-responsive"
                                                        src="/public/go_system/images/chair.png" alt="">


                                                </div>
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
                                                        <input type="file" class="from-control">
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
