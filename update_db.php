<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$services = \App\Models\Service::all();
foreach ($services as $s) {
    if (preg_match('/\.(png|jpg|jpeg)$/i', $s->image)) {
        $s->image = preg_replace('/\.(png|jpg|jpeg)$/i', '.webp', $s->image);
        $s->save();
        echo "Updated Service: " . $s->title . "\n";
    }
}

if (class_exists('\App\Models\Gallery')) {
    $galleries = \App\Models\Gallery::all();
    foreach ($galleries as $g) {
        if (preg_match('/\.(png|jpg|jpeg)$/i', $g->image)) {
            $g->image = preg_replace('/\.(png|jpg|jpeg)$/i', '.webp', $g->image);
            $g->save();
            echo "Updated Gallery: " . $g->id . "\n";
        }
    }
}

if (class_exists('\App\Models\Setting')) {
    $setting = \App\Models\Setting::first();
    if ($setting) {
        if (preg_match('/\.(png|jpg|jpeg)$/i', $setting->logo)) {
            $setting->logo = preg_replace('/\.(png|jpg|jpeg)$/i', '.webp', $setting->logo);
            $setting->save();
            echo "Updated Setting Logo\n";
        }
    }
}
echo "Done.\n";
