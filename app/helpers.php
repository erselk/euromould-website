<?php

if (!function_exists('get_slug_map')) {
    function get_slug_map() {
        return [
            // Pages
            'about-us' => 'hakkimizda',
            'services' => 'hizmetler',
            'gallery' => 'galeri',
            'contact' => 'iletisim',
            'get-quote' => 'teklif-al',

            // Services
            'plastic-injection-moulding' => 'plastik-enjeksiyon-kalip-imalati',
            'product-development-and-mould-design' => 'urun-gelistirme-ve-kalip-tasarimi',
            'mould-maintenance-and-repair' => 'kalip-bakim-ve-revizyon',
            'two-component-2k-mould-technologies' => 'cift-bilesenli-2k-kalip-teknolojileri',
            'gas-assist-injection-systems' => 'gaz-enjeksiyon-gas-assist-sistemleri',
            'iml-in-mould-labeling' => 'iml-kalip-ici-etiketleme-cozumleri',
            'rapid-prototyping-and-3d-printing' => 'hizli-prototipleme-ve-3d-baski',
            'silicone-and-rubber-moulding' => 'silikon-ve-kaucuk-kalip-imalati',
            'die-casting-zamak-and-aluminium' => 'metal-enjeksiyon-zamak-aluminyum',
            'reverse-engineering-and-3d-scanning' => 'tersine-muhendislik-ve-3d-tarama',
        ];
    }
}

if (!function_exists('localized_url')) {
    function localized_url($path = '/', $targetLocale = null) {
        if (empty($path)) {
            $path = '/';
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, 'mailto:') || str_starts_with($path, 'tel:') || str_starts_with($path, '#')) {
            return $path;
        }

        $path = '/' . ltrim($path, '/');

        // Exclude system/utility/action routes from language prefixing
        $excludedPrefixes = ['/lang', '/admin', '/video-stream', '/iletisim-gonder', '/storage', '/livewire', '/filament', '/api'];
        foreach ($excludedPrefixes as $excluded) {
            if (str_starts_with($path, $excluded)) {
                return url($path);
            }
        }

        $locale = $targetLocale ?? app()->getLocale();
        $slugMap = get_slug_map();
        $trToEnMap = array_flip($slugMap);

        // Normalize path
        $cleanPath = preg_replace('/^\/en/', '', $path);
        if ($cleanPath === '') {
            $cleanPath = '/';
        }
        $slug = ltrim($cleanPath, '/');

        if ($locale === 'en') {
            if ($cleanPath === '/') {
                return url('/en');
            }
            if (isset($trToEnMap[$slug])) {
                return url('/' . $trToEnMap[$slug]);
            }
            return url('/' . $slug);
        } else {
            if ($cleanPath === '/') {
                return url('/');
            }
            if (isset($slugMap[$slug])) {
                return url('/' . $slugMap[$slug]);
            }
            return url('/' . $slug);
        }
    }
}
