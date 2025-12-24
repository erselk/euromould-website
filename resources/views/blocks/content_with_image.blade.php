@props(['data'])
<section class="py-24 {{ isset($data['bg_slate']) && $data['bg_slate'] ? 'bg-slate-50' : 'bg-white' }}">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-16 md:gap-24">
            
            <!-- Image / Video Section -->
            <div class="w-full lg:w-1/2 {{ isset($data['image_position']) && $data['image_position'] == 'right' ? 'lg:order-last' : '' }}">
                
                <!-- Video Logic -->
                @if(isset($data['video_embed_code']) && $data['video_embed_code'])
                    <div x-data="{ playing: false }" class="relative w-full aspect-video shadow-2xl border border-slate-200 bg-slate-900 rounded-lg overflow-hidden group">
                        
                        <!-- Cover Image & Play Button -->
                        <div x-show="!playing" class="absolute inset-0 z-10">
                            <!-- Cover Image -->
                            <img src="{{ asset('images/video_cover.png') }}" alt="Video Cover" class="w-full h-full object-cover opacity-80 group-hover:opacity-60 transition-opacity duration-500">
                            
                            <!-- Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent"></div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <button @click="playing = true" class="w-20 h-20 md:w-24 md:h-24 bg-primary text-white rounded-full flex items-center justify-center transform group-hover:scale-110 transition-all duration-300 shadow-lg group-hover:shadow-primary/50">
                                    <svg class="w-8 h-8 md:w-10 md:h-10 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </button>
                            </div>

                            <!-- Text Overlay -->
                            <div class="absolute bottom-6 left-6 md:bottom-8 md:left-8">
                                <span class="bg-primary px-3 py-1 text-xs font-bold uppercase tracking-wider text-white mb-2 inline-block">Tanıtım Filmi</span>
                                <h3 class="text-white font-bold text-lg md:text-xl">Üretim Tesisimizi Keşfedin</h3>
                            </div>
                        </div>

                        <!-- Video Iframe (Loads on Click) -->
                        <template x-if="playing">
                            <div class="w-full h-full">
                                {!! $data['video_embed_code'] !!}
                            </div>
                        </template>

                    </div>
                @else
                    <!-- Standard Image Mode -->
                    <div class="relative h-[400px] md:h-[500px] w-full shadow-lg border border-slate-100 rounded-lg overflow-hidden">
                        @if(isset($data['image']))
                            <img src="{{ asset($data['image']) }}" alt="{{ $data['title'] ?? '' }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                                <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Content Section -->
            <div class="w-full lg:w-1/2">
                @if(isset($data['subtitle']) && $data['subtitle'])
                    <span class="text-primary font-bold tracking-widest uppercase text-sm mb-4 block">{{ $data['subtitle'] }}</span>
                @endif
                
                @if(isset($data['title']) && $data['title'])
                    <h2 class="text-3xl md:text-5xl font-black text-slate-900 mb-8 leading-tight tracking-normal">
                        {!! nl2br(e($data['title'])) !!}
                    </h2>
                @endif
                
                <div class="prose prose-lg prose-slate max-w-none mb-10 text-slate-600">
                    {!! $data['content'] ?? '' !!}
                </div>

                @if(isset($data['button_text']) && $data['button_text'])
                    <a href="{{ $data['button_url'] ?? '#' }}" class="inline-block bg-slate-900 text-white px-8 py-4 font-bold uppercase tracking-widest hover:bg-primary transition-colors text-sm">
                        {{ $data['button_text'] }}
                    </a>
                @endif
            </div>

        </div>
    </div>
</section>
