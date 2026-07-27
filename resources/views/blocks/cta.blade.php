@props(['data'])
<section class="py-16 md:py-24 bg-primary relative overflow-hidden">
    <!-- Abstract Background Pattern -->
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0 100 L100 0 L100 100 Z" fill="white" /></svg>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <h2 class="text-2xl md:text-5xl font-black text-white mb-6 tracking-tight">
            {{ __($data['title'] ?? 'Projenizi Başlatalım') }}
        </h2>
        <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
            {{ __($data['description'] ?? 'Uzman ekibimizle tecrübelerimizi birleştirip en iyi sonucu elde edelim.') }}
        </p>
        <a href="{{ localized_url($data['button_url'] ?? '/iletisim') }}" class="inline-block bg-white text-primary px-8 py-3 md:px-10 md:py-4 font-bold uppercase tracking-widest hover:bg-slate-900 hover:text-white transition-all duration-300 shadow-xl rounded-sm text-sm md:text-base">
            {{ __($data['button_text'] ?? 'İletişime Geçin') }}
        </a>
    </div>
</section>
