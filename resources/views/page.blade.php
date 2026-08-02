@php
    $description = '';
    if($page && $page->content) {
        foreach($page->content as $block) {
            if(isset($block['data']['description'])) {
                 $description = strip_tags($block['data']['description']);
                 break;
            } elseif(isset($block['data']['subtitle'])) {
                 $description = strip_tags($block['data']['subtitle']);
                 break;
            } elseif(isset($block['data']['content'])) {
                 $description = strip_tags($block['data']['content']);
                 break;
            }
        }
    }
    $description = \Illuminate\Support\Str::limit($description, 150);
@endphp
<x-layouts.app :title="__($page->title ?? 'EuroMould')" :metaDescription="$description">
    @if($page && $page->content)
        @foreach($page->content as $block)
            @include('blocks.' . $block['type'], ['data' => $block['data']])
        @endforeach
    @else
        <div class="py-20 text-center">
            <h1 class="text-3xl font-bold">{{ __('Sayfa İçeriği Eklenmemiş') }}</h1>
        </div>
    @endif
</x-layouts.app>
