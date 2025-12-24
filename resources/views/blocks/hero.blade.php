@props(['data'])
<section class="relative h-[80vh] min-h-[600px] flex items-center overflow-hidden bg-slate-900">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0 select-none">
        @if(isset($data['bg_image']))
            <img src="{{ asset($data['bg_image']) }}" alt="{{ $data['title'] ?? '' }}" class="w-full h-full object-cover opacity-60">
        @else
            <div class="w-full h-full bg-slate-800"></div>
        @endif
        <!-- Advanced Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/80 to-transparent"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6 max-w-7xl">
        <div class="max-w-4xl">
            @if(isset($data['subtitle']) && $data['subtitle'])
                <div class="flex items-center gap-4 mb-8">
                    <span class="h-[2px] w-12 bg-primary"></span>
                    <p class="text-primary font-bold tracking-[0.25em] uppercase text-sm md:text-base">{{ $data['subtitle'] }}</p>
                </div>
            @endif
            
            @if(isset($data['title']) && $data['title'])
                <h1 class="text-4xl md:text-7xl lg:text-8xl font-black text-white mb-10 leading-[1.1] tracking-tight drop-shadow-xl">
                    {!! nl2br(e($data['title'])) !!}
                </h1>
            @endif
            
            <div class="flex flex-col sm:flex-row gap-5 mt-12">
                <a href="{{ url('/teklif-al') }}" class="px-10 py-5 bg-white text-slate-900 font-bold uppercase tracking-wider hover:bg-primary hover:text-white transition-colors duration-300">
                    Teklif Alın
                </a>
                
                <a href="{{ url('/hizmetler') }}" class="px-10 py-5 border border-white/30 text-white font-bold uppercase tracking-wider hover:bg-white hover:text-slate-900 transition-all duration-300">
                    Hizmetlerimiz
                </a>
            </div>
        </div>
    </div>
</section>
