@props(['data'])
<section class="py-24 bg-white border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            @if(isset($data['title']) && $data['title'])
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 mb-4">{{ $data['title'] }}</h2>
            @endif
             @if(isset($data['description']) && $data['description'])
                <p class="text-lg text-slate-600">{{ $data['description'] }}</p>
            @endif
        </div>

        @if(isset($data['features']) && is_array($data['features']))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">
                @foreach($data['features'] as $feature)
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary/10 flex items-center justify-center text-primary">
                             <!-- Check Icon -->
                             <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $feature['title'] ?? '' }}</h3>
                            <p class="text-slate-600 leading-relaxed">{{ $feature['description'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
