<x-layouts.app :title="$page->title ?? 'EuroMould'">
    @if($page && $page->content)
        @foreach($page->content as $block)
            @include('blocks.' . $block['type'], ['data' => $block['data']])
        @endforeach
    @else
        <div class="py-20 text-center">
            <h1 class="text-3xl font-bold">Sayfa İçeriği Eklenmemiş</h1>
        </div>
    @endif
</x-layouts.app>
