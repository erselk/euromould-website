<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
    {{-- Home Page --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <xhtml:link rel="alternate" hreflang="tr" href="{{ url('/') }}" />
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en') }}" />
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/en') }}" />
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/en') }}</loc>
        <xhtml:link rel="alternate" hreflang="tr" href="{{ url('/') }}" />
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en') }}" />
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/en') }}" />
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>

    {{-- Dynamic Pages --}}
    @foreach($pages as $page)
        @if($page->slug !== 'home')
            @php
                $trUrl = localized_url('/' . $page->slug, 'tr');
                $enUrl = localized_url('/' . $page->slug, 'en');
            @endphp
            <url>
                <loc>{{ $trUrl }}</loc>
                <xhtml:link rel="alternate" hreflang="tr" href="{{ $trUrl }}" />
                <xhtml:link rel="alternate" hreflang="en" href="{{ $enUrl }}" />
                <xhtml:link rel="alternate" hreflang="x-default" href="{{ $enUrl }}" />
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>
            <url>
                <loc>{{ $enUrl }}</loc>
                <xhtml:link rel="alternate" hreflang="tr" href="{{ $trUrl }}" />
                <xhtml:link rel="alternate" hreflang="en" href="{{ $enUrl }}" />
                <xhtml:link rel="alternate" hreflang="x-default" href="{{ $enUrl }}" />
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>
        @endif
    @endforeach

    {{-- Services --}}
    @foreach($services as $service)
        @php
            $trServiceUrl = localized_url('/' . $service->slug, 'tr');
            $enServiceUrl = localized_url('/' . $service->slug, 'en');
        @endphp
        <url>
            <loc>{{ $trServiceUrl }}</loc>
            <xhtml:link rel="alternate" hreflang="tr" href="{{ $trServiceUrl }}" />
            <xhtml:link rel="alternate" hreflang="en" href="{{ $enServiceUrl }}" />
            <xhtml:link rel="alternate" hreflang="x-default" href="{{ $enServiceUrl }}" />
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
        <url>
            <loc>{{ $enServiceUrl }}</loc>
            <xhtml:link rel="alternate" hreflang="tr" href="{{ $trServiceUrl }}" />
            <xhtml:link rel="alternate" hreflang="en" href="{{ $enServiceUrl }}" />
            <xhtml:link rel="alternate" hreflang="x-default" href="{{ $enServiceUrl }}" />
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
</urlset>
