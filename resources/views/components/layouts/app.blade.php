<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'EuroMould - Plastik Enjeksiyon Kalıp Teknolojileri' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/favicon.png">
    
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
        [x-cloak] { display: none !important; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }
        ::-webkit-scrollbar-track {
            background: #f8fafc; /* slate-50 */
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; /* slate-300 */
            border-radius: 6px;
            border: 3px solid #f8fafc; /* border to create padding effect */
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #ef4444; /* primary */
        }
    </style>
</head>
<body class="font-sans antialiased text-slate-800 bg-white selection:bg-primary selection:text-white">

    <!-- Navigation Wrapper -->
    <div x-data="{ mobileMenuOpen: false }">
        <!-- Navigation -->
        <nav class="fixed w-full z-50 transition-all duration-300 glass-nav" id="navbar">
            <div class="max-w-7xl mx-auto pl-4 sm:pl-6 lg:pl-8 pr-0">
                <div class="flex justify-between items-center h-20">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center gap-3">
                             @if(isset($settings) && $settings->logo)
                                <img class="h-12 w-auto" src="{{ asset($settings->logo) }}" alt="EuroMould">
                            @else
                                <span class="text-3xl font-black tracking-tighter text-slate-900">EURO<span class="text-primary">MOULD</span></span>
                            @endif
                        </a>
                    </div>
                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-8 lg:space-x-10 -mr-9">
                        <a href="{{ route('home') }}" class="text-sm font-bold text-slate-900 hover:text-primary transition-colors uppercase tracking-widest">{{ __('Anasayfa') }}</a>
                        <a href="{{ url('/hakkimizda') }}" class="text-sm font-bold text-slate-900 hover:text-primary transition-colors uppercase tracking-widest">{{ __('Hakkımızda') }}</a>
                        <a href="{{ url('/hizmetler') }}" class="text-sm font-bold text-slate-900 hover:text-primary transition-colors uppercase tracking-widest">{{ __('Hizmetler') }}</a>
                        <a href="{{ url('/galeri') }}" class="text-sm font-bold text-slate-900 hover:text-primary transition-colors uppercase tracking-widest">{{ __('Galeri') }}</a>
                        <a href="{{ url('/iletisim') }}" class="text-sm font-bold text-slate-900 hover:text-primary transition-colors uppercase tracking-widest">{{ __('İletişim') }}</a>
                        
                        <a href="{{ route('offer.form') }}" class="bg-primary hover:bg-slate-900 text-white px-8 py-3 font-bold transition-colors text-xs tracking-widest uppercase rounded-none">
                            {{ __('Teklif Al') }}
                        </a>

                        @php $currentLocale = app()->getLocale(); @endphp
                        <a href="{{ route('lang.switch', $currentLocale === 'tr' ? 'en' : 'tr') }}" 
                           title="{{ $currentLocale === 'tr' ? 'Switch to English' : 'Türkçe\'ye Geç' }}"
                           class="inline-flex items-center justify-center transition-transform hover:scale-110 focus:outline-none pl-1">
                            @if($currentLocale === 'tr')
                                <!-- Turkey Flag -->
                                <svg class="w-6 h-4 rounded-xs shadow-xs hover:opacity-90 transition-opacity" viewBox="0 0 1200 800" xmlns="http://www.w3.org/2000/svg">
                                  <rect width="1200" height="800" fill="#E30A17"/>
                                  <circle cx="425" cy="400" r="200" fill="#ffffff"/>
                                  <circle cx="475" cy="400" r="160" fill="#E30A17"/>
                                  <polygon fill="#ffffff" points="583.333,400 684.282,432.802 621.895,351.481 621.895,448.519 684.282,367.198"/>
                                </svg>
                            @else
                                <!-- US Flag -->
                                <svg class="w-6 h-4 rounded-xs shadow-xs hover:opacity-90 transition-opacity" viewBox="0 0 741 390" xmlns="http://www.w3.org/2000/svg">
                                  <rect width="741" height="390" fill="#b22234"/>
                                  <path d="M0,30h741M0,90h741M0,150h741M0,210h741M0,270h741M0,330h741" stroke="#fff" stroke-width="30"/>
                                  <rect width="296.4" height="210" fill="#3c3b6e"/>
                                  <g fill="#fff">
                                    <g id="us-s"><polygon points="24.7,6 30.5,24 15.5,13 33.9,13 18.9,24"/></g>
                                    <use href="#us-s" x="49.4"/><use href="#us-s" x="98.8"/><use href="#us-s" x="148.2"/><use href="#us-s" x="197.6"/><use href="#us-s" x="247"/>
                                    <use href="#us-s" y="42" x="24.7"/><use href="#us-s" y="42" x="74.1"/><use href="#us-s" y="42" x="123.5"/><use href="#us-s" y="42" x="172.9"/><use href="#us-s" y="42" x="222.3"/>
                                    <use href="#us-s" y="84"/><use href="#us-s" y="84" x="49.4"/><use href="#us-s" y="84" x="98.8"/><use href="#us-s" y="84" x="148.2"/><use href="#us-s" y="84" x="247"/>
                                    <use href="#us-s" y="126" x="24.7"/><use href="#us-s" y="126" x="74.1"/><use href="#us-s" y="126" x="123.5"/><use href="#us-s" y="126" x="172.9"/><use href="#us-s" y="126" x="222.3"/>
                                    <use href="#us-s" y="168"/><use href="#us-s" y="168" x="49.4"/><use href="#us-s" y="168" x="98.8"/><use href="#us-s" y="168" x="148.2"/><use href="#us-s" y="168" x="197.6"/><use href="#us-s" y="168" x="247"/>
                                  </g>
                                </svg>
                            @endif
                        </a>
                    </div>
                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center gap-4">
                        @php $currentLocale = app()->getLocale(); @endphp
                        <a href="{{ route('lang.switch', $currentLocale === 'tr' ? 'en' : 'tr') }}" 
                           class="inline-flex items-center justify-center transition-transform hover:scale-110 focus:outline-none">
                            @if($currentLocale === 'tr')
                                <svg class="w-6 h-4 rounded-xs shadow-xs" viewBox="0 0 1200 800" xmlns="http://www.w3.org/2000/svg">
                                  <rect width="1200" height="800" fill="#E30A17"/>
                                  <circle cx="425" cy="400" r="200" fill="#ffffff"/>
                                  <circle cx="475" cy="400" r="160" fill="#E30A17"/>
                                  <polygon fill="#ffffff" points="583.333,400 684.282,432.802 621.895,351.481 621.895,448.519 684.282,367.198"/>
                                </svg>
                            @else
                                <svg class="w-6 h-4 rounded-xs shadow-xs" viewBox="0 0 741 390" xmlns="http://www.w3.org/2000/svg">
                                  <rect width="741" height="390" fill="#b22234"/>
                                  <path d="M0,30h741M0,90h741M0,150h741M0,210h741M0,270h741M0,330h741" stroke="#fff" stroke-width="30"/>
                                  <rect width="296.4" height="210" fill="#3c3b6e"/>
                                  <g fill="#fff">
                                    <g id="us-mob-s"><polygon points="24.7,6 30.5,24 15.5,13 33.9,13 18.9,24"/></g>
                                    <use href="#us-mob-s" x="49.4"/><use href="#us-mob-s" x="98.8"/><use href="#us-mob-s" x="148.2"/><use href="#us-mob-s" x="197.6"/><use href="#us-mob-s" x="247"/>
                                    <use href="#us-mob-s" y="42" x="24.7"/><use href="#us-mob-s" y="42" x="74.1"/><use href="#us-mob-s" y="42" x="123.5"/><use href="#us-mob-s" y="42" x="172.9"/><use href="#us-mob-s" y="42" x="222.3"/>
                                    <use href="#us-mob-s" y="84"/><use href="#us-mob-s" y="84" x="49.4"/><use href="#us-mob-s" y="84" x="98.8"/><use href="#us-mob-s" y="84" x="148.2"/><use href="#us-mob-s" y="84" x="247"/>
                                    <use href="#us-mob-s" y="126" x="24.7"/><use href="#us-mob-s" y="126" x="74.1"/><use href="#us-mob-s" y="126" x="123.5"/><use href="#us-mob-s" y="126" x="172.9"/><use href="#us-mob-s" y="126" x="222.3"/>
                                    <use href="#us-mob-s" y="168"/><use href="#us-mob-s" y="168" x="49.4"/><use href="#us-mob-s" y="168" x="98.8"/><use href="#us-mob-s" y="168" x="148.2"/><use href="#us-mob-s" y="168" x="197.6"/><use href="#us-mob-s" y="168" x="247"/>
                                  </g>
                                </svg>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen" x-cloak @click="mobileMenuOpen = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="md:hidden fixed inset-0 bg-black/50 z-[60]"></div>
        
        <!-- Mobile Menu Panel (Slide from Right) -->
        <div x-show="mobileMenuOpen" x-cloak x-transition:enter="transition transform ease-out duration-500" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition transform ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="md:hidden fixed top-0 right-0 h-full w-80 max-w-[85vw] bg-white shadow-2xl z-[70]">
            <div class="flex flex-col h-full">
                <!-- Header with Close Button (same height as nav) -->
                <div class="h-20 flex items-center justify-between px-6 border-b border-slate-100">
                    <span class="font-bold text-slate-900 tracking-wider uppercase text-sm">Menu</span>
                    <button @click="mobileMenuOpen = false" class="text-slate-900 hover:text-primary focus:outline-none">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Menu Items -->
                <div class="px-8 py-6 space-y-6 flex-1">
                    <a href="{{ route('home') }}" class="block text-slate-700 text-sm font-medium hover:text-primary transition-colors uppercase tracking-widest">{{ __('Anasayfa') }}</a>
                    <a href="{{ url('/hakkimizda') }}" class="block text-slate-700 text-sm font-medium hover:text-primary transition-colors uppercase tracking-widest">{{ __('Hakkımızda') }}</a>
                    <a href="{{ url('/hizmetler') }}" class="block text-slate-700 text-sm font-medium hover:text-primary transition-colors uppercase tracking-widest">{{ __('Hizmetler') }}</a>
                    <a href="{{ url('/galeri') }}" class="block text-slate-700 text-sm font-medium hover:text-primary transition-colors uppercase tracking-widest">{{ __('Galeri') }}</a>
                    <a href="{{ url('/iletisim') }}" class="block text-slate-700 text-sm font-medium hover:text-primary transition-colors uppercase tracking-widest">{{ __('İletişim') }}</a>
                </div>
                <!-- CTA Button -->
                <div class="p-8 border-t border-slate-100 flex flex-col gap-3">
                    <a href="{{ route('offer.form') }}" class="block bg-primary text-white text-center py-4 font-medium uppercase tracking-widest text-sm hover:bg-slate-900 transition-colors">
                        {{ __('Teklif Al') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="pt-20 min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-slate-900 to-[#0B1120] pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Top Section -->
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-8 md:gap-y-12 mb-16">
                
                <!-- Brand (Full width on mobile) -->
                <div class="col-span-2 md:col-span-2 lg:col-span-1 flex flex-col items-center md:items-start lg:items-center text-center md:text-left">
                     <div class="mb-6">
                         <img class="h-24 w-auto" src="{{ asset('images/logo.png') }}" alt="EuroMould">
                     </div>
                     <p class="text-slate-400 text-sm leading-relaxed mb-6">
                         {{ __('Plastik enjeksiyon kalıp imalatında 15 yıllık tecrübe, ileri teknoloji ve mühendislik tutkusuyla endüstriyel çözümler sunuyoruz.') }}
                     </p>
                </div>

                <!-- Quick Links (Half width on mobile) -->
                <div class="md:pl-10">
                    <h4 class="text-white font-bold uppercase tracking-widest text-sm mb-6">{{ __('Kurumsal') }}</h4>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-slate-400 hover:text-white transition-colors text-sm">{{ __('Anasayfa') }}</a></li>
                        <li><a href="/hakkimizda" class="text-slate-400 hover:text-white transition-colors text-sm">{{ __('Hakkımızda') }}</a></li>
                        <li><a href="/hizmetler" class="text-slate-400 hover:text-white transition-colors text-sm">{{ __('Hizmetlerimiz') }}</a></li>
                        <li><a href="/galeri" class="text-slate-400 hover:text-white transition-colors text-sm">{{ __('Galeri') }}</a></li>
                        <li><a href="/iletisim" class="text-slate-400 hover:text-white transition-colors text-sm">{{ __('İletişim') }}</a></li>
                    </ul>
                </div>

                <!-- Services (Half width on mobile) -->
                <div>
                    <h4 class="text-white font-bold uppercase tracking-widest text-sm mb-6">{{ __('Hizmetler') }}</h4>
                    <ul class="space-y-3">
                        <li><a href="/iletisim" class="text-slate-400 hover:text-white transition-colors text-sm">{{ __('Kalıp İmalatı') }}</a></li>
                        <li><a href="/iletisim" class="text-slate-400 hover:text-white transition-colors text-sm">{{ __('Ürün Geliştirme') }}</a></li>
                        <li><a href="/iletisim" class="text-slate-400 hover:text-white transition-colors text-sm">{{ __('Bakım & Onarım') }}</a></li>
                        <li><a href="/teklif-al" class="text-primary hover:text-white transition-colors text-sm font-bold">{{ __('Teklif Alın') }}</a></li>
                    </ul>
                </div>

                <!-- Contact (Full width on mobile) -->
                <div class="col-span-2 md:col-span-2 lg:col-span-1">
                    <h4 class="text-white font-bold uppercase tracking-widest text-sm mb-6">{{ __('Bize Ulaşın') }}</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 flex items-center justify-center rounded-full bg-white/5 text-primary flex-shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </span>
                            <a href="https://www.google.com/maps/dir//EuroMould,+Beylikd%C3%BCz%C3%BC+OSB" target="_blank" class="text-slate-400 hover:text-white transition-colors text-sm leading-relaxed">{{ __('Beylikdüzü OSB, 3. Cd. Birlik Sanayi Sitesi No:71 34524 Beylikdüzü/İstanbul') }}</a>
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
            <div class="border-t border-white/10 pt-8">
                <p class="text-slate-500 text-xs">
                    &copy; {{ date('Y') }} EuroMould
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
</body>
</html>
