@props(['data'])
@php
    $count = $data['count'] ?? 3;
    $services = \App\Models\Service::orderBy('sort')->take($count)->get();
@endphp
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div>
                 <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">{{ $data['subtitle'] ?? 'Hizmetlerimiz' }}</span>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-normal">{{ $data['title'] ?? 'Uzmanlık Alanlarımız' }}</h2>
            </div>
            <a href="{{ url('/hizmetler') }}" class="text-slate-900 font-bold border-b-2 border-slate-200 pb-1 hover:border-primary hover:text-primary transition-colors flex items-center gap-2">
                Tümünü Görüntüle <span class="text-xl">&rarr;</span>
            </a>
        </div>

        @if($services->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <a href="{{ route('service.show', $service->slug) }}" class="group flex flex-col h-full bg-slate-50 border border-slate-100 hover:border-slate-300 transition-all duration-300">
                    <div class="relative h-64 overflow-hidden flex-shrink-0">
                        @if($service->image)
                            <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                                <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                        @endif
                         <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/10 transition-colors duration-300"></div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 group-hover:text-primary transition-colors">{{ $service->title }}</h3>
                        <p class="text-slate-600 leading-relaxed text-sm mb-6 line-clamp-3">{{ $service->description }}</p>
                        
                        <div class="mt-auto pt-6 border-t border-slate-200/60 flex items-center justify-between">
                            <span class="text-slate-900 font-bold text-sm uppercase tracking-wider group-hover:text-primary transition-colors">Detaylı İncele</span>
                            <span class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-slate-400 group-hover:bg-primary group-hover:text-white transition-all">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        @else 
             <div class="p-12 bg-slate-50 text-center border border-dashed border-slate-300 rounded-lg">
                <p class="text-slate-500 text-lg">Henüz hizmet eklenmemiş.</p>
            </div>
        @endif
    </div>
</section>
