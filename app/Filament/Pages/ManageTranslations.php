<?php

namespace App\Filament\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\File;

class ManageTranslations extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-language';
    protected static ?string $navigationLabel = 'Yazıları Düzenle';
    protected static ?string $navigationGroup = 'Site Yönetimi';
    protected static ?string $title = 'Site Çevirileri ve Yazıları';
    protected static ?int $navigationSort = 2;
    protected static string $view = 'filament.pages.manage-translations';

    public ?array $data = [];

    public function mount(): void
    {
        $trPath = base_path('lang/tr.json');
        $enPath = base_path('lang/en.json');

        $trData = File::exists($trPath) ? json_decode(File::get($trPath), true) : [];
        $enData = File::exists($enPath) ? json_decode(File::get($enPath), true) : [];

        $translations = [];
        
        // Merge keys from both files
        $allKeys = array_unique(array_merge(array_keys($trData), array_keys($enData)));

        foreach ($allKeys as $key) {
            $translations[] = [
                'key' => $key,
                'tr' => $trData[$key] ?? '',
                'en' => $enData[$key] ?? '',
            ];
        }

        $this->form->fill(['translations' => $translations]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Repeater::make('translations')
                    ->label('Tüm Metinler')
                    ->schema([
                        Forms\Components\Hidden::make('key')
                            ->required(),
                        Forms\Components\Textarea::make('tr')
                            ->label('Türkçe')
                            ->rows(3),
                        Forms\Components\Textarea::make('en')
                            ->label('İngilizce')
                            ->rows(3),
                    ])
                    ->columns(2)
                    ->reorderable(false)
                    ->deletable(false)
                    ->addable(false)
                    ->itemLabel(fn (array $state): ?string => $state['key'] ?? null),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        
        $trData = [];
        $enData = [];

        foreach ($data['translations'] as $item) {
            if (!empty($item['key'])) {
                $trData[$item['key']] = $item['tr'];
                $enData[$item['key']] = $item['en'];
            }
        }

        File::put(base_path('lang/tr.json'), json_encode($trData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        File::put(base_path('lang/en.json'), json_encode($enData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        Notification::make()
            ->title('Yazılar başarıyla kaydedildi.')
            ->success()
            ->send();
    }
}
