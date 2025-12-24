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
    <footer class="bg-gradient-to-b from-slate-900 to-[#0B1120] text-white pt-24 pb-12 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-20">
                <div class="col-span-1 md:col-span-1">
                     <div class="mb-8">
                         @if(isset($settings) && $settings->logo)
                             <img class="h-24 w-auto" src="{{ Storage::url($settings->logo) }}" alt="EuroMould">
                        @else
                             <span class="text-3xl font-black tracking-tight text-white block">EURO<span class="text-primary">MOULD</span></span>
                        @endif
                     </div>
                     <p class="text-slate-400 text-sm leading-7 mb-8">
                        Plastik enjeksiyon kalıp teknolojilerinde 20 yılı aşkın tecrübe ile global standartlarda çözüm ortağınız.
                     </p>
                </div>
                <div>
                    <h3 class="text-sm font-bold mb-8 text-white uppercase tracking-widest">Hızlı Erişim</h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-primary transition-colors text-sm font-medium">Anasayfa</a></li>
                        <li><a href="{{ url('/hakkimizda') }}" class="text-slate-400 hover:text-primary transition-colors text-sm font-medium">Hakkımızda</a></li>
                        <li><a href="{{ url('/hizmetler') }}" class="text-slate-400 hover:text-primary transition-colors text-sm font-medium">Hizmetler</a></li>
                        <li><a href="{{ route('offer.form') }}" class="text-slate-400 hover:text-primary transition-colors text-sm font-medium">Teklif Al</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-bold mb-8 text-white uppercase tracking-widest">İletişim</h3>
                    <ul class="space-y-6 text-slate-400 text-sm">
                        <li class="flex items-start gap-4">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full bg-white/5 text-primary">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </span>
                             <span class="leading-relaxed">{!! nl2br(e($settings->address ?? 'Beylikdüzü OSB, 3. Cd. Birlik sanayi sitesi No:71, 34524 Beylikdüzü/İstanbul')) !!}</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full bg-white/5 text-primary">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </span>
                            <a href="tel:{{ preg_replace('/[^0-9\+]/', '', $settings->contact_phone ?? '02128790016') }}" class="hover:text-white transition-colors text-white">{{ $settings->contact_phone ?? '(0212) 879 00 16' }}</a>
                        </li>
                        <li class="flex items-center gap-4">
                             <span class="w-6 h-6 flex items-center justify-center rounded-full bg-white/5 text-primary">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </span>
                            <a href="mailto:{{ $settings->contact_email ?? 'info@euromould.com.tr' }}" class="hover:text-white transition-colors text-white">{{ $settings->contact_email ?? 'info@euromould.com.tr' }}</a>
                        </li>
                    </ul>
                </div>
                 <div>
                    <h3 class="text-sm font-bold mb-8 text-white uppercase tracking-widest">Kurumsal</h3>
                    <p class="text-slate-400 text-sm mb-6 leading-7">
                        Tasarım ve imalatta toplam kaliteyi, ürettiğimiz her kalıpla müşteri memnuniyetine dönüştürüyoruz.
                    </p>
                </div>
            </div>
            <div class="border-t border-white/10 pt-10 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-sm text-center md:text-left">© {{ date('Y') }} {{ $settings->site_name ?? 'EuroMould' }}. Tüm hakları saklıdır.</p>
                <div class="flex space-x-6">
                    <a href="#" class="text-slate-500 hover:text-white transition-colors"><span class="sr-only">LinkedIn</span><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
