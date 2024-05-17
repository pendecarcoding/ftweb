@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('system_logo_white')) }}">
@endsection
@section('content')
    <main>
        <iframe id="myIframe" src="https://feytech.listedcompany.com/home.html" style="min-height:2000px;"  width="100%"></iframe>
    </main>


@endsection
