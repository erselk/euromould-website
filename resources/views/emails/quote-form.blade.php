@component('mail::message')
# {{ $data['title'] ?? 'Yeni Teklif Talebi' }}

Siteden yeni bir teklif formu dolduruldu. Detaylar aşağıdadır:

**Ad Soyad:** {{ $data['name'] ?? 'Test Kullanıcı' }}  
**Firma:** {{ $data['company'] ?? '-' }}
**E-posta:** {{ $data['email'] ?? 'teklif@example.com' }}  
**Telefon:** {{ $data['phone'] ?? '+90 555 111 22 33' }}  
**İstenen Hizmet / Ürün:** {{ $data['service'] ?? 'Plastik Enjeksiyon Kalıbı' }}  

**Teklif Detayı / Açıklama:**  
{{ $data['details'] ?? 'Bu bir test teklif talebi detay açıklamasıdır.' }}

@component('mail::button', ['url' => config('app.url')])
Web Sitesine Git
@endcomponent

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
