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
                                <div class="card">
                                    <div class="row" style="height: 700px;">

                                        <div class="col-md-6 col-sm-12">

                                            <div class="slider-product" style="height: 750px;">
                                                <div style="display: flex;flex-direction: column;">
                                                    <img style="width: 100%;
                                                    object-fit: cover;
                                                    height: 700px;" src="/public/assets/img/seat-detail.png" alt="">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-6 col-sm-12">

                                            <div style="padding:20px;">
                                                <h5 style="color: black;font-weight: bold;">Car Seat Leather</h5>

                                                <form action="{{ route('gosford.front.order_comfirmed') }}" method="post">@csrf

                                                    <div style="display: flex;flex-direction: column;">
                                                        <hr class="hr-product-detail">
                                                    </div>



                                                    Material: <span style="color: #BF1D2C;" id="name-material">Full
                                                        leather</span>
                                                    <!--COLOR OPTION-->
                                                    <div style="display: flex;flex-direction: row;">
                                                        <div id="full-material" class="card card-coloroption-one">
                                                            <img src="/public/assets/img/full-leather.png" alt="">
                                                        </div>
                                                        <div  class="card-coloroption-one">

                                                        </div>
                                                        <div  class="card-coloroption-one">

                                                        </div>

                                                    </div>
                                                    <!--END COLOR OPTION-->
                                                    <!--COLOR 2 Option-->
                                                    <br>

                                                    <!--END COLOR 2 OPTION-->





                                                    <div style="display: flex;flex-direction: column;">

                                                        <div>
                                                            <input type="text" class="form-control" placeholder="Name *">
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input type="text" class="form-control" placeholder="Contact number *">
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input type="email" class="form-control" placeholder="Email *">
                                                        </div>
                                                        <div style="display: flex;gap:20px">
                                                            <select id="carMakeSelect" onchange="updateCarModels()" class="select-order mdl-textfield__input" type="text" name="carmake">
                                                                <option value="">Car Make</option>
                                                                @foreach($brand as $i => $b)
                                                                 <option value="{{$b->id}}">{{$b->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <select id="carModelSelect" onchange="searchYear()" class="select-order mdl-textfield__input" type="text" name="model">
                                                                <option value="">Car Model</option>
                                                            </select>
                                                            <select id="carYearSelect" class="select-order mdl-textfield__input" type="text" name="year">
                                                                <option value="">Year</option>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <textarea style="    height: 164px;" name="requiretment" class="form-control">If you have any requirements or need special attention to details, please leave your information.</textarea>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <center><h4 id="total" style="color:#BF1D2C;font-weight:bold;">RM
                                                        3900.00</h4></center>
                                                    <div style="display: flex;gap:20px;justify-content: center;">
                                                        <a href="{{ url('product_project') }}"
                                                            style="padding: 0px 30px;" type="submit"
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
    </main>
    <script>
        // Function to update the total based on the selected material
        function updateTotal(materialPrice, material) {
            var totalElement = document.getElementById("total");
            var namematerial = document.getElementById("name-material");
            var currentTotal = parseFloat(totalElement.textContent.replace("RM", "").trim());
            var newTotal = materialPrice;
            totalElement.textContent = "RM " + newTotal.toFixed(2);
            namematerial.textContent = material;
        }

        // Add click event listeners to the material options
        document.getElementById("full-material").addEventListener("click", function() {
            // Update the total when Full Leather is clicked
            updateTotal(3900, 'Full Leather'); // Replace 100 with the actual price for Full Leather
        });

        document.getElementById("semi-material").addEventListener("click", function() {
            // Update the total when Semi Leather is clicked
            updateTotal(3200, 'Semi Leather'); // Replace 75 with the actual price for Semi Leather
        });

        document.getElementById("pvc-material").addEventListener("click", function() {
            // Update the total when PVC is clicked
            updateTotal(3000, 'PVC'); // Replace 50 with the actual price for PVC
        });
    </script>

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
        fetch('{{ route("gosford.front.getmodelfrommake", ["make" => "__carMake__"]) }}'.replace('__carMake__', carMake), {
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
        option.value = carName; // Use the car's ID as the option value
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
        fetch('{{ route("gosford.front.getyearfrommodel", ["model" => "__caryear__"]) }}'.replace('__caryear__', caryear), {
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
