@props(['data'])
<section class="py-20 bg-primary text-white">
    <div class="max-w-7xl mx-auto px-6">
        @if(isset($data['stats']) && is_array($data['stats']))
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/20">
                @foreach($data['stats'] as $stat)
                    <div class="px-4">
                        <div class="text-4xl md:text-5xl font-black mb-2 tracking-tight">{{ $stat['value'] ?? '0' }}</div>
                        <div class="text-sm md:text-base font-medium tracking-wide uppercase opacity-90">{{ $stat['label'] ?? '' }}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
