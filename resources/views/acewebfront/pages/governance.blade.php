@extends('acewebfront.layouts')
@section('content')
    <main>
        @include('acewebfront.widget.allbaner')
        <section class="gtp-anouncements about-company">
            <div class="content-ace">
                <div class="wrap-content">
                    <div style="padding-top: 0px" class="ace-isi about">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title-ace capital-text">
                                    Corporate Governance
                                    <span class="h-dash" style="font-weight: bold">—</span>
                                </div>
                                <div data-aos="fade-up" data-aos-delay="200"
                                    class="col-md-12 col-sm-12 aos-init aos-animate">

                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            @foreach ($data as $i => $v)
                                <div class="col-md-4 col-sm-12">
                                    <div class="card gov-card">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#myModal{{ $v->id }}" class="inline2 cboxElement">
                                            <img id="audithref" src="{{ getimage($v->icon) }}" alt="audit" width="100px"
                                                height="100px">
                                            <h4>{{ $v->name }}</h4>
                                        </a>
                                    </div>
                                </div>


                                <div class="modal fade" id="myModal{{ $v->id }}">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color:black">{{ $v->name }}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <object data="{{ getpdf($v->pdf) }}" width="100%" height="500px">
                                                </object>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach






                        </div>





                    </div>

                </div>
            </div>
        </section>

    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".toggle-button").click(function() {
                var contentContainer = $(this).prev(".toggle-content");
                contentContainer.toggleClass("expanded");

                if (contentContainer.hasClass("expanded")) {
                    $(this).text("Read less");
                } else {
                    $(this).text("Read more");
                }
            });
        });
    </script>
@endsection
