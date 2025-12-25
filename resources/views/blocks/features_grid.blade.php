@props(['data'])
<section class="py-16 md:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            @if(isset($data['title']) && $data['title'])
                <h2 class="text-2xl md:text-4xl font-black text-slate-900 mb-6 tracking-tight">{{ $data['title'] }}</h2>
            @endif
            @if(isset($data['description']) && $data['description'])
                <p class="text-lg text-slate-600 leading-relaxed">{{ $data['description'] }}</p>
            @endif
        </div>

        @if(isset($data['features']))
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 lg:gap-12">
                @foreach($data['features'] as $feature)
                    <div class="bg-white p-6 md:p-10 rounded-xl shadow-sm border border-slate-100 hover:shadow-lg hover:border-slate-200 transition-all duration-300">
                        <div class="w-14 h-14 bg-primary/10 rounded-lg flex items-center justify-center mb-6 text-primary">
                             <!-- Dynamic Icon based on index or title could be added here, using a generic consistent one for now -->
                             <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-4">{{ $feature['title'] }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ $feature['description'] }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
