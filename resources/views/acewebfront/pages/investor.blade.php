@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('system_logo_white')) }}">
@endsection
@section('content')
    <main>
        <iframe style="width:100%;height:100vh" src="https://feytech.listedcompany.com/home.html" frameborder="0"></iframe>
    </main>
@endsection
