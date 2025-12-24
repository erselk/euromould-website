<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'EuroMould - Plastik Enjeksiyon Kalıp Teknolojileri' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ef4444', 
                        dark: '#0f172a',
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .glass-nav {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
    </style>
</head>
<body class="font-sans antialiased text-slate-800 bg-white selection:bg-primary selection:text-white">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 transition-all duration-300 glass-nav" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-24">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                         @if(isset($settings) && $settings->logo)
                            <img class="h-20 w-auto" src="{{ Storage::url($settings->logo) }}" alt="EuroMould">
                        @else
                            <span class="text-3xl font-black tracking-tighter text-slate-900">EURO<span class="text-primary">MOULD</span></span>
                        @endif
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-10">
                    <a href="{{ route('home') }}" class="text-sm font-bold text-slate-900 hover:text-primary transition-colors uppercase tracking-widest">Anasayfa</a>
                    <a href="{{ url('/hakkimizda') }}" class="text-sm font-bold text-slate-900 hover:text-primary transition-colors uppercase tracking-widest">Hakkımızda</a>
                    <a href="{{ url('/hizmetler') }}" class="text-sm font-bold text-slate-900 hover:text-primary transition-colors uppercase tracking-widest">Hizmetler</a>
                    <a href="{{ url('/galeri') }}" class="text-sm font-bold text-slate-900 hover:text-primary transition-colors uppercase tracking-widest">Galeri</a>
                    <a href="{{ url('/iletisim') }}" class="text-sm font-bold text-slate-900 hover:text-primary transition-colors uppercase tracking-widest">İletişim</a>
                    
                    <a href="{{ route('offer.form') }}" class="bg-primary hover:bg-slate-900 text-white px-8 py-3 font-bold transition-colors text-xs tracking-widest uppercase rounded-none">
                        Teklif Al
                    </a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="text-slate-900 hover:text-primary focus:outline-none">
                         <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-slate-900 to-[#0B1120] pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Top Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-16 text-center md:text-left">
                
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2 lg:col-span-1 flex flex-col items-center md:items-start lg:items-center">
                     <div class="mb-6">
                         @if(isset($settings) && $settings->logo)
                             <img class="h-24 w-auto" src="{{ Storage::url($settings->logo) }}" alt="EuroMould">
                        @else
                             <span class="text-3xl font-black tracking-tight text-white block">EURO<span class="text-primary">MOULD</span></span>
                        @endif
                     </div>
                     <p class="text-slate-400 text-sm leading-relaxed mb-6 text-center">
                         Plastik enjeksiyon kalıp imalatında 20 yıllık tecrübe, ileri teknoloji ve mühendislik tutkusuyla endüstriyel çözümler sunuyoruz.
                     </p>
                </div>

                <!-- Quick Links -->
                <div class="md:pl-10">
                    <h4 class="text-white font-bold uppercase tracking-widest text-sm mb-6">Kurumsal</h4>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-slate-400 hover:text-white transition-colors text-sm">Anasayfa</a></li>
                        <li><a href="/hakkimizda" class="text-slate-400 hover:text-white transition-colors text-sm">Hakkımızda</a></li>
                        <li><a href="/hizmetler" class="text-slate-400 hover:text-white transition-colors text-sm">Hizmetlerimiz</a></li>
                        <li><a href="/iletisim" class="text-slate-400 hover:text-white transition-colors text-sm">İletişim</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-white font-bold uppercase tracking-widest text-sm mb-6">Hizmetler</h4>
                    <ul class="space-y-3">
                        <li><a href="/hizmet/plastik-enjeksiyon-kalip-imalati" class="text-slate-400 hover:text-white transition-colors text-sm">Kalıp İmalatı</a></li>
                        <li><a href="/hizmet/urun-gelistirme-ve-kalip-tasarimi" class="text-slate-400 hover:text-white transition-colors text-sm">Ürün Geliştirme</a></li>
                        <li><a href="/hizmet/kalip-bakim-ve-revizyon" class="text-slate-400 hover:text-white transition-colors text-sm">Bakım & Onarım</a></li>
                        <li><a href="/teklif-al" class="text-primary hover:text-white transition-colors text-sm font-bold">Teklif Alın</a></li>
                    </ul>
                </div>

                <!-- Contact - With Icons -->
                <div>
                    <h4 class="text-white font-bold uppercase tracking-widest text-sm mb-6">Bize Ulaşın</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full bg-white/5 text-primary flex-shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </span>
                            <a href="https://www.google.com/maps/dir//EuroMould,+Beylikd%C3%BCz%C3%BC+OSB" target="_blank" class="text-slate-400 hover:text-white transition-colors text-sm leading-relaxed">Beylikdüzü OSB, 3. Cd. Birlik sanayi sitesi No:71 34524 Beylikdüzü/İstanbul</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full bg-white/5 text-primary flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </span>
                            <a href="tel:02128790016" class="text-slate-400 hover:text-white transition-colors text-sm">(0212) 879 00 16</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full bg-white/5 text-primary flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </span>
                            <a href="mailto:info@euromould.com.tr" class="text-slate-400 hover:text-white transition-colors text-sm">info@euromould.com.tr</a>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Copyright -->
            <div class="border-t border-white/10 pt-8 text-center">
                <p class="text-slate-500 text-xs">
                    &copy; {{ date('Y') }} <span class="text-white font-bold">EuroMould</span> Kalıp San. ve Tic. Ltd. Şti. Tüm hakları saklıdır.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
