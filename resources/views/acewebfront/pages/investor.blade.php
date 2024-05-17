@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('system_logo_white')) }}">
@endsection
@section('content')
    <main>
        <iframe class="iframe-investor" id="myIframe" src="https://feytech.listedcompany.com/home.html"  width="100%"></iframe>
    </main>
@endsection
