@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('system_logo_white')) }}">
@endsection
@section('content')

        <iframe src="https://feytech.listedcompany.com/home.html" style="width: 100%;" id="myIframe"></iframe>
        <script>
            // Selecting the iframe element
            var iframe = document.getElementById("myIframe");
            
            // Adjusting the iframe height onload event
            iframe.onload = function(){
                iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
            }
            </script>
    
@endsection
