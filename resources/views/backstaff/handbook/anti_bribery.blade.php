@extends('acewebfront.layouts')
@section('content')
    <script type="text/javascript">
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        }, false);
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <main id="my-pdf">

        <section class="ace-investor">

            <div class="col-md-12">
                <div class="banner-static">
                    <img class="img-responsive-banner" src="/public/aceweb/assets/img/contact-banner.png"
                        alt="ACE-BANNER-PRODUCT">
                </div>
            </div>
        </section>
        <section class="gtp-ann">
            <div class="container-fluid">
                <div class="row">
                    @include('backstaff.sidebar')


                    <br>




                    <div class="col-sm-9" style="padding: 36px;">
                        <!--
                            if the pdf file does not appear you can use the following link : <a target="_blank" href="https://docs.google.com/viewer?url=https://corpweb.ace2u.com/public/uploads/all/heeL4Nh2Ce6OQt6hJBF0SrRQQn6hSTGG8rJqWdNt.pdf&embedded=true">Link PDF</a> -->
                        <div class="well" style="margin-top:50px">
                            <!-- <iframe src="https://docs.google.com/viewer?url=https://corpweb.ace2u.com/public/uploads/all/heeL4Nh2Ce6OQt6hJBF0SrRQQn6hSTGG8rJqWdNt.pdf&embedded=true" style="width:100%; height:100vh;" frameborder="0"></iframe> -->
                            <!-- <embed
                                    src="https://corpweb.ace2u.com/public/uploads/all/heeL4Nh2Ce6OQt6hJBF0SrRQQn6hSTGG8rJqWdNt.pdf"
                                    style="width:100%;height: 85vh;" type="application/pdf"> -->
                            <!--
                                    <embed src="https://corpweb.ace2u.com/public/uploads/all/heeL4Nh2Ce6OQt6hJBF0SrRQQn6hSTGG8rJqWdNt.pdf" type="application/pdf" width="600" height="780"
                                    oncontextmenu="return false" onkeydown="return false" onmousedown="return false"
                                    onselectstart="return false"></embed> -->
                            <!-- <iframe
    src="https://corpweb.ace2u.com/public/uploads/all/heeL4Nh2Ce6OQt6hJBF0SrRQQn6hSTGG8rJqWdNt.pdf#toolbar=0"
    width="100%"
    height="780"
    style="border:none;" id="fraDisabled"
    onload="disableContextMenu();" onMyLoad="disableContextMenu();"> </iframe> -->
                            <div id="adobe-dc-view" style="width:100%;height:800px"></div>
                            <br>
                            <input value="1" type="checkbox" name="allow_handbook" onclick="disableCheckbox(this)"
                                id="myCheckbox" {{ checkagree('antibribery') }}> &nbsp;By clicking here, I state that I have
                            read and understood the  Anti-Bribery and Corruption Policy
                            <script src="https://acrobatservices.adobe.com/view-sdk/viewer.js"></script>
                            <script type="text/javascript">
                                document.addEventListener("adobe_dc_view_sdk.ready", function() {
                                    var adobeDCView = new AdobeDC.View({
                                        clientId: "f47ddb205d3849698c91458a8740eb8d",
                                        divId: "adobe-dc-view"
                                    });
                                    adobeDCView.previewFile({
                                        content: {
                                            location: {
                                                url: "/public/aceweb/pdf/anti_bribery.pdf"
                                            }
                                        },
                                        metaData: {
                                            fileName: "."
                                        }
                                    }, {
                                        showAnnotationTools: false,
                                        showDownloadPDF: false,
                                        showPrintPDF: false
                                    });
                                });
                            </script>

                        </div>








                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        function disableCheckbox(checkbox) {
            if (checkbox.checked) {
                checkbox.disabled = true;
            }
        }

        //SEND TO SERVER
        $(document).ready(function() {
            // Set up CSRF token for Ajax requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#myCheckbox').on('change', function() {
                var isChecked = $(this).is(':checked');
                var data = {
                    isChecked: isChecked,
                    type: 'antibribery'
                };

                $.ajax({
                    url: "{{ route('agree.staff') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        location.reload();
                        // window.location.href = "{{ route('staff.ethic') }}";
                        console.log(response);
                    },
                    error: function(xhr) {
                        // Handle any errors that occur during the request
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
