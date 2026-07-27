@props(['data'])
<section class="py-16 md:py-20 bg-slate-900 text-white border-y border-white/10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12">
            @foreach($data['stats'] as $stat)
                <div class="text-center group">
                    <p class="text-3xl md:text-5xl font-black text-white mb-2 tracking-tight group-hover:text-primary transition-colors duration-300">{{ $stat['value'] }}</p>
                    <p class="text-sm md:text-base text-slate-400 font-medium uppercase tracking-wider">{{ __($stat['label']) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
