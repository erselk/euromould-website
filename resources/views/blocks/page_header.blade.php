@props(['data'])
<section class="relative bg-slate-900 text-white py-16 md:py-20 overflow-hidden">
    <!-- Background -->
    @if(isset($data['bg_image']))
        <div class="absolute inset-0 z-0">
            <img src="/{{ $data['bg_image'] }}?v=3" alt="{{ $data['title'] ?? '' }}" class="w-full h-full object-cover opacity-30">
        </div>
    @endif
    <!-- Gradient & Overlay -->
    <div class="absolute inset-0 z-0 bg-gradient-to-r from-slate-900 via-slate-900/90 to-slate-900/70"></div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6 max-w-7xl">
        <div class="text-center max-w-3xl mx-auto">
            @if(isset($data['subtitle']) && $data['subtitle'])
                <p class="text-primary font-bold tracking-[0.2em] uppercase text-sm mb-4 animate-fade-in-up">{{ __($data['subtitle']) }}</p>
            @endif
            
            @if(isset($data['title']) && $data['title'])
                <h1 class="text-3xl md:text-5xl font-black text-white leading-tight tracking-tight">
                    {!! nl2br(e(__($data['title']))) !!}
                </h1>
            @endif
        </div>
    </div>
</section>
