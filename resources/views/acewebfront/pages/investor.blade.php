@extends('acewebfront.layouts')
@section('meta')
    <meta property="og:image" content="{{ uploaded_asset(get_setting('system_logo_white')) }}">
@endsection
@section('content')
    <main>
        <iframe  id="iframe" src="https://developboy.my.id/"
            width="100%"></iframe>
    </main>

    <script>
        // Fungsi untuk mengirim pesan ke iframe
        function requestHeight() {
          const iframe = document.getElementById('iframe');
          iframe.contentWindow.postMessage('getHeight', 'https://developboy.my.id/');
        }
    
        // Mendengarkan pesan balasan dari iframe
        window.addEventListener('message', (event) => {
          // Memastikan pesan berasal dari domain yang diharapkan
          if (event.origin === 'https://developboy.my.id/') {
            if (event.data.height) {
              console.log('Tinggi halaman iframe:', event.data.height);
              // Anda dapat menggunakan tinggi ini untuk menyesuaikan iframe atau lainnya
              const iframe = document.getElementById('iframe');
              iframe.style.height = event.data.height + 'px';
            }
          }
        });
    
        // Meminta tinggi setelah iframe dimuat
        window.onload = function() {
          requestHeight();
        };
      </script>
@endsection
