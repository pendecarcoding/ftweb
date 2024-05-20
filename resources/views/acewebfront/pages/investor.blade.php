@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('system_logo_white')) }}">
@endsection
@section('content')
    <main>
        <iframe scrolling="no" class="iframe-investor"  id="iframes" src="https://feytech.listedcompany.com/home.html"
            width="100%"></iframe>
    </main>
@endsection
