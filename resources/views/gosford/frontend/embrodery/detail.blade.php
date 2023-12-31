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
                                    <h5 style="color: black;font-weight: bold;">Embrodery</h5>
                                </center>
                                <br>
                                <div class="row" style="height: 600px;">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="card">
                                            <div class="slider-product">
                                                <div style="display: flex;flex-direction: column; padding: 20px;">
                                                    <p>A012-Nappa Leather</p>
                                                    <div class="img-wraping">
                                                        <img style="height: 400px;"
                                                            src="/public/go_system/images/embordydetail.png" alt="">
                                                        <img style="height: 400px;" class="leather-pattern"
                                                            src="/public/go_system/images/embordydetail-nocolor.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div style="padding:20px;height: 600px;">
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



                                                    Step-1 | Color Option
                                                    <!--COLOR OPTION-->
                                                    <div style="display: flex;flex-direction: row;">
                                                        <div class="card-coloroption" style="background-color: #452E34;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #9FC4CE;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #442452;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #8F5153;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #E35A7E;">
                                                        </div>
                                                    </div>
                                                    <div style="display: flex;flex-direction: row;">
                                                        <div class="card-coloroption" style="background-color: #7C6F3B;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #D4C0AD;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #484343;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #272526;">
                                                        </div>
                                                        <div class="card-coloroption" style="background-color: #AAA29C;">
                                                        </div>
                                                    </div>
                                                    <!--END COLOR OPTION-->
                                                    <!--Ecstasy Leather-->
                                                    <br>
                                                    Step-2 | Ecstasy Leather
                                                    <br>

                                                    <div style="display: flex;flex-direction: column;">
                                                        <h6 class="title-right-product">Average Size: 40-45 sq. ft</h6>
                                                        <select style="font-weight: bold;color: #7C7979;"
                                                            class="select-order mdl-textfield__input" type="text"
                                                            name="material" id="material" required>

                                                            <option value="">FULL-HIDE</option>
                                                            <option value="">HALF-HIDE</option>
                                                            <option value="">QUARTER HIDE</option>

                                                        </select>
                                                    </div>
                                                    <!--END Ectasy LEather-->

                                                    <!--Quantity-->
                                                    Step-3 | Quantity
                                                    <!--end Quantity-->
                                                    <div class="wrap-quantity">
                                                        <a class="btn decrease"
                                                            style="width:30%;border: groove;border-radius: 10px;">-</a>
                                                        <p class="counter" style="margin:10px;font-weight: bold;">1</p>
                                                        <a class="btn increase"
                                                            style="width:30%;border: groove;border-radius: 10px;">+</a>
                                                    </div>

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
                                                            <a href="{{ route('gosford.embrodery') }}"
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
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const decreaseButton = document.querySelector(".decrease");
            const increaseButton = document.querySelector(".increase");
            const counterElement = document.querySelector(".counter");

            let counterValue = 1;

            decreaseButton.addEventListener("click", function() {
                if (counterValue > 1) {
                    counterValue--;
                    counterElement.textContent = counterValue;
                }
            });

            increaseButton.addEventListener("click", function() {
                counterValue++;
                counterElement.textContent = counterValue;
            });
        });
    </script>
    <script src="/public/go_system/js/pattern-design.js"></script>
@endsection
