@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('system_logo_white')) }}">
@endsection
@section('content')
    <main>
        <iframe style="height:100vh"  id="iframes" src="https://developboy.my.id/"
            width="100%"></iframe>
    </main>
@endsection
