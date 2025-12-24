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

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Site Ayarları';
    protected static ?string $title = 'Genel Ayarlar';
    protected static string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = GeneralSetting::first();
        if ($settings) {
            $this->form->fill($settings->toArray());
        } else {
             // Fill default if empty
            $this->form->fill([
                 'site_name' => 'EuroMould',
            ]);
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Genel Bilgiler')
                    ->schema([
                         Forms\Components\TextInput::make('site_name')->label('Site Adı')->required(),
                         Forms\Components\FileUpload::make('logo')->label('Logo')->image()->directory('settings'),
                    ])->columns(2),

                Forms\Components\Section::make('İletişim')
                    ->schema([
                        Forms\Components\TextInput::make('contact_email')->email()->label('E-posta'),
                        Forms\Components\TextInput::make('contact_phone')->tel()->label('Telefon'),
                        Forms\Components\Textarea::make('address')->label('Adres'),
                        Forms\Components\Textarea::make('google_maps')->label('Google Maps Embed Kodu'),
                    ])->columns(2),

                Forms\Components\Section::make('Sosyal Medya')
                    ->schema([
                        Forms\Components\KeyValue::make('social_links')->label('Linkler (Örn: facebook => url)'),
                    ]),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $settings = GeneralSetting::firstOrNew();
        $settings->fill($this->form->getState());
        $settings->save();

        Notification::make()
            ->title('Ayarlar kaydedildi.')
            ->success()
            ->send();
    }
}
