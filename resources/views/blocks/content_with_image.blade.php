@props(['data'])
<section class="py-16 md:py-24 {{ isset($data['bg_slate']) && $data['bg_slate'] ? 'bg-slate-50' : 'bg-white' }}">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-10 md:gap-16 lg:gap-24">
            
            <!-- Image / Video Section -->
            <div class="w-full lg:w-1/2 {{ isset($data['image_position']) && $data['image_position'] == 'right' ? 'lg:order-last' : '' }}">
                
                <!-- Video Logic -->
                @if(isset($data['video_embed_code']) && $data['video_embed_code'])
                    <div x-data="{ 
                            playing: false, 
                            mouseX: 0, 
                            mouseY: 0, 
                            currentX: 0, 
                            currentY: 0,
                            scale: 1,
                            isHovering: false, 
                            containerRect: null,
                            init() {
                                this.containerRect = this.$el.getBoundingClientRect();
                                this.currentX = this.containerRect.width / 2;
                                this.currentY = this.containerRect.height / 2;
                                this.mouseX = this.currentX;
                                this.mouseY = this.currentY;

                                const loop = () => {
                                    let targetX, targetY;
                                    
                                    if (this.isHovering) {
                                        targetX = this.mouseX;
                                        targetY = this.mouseY;
                                    } else {
                                        targetX = this.containerRect.width / 2;
                                        targetY = this.containerRect.height / 2;
                                    }

                                    const dx = targetX - this.currentX;
                                    const dy = targetY - this.currentY;
                                    const distance = Math.sqrt(dx*dx + dy*dy);

                                    this.currentX += dx * 0.08;
                                    this.currentY += dy * 0.08;

                                    if (this.isHovering) {
                                        let targetScale = 1.1 - Math.min(distance / 500, 0.3); 
                                        this.scale = targetScale;
                                    } else {
                                        this.scale = 0.8;
                                    }

                                    requestAnimationFrame(loop);
                                };
                                loop();
                            }
                         }" 
                         @mouseenter="containerRect = $el.getBoundingClientRect(); isHovering = true"
                         @mousemove="mouseX = $event.clientX - containerRect.left; mouseY = $event.clientY - containerRect.top" 
                         @mouseleave="isHovering = false"
                         @click="if (!playing) playing = true"
                         :class="{ 'cursor-pointer': !playing }"
                         class="relative w-full aspect-video shadow-2xl border border-slate-200 bg-slate-900 rounded-lg overflow-hidden group">
                        
                        <!-- Cover Image & Play Button -->
                        <div x-show="!playing" class="absolute inset-0 z-10 pointer-events-none">
                            <!-- Cover Image -->
                            <img src="{{ asset('images/video_cover.png') }}" alt="Video Cover" class="w-full h-full object-cover opacity-80 group-hover:opacity-70 transition-opacity duration-500">
                            
                            <!-- Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent"></div>

                            <!-- Play Button -->
                            <div class="absolute z-50 w-20 h-20 bg-primary/80 backdrop-blur-sm text-white rounded-full flex items-center justify-center shadow-lg transition-transform duration-75"
                                 :style="`top: ${currentY}px; left: ${currentX}px; transform: translate(-54%, -50%) scale(${scale});`">
                                <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>

                            <!-- Text Overlay -->
                            <div class="absolute bottom-6 left-6 md:bottom-8 md:left-8">
                                <span class="bg-primary px-3 py-1 text-xs font-bold uppercase tracking-wider text-white mb-2 inline-block">{{ __('Tanıtım Filmi') }}</span>
                                <h3 class="text-white font-bold text-lg md:text-xl">{{ __('Üretim Tesisimizi Keşfedin') }}</h3>
                            </div>
                        </div>

                        <!-- Video Container (Loads on Click with Sound & Seeking support) -->
                        <template x-if="playing">
                            <div class="w-full h-full relative z-30">
                                @if(isset($data['video_file']) && $data['video_file'])
                                    <video controls autoplay preload="auto" playsinline class="w-full h-full object-cover">
                                        <source src="{{ route('video.stream', basename($data['video_file'])) }}" type="video/mp4">
                                    </video>
                                @elseif(isset($data['video_embed_code']) && str_contains($data['video_embed_code'], '.mp4'))
                                    <video controls autoplay preload="auto" playsinline class="w-full h-full object-cover">
                                        <source src="{{ route('video.stream', basename($data['video_embed_code'])) }}" type="video/mp4">
                                    </video>
                                @else
                                    {!! $data['video_embed_code'] !!}
                                @endif
                            </div>
                        </template>

                    </div>
                @else
                    <!-- Standard Image Mode -->
                    <div class="relative h-[300px] md:h-[500px] w-full shadow-lg border border-slate-100 rounded-lg overflow-hidden">
                        @if(isset($data['image']))
                            <img src="{{ asset($data['image']) }}" alt="{{ __($data['title'] ?? '') }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                                <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Content Section -->
            <div class="w-full lg:w-1/2 text-center lg:text-left">
                @if(isset($data['subtitle']) && $data['subtitle'])
                    <span class="text-primary font-bold tracking-widest uppercase text-sm mb-4 block">{{ __($data['subtitle']) }}</span>
                @endif
                
                @if(isset($data['title']) && $data['title'])
                    <h2 class="text-3xl md:text-5xl font-black text-slate-900 mb-8 leading-tight tracking-normal">
                        {!! nl2br(e(__($data['title']))) !!}
                    </h2>
                @endif
                
                <div class="prose prose-lg prose-slate max-w-none mb-10 text-slate-600">
                    {!! __($data['content'] ?? '') !!}
                </div>

                @if(isset($data['button_text']) && $data['button_text'])
                    <a href="{{ localized_url($data['button_url'] ?? '#') }}" class="inline-block bg-slate-900 text-white px-8 py-4 font-bold uppercase tracking-widest hover:bg-primary transition-colors text-sm">
                        {{ __($data['button_text']) }}
                    </a>
                @endif
            </div>

        </div>
    </div>
</section>
