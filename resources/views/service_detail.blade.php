<x-layouts.app :title="$service->title">
    <!-- Hero Section -->
    <section class="bg-slate-900 text-white py-16 md:py-32 relative overflow-hidden">
        @if($service->image)
            <div class="absolute inset-0 z-0 opacity-40">
                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 z-0 bg-gradient-to-t from-slate-900 to-transparent"></div>
        @endif
        
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-4xl">
                <a href="{{ url('/hizmetler') }}" class="inline-flex items-center text-slate-400 hover:text-white mb-6 uppercase tracking-wider text-sm font-bold transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Hizmetlere Dön
                </a>
                <h1 class="text-3xl md:text-6xl font-black tracking-tight mb-4">{!! nl2br(e($service->title)) !!}</h1>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-10 lg:gap-16">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <div class="prose prose-lg prose-slate max-w-none prose-headings:font-bold prose-headings:text-slate-900 prose-a:text-primary leading-relaxed">
                        {!! $service->long_description ?? '<p>' . $service->description . '</p>' !!}
                    </div>
                </div>

                <div class="lg:w-1/3 space-y-8">
                    <!-- CTA Widget -->
                    <div class="bg-primary text-white p-8 rounded-xl shadow-lg">
                        <h3 class="text-xl font-bold mb-4">Bu hizmetle ilgileniyor musunuz?</h3>
                        <p class="mb-6 opacity-90 text-sm leading-relaxed">Projeleriniz için özel çözümler ve fiyat teklifi almak için hemen formumuzu doldurun.</p>
                        <a href="{{ url('/teklif-al') }}" class="inline-block w-full text-center py-4 bg-white text-primary font-bold hover:bg-slate-900 hover:text-white transition-all duration-300 rounded uppercase tracking-widest text-sm">
                            Teklif Alın
                        </a>
                    </div>

                     <!-- Other Services Widget -->
                    <div class="bg-slate-50 p-8 rounded-xl border border-slate-100">
                        <h3 class="text-xl font-bold text-slate-900 mb-6 pb-4 border-b border-slate-200">Diğer Hizmetlerimiz</h3>
                        <ul class="space-y-4">
                            @foreach(\App\Models\Service::where('id', '!=', $service->id)->get() as $otherService)
                                <li>
                                    <a href="{{ route('service.show', $otherService->slug) }}" class="flex items-center text-slate-600 hover:text-primary transition-colors group">
                                        <span class="w-2 h-2 bg-slate-300 rounded-full mr-3 group-hover:bg-primary transition-colors"></span>
                                        {{ $otherService->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
