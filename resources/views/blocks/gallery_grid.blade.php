@props(['data'])
@php
    $items = \App\Models\GalleryItem::orderBy('sort')->get();
@endphp
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 mb-6 tracking-tight">{{ $data['title'] ?? 'Galeri' }}</h2>
            <div class="w-24 h-1.5 bg-primary mx-auto rounded-full"></div>
        </div>

        @if($items->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-6">
            @foreach($items as $item)
                <div class="relative aspect-square group overflow-hidden rounded-2xl cursor-pointer shadow-lg shadow-slate-200/50">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->title ?? '' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 ease-in-out">
                    <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center p-6 backdrop-blur-sm">
                        @if($item->title)
                            <h4 class="text-white font-bold text-center translate-y-4 group-hover:translate-y-0 transition-transform duration-300 text-lg">{{ $item->title }}</h4>
                        @else
                             <div class="bg-white/10 p-4 rounded-full backdrop-blur-md transform scale-50 group-hover:scale-100 transition-transform duration-300 delay-100">
                                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" /></svg>
                             </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        @else
             <div class="text-center py-10 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
                <p class="text-slate-400 font-medium">Henüz galeri görseli eklenmemiş.</p>
            </div>
        @endif
    </div>
</section>
