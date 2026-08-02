@props(['data'])
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 lg:gap-24">
            <!-- Contact Info -->
            <div>
                <span class="text-primary font-bold tracking-widest uppercase text-sm mb-4 block">{{ __('Bize Ulaşın') }}</span>
                <h2 class="text-3xl md:text-5xl font-black text-slate-900 mb-8 tracking-tight">{{ __($data['title'] ?? 'İletişim Bilgileri') }}</h2>
                <div class="space-y-8">
                    <div class="flex items-start gap-5">
                        <div class="w-12 h-12 bg-slate-50 border border-slate-100 flex items-center justify-center text-primary flex-shrink-0">
                             <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                             <h3 class="text-lg font-bold text-slate-900 mb-1">{{ __('Adresimiz') }}</h3>
                             <a href="https://www.google.com/maps/dir//EuroMould,+Beylikd%C3%BCz%C3%BC+OSB" target="_blank" class="text-slate-600 leading-relaxed hover:text-primary transition-colors">{!! isset($settings) && $settings->address ? nl2br(e(__($settings->address))) : __('Beylikdüzü OSB, 3. Cd. Birlik Sanayi Sitesi No:71 34524 Beylikdüzü/İstanbul') !!}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                        <div class="w-12 h-12 bg-slate-50 border border-slate-100 flex items-center justify-center text-primary flex-shrink-0">
                             <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div>
                             <h3 class="text-lg font-bold text-slate-900 mb-1">{{ __('Telefon') }}</h3>
                             <div class="flex flex-col gap-1">
                                 <a href="tel:+905499052352" class="text-slate-600 hover:text-primary transition-colors">+90 (549) 905 23 52</a>
                                 @if(isset($settings) && $settings->contact_phone)
                                     <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->contact_phone) }}" class="text-slate-600 hover:text-primary transition-colors">{{ $settings->contact_phone }}</a>
                                 @else
                                     <a href="tel:+902128790016" class="text-slate-600 hover:text-primary transition-colors">+90 (212) 879 00 16</a>
                                 @endif
                             </div>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                         <div class="w-12 h-12 bg-slate-50 border border-slate-100 flex items-center justify-center text-primary flex-shrink-0">
                             <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                             <h3 class="text-lg font-bold text-slate-900 mb-1">{{ __('E-Posta') }}</h3>
                             <a href="mailto:{{ isset($settings) && $settings->contact_email ? $settings->contact_email : 'info@euromould.com.tr' }}" class="text-slate-600 hover:text-primary transition-colors">{{ isset($settings) && $settings->contact_email ? $settings->contact_email : 'info@euromould.com.tr' }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-slate-50 p-6 md:p-10 rounded-xl border border-slate-100">
                <h3 class="text-2xl font-bold text-slate-900 mb-6">{{ __('Bize Yazın') }}</h3>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded mb-6 text-sm">
                        {{ __(session('success')) }}
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">{{ __('Adınız Soyadınız') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 bg-white border @error('name') border-red-500 @else border-slate-200 @enderror rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="{{ __('Adınız') }}">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">{{ __('E-Posta Adresiniz') }}</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 bg-white border @error('email') border-red-500 @else border-slate-200 @enderror rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="ornek@mail.com">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">{{ __('Telefon (Opsiyonel)') }}</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 bg-white border @error('phone') border-red-500 @else border-slate-200 @enderror rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="0555...">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">{{ __('Konu') }}</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="w-full px-4 py-3 bg-white border @error('subject') border-red-500 @else border-slate-200 @enderror rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="{{ __('Mesajınızın konusu') }}">
                            @error('subject')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">{{ __('Mesajınız') }}</label>
                        <textarea name="message" rows="4" required class="w-full px-4 py-3 bg-white border @error('message') border-red-500 @else border-slate-200 @enderror rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors resize-none" placeholder="{{ __('Talebinizi buraya yazın...') }}">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-lg hover:bg-primary transition-colors duration-300 uppercase tracking-widest text-sm">
                        {{ __('GÖNDER') }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Google Maps (Full Width Below) -->
        <div class="mt-16 md:mt-24 h-[300px] md:h-[500px] w-full bg-slate-100 border border-slate-200 rounded-xl overflow-hidden [&>iframe]:w-full [&>iframe]:h-full">
             @if(isset($settings) && $settings->google_maps)
                {!! $settings->google_maps !!}
            @else
                <div class="w-full h-full flex items-center justify-center text-slate-400">Harita Yüklenemedi</div>
            @endif
        </div>
    </div>
</section>
