<x-layouts.app :title="__('Sunucu Hatası')">
    <div class="py-32 min-h-[70vh] flex items-center justify-center bg-slate-50">
        <div class="text-center px-6">
            <h1 class="text-9xl font-black text-slate-200 mb-4 tracking-tighter">500</h1>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6">{{ __('Sistemde Beklenmedik Bir Hata Oluştu') }}</h2>
            <p class="text-lg text-slate-600 mb-10 max-w-lg mx-auto">
                {{ __('Şu anda teknik bir sorun yaşıyoruz. Mühendislerimiz konuyla ilgileniyor. Lütfen daha sonra tekrar deneyin.') }}
            </p>
            <a href="{{ localized_url('/') }}" class="inline-flex px-8 py-4 bg-primary text-white font-bold uppercase tracking-wider hover:bg-slate-900 transition-colors">
                {{ __('Anasayfaya Dön') }}
            </a>
        </div>
    </div>
</x-layouts.app>
