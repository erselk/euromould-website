@php
    $metaDescription = \Illuminate\Support\Str::limit(strip_tags(__($service->getTranslated('description'))), 150);
@endphp
<x-layouts.app :title="__($service->getTranslated('title'))" :metaDescription="$metaDescription">
    <div class="py-20 md:py-32 bg-slate-50">
        <div class="max-w-4xl mx-auto px-6">
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-8">{{ __($service->getTranslated('title')) }}</h1>
            
            @if($service->image)
                <div class="mb-12 rounded-xl overflow-hidden shadow-lg">
                    <img src="/{{ $service->image }}?v=5" alt="{{ __($service->getTranslated('title')) }}" class="w-full h-auto">
                </div>
            @endif

            <div class="prose prose-lg max-w-none text-slate-700">
                {!! __($service->getTranslated('description')) !!}
            </div>
            
            <div class="mt-16 flex gap-4">
                <a href="{{ localized_url('/') }}" class="inline-block px-8 py-4 bg-slate-200 text-slate-800 font-bold uppercase tracking-wider hover:bg-slate-300 transition-colors">
                    {{ __('Geri Dön') }}
                </a>
                <a href="{{ localized_url('/teklif-al') }}" class="inline-block px-8 py-4 bg-primary text-white font-bold uppercase tracking-wider hover:bg-red-600 transition-colors">
                    {{ __('Teklif Alın') }}
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
