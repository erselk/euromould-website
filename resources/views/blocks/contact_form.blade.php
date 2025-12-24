@props(['data'])
@php
    $settings = \App\Models\GeneralSetting::first();
@endphp
<section class="py-24 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Contact Info -->
            <div>
                 <h2 class="text-4xl font-black text-slate-900 mb-8">{{ $data['title'] ?? 'İletişim' }}</h2>
                 <p class="text-slate-600 mb-10 text-lg leading-relaxed">Projeleriniz ve sorularınız için bizimle iletişime geçmekten çekinmeyin.</p>
                 
                 <div class="space-y-8">
                    <div class="flex items-start gap-6 group">
                        <div class="w-14 h-14 bg-white rounded-2xl shadow-lg shadow-slate-200 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300 flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900 mb-2">Adres</h4>
                            <p class="text-slate-600 leading-relaxed">{!! nl2br(e($settings->address ?? 'Beylikdüzü OSB, 3. Cd. Birlik sanayi sitesi No:71, 34524 Beylikdüzü/İstanbul')) !!}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6 group">
                         <div class="w-14 h-14 bg-white rounded-2xl shadow-lg shadow-slate-200 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300 flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900 mb-2">Telefon</h4>
                            <p class="text-slate-600 font-medium text-lg">{{ $settings->contact_phone ?? '(0212) 879 00 16' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-6 group">
                         <div class="w-14 h-14 bg-white rounded-2xl shadow-lg shadow-slate-200 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors duration-300 flex-shrink-0">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900 mb-2">E-posta</h4>
                            <p class="text-slate-600 font-medium text-lg">{{ $settings->contact_email ?? 'herkes@euromould.com.tr' }}</p>
                        </div>
                    </div>
                </div>

                @if(isset($settings->google_maps) && $settings->google_maps)
                <div class="mt-12 rounded-3xl overflow-hidden shadow-2xl shadow-slate-200/50 h-80 grayscale hover:grayscale-0 transition-all duration-700">
                    {!! $settings->google_maps !!}
                </div>
                @endif
            </div>

            <!-- Form -->
            <div class="bg-white rounded-3xl shadow-2xl shadow-slate-200/50 p-10 lg:p-12 border border-slate-100">
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Adınız Soyadınız</label>
                        <input type="text" id="name" name="name" class="w-full px-5 py-4 rounded-xl bg-slate-50 border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none font-medium" placeholder="Adınız Soyadınız">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">E-posta Adresi</label>
                        <input type="email" id="email" name="email" class="w-full px-5 py-4 rounded-xl bg-slate-50 border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none font-medium" placeholder="ornek@sirket.com">
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Konu</label>
                        <input type="text" id="subject" name="subject" class="w-full px-5 py-4 rounded-xl bg-slate-50 border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none font-medium" placeholder="Mesajınızın konusu">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Mesajınız</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-5 py-4 rounded-xl bg-slate-50 border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none font-medium resize-none" placeholder="Mesajınızı buraya yazınız..."></textarea>
                    </div>
                    <button type="button" class="w-full bg-slate-900 text-white font-bold py-5 rounded-xl hover:bg-primary transition-colors duration-300 shadow-xl shadow-slate-900/10 text-lg tracking-wide">
                        Gönder
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
