<section class="py-16 bg-slate-900 text-white relative overflow-hidden">
    
    <div class="max-w-7xl mx-auto px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
        <div>
            <h2 class="text-3xl font-black mb-2 tracking-tight white">{{ $data['title'] ?? 'Projeniz için teklif alın' }}</h2>
            <p class="text-slate-400 text-lg">{{ $data['description'] ?? 'Uzman ekibimizle en iyi çözümü sunmak için hazırız.' }}</p>
        </div>
        <a href="{{ $data['button_url'] ?? '/iletisim' }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-slate-900 bg-white hover:bg-slate-100 transition-colors duration-300 min-w-[200px]">
            {{ $data['button_text'] ?? 'Bize Ulaşın' }}
        </a>
    </div>
</section>
