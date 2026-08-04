<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Page;
use App\Models\Service;
use App\Models\GeneralSetting;
use App\Models\GalleryItem;
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
            'logo' => 'images/logoyatay.png',
            'contact_phone' => '+90 (212) 879 00 16',
            'address' => "Beylikdüzü OSB, 3. Cd. Birlik Sanayi Sitesi No:71\n34524 Beylikdüzü/İstanbul",
            'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.0814740080796!2d28.659471099999998!3d41.0015899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b55f9b6e737abd%3A0x6e9cb191a35a758b!2sEuroMould!5e0!3m2!1str!2str!4v1766611042380!5m2!1str!2str" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        ]);

        // Services (Updated Unique Images for All 10 Services)
        $services = [
            [
                'title' => 'Plastik Enjeksiyon Kalıp İmalatı',
                'slug' => 'plastik-enjeksiyon-kalip-imalati',
                'description' => 'Otomotiv, beyaz eşya, medikal ve elektronik sektörlerinin ihtiyaç duyduğu yüksek hassasiyetli kalıpları, son teknoloji CNC parkurumuzla üretiyoruz.',
                'long_description' => '
<p class="mb-6">Euro Mould, plastik enjeksiyon kalıp imalatında 20 yılı aşkın süredir edindiği derin tecrübeyi, en son teknoloji ile harmanlayarak müşterilerine sunmaktadır. Kalıp imalatı sürecimiz, sadece plastiğe şekil vermek değil, müşterimizin üretim verimliliğini, ürün kalitesini ve parça başına düşen maliyetini optimize eden stratejik bir mühendislik sürecidir.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Teknolojik Altyapımız ve Üretim Gücümüz</h3>
<p class="mb-6">Üretim parkurumuzda bulunan <strong>CNC İşleme Merkezleri</strong>, en karmaşık 3D yüzeyleri bile hassasiyetle işleyebilmemizi sağlar. Sertleştirilmiş çeliklerin (50-52 HRC üstü) işlenmesi sırasında bile mükemmel yüzey kalitesi elde edilir. Bu durum, kalıbın son parlatma süresini kısaltarak teslim sürelerini ciddi oranda düşürür.</p>

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
                'image' => 'images/service_plastic_injection.png',
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
                'description' => 'Üretim hattınızın durmaması için acil müdahale, periyodik bakım hizmetleri ve ürün değişikliklerine adaptasyon için hassas revizyon çözümleri sunuyoruz.',
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
                'image' => 'images/service_mold_maintenance.png',
                'sort' => 3
            ],
            [
                'title' => 'Çift Bileşenli (2K) Kalıp Teknolojileri',
                'slug' => 'cift-bilesenli-2k-kalip-teknolojileri',
                'description' => 'Farklı malzeme veya renklerin tek bir kalıpta birleştirildiği, montaj maliyetlerini düşüren ve ürün kalitesini artıran ileri mühendislik çözümleri sunuyoruz.',
                'long_description' => '
<p class="mb-6">Çift bileşenli (2K) enjeksiyon teknolojisi, iki farklı plastiğin aynı kalıp içinde ardışık veya eş zamanlı olarak enjekte edilmesi prensibine dayanır. Bu teknoloji, sızdırmazlık contalı kapaklar, yumuşak dokulu (soft-touch) tutamaklar veya çok renkli butonlar gibi parçaların üretiminde devrim yaratmıştır.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">2K Kalıpların Avantajları</h3>
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li><strong>Montaj Maliyetinin Sıfırlanması:</strong> İki ayrı parçayı üretip montajlamak yerine, tek operasyonda bitmiş ürün elde edilir.</li>
    <li><strong>Mükemmel Sızdırmazlık:</strong> Kimyasal veya mekanik bağ sayesinde, contanın gövdeye yapışması kusursuz olur ve sıvı/gaz kaçağı riskini ortadan kaldırır.</li>
    <li><strong>Estetik ve Ergonomi:</strong> Sert gövde üzerine yumuşak TPE/TPU kaplama yapılarak ürünün tutuş konforu (grip) ve görsel değeri artırılır.</li>
</ul>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Döner Tablalı ve Core-Back Sistemler</h3>
<p>2K kalıp projelerinizde, makine parkurunuza ve parça geometrisine en uygun yöntemi seçiyoruz. Döner tablalı (rotary table) sistemlerle yüksek adetli üretimler için hızlı çözümler sunarken, Core-Back (maça geri çekmeli) sistemlerle standart tek kovanlı makinelerde bile 2K üretim yapabilmenize olanak tanıyoruz. Tasarımlarımızda, iki malzemenin birbirine karışmasını önleyen hassas kapama yüzeyleri ve özel yolluk sistemleri kullanıyoruz.</p>',
                'image' => 'images/service_2k_mould.png',
                'sort' => 4
            ],
            [
                'title' => 'Gaz Enjeksiyon (Gas Assist) Sistemleri',
                'slug' => 'gaz-enjeksiyon-gas-assist-sistemleri',
                'description' => 'Daha hafif, daha mukavemetli ve görsel kusursuzluğu hedefleyen parçalar için azot gazı destekli kalıp imalatı ve proses danışmanlığı sunuyoruz.',
                'long_description' => '
<p class="mb-6">Gaz enjeksiyon teknolojisi (GAIM), eriyik plastiğin içine basınçlı azot gazı enjekte edilerek parçanın içinin boşaltılmasını sağlayan özel bir yöntemdir. Bu teknoloji, özellikle otomotiv kapı kolları, beyaz eşya tutamakları ve kalın kesitli mobilya ayakları gibi parçalarda vazgeçilmezdir.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Neden Gaz Enjeksiyon?</h3>
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li><strong>Çökme İzlerinin Giderilmesi:</strong> Kalın kesitli bölgelerdeki plastik çekmesini (sink mark) içeriden gaz basıncıyla engelleyerek kusursuz yüzeyler elde edilir.</li>
    <li><strong>Hammadde Tasarrufu:</strong> Parçanın içi boşaltıldığı için %30\'a varan hammadde tasarrufu sağlanır.</li>
    <li><strong>Daha Kısa Çevrim Süresi:</strong> İçi boşalan parçanın soğuma süresi dramatik bir şekilde azalır.</li>
</ul>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Proses Dizaynı ve Simülasyonu</h3>
<p>Gaz kanallarının tasarımı, bu teknolojinin en kritik noktasıdır. Yanlış tasarlanmış bir gaz kanalı, gazın istenmeyen bölgelere kaçmasına (fingering effect) veya parçanın patlamasına neden olabilir. Uzman ekibimiz, kalıp tasarım aşamasında gazın izleyeceği yolu simüle ederek en verimli gaz kanalı geometrisini ve taşma kuyularını (overflow wells) belirler.</p>',
                'image' => 'images/service_gas_assist.png',
                'sort' => 5
            ],
            [
                'title' => 'IML (Kalıp İçi Etiketleme) Çözümleri',
                'slug' => 'iml-kalip-ici-etiketleme-cozumleri',
                'description' => 'Gıda ambalajları ve ev gereçleri için, etiket ve ürünün bütünleştiği, yüksek görsel kalitede IML kalıp sistemleri tasarımı ve üretimi.',
                'long_description' => '
<p class="mb-6">IML (In-Mold Labeling), önceden basılmış polipropilen (PP) etiketin robot yardımıyla kalıp içine yerleştirilmesi ve enjeksiyon sırasında plastikle kaynaşması işlemidir. Gıda ambalajlarında hijyen, dayanıklılık ve raf albenisi için standart haline gelen bu teknoloji, hassas kalıpçılık gerektirir.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">IML Kalıpçılığında Hassasiyet</h3>
<p>IML kalıplarında başarı, etiketin kalıp içinde sabit durması ve plastiğin etiketi kaydırmadan veya buruşturmadan (wash-out) doldurmasına bağlıdır. Euro Mould olarak şunlara dikkat ediyoruz:
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li><strong>Vakum ve Statik Sistemleri:</strong> Etiketin kalıp yüzeyine mükemmel tutunması için optimize edilmiş vakum kanalları veya statik yükleme noktaları tasarlıyoruz.</li>
    <li><strong>Keskin Köşe Tasarımı:</strong> Etiketin tam olarak oturması için dişi gövdede (cavity) mikron hassasiyetinde işleme yapıyoruz. Balık sırtı veya radyuslu bölgelerde etiketin katlanmasını önleyecek geometrik düzenlemeler uyguluyoruz.</li>
</ul>
</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Hızlı Çevrim Ambalaj Kalıpları</h3>
<p>IML projeleri genellikle ince cidarlı (thin-wall) ambalajlardır. Bu nedenle kalıplarımızı, yüksek hıza ve basınca dayanacak şekilde sertleştirilmiş paslanmaz çeliklerden üretiyor, berilyum bakır alaşımları ile soğutma performansını maksimize ediyoruz.</p>',
                'image' => 'images/service_iml.png',
                'sort' => 6
            ],
            [
                'title' => 'Hızlı Prototipleme ve 3D Baskı',
                'slug' => 'hizli-prototipleme-ve-3d-baski',
                'description' => 'Seri üretime girmeden önce, tasarımlarınızı doğrulamanız için SLA, SLS ve FDM teknolojileriyle fonksiyonel prototipler üretiyoruz.',
                'long_description' => '
<p class="mb-6">Kalıp yatırımı yapmadan önce ürününüzü fiziksel olarak test etmek, olası tasarım hatalarını erken aşamada fark etmenizi sağlar. Euro Mould, bünyesindeki endüstriyel 3D yazıcılar ile tasarımlarınızı saatler içinde elle tutulur parçalara dönüştürür.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Prototip Teknolojilerimiz</h3>
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li><strong>SLA (Stereolitografi):</strong> Yüksek yüzey kalitesi ve detay hassasiyeti gerektiren görsel maketler için sıvı reçine teknolojisi.</li>
    <li><strong>SLS (Seçici Lazer Sinterleme):</strong> Montajı yapılacak, tırnaklı, esnek veya işlevsel testlere tabi tutulacak parçalar için poliamid (PA12) toz sinterleme teknolojisi.</li>
    <li><strong>Silikon Kalıplama (Vacuum Casting):</strong> 10-50 adetlik az sayılı üretimler için, 3D baskı model üzerinden alınan silikon kalıplarla poliüretan döküm hizmeti.</li>
</ul>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Tasarımdan Doğrulamaya</h3>
<p>Sadece baskı hizmeti vermiyoruz; prototip üzerinde yaptığımız montaj ve fonksiyon testleri sonucunda, seri üretimde karşılaşabileceğiniz sorunları raporluyoruz. Böylece kalıp çeliği kesilmeden önce nihai ürününüzün mükemmelliğinden emin oluyorsunuz.</p>',
                'image' => 'images/service_3d_prototype.png',
                'sort' => 7
            ],
            [
                'title' => 'Silikon ve Kauçuk Kalıp İmalatı',
                'slug' => 'silikon-ve-kaucuk-kalip-imalati',
                'description' => 'Sıvı Silikon Enjeksiyon (LSR) ve kompresyon kauçuk kalıplarında medikal ve sızdırmazlık sektörüne özel çözümler.',
                'long_description' => '
<p class="mb-6">Elastomer malzemelerin (Silikon, EPDM, NBR) kalıplanması, termoplastiklerden tamamen farklı bir uzmanlık gerektirir. Euro Mould, özellikle medikal sektörünün ihtiyacı olan LSR (Liquid Silicone Rubber) ve otomotiv sektörünün ihtiyacı olan kauçuk sızdırmazlık elemanları için yüksek hassasiyetli kalıplar üretmektedir.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">LSR (Sıvı Silikon) Kalıpçılığı</h3>
<p class="mb-6">LSR kalıplarında sıcak yolluk sistemleri (cold deck) ve vakum teknolojisi kritik öneme sahiptir. Silikonun çok düşük viskozitesi (akışkanlığı) nedeniyle, kalıp alıştırmalarının 0.005mm\'den daha hassas yapılması gerekir; aksi takdirde en ufak boşlukta çapak oluşur. Biz, ileri teknoloji CNC ve erezyon tezgahlarımızla bu hassasiyeti standart olarak sunuyoruz.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Kauçuk Kompresyon ve Transfer Kalıpları</h3>
<p>O-ring, conta, körük ve titreşim takozları gibi parçalar için çok gözlü kompresyon veya transfer kalıpları tasarlıyoruz. Kalıp tasarımında, kauçuğun vulkanizasyon sonrası çekme paylarını ve parçanın kalıptan çıkarılma (demolding) kolaylığını titizlikle hesaplıyor; operatör dostu, uzun ömürlü kalıplar üretiyoruz.</p>',
                'image' => 'images/service_silicone_rubber.png',
                'sort' => 8
            ],
            [
                'title' => 'Metal Enjeksiyon (Zamak & Alüminyum)',
                'slug' => 'metal-enjeksiyon-zamak-aluminyum',
                'description' => 'Yüksek basınçlı döküm (HPDC) yöntemiyle üretilecek alüminyum ve zamak parçalar için, ısı şokuna dayanıklı uzun ömürlü kalıplar.',
                'long_description' => '
<p class="mb-6">Metal enjeksiyon kalıpları, plastik kalıplarına göre çok daha zorlu koşullarda (yüksek sıcaklık ve termal şok) çalışır. Bu nedenle, metal enjeksiyon kalıpçılığında malzeme bilgisi ve ısıl işlem kalitesi hayati önem taşır. Euro Mould, beyaz eşya menteşelerinden otomotiv motor parçalarına kadar geniş bir yelpazede metal kalıp çözümleri sunar.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Isıl Şok Direnci ve Çelik Seçimi</h3>
<p class="mb-6">Alüminyum ve zamak kalıplarında, erimiş metalin yarattığı ısıl şoklar zamanla kalıp yüzeyinde çatlamalara (heat checking) neden olur. Bunu geciktirmek için:
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li>Böhler, Uddeholm gibi sertifikalı tedarikçilerden <strong>1.2344 (H13)</strong> veya <strong>Dievar</strong> gibi yüksek tokluğa sahip sıcak iş çelikleri kullanıyoruz.</li>
    <li>Vakum altında sertleştirme ve çoklu menevişleme işlemleriyle çeliğin mikroyapısını optimize ediyoruz.</li>
</ul>
</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Yolluk ve Taşma Tasarımı</h3>
<p>Metalin kalıp içine türbülanssız ve atomize bir şekilde dolması, parçanın iç yapısındaki hava boşluklarını (porozite) önler. Gelişmiş döküm simülasyonları ile yolluk girişlerini, hava ceplerini ve taşma (overflow) kuyu yerleşimlerini optimize ederek, sızdırmazlık ve mekanik dayanım gerektiren parçalarda üstün sonuçlar elde ediyoruz.</p>',
                'image' => 'images/service_metal_diecasting.png',
                'sort' => 9
            ],
            [
                'title' => 'Tersine Mühendislik ve 3D Tarama',
                'slug' => 'tersine-muhendislik-ve-3d-tarama',
                'description' => 'Teknik çizimi olmayan fiziksel parçalarınızı 3D lazer tarama ile dijital ortama aktarıyor, CAD datalarını oluşturup üretime hazır hale getiriyoruz.',
                'long_description' => '
<p class="mb-6">Yedek parça ihtiyacı olan ancak teknik resmi kaybolmuş makine parçaları, numune üzerinden geliştirilecek yeni ürünler veya rakip ürün analizleri için Tersine Mühendislik (Reverse Engineering) hizmeti sunuyoruz. Fiziksel dünyayı dijital hassasiyetle buluşturuyoruz.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">3D Lazer Tarama Teknolojisi</h3>
<p class="mb-6">Taşınabilir 3D lazer tarama cihazlarımızla (mavi lazer teknolojisi), parçanızı mikron hassasiyetinde (.stl formunda) dijitalleştiriyoruz. Parlak, siyah veya şeffaf yüzeyleri özel spreylerle tarayabiliyor, en karmaşık serbest formlu yüzeyleri bile hatasız bir şekilde bilgisayar ortamına aktarıyoruz.</p>

<h3 class="text-2xl font-bold mb-4 text-slate-800">Nokta Bulutundan Katı Modele (CAD)</h3>
<p>Sadece tarama yapmak yetmez; tarama verisini işlenebilir bir katı modele dönüştürmek uzmanlık ister.
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li><strong>Parametrik Modelleme:</strong> Taranan veriyi referans alarak, SolidWorks veya NX üzerinde ağaç yapısı olan, ölçüleri değiştirilebilir "akıllı" modeller çiziyoruz.</li>
    <li><strong>Yüzey İyileştirme:</strong> Numunedeki aşınmaları, üretim hatalarını veya deformasyonları düzelterek, parçanın "olması gereken" ideal geometrisini oluşturıyoruz.</li>
</ul>
Elde edilen datalar, doğrudan CNC tezgahına gönderilebilir veya kalıp tasarımında altlık olarak kullanılabilir.</p>',
                'image' => 'images/service_3d_scanning.png',
                'sort' => 10
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
                        'bg_video' => 'images/tanitim.mp4',
                        'bg_image' => 'images/hero-main.png',
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
                            ['title' => 'İleri Teknoloji', 'description' => 'CNC tezgahlarımız ve güncel CAD/CAM yazılımlarımızla donatılmış modern üretim tesisimizle hizmetinizdeyiz.'],
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
                        'video_file' => 'images/tanitim.mp4',
                        'video_embed_code' => 'images/tanitim.mp4',
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

        // 2. About Us Page
        Page::updateOrCreate(['slug' => 'hakkimizda'], [
            'title' => 'Hakkımızda',
            'is_published' => true,
            'content' => [
                [
                    'type' => 'page_header',
                    'data' => [
                        'title' => 'ÇÖZÜM ODAKLI YAKLAŞIM',
                        'subtitle' => 'KURUMSAL KİMLİĞİMİZ',
                        'bg_image' => 'images/unnamed (3).webp',
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
        Firmamız, sadece bir "imalatçı" değil, aynı zamanda müşterilerinin projelerine değer katan bir mühendislik partneridir. Projenin ilk aşamasından, ürünün rafa çıkacağı ana kadar tüm süreçlerde teknik destek, optimizasyon ve danışmanlık hizmeti sunuyoruz. Şeffaflık, dürüstlük ve teknik mükemmeliyet, şirket kültürümüzün temel taşlarıdır.
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
                            ['value' => '15+', 'label' => 'Yıllık Sektör Tecrübesi'],
                            ['value' => '1000+', 'label' => 'Başarıyla Teslim Edilen Kalıp'],
                            ['value' => '400m2', 'label' => 'Kapalı Üretim Alanı'],
                            ['value' => '15+', 'label' => 'İhracat Yapılan Ülke'],
                        ]
                    ]
                ],
                [
                    'type' => 'content_with_image',
                    'data' => [
                        'subtitle' => 'ÜRETİM TESİSİMİZ',
                        'title' => 'Beylikdüzü OSB Tesisimiz & Makine Parkuru',
                        'content' => '<p class="mb-4">Üretim kalitemizin temelinde, sürekli güncellediğimiz ve bakımını aksatmadığımız güçlü makine parkurumuz yatar. Yüksek hızlı CNC işleme merkezleri, hassas dalma erezyon tezgahlarımızla en zorlu toleransları bile standart bir süreç haline getiriyoruz.</p>',
                        'image' => 'images/about-factory-shutter.png',
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
                        'bg_image' => 'images/WhatsApp Image 2026-07-25 at 16.23.43 (1).jpeg',
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
                        'bg_image' => 'images/unnamed (4).webp',
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
        
        // 5. Gallery Page
        Page::updateOrCreate(['slug' => 'galeri'], [
             'title' => 'Galeri',
             'is_published' => true,
             'content' => [
                 [
                    'type' => 'page_header',
                    'data' => [
                        'title' => 'ÜRETİM TESİSİMİZ',
                        'subtitle' => 'FOTOĞRAF GALERİSİ',
                        'bg_image' => 'images/WhatsApp Image 2026-07-25 at 16.23.42.jpeg',
                    ]
                ],
                [
                     'type' => 'content_with_image',
                     'data' => [
                         'title' => 'CNC İşleme Hattı',
                         'content' => '<p>Firmamız bünyesindeki son teknoloji CNC işleme merkezleri, 7/24 kesintisiz üretim kapasitesine sahiptir. Operatör hatalarını minimize eden otomasyon sistemleri ve hassas takım ölçme problarıyla donatılmış tezgahlarımızda, kalıp çekirdekleri ve hamilleri, hassas bir şekilde işlenir.</p>',
                         'image' => 'images/unnamed.webp',
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
                         'content' => '<p>İşlenen tüm kalıp bileşenleri, tecrübeli kalıp ustalarımız tarafından titizlikle montaj hattına alınır. Uygun ekipman kullanılarak kalıp ayırma yüzeylerinin alıştırılması sağlanır. Bu aşama, kalıbın çapaksız baskı yapabilmesi için üretim sürecinin en kritik manuel işlemidir.</p>',
                         'image' => 'images/unnamed (3).webp',
                         'image_position' => 'right'
                     ]
                ]
             ]
        ]);

        // 6. Gallery Items Seed (Real Factory & Product Photos)
        $galleryItems = [
            ['title' => 'Fabrika Bina Dış Görünüşü', 'image' => 'images/unnamed (4).webp', 'sort' => 1],
            ['title' => 'Kalıphane Atölye Kuşbakışı Görünüm', 'image' => 'images/WhatsApp Image 2026-07-25 at 16.23.42.jpeg', 'sort' => 2],
            ['title' => 'Atölye Genel Bakış ve Vinç Hattı', 'image' => 'images/WhatsApp Image 2026-07-25 at 16.23.43 (1).jpeg', 'sort' => 3],
            ['title' => 'Montaj ve Kalıp Alıştırma Alanı', 'image' => 'images/unnamed (3).webp', 'sort' => 4],
            ['title' => 'AWEA Yüksek Hızlı CNC İşleme Merkezi', 'image' => 'images/unnamed.webp', 'sort' => 5],
            ['title' => 'Finetech SMV-1060 CNC Dik İşleme Tezgahı', 'image' => 'images/IMG_1947.webp', 'sort' => 6],
            ['title' => 'Tesviye ve Radyal Matkap Tezgahları', 'image' => 'images/IMG_1953.webp', 'sort' => 7],
            ['title' => 'YUDO Sıcak Yolluklu Enjeksiyon Kalıbı', 'image' => 'images/unnamed (5).webp', 'sort' => 8],
            ['title' => 'Hidrolik Maçalı Hassas Enjeksiyon Kalıbı', 'image' => 'images/unnamed (1).webp', 'sort' => 9],
            ['title' => 'Tamamlanan Plastik Enjeksiyon Kalıp Seti', 'image' => 'images/unnamed (2).webp', 'sort' => 10],
            ['title' => 'CNC Talaşlı İmalat Parkuru', 'image' => 'images/IMG_1951.webp', 'sort' => 11],
            ['title' => 'Kalıp Montaj ve Bakım Tezgahı', 'image' => 'images/IMG_1955.webp', 'sort' => 12],
        ];

        foreach ($galleryItems as $item) {
            GalleryItem::updateOrCreate(['image' => $item['image']], $item);
        }
    }
}
