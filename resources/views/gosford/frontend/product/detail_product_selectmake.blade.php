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

                                                <form action="{{ route('gosford.front.order_leather') }}" method="post">@csrf

                                                    <div style="display: flex;flex-direction: column;">
                                                        <hr class="hr-product-detail">
                                                    </div>

                                                    <input type="hidden" name="id_leather" value="{{$leather->id}}">

                                                    Material: <span style="color: #BF1D2C;" id="name-material">
                                                        {{$leather->name_leather}}
                                                    </span>
                                                    <!--COLOR OPTION-->
                                                    <div style="display: flex;flex-direction: row;">
                                                        <div id="full-material" class="card card-coloroption-one">
                                                            <img src="{{getimage($leather->img)}}" alt="">
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
                                                            <input type="text" class="form-control" placeholder="Name *" name="name" required>
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input type="text" name="contact" class="form-control" placeholder="Contact number *" required>
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input type="email" name="email" class="form-control" placeholder="Email *" required>
                                                        </div>
                                                        <div style="display: flex;gap:20px">
                                                            <select id="carMakeSelect" onchange="updateCarModels()" class="select-order mdl-textfield__input" type="text" name="car_make">
                                                                <option value="">Car Make</option>
                                                                @foreach($brand as $i => $b)
                                                                 <option value="{{$b->id}}">{{$b->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <select id="carModelSelect" onchange="searchYear()" class="select-order mdl-textfield__input" type="text" name="car_model">
                                                                <option value="">Car Model</option>
                                                            </select>
                                                            <select id="carYearSelect" class="select-order mdl-textfield__input" type="text" name="year">
                                                                <option value="">Year</option>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <textarea placeholder="If you have any requirements or need special attention to details, please leave your information." style="height: 164px;" name="requiretment" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <center><h4 id="total" style="color:#BF1D2C;font-weight:bold;">RM {{$leather->price}}</h4></center>
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
