<x-layouts.app :title="__('Teklif Al')">
    <div class="bg-white py-16 md:py-32">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-24">
                <!-- Info Section -->
                <div>
                    <h1 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight mb-6">{{ __('Projeniz için Teklif Alın') }}</h1>
                    <p class="text-lg text-slate-600 mb-10 leading-relaxed">
                        {{ __('Euro Mould olarak, plastik enjeksiyon kalıp projelerinizde en doğru çözümü sunmak için buradayız. Formu doldurarak projeniz hakkında bize bilgi verin, uzman mühendislerimiz en kısa sürede teknik analiz ve fiyatlandırma ile size dönüş yapsın.') }}
                    </p>

                    <div class="space-y-8 border-t border-slate-100 pt-10">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-slate-50 flex items-center justify-center text-primary border border-slate-100">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-1">{{ __('E-posta') }}</h3>
                                <a href="mailto:{{ isset($settings) && $settings->contact_email ? $settings->contact_email : 'info@euromould.com.tr' }}" class="text-slate-600 hover:text-primary transition-colors">{{ isset($settings) && $settings->contact_email ? $settings->contact_email : 'info@euromould.com.tr' }}</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-slate-50 flex items-center justify-center text-primary border border-slate-100 flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-1">{{ __('Telefon') }}</h3>
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

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-slate-50 flex items-center justify-center text-primary border border-slate-100 flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-1">{{ __('Adresimiz') }}</h3>
                                <a href="https://www.google.com/maps/dir//EuroMould,+Beylikd%C3%BCz%C3%BC+OSB" target="_blank" class="text-slate-600 hover:text-primary transition-colors leading-relaxed text-sm">{!! isset($settings) && $settings->address ? nl2br(e(__($settings->address))) : __('Beylikdüzü OSB, 3. Cd. Birlik Sanayi Sitesi No:71 34524 Beylikdüzü/İstanbul') !!}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="bg-slate-50 p-6 md:p-12 border border-slate-200">
                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-800 p-4 mb-8">
                            {{ __(session('success')) }}
                        </div>
                    @endif

                    <form action="{{ route('offer.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-bold text-slate-900 mb-2 uppercase tracking-wider">{{ __('Ad Soyad') }} *</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-4 py-3 bg-white border @error('name') border-red-500 @else border-slate-200 @enderror focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors rounded-none placeholder-slate-400">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-bold text-slate-900 mb-2 uppercase tracking-wider">{{ __('Telefon') }}</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 bg-white border @error('phone') border-red-500 @else border-slate-200 @enderror focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors rounded-none placeholder-slate-400">
                                @error('phone')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-bold text-slate-900 mb-2 uppercase tracking-wider">{{ __('E-posta') }} *</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full px-4 py-3 bg-white border @error('email') border-red-500 @else border-slate-200 @enderror focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors rounded-none placeholder-slate-400">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                             <div>
                                <label for="company" class="block text-sm font-bold text-slate-900 mb-2 uppercase tracking-wider">{{ __('Firma Adı') }}</label>
                                <input type="text" name="company" id="company" value="{{ old('company') }}" class="w-full px-4 py-3 bg-white border @error('company') border-red-500 @else border-slate-200 @enderror focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors rounded-none placeholder-slate-400">
                                @error('company')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-slate-900 mb-2 uppercase tracking-wider">{{ __('Proje Detayları / Notlarınız') }}</label>
                            <textarea name="message" id="message" rows="5" class="w-full px-4 py-3 bg-white border @error('message') border-red-500 @else border-slate-200 @enderror focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors rounded-none placeholder-slate-400 resize-none">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 uppercase tracking-widest hover:bg-primary transition-colors duration-300">
                            {{ __('Teklifi Gönder') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
