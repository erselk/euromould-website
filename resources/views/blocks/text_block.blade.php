@props(['data'])
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg prose-slate mx-auto max-w-none prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-slate-900 prose-a:text-primary prose-a:font-semibold hover:prose-a:text-red-700 leading-relaxed text-slate-600">
            {!! $data['content'] ?? '' !!}
        </div>
    </div>
</section>
