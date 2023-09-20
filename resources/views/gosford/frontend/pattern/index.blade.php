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
                                <h2>Pattern Design</h2>
                            </center>
                            <br>
                            <div class="row">

                                @foreach ($data as $i => $v)
                                    <div class="col-md-2">
                                        <div class="card towncard">
                                            <!-- <a href="{{ route('gosford.patterndesign.detail', base64_encode($v->id)) }}" -->
                                                <a href="#"
                                                class="card-body">
                                                <!-- Card content goes here -->
                                                <img style="width:100%" src="{{ getimage($v->img) }}" alt="">
                                                <p class="card-text center" style="margin-top:2px;color:black">
                                                    {{ $v->name_pattern }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach


                            </div>

                            <div style="text-align: center;padding: 20px 0px;">
                                <h2>Other Product Option</h2>
                                <br>
                                <div style="display: flex;flex-direction: row;justify-content: space-between;gap:10px">
                                    <div class="card" style="padding: 10px;width:100%"><a
                                            href="{{ route('gosford.twotowncolor') }}" class="menu-href">Two Tone
                                            Color</a>
                                    </div>
                                    <div class="card" style="padding: 10px;width:100%"><a
                                            href="{{ route('gosford.piping') }}" class="menu-href">Stitching</a></div>
                                    <!-- <div class="card" style="padding: 10px;width:100%"><a
                                            href="{{ route('gosford.emblem') }}" class="menu-href">Logo/Emblem</a>
                                    </div> -->
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
