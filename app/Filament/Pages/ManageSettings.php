<?php

namespace App\Filament\Pages;

use App\Models\GeneralSetting;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Site Görselleri';
    protected static ?string $navigationGroup = 'Site Yönetimi';
    protected static ?string $title = 'Görselleri Değiştir';
    protected static ?int $navigationSort = 3;
    protected static string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = GeneralSetting::first();
        
        $home = \App\Models\Page::where('slug', 'home')->first();
        $about = \App\Models\Page::where('slug', 'hakkimizda')->first();
        
        $extraData = [];
        if ($home && $home->content) {
            foreach ($home->content as $block) {
                if ($block['type'] === 'hero' && isset($block['data']['bg_image'])) {
                    $extraData['home_hero_bg'] = $block['data']['bg_image'];
                }
                if ($block['type'] === 'hero' && isset($block['data']['bg_video'])) {
                    $extraData['home_video'] = $block['data']['bg_video'];
                }
            }
        }
        if ($about && $about->content) {
            foreach ($about->content as $block) {
                if ($block['type'] === 'page_header' && isset($block['data']['bg_image'])) {
                    $extraData['about_header_bg'] = $block['data']['bg_image'];
                }
                if ($block['type'] === 'content_with_image' && isset($block['data']['image'])) {
                    $extraData['about_image'] = $block['data']['image'];
                }
            }
        }

        $settingsData = $settings ? $settings->toArray() : [];
        $this->form->fill(array_merge($settingsData, $extraData));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Logo')
                    ->schema([
                         Forms\Components\FileUpload::make('logo')->label('Site Logosu')->image()->disk('root_public')->directory('images'),
                    ])->columns(1),
                Forms\Components\Section::make('Anasayfa Görselleri')
                    ->schema([
                         Forms\Components\FileUpload::make('home_hero_bg')->label('Kapak Arkaplan Resmi')->image()->disk('root_public')->directory('images'),
                         Forms\Components\FileUpload::make('home_video')->label('Tanıtım Videosu (.mp4)')->acceptedFileTypes(['video/mp4'])->disk('root_public')->directory('images'),
                    ])->columns(2),
                Forms\Components\Section::make('Hakkımızda Görselleri')
                    ->schema([
                         Forms\Components\FileUpload::make('about_header_bg')->label('Üst Kapak Resmi')->image()->disk('root_public')->directory('images'),
                         Forms\Components\FileUpload::make('about_image')->label('Tesis Görseli')->image()->disk('root_public')->directory('images'),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();
        
        $home_hero_bg = $data['home_hero_bg'] ?? null;
        $home_video = $data['home_video'] ?? null;
        $about_header_bg = $data['about_header_bg'] ?? null;
        $about_image = $data['about_image'] ?? null;
        
        unset($data['home_hero_bg'], $data['home_video'], $data['about_header_bg'], $data['about_image']);
        
        $settings = GeneralSetting::firstOrNew();
        $settings->fill($data);
        $settings->save();

        $home = \App\Models\Page::where('slug', 'home')->first();
        if ($home) {
            $content = $home->content;
            foreach ($content as &$block) {
                if ($block['type'] === 'hero') {
                    if ($home_hero_bg) $block['data']['bg_image'] = $home_hero_bg;
                    if ($home_video) $block['data']['bg_video'] = $home_video;
                }
                if ($block['type'] === 'content_with_image') {
                    if ($home_video) $block['data']['video_file'] = $home_video;
                }
            }
            $home->content = $content;
            $home->save();
        }

        $about = \App\Models\Page::where('slug', 'hakkimizda')->first();
        if ($about) {
            $content = $about->content;
            foreach ($content as &$block) {
                if ($block['type'] === 'page_header') {
                    if ($about_header_bg) $block['data']['bg_image'] = $about_header_bg;
                }
                if ($block['type'] === 'content_with_image') {
                    if ($about_image) $block['data']['image'] = $about_image;
                }
            }
            $about->content = $content;
            $about->save();
        }

        Notification::make()
            ->title('Görseller başarıyla kaydedildi.')
            ->success()
            ->send();
    }
}
