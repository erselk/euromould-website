@component('mail::message')
# {{ $data['title'] ?? 'Yeni İletişim Mesajı' }}

Siteden yeni bir iletişim formu dolduruldu. Detaylar aşağıdadır:

**Ad Soyad:** {{ $data['name'] ?? 'Test Kullanıcı' }}  
**E-posta:** {{ $data['email'] ?? 'test@example.com' }}  
**Telefon:** {{ $data['phone'] ?? '+90 555 000 00 00' }}  
**Konu:** {{ $data['subject'] ?? 'Genel Bilgi' }}  

**Mesaj:**  
{{ $data['message'] ?? 'Bu bir test iletişim formu mesajıdır.' }}

@component('mail::button', ['url' => config('app.url')])
Web Sitesine Git
@endcomponent

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
