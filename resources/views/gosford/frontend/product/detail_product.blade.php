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
                                <div class="row" style="height: 600px;">

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
                                                        </div>



                                                        Material: <span style="color: #BF1D2C;" id="name-material">Full leather</span>
                                                        <!--COLOR OPTION-->
                                                        <div style="display: flex;flex-direction: row;">
                                                            <div id="full-material" class="card card-coloroption-one">
                                                                <img src="/public/assets/img/full-leather.png" alt="">
                                                                <center>Full Leather</center>
                                                            </div>
                                                            <div id="semi-material" class="card-coloroption-one">
                                                                <img src="/public/assets/img/semi-leather.png" alt="">
                                                                <center>Semi Leather</center>
                                                            </div>
                                                            <div id="pvc-material" class="card-coloroption-one">
                                                                <img src="/public/assets/img/pvc-leather.png" alt="">
                                                                <center>PVC</center>
                                                            </div>


                                                        </div>
                                                        <!--END COLOR OPTION-->
                                                        <!--COLOR 2 Option-->
                                                        <br>

                                                        <!--END COLOR 2 OPTION-->



                                                        <div style="display: flex;flex-direction: column;">
                                                            <hr class="hr-product-detail">
                                                        </div>

                                                        <div style="display: flex;flex-direction: column;">
                                                            <div style="display: flex;gap:20px">
                                                                <h4 style="font-weight: bold;">Total</h4>
                                                                <h4 id="total" style="color:#BF1D2C;font-weight:bold;">RM
                                                                    3900.00</h4>
                                                            </div>
                                                            <br>
                                                            <div>
                                                                <p >We are delighted to present our latest masterpiece to you high quality automotive leather. This copy will showcase the true charm of this exquisite creation.</p>
                                                            </div>
                                                            <br>
                                                            <div>
                                                                <p style="color:#BF1D2C;">Prices display are subject to change without prior notice, price display are without customisation.</p>
                                                            </div>
                                                            <div style="display: flex;gap:20px">
                                                                <a href="{{ url('product_project') }}"
                                                                    style="padding: 0px 30px;" type="submit"
                                                                    class="mdl-button mdl-js-button mdl-button--raised btn-back"
                                                                    data-upgraded=",MaterialButton">
                                                                    Back
                                                                </a>
                                                                <button type="submit"
                                                                    style="padding: 0px 30px;" type="submit"
                                                                    class="mdl-button mdl-js-button mdl-button--raised color--gray"
                                                                    data-upgraded=",MaterialButton">
                                                                    Submit
                                                            </button>
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
    </main>
    <script>
        // Function to update the total based on the selected material
        function updateTotal(materialPrice,material) {
            var totalElement = document.getElementById("total");
            var namematerial = document.getElementById("name-material");
            var currentTotal = parseFloat(totalElement.textContent.replace("RM", "").trim());
            var newTotal = materialPrice;
            totalElement.textContent = "RM " + newTotal.toFixed(2);
            namematerial.textContent = material;
        }

        // Add click event listeners to the material options
        document.getElementById("full-material").addEventListener("click", function () {
            // Update the total when Full Leather is clicked
            updateTotal(3900,'Full Leather'); // Replace 100 with the actual price for Full Leather
        });

        document.getElementById("semi-material").addEventListener("click", function () {
            // Update the total when Semi Leather is clicked
            updateTotal(3200,'Semi Leather'); // Replace 75 with the actual price for Semi Leather
        });

        document.getElementById("pvc-material").addEventListener("click", function () {
            // Update the total when PVC is clicked
            updateTotal(3000,'PVC'); // Replace 50 with the actual price for PVC
        });
    </script>

@endsection
