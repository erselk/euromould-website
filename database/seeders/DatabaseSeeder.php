<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Page;
use App\Models\Service;
use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::firstOrCreate(
            ['email' => 'info@euromould.com.tr'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );

        // General Settings
        GeneralSetting::firstOrCreate([
            'site_name' => 'EuroMould',
            'contact_email' => 'info@euromould.com.tr',
            'logo' => 'images/logo.png',
            'contact_phone' => '(0212) 879 00 16',
            'address' => "Beylikdüzü OSB, 3. Cd. Birlik sanayi sitesi No:71\n34524 Beylikdüzü/İstanbul",
            'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.0814740080796!2d28.659471099999998!3d41.0015899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b55f9b6e737abd%3A0x6e9cb191a35a758b!2sEuroMould!5e0!3m2!1str!2str!4v1766611042380!5m2!1str!2str" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        ]);

        // Services (Updated Long Descriptions)
        $services = [
            [
                'title' => 'Plastik Enjeksiyon Kalıp İmalatı',
                'slug' => 'plastik-enjeksiyon-kalip-imalati',
                'description' => 'Otomotiv, beyaz eşya, medikal ve elektronik sektörlerinin ihtiyaç duyduğu yüksek hassasiyetli kalıpları, son teknoloji CNC parkurumuzla üretiyoruz.',
                'long_description' => '
<p class="mb-6">Euro Mould, plastik enjeksiyon kalıp imalatında 20 yılı aşkın süredir edindiği derin tecrübeyi, en son teknoloji ile harmanlayarak müşterilerine sunmaktadır. Kalıp imalatı sürecimiz, sadece plastiğe şekil vermek değil, müşterimizin üretim verimliliğini, ürün kalitesini ve parça başına düşen maliyetini optimize eden stratejik bir mühendislik sürecidir.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Teknolojik Altyapımız ve Üretim Gücümüz</h3>
<p class="mb-6">Üretim parkurumuzda bulunan <strong>Yüksek Devirli (HSM) CNC İşleme Merkezleri</strong>, en karmaşık 3D yüzeyleri bile mikron mertebesinde hassasiyetle işleyebilmemizi sağlar. 42.000 devir/dakika hıza ulaşabilen iş milleri sayesinde, sertleştirilmiş çeliklerin (50-52 HRC üstü) işlenmesi sırasında bile mükemmel yüzey kalitesi (Ra 0.4 ve altı) elde edilir. Bu durum, kalıbın son parlatma süresini kısaltarak teslim sürelerini ciddi oranda düşürür.</p>

<p class="mb-6">Dalma Erezyon (EDM) ve Tel Erezyon tezgahlarımızla, takımın giremediği keskin köşeler, derin feder yapıları ve hassas itici yuvaları ±0.005mm toleransla işlenir. Kullandığımız grafit elektrot teknolojisi sayesinde elektrot aşınması minimize edilirken, işleme hızı ve yüzey kalitesi maksimize edilir.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Çelik ve Malzeme Uzmanlığı</h3>
<p class="mb-6">Bir kalıbın ömrünü belirleyen en kritik faktör doğru çelik seçimidir. Projenizin gereksinimlerine göre;
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li>Yüksek parlaklık gerektiren parçalar için <strong>Stavax ESR</strong> veya <strong>Uddeholm Mirrax</strong> gibi paslanmaz kalıp çelikleri,</li>
    <li>Aşındırıcı (cam elyaf katkılı) plastikler için <strong>Böhler K110</strong> veya özel kaplamalı çelikler,</li>
    <li>Büyük ve yapısal parçalar için ön sertleştirilmiş <strong>1.2738</strong> veya <strong>P20</strong> çelikler kullanıyoruz.</li>
</ul>
Doğru çelik seçimi ve doğru ısıl işlem prosesi, kalıbınızın milyonlarca baskı ömrüne ulaşmasını garanti altına alır.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Soğutma Sistemleri ve Çevrim Süresi Optimizasyonu</h3>
<p>Kalıpçılıkta "zaman nakittir". Enjeksiyon döngüsünün en uzun kısmı soğuma süresidir. Mühendislerimiz, konformal soğutma kanalları (conformal cooling) ve optimize edilmiş su yolları tasarlayarak kalıp yüzeyindeki sıcaklık dağılımını homojen hale getirir. Bu yaklaşım, sadece parça çarpılmalarını önlemekle kalmaz, aynı zamanda çevrim süresini %20-%30 oranında kısaltarak üretim kapasitenizi artırır.</p>',
                'image' => 'images/cnc-production-line.webp',
                'sort' => 1
            ],
            [
                'title' => 'Ürün Geliştirme & Kalıp Tasarımı',
                'slug' => 'urun-gelistirme-ve-kalip-tasarimi',
                'description' => 'Sadece bir kalıp çizimi değil; üretilebilirlik analizleri (DFM), Moldflow simülasyonları ve maliyet optimizasyonu içeren bütüncül bir mühendislik hizmeti sunuyoruz.',
                'long_description' => '
<p class="mb-6">Başarılı bir plastik ürün, kusursuz bir tasarımla başlar. Ancak her estetik tasarım, seri üretime uygun olmayabilir. Euro Mould Mühendislik Departmanı olarak, fikir aşamasındaki eskizlerinizden veya bitmiş 3D datalarınızdan yola çıkarak, projenizi seri üretime en uygun hale getiriyoruz.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">DFM (Design for Manufacturing) Analizi</h3>
<p class="mb-6">Kalıp tasarımına başlamadan önce detaylı bir <strong>Üretilebilirlik Analizi</strong> gerçekleştiriyoruz. Bu süreçte şunları inceliyoruz:
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li><strong>Ters Açılar:</strong> Kalıp açılma yönüne engel olan bölgelerin tespiti ve maça sistemlerinin kurgulanması.</li>
    <li><strong>Et Kalınlığı:</strong> Düzensiz et kalınlıklarının neden olabileceği çökme (sink mark) ve boşluk (void) risklerinin belirlenmesi.</li>
    <li><strong>Kalıp Ayırma Hattı:</strong> Görsel açıdan en az dikkat çeken ve çapak riskini en aza indiren ayırma hattının belirlenmesi.</li>
</ul>
</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Moldflow Akış Simülasyonu</h3>
<p class="mb-6">Sanal ortamda gerçekleştirdiğimiz <strong>Moldflow analizleri</strong> ile plastiğin kalıp içindeki dolum davranışını simüle ediyoruz. Bu sayede:
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li>Enjeksiyon noktalarının (gate location) en doğru konumlarını belirliyoruz.</li>
    <li>Hava sıkışması (air trap) ve birleşme izi (weld line) oluşabilecek bölgeleri öngörüp tedbir alıyoruz.</li>
    <li>Kalıp içi basınç kayıplarını hesaplayarak uygun tonajdaki makine seçimini sağlıyoruz.</li>
</ul>
Sonuç olarak, deneme baskılarında ("try-out") oluşabilecek sürprizleri sıfıra indiriyoruz.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">İleri CAD/CAM Yetenekleri</h3>
<p>SolidWorks, Siemens NX ve Cimatron gibi endüstri standardı yazılımlar kullanarak %100 parametrik tasarımlar yapıyoruz. Bu, olası bir ürün revizyonunda kalıp tasarımının çok hızlı bir şekilde güncellenebilmesini sağlar. Tasarladığımız tüm kalıplar, standartlaştırılmış kalıp elemanları (Hasmco, DME, Meusburger vb.) kullanılarak kurgulanır, böylece gelecekteki bakım ve yedek parça temini kolaylaşır.</p>',
                'image' => 'images/mold-design-engineering.png',
                'sort' => 2
            ],
            [
                'title' => 'Kalıp Bakım, Onarım ve Revizyon',
                'slug' => 'kalip-bakim-ve-revizyon',
                'description' => 'Üretim hattınızın durmaması için 7/24 acil müdahale, periyodik bakım hizmetleri ve ürün değişikliklerine adaptasyon için hassas revizyon çözümleri.',
                'long_description' => '
<p class="mb-6">Plastik enjeksiyon kalıpları, yüksek basınç ve sıcaklık altında çalışan, zamanla aşınan ve yorulan pahalı ekipmanlardır. Bir kalıbın plansız duruşu, üretim hattında ciddi maliyet kayıplarına yol açabilir. Euro Mould Servis Birimi, hem kendi ürettiğimiz kalıplar hem de diğer firmalara ait kalıplar için profesyonel bakım ve onarım hizmeti sunmaktadır.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Periyodik ve Önleyici Bakım</h3>
<p class="mb-6">Arıza oluşmadan önce müdahale etmek en doğru stratejidir. Periyodik bakımlarımız şunları kapsar:
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li><strong>Ultrasonik Temizlik:</strong> Kalıp gözlerinin, soğutma kanallarının (kireç temizliği) ve havalandırma kanallarının tıkanıklıklarının giderilmesi.</li>
    <li><strong>Kilit Sistemleri Kontrolü:</strong> Maça kilitlerinin, boynuz pimlerinin ve sürtünme plakalarının aşınma kontrolü ve yağlanması.</li>
    <li><strong>Sızdırmazlık Testleri:</strong> O-ring ve su contalarının basınç altında test edilmesi.</li>
</ul>
</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Lazer Kaynak ve Hassas Onarım</h3>
<p class="mb-6">Kullanım hatası veya metal yorgunluğu sonucu oluşan kırılmalar, ezilmeler veya çatlaklar, son teknoloji <strong>Lazer Kaynak</strong> cihazımızla onarılır. Lazer kaynak, malzemeye çok az ısı girdisi sağladığı için kalıpta çarpılma veya sertlik kaybı (meneviş) yaşanmaz. Kaynak sonrası bölge, CNC veya tesviye işlemleriyle orijinal geometrisine kavuşturulur.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Kalıp Revizyonu ve Modifikasyon</h3>
<p>Ürün tasarımında yapılan değişikliklerin kalıba yansıtılması (ECO - Engineering Change Order), hassas bir süreçtir. Mevcut çelik yapının elverdiği ölçüde, kaynak dolgu veya insert (lokma) değişimi yöntemleriyle revizyonlar gerçekleştirilir. Eski ve verimsiz çalışan kalıplarınızın soğutma sistemleri iyileştirilerek veya yolluk sistemleri modernize edilerek (soğuk yolluktan sıcak yolluğa geçiş vb.) çevrim süreleri iyileştirilebilir.</p>',
                'image' => 'images/mold-maintenance.webp',
                'sort' => 3
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        // Pages Data

        // 1. Home Page
        Page::updateOrCreate(['slug' => 'home'], [
            'title' => 'Anasayfa',
            'is_published' => true,
            'content' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'title' => "MÜHENDİSLİK TUTKUSUYLA\nKUSURSUZ İMALAT",
                        'subtitle' => 'EUROMOULD KALIP TEKNOLOJİLERİ',
                        'bg_image' => 'images/hero-main.webp',
                    ]
                ],
                [
                    'type' => 'features_grid',
                    'data' => [
                        'title' => 'Neden Euro Mould?',
                        'description' => 'Bizi sektördeki diğerlerinden ayıran, sadece makine parkurumuz değil; işimize olan tutkumuz ve kaliteye verdiğimiz önemdir.',
                        'features' => [
                            ['title' => 'Mikron Hassasiyet', 'description' => '±0.005mm işleme toleransı ile en kritik ve hassas parçalarda bile mükemmel sonuçlar elde ediyoruz. Kalite kontrol süreçlerimizle hataya yer bırakmıyoruz.'],
                            ['title' => 'Zamanında Teslimat', 'description' => 'Zamanın sizin için nakit olduğunu biliyoruz. Dijital proje yönetimi sistemimizle kalıplarınızı söz verdiğimiz tarihte, T1 baskısına hazır şekilde teslim ediyoruz.'],
                            ['title' => 'İleri Teknoloji', 'description' => 'Yüksek hızlı 5 eksen CNC tezgahlar, robotik otomasyon sistemleri ve güncel CAD/CAM yazılımlarıyla donatılmış modern üretim tesisimizle hizmetinizdeyiz.'],
                        ]
                    ]
                ],
                [
                    'type' => 'services_list',
                    'data' => [
                        'title' => 'Üretim ve Hizmet Alanlarımız',
                        'subtitle' => 'NELER YAPIYORUZ?',
                        'count' => 3
                    ]
                ],
                [
                    'type' => 'content_with_image',
                    'data' => [
                        'subtitle' => 'KURUMSAL',
                        'title' => 'Tecrübe ve Teknolojinin Buluşma Noktası',
                        'content' => '<p class="mb-6">Euro Mould, kurulduğu günden bu yana plastik enjeksiyon kalıp sektöründe kalite, güven ve inovasyonun simgesi olmuştur. Beylikdüzü Organize Sanayi Bölgesi\'ndeki modern tesisimizde, deneyimli mühendis kadromuz ve güçlü teknolojik altyapımızla ulusal ve uluslararası pazara hizmet veriyoruz.</p>',
                        'video_embed_code' => '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/b1U9W4iNDiQ?si=Yx1j8Q6nO__9v9X_&autoplay=1" title="Plastic Injection Molding" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                        'image_position' => 'right',
                        'button_text' => 'Bizi Daha Yakından Tanıyın',
                        'button_url' => '/hakkimizda',
                        'bg_slate' => true
                    ]
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'title' => 'Projenizi Birlikte Hayata Geçirelim',
                        'description' => 'Teknik çizimlerinizi veya numunelerinizi bizimle paylaşın. Uzman mühendis ekibimiz, projeniz için en verimli üretim yöntemini, kalıp yapısını ve detaylı maliyet analizini sizin için hazırlasın.',
                        'button_text' => 'Hemen Teklif Alın',
                        'button_url' => '/teklif-al'
                    ]
                ]
            ]
        ]);

        // 2. About Us
        Page::updateOrCreate(['slug' => 'hakkimizda'], [
            'title' => 'Hakkımızda',
            'is_published' => true,
            'content' => [
                [
                    'type' => 'page_header',
                    'data' => [
                        'title' => 'ÇÖZÜM ODAKLI YAKLAŞIM',
                        'subtitle' => 'KURUMSAL KİMLİĞİMİZ',
                        'bg_image' => 'images/IMG_1956.webp',
                    ]
                ],
                [
                    'type' => 'text_block',
                    'data' => [
                        'content' => '
<p class="lead text-center text-2xl font-medium text-slate-800 mb-12 max-w-4xl mx-auto leading-normal">
    Euro Mould, tasarım ve imalatta toplam kalite yönetimini benimseyerek, ürettiği her kalıpla müşteri memnuniyetini sürdürülebilir kılmayı hedeflemektedir.
</p>
<div class="max-w-4xl mx-auto text-slate-600 space-y-6 text-lg">
    <p>
        Kurulduğumuz günden bu yana, plastik kalıp sektöründeki teknolojik gelişmeleri yakından takip ederek makine parkurumuzu ve insan kaynağımızı sürekli geliştirdik. Bugün Beylikdüzü Organize Sanayi Bölgesi\'nde yer alan modern tesisimizde, otomotiv, medikal, beyaz eşya ve elektronik gibi yüksek beklentili sektörlere çözüm ortaklığı yapmaktayız.
    </p>
    <p>
        Firmamız, sadece bir "imalatçı" değil, aynı zamanda müşterilerinin projelerine değer katan bir mühendislik partneridir. Projenin ilk aşamasından, ürünün rafa çıkacağı ana kadar tüm süreçlerde teknik destek, optimizasyon ve danışmanlık hizmeti sunuyoruz. Şefaflık, dürüstlük ve teknik mükemmeliyet, şirket kültürümüzün temel taşlarıdır.
    </p>
    <p>
        Endüstri 4.0 vizyonumuz çerçevesinde, üretim süreçlerimizi dijitalleştiriyor, hatasız ve izlenebilir bir üretim yönetimi uyguluyoruz. Sürdürülebilirlik ilkelerimiz gereği, enerji verimliliği yüksek makineler kullanıyor ve üretim atıklarımızı minimize ediyoruz.
    </p>
</div>'
                    ]
                ],
                [
                    'type' => 'stats',
                    'data' => [
                        'stats' => [
                            ['value' => '20+', 'label' => 'Yıllık Sektör Tecrübesi'],
                            ['value' => '1000+', 'label' => 'Başarıyla Teslim Edilen Kalıp'],
                            ['value' => '3500m2', 'label' => 'Kapalı Üretim Alanı'],
                            ['value' => '15+', 'label' => 'İhracat Yapılan Ülke'],
                        ]
                    ]
                ],
                 [
                    'type' => 'content_with_image',
                    'data' => [
                        'subtitle' => 'ÜRETİM TESİSİMİZ',
                        'title' => 'Modern Makine Parkuru',
                        'content' => '<p class="mb-4">Üretim kalitemizin temelinde, sürekli güncellediğimiz ve bakımını aksatmadığımız güçlü makine parkurumuz yatar. Yüksek hızlı CNC işleme merkezleri, hassas dalma erezyon tezgahları ve kalite kontrol laboratuvarımızla, en zorlu toleransları bile standart bir süreç haline getiriyoruz.</p>',
                        'image' => 'images/cnc-production-line.webp',
                        'image_position' => 'left',
                    ]
                ],
            ]
        ]);

        // 3. Services Page
        Page::updateOrCreate(['slug' => 'hizmetler'], [
            'title' => 'Hizmetlerimiz',
            'is_published' => true,
            'content' => [
                [
                    'type' => 'page_header',
                    'data' => [
                        'title' => 'ENDÜSTRİYEL KALIP ÇÖZÜMLERİ',
                        'subtitle' => 'FAALİYET ALANLARIMIZ',
                         'bg_image' => 'images/IMG_1951.webp',
                    ]
                ],
                 [
                    'type' => 'services_list',
                    'data' => [
                        'title' => 'Tüm Hizmetlerimiz',
                        'subtitle' => 'NELER SUNUYORUZ?',
                        'count' => 10
                    ]
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'title' => 'Özel Projeleriniz İçin Yanınızdayız',
                        'description' => 'Standart dışı talepleriniz, özel alaşım kalıpları veya tersine mühendislik ihtiyaçlarınız için teknik ekibimizle iletişime geçin.',
                        'button_text' => 'Bize Yazın',
                        'button_url' => '/iletisim'
                    ]
                ]
            ]
        ]);

        // 4. Contact Page
        Page::updateOrCreate(['slug' => 'iletisim'], [
            'title' => 'İletişim',
            'is_published' => true,
            'content' => [
                [
                     'type' => 'page_header',
                    'data' => [
                        'title' => 'BİZE ULAŞIN',
                        'subtitle' => 'MERKEZ OFİS & FABRİKA',
                         'bg_image' => 'images/IMG_1953.webp',
                    ]
                ],
                [
                    'type' => 'contact_form',
                    'data' => [
                        'title' => 'İletişim Bilgileri'
                    ]
                ]
            ]
        ]);
        
         Page::updateOrCreate(['slug' => 'galeri'], [
             'title' => 'Galeri',
             'is_published' => true,
             'content' => [
                 [
                    'type' => 'page_header',
                    'data' => [
                        'title' => 'ÜRETİM TESİSİMİZ',
                        'subtitle' => 'FOTOĞRAF GALERİSİ',
                         'bg_image' => 'images/hero-main.webp',
                    ]
                ],
                [
                     'type' => 'content_with_image',
                     'data' => [
                         'title' => 'CNC İşleme Hattı',
                         'content' => '<p>Firmamız bünyesindeki son teknoloji CNC işleme merkezleri, 7/24 kesintisiz üretim kapasitesine sahiptir. Operatör hatalarını minimize eden otomasyon sistemleri ve hassas takım ölçme problarıyla donatılmış tezgahlarımızda, kalıp çekirdekleri ve hamilleri, tek bağlamada bitmiş yüzey kalitesine ulaştırılmaktadır.</p>',
                         'image' => 'images/cnc-production-line.webp',
                         'image_position' => 'right'
                     ]
                ],
                [
                     'type' => 'content_with_image',
                     'data' => [
                         'title' => 'Tasarım ve Mühendislik Ofisi',
                         'content' => '<p>Tüm üretim sürecinin beyni olan tasarım ofisimiz, yenilikçi fikirlerin somut projelere dönüştüğü yerdir. Uzman mühendislerimiz, parça datasının incelenmesinden kalıp tasarımına, elektrot tasarımından CAM programlamaya kadar tüm süreçleri dijital ikiz (digital twin) mantığıyla yönetir. Bu sayede üretimde hata payı sıfıra indirgenir.</p>',
                         'image' => 'images/mold-design-engineering.png',
                         'image_position' => 'left'
                     ]
                ],
                 [
                     'type' => 'content_with_image',
                     'data' => [
                         'title' => 'Montaj ve Alıştırma Bölümü',
                         'content' => '<p>İşlenen tüm kalıp bileşenleri, tecrübeli kalıp ustalarımız tarafından titizlikle montaj hattına alınır. Mavi macun alıştırması (blue matching) yapılarak kalıp ayırma yüzeylerinin mükemmel öpüşmesi sağlanır. Bu aşama, kalıbın çapaksız baskı yapabilmesi için üretim sürecinin en kritik manuel işlemidir.</p>',
                         'image' => 'images/factory-overview.webp',
                         'image_position' => 'right'
                     ]
                ]
             ]
        ]);
    }
}
