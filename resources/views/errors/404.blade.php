<x-layouts.app :title="__('Sayfa Bulunamadı')">
    <div class="py-32 min-h-[70vh] flex items-center justify-center bg-slate-50">
        <div class="text-center px-6">
            <div class="relative inline-block mb-8 mt-4">
                <h1 class="text-9xl font-black text-slate-800 tracking-tighter drop-shadow-sm">404</h1>
                <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-24 h-2 bg-primary rounded-full"></div>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6">{{ __('Aradığınız Sayfa Bulunamadı') }}</h2>
            <p class="text-lg text-slate-600 mb-10 max-w-lg mx-auto">
                {{ __('Görünüşe göre ulaşmaya çalıştığınız sayfa taşınmış, silinmiş veya hiç var olmamış olabilir.') }}
            </p>
            <a href="{{ localized_url('/') }}" class="inline-flex px-8 py-4 bg-primary text-white font-bold uppercase tracking-wider hover:bg-slate-900 transition-colors">
                {{ __('Anasayfaya Dön') }}
            </a>
        </div>
    </div>
</x-layouts.app>
