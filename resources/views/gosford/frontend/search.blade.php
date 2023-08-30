@extends('acewebfront.layouts')
@section('meta')
<meta property="og:image" content="{{ uploaded_asset(get_setting('site_icon')) }}" />
@endsection
@section('content')
    <main>

        @include('acewebfront.widget.allbaner')
        <!-- <section class="gtp-anouncements" style="background-color: rgb(247, 246, 246);">
            <div class="content-ace">
                <div class="wrap-content">

                    <div style="padding-top: 0px" class="ace-isi">


                        <div class="container container-go">
                            <div class="step-order">
                                <div class="title-step-order active-step">
                                    <button
                                        class="btn-step mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red"
                                        data-upgraded=",MaterialButton,MaterialRipple">
                                        <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating"
                                                style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(78px, 4px);"></span></span>
                                    </button>
                                    <p>Select vehicle</p>
                                </div>
                                <div class="title-step-order active-step">
                                    <button class="btn-step mdl-button mdl-js-button mdl-button--raised button--colored-light-blue"
                                    disabled="" data-upgraded=",MaterialButton"></button>
                                    <p>Choose design</p>
                                </div>

                                <div class="title-step-order">
                                    <button class="btn-step mdl-button mdl-js-button mdl-button--raised button--colored-light-blue"
                                        disabled="" data-upgraded=",MaterialButton"></button>
                                    <p>Options Summary</p>
                                </div>
                            </div>
                                <div class="title-order">
                                    <h3>Select Vehicle</h3>

                                </div>
                                <form action="{{route('gosford.front.choice_design')}}" method="post">@csrf
                                    <div class="body-order">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                            <select id="carMakeSelect" onchange="updateCarModels()" class="select-order mdl-textfield__input" type="text" name="carmake">
                                                <option value="">Car Make</option>
                                                @foreach($brand as $i => $b)
                                                 <option value="{{$b->id}}">{{$b->name}}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <select id="carModelSelect" onchange="searchYear()" class="select-order mdl-textfield__input" type="text" name="model">
                                                <option value="">Car Model</option>
                                            </select>
                                            <br>
                                            <select id="carYearSelect" class="select-order mdl-textfield__input" type="text" name="year">
                                                <option value="">Year</option>
                                            </select>

                                        </div>

                                    </div>
                                    <center>

                                        <button type="submit" style="padding: 0px 30px;" type="submit" class="mdl-button mdl-js-button mdl-button--raised color--gray">
                                            Search
                                        </button>

                                    </center>
                                </form>
                        </div>

                    </div>
                </div>
            </div>


        </section> -->
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
