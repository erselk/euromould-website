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
            'logo' => 'images/logo.png', // Correct column name
            'contact_phone' => '(0212) 879 00 16',
            'address' => "Beylikdüzü OSB, 3. Cd. Birlik sanayi sitesi No:71\n34524 Beylikdüzü/İstanbul",
            'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.5976722883025!2d28.63845931541483!3d40.99964897930164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b55f6516104bc5%3A0xc47e3079a49594a9!2sBeylikd%C3%BCz%C3%BC%20OSB%2C%20Birlik%20Sanayi%20Sitesi%2C%203.%20Cd.%20No%3A71%2C%2034524%20Beylikd%C3%BCz%C3%BC%2F%C4%B0stanbul!5e0!3m2!1str!2str!4v1647863541234!5m2!1str!2str" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
        ]);

        // Services (Updated Images with new filenames)
        $services = [
            [
                'title' => 'Plastik Enjeksiyon Kalıp İmalatı',
                'slug' => 'plastik-enjeksiyon-kalip-imalati',
                'description' => 'Otomotiv, beyaz eşya, medikal ve elektronik sektörlerinin ihtiyaç duyduğu yüksek hassasiyetli kalıpları, son teknoloji CNC parkurumuzla üretiyoruz.',
                'long_description' => '<p>Euro Mould olarak, plastik enjeksiyon kalıp imalatında 20 yılı aşkın tecrübemizle sektöre yön veriyoruz. Üretim süreçlerimizde kullandığımız yüksek devirli (HSM) CNC işleme merkezleri ve hassas dalma erezyon tezgahları sayesinde, en zorlu geometrilere sahip parçaları bile mikron mertebesinde hassasiyetle işleyebiliyoruz.</p><p>Kalıp imalatı sadece çeliği işlemek değildir; doğru çelik seçimi (1.2344, 1.2379, 1.2738, Stavax vb.), doğru ısıl işlem ve hassas montaj süreçlerinin bütünüdür. Euro Mould, projenizin gereksinimlerine (baskı adedi, plastik hammadde türü, görsel beklentiler) en uygun kalıp yapısını belirler ve uygular.</p><h3 class="text-xl font-bold mt-8 mb-4">Üretim Yeteneklerimiz</h3><ul class="list-disc pl-6 space-y-3 mb-8 text-slate-700"><li><strong>Prototip Kalıplar:</strong> Seri üretim öncesi tasarım doğrulama ve pazar testleri için hızlı ve düşük maliyetli alüminyum veya ön sertleştirilmiş çelik kalıplar.</li><li><strong>Seri Üretim Kalıpları:</strong> Milyonlarca baskı ömrüne sahip, yüksek çevrim hızına odaklı, optimum soğutma sistemleriyle donatılmış çelik kalıplar.</li><li><strong>Çok Gözlü Kalıplar:</strong> Yüksek üretim adetleri için optimize edilmiş, sıcak yolluk sistemleriyle desteklenen, balanslı dolum sağlayan çok gözlü kalıplar.</li></ul>',
                'image' => 'images/cnc-production-line.webp',
                'sort' => 1
            ],
            [
                'title' => 'Ürün Geliştirme & Kalıp Tasarımı',
                'slug' => 'urun-gelistirme-ve-kalip-tasarimi',
                'description' => 'Sadece bir kalıp çizimi değil; üretilebilirlik analizleri (DFM), Moldflow simülasyonları ve maliyet optimizasyonu içeren bütüncül bir mühendislik hizmeti sunuyoruz.',
                'long_description' => '<p>Kusursuz bir plastik parça, kusursuz bir tasarımla başlar. Mühendislik departmanımız, müşterilerimizden gelen dataları veya fikirleri, üretime en uygun hale getirmek için titizlikle çalışır.</p><h3 class="text-xl font-bold mt-8 mb-4">Tasarım Sürecimiz</h3><div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6"><div class="bg-slate-50 p-6 border border-slate-200"><h4 class="font-bold text-slate-900 mb-2">DFM Analizi</h4><p class="text-sm leading-relaxed text-slate-600">Parça üzerindeki ters açılar, et kalınlığı düzensizlikleri analiz edilir.</p></div><div class="bg-slate-50 p-6 border border-slate-200"><h4 class="font-bold text-slate-900 mb-2">Moldflow Akış Analizi</h4><p class="text-sm leading-relaxed text-slate-600">Plastiğin kalıp içindeki davranışı dijital ortamda simüle edilir.</p></div></div>',
                'image' => 'images/mold-design-engineering.png', // New Generated Image
                'sort' => 2
            ],
            [
                'title' => 'Kalıp Bakım, Onarım ve Revizyon',
                'slug' => 'kalip-bakim-ve-revizyon',
                'description' => 'Üretim hattınızın durmaması için 7/24 acil müdahale, periyodik bakım hizmetleri ve ürün değişikliklerine adaptasyon için hassas revizyon çözümleri.',
                'long_description' => '<p>Plastik enjeksiyon kalıpları, ağır üretim şartlarında çalışan ve zamanla yıpranan pahalı yatırımlardır. Euro Mould Servis Departmanı, profesyonel bakım hizmeti verir.</p><h3 class="text-xl font-bold mt-8 mb-4">Hizmetlerimiz</h3><ul class="list-disc pl-6 space-y-3 mb-8 text-slate-700"><li><strong>Periyodik Bakım:</strong> Kalıbın tamamen sökülerek ultrasonik banyoda temizlenmesi.</li><li><strong>Hassas Onarım:</strong> Kırılan itici pimlerin değişimi, ezilen ayırma yüzeylerinin lazer kaynak ile onarımı.</li></ul>',
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
                        'content' => '<p class="lead text-center text-xl font-medium text-slate-700 mb-8 max-w-4xl mx-auto">Euro Mould, tasarım ve imalatta toplam kalite yönetimini benimseyerek, ürettiği her kalıpla müşteri memnuniyetini sürdürülebilir kılmayı hedeflemektedir.</p><p class="text-center max-w-4xl mx-auto text-slate-600">Firmamız profesyonel yönetim anlayışı, 20 yılı aşkın tecrübeye sahip çekirdek kadrosu ve endüstri 4.0 uyumlu makine parkuruyla imalat süreçlerini yönetmektedir.</p>'
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
                        'content' => '<p class="mb-4">Üretim kalitemizin temelinde, sürekli güncellediğimiz ve bakımını aksatmadığımız güçlü makine parkurumuz yatar.</p>',
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
                         'content' => '<p>Yüksek hassasiyetli CNC parkurumuz.</p>',
                         'image' => 'images/cnc-production-line.webp',
                         'image_position' => 'right'
                     ]
                ],
                [
                     'type' => 'content_with_image',
                     'data' => [
                         'title' => 'Tasarım Ofisi',
                         'content' => '<p>Deneyimli mühendis kadromuz.</p>',
                         'image' => 'images/mold-design-engineering.png',
                         'image_position' => 'left'
                     ]
                ]
             ]
        ]);
    }
}
