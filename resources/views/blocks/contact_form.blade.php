@props(['data'])
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
            <!-- Contact Info -->
            <div>
                <span class="text-primary font-bold tracking-widest uppercase text-sm mb-4 block">Bize Ulaşın</span>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-8 tracking-tight">{{ $data['title'] ?? 'İletişim Bilgileri' }}</h2>
                <div class="space-y-8">
                     @php
                        $settings = \App\Models\GeneralSetting::first();
                    @endphp
                    
                    <div class="flex items-start gap-5">
                        <div class="w-12 h-12 bg-slate-50 border border-slate-100 flex items-center justify-center text-primary flex-shrink-0">
                             <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                             <h3 class="text-lg font-bold text-slate-900 mb-1">Adresimiz</h3>
                             <a href="https://www.google.com/maps/dir//EuroMould,+Beylikd%C3%BCz%C3%BC+OSB" target="_blank" class="text-slate-600 leading-relaxed hover:text-primary transition-colors">{!! nl2br(e($settings->address ?? '')) !!}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                        <div class="w-12 h-12 bg-slate-50 border border-slate-100 flex items-center justify-center text-primary flex-shrink-0">
                             <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div>
                             <h3 class="text-lg font-bold text-slate-900 mb-1">Telefon</h3>
                             <a href="tel:{{ $settings->contact_phone }}" class="text-slate-600 hover:text-primary transition-colors">{{ $settings->contact_phone }}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                         <div class="w-12 h-12 bg-slate-50 border border-slate-100 flex items-center justify-center text-primary flex-shrink-0">
                             <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                             <h3 class="text-lg font-bold text-slate-900 mb-1">E-Posta</h3>
                             <a href="mailto:{{ $settings->contact_email }}" class="text-slate-600 hover:text-primary transition-colors">{{ $settings->contact_email }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-slate-50 p-8 md:p-10 rounded-xl border border-slate-100">
                <h3 class="text-2xl font-bold text-slate-900 mb-6">Bize Yazın</h3>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded mb-6 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Adınız Soyadınız</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="Adınız">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">E-Posta Adresiniz</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="ornek@mail.com">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Telefon (Opsiyonel)</label>
                            <input type="tel" name="phone" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="0555...">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Konu</label>
                            <input type="text" name="subject" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="Mesajınızın konusu">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Mesajınız</label>
                        <textarea name="message" rows="4" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors resize-none" placeholder="Talebinizi buraya yazın..."></textarea>
                    </div>
                    <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-lg hover:bg-primary transition-colors duration-300 uppercase tracking-widest text-sm">
                        GÖNDER
                    </button>
                </form>
            </div>
        </div>

        <!-- Google Maps (Full Width Below) -->
        <div class="mt-24 h-[500px] w-full bg-slate-100 border border-slate-200 rounded-xl overflow-hidden grayscale hover:grayscale-0 transition-all duration-500">
             @if($settings->google_maps)
                {!! $settings->google_maps !!}
            @else
                <div class="w-full h-full flex items-center justify-center text-slate-400">Harita Yüklenemedi</div>
            @endif
        </div>
    </div>
</section>
