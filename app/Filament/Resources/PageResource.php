<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Sayfalar';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Sayfa Düzenleyici')
                    ->tabs([
                        Tabs\Tab::make('Genel Ayarlar')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', \Illuminate\Support\Str::slug($state)))
                                    ->label('Sayfa Başlığı'),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->label('URL Bağlantısı (Slug)'),
                                Forms\Components\Toggle::make('is_published')
                                    ->required()
                                    ->default(true)
                                    ->label('Sitede Yayınla'),
                            ]),
                        
                        Tabs\Tab::make('İçerik Blokları')
                            ->icon('heroicon-o-squares-2x2')
                            ->schema([
                                Forms\Components\Builder::make('content')
                                    ->blocks([
                                        // Ana Hero (Anasayfa için büyük slider tarzı)
                                        Forms\Components\Builder\Block::make('hero')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')->label('Ana Başlık (Slogan)'),
                                                Forms\Components\TextInput::make('subtitle')->label('Üst Başlık'),
                                                Forms\Components\FileUpload::make('bg_image')
                                                    ->label('Arkaplan Görseli')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('heroes'),
                                            ])->label('Ana Hero (Büyük)'),

                                        // Sayfa Başlığı (Alt sayfalar için sade)
                                        Forms\Components\Builder\Block::make('page_header')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')->label('Sayfa Başlığı'),
                                                Forms\Components\TextInput::make('subtitle')->label('Alt Başlık'),
                                                Forms\Components\FileUpload::make('bg_image')
                                                    ->label('Arkaplan Görseli (Opsiyonel)')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('headers'),
                                            ])->label('Sayfa Başlığı (Sade)'),
                                        
                                        Forms\Components\Builder\Block::make('content_with_image')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')->label('Başlık'),
                                                Forms\Components\TextInput::make('subtitle')->label('Üst Başlık (Opsiyonel)'),
                                                Forms\Components\RichEditor::make('content')->label('İçerik'),
                                                Forms\Components\FileUpload::make('image')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('content')
                                                    ->label('Görsel'),
                                                Forms\Components\Textarea::make('video_embed_code')
                                                    ->label('Video Embed Kodu (Iframe)')
                                                    ->rows(3)
                                                    ->helperText('Youtube vb. iframe kodunu buraya yapıştırın. Bu alan doluysa görsel yerine video gösterilir.'),
                                                Forms\Components\Select::make('image_position')
                                                    ->options([
                                                        'left' => 'Sol',
                                                        'right' => 'Sağ',
                                                    ])
                                                    ->default('right')
                                                    ->label('Görsel Konumu'),
                                                Forms\Components\TextInput::make('button_text')->label('Buton Metni'),
                                                Forms\Components\TextInput::make('button_url')->label('Buton Linki'),
                                                Forms\Components\Toggle::make('bg_slate')->label('Gri Arkaplan')->default(false),
                                            ])->label('Görsel + Metin'),

                                        Forms\Components\Builder\Block::make('services_list')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')->default('Hizmetlerimiz')->label('Başlık'),
                                                Forms\Components\TextInput::make('subtitle')->default('Uzmanlık Alanlarımız')->label('Üst Başlık'),
                                                Forms\Components\TextInput::make('count')->numeric()->default(6)->label('Gösterilecek Sayı'),
                                            ])->label('Hizmet Listesi'),

                                        Forms\Components\Builder\Block::make('features_grid')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')->label('Başlık'),
                                                Forms\Components\Textarea::make('description')->label('Açıklama'),
                                                Forms\Components\Repeater::make('features')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')->required()->label('Özellik Başlığı'),
                                                        Forms\Components\Textarea::make('description')->label('Açıklama'),
                                                    ])
                                                    ->label('Özellikler')
                                            ])->label('Özellikler (İkonlu)'),

                                        Forms\Components\Builder\Block::make('stats')
                                            ->schema([
                                                Forms\Components\Repeater::make('stats')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('value')->required()->label('Değer (Örn: 20+)'),
                                                        Forms\Components\TextInput::make('label')->required()->label('Etiket (Örn: Yıllık Tecrübe)'),
                                                    ])
                                                    ->label('İstatistikler')
                                                    ->grid(4)
                                            ])->label('İstatistik Şeridi'),

                                        Forms\Components\Builder\Block::make('cta')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')->label('Başlık')->default('Teklif Alın'),
                                                Forms\Components\TextInput::make('description')->label('Açıklama'),
                                                Forms\Components\TextInput::make('button_text')->label('Buton Metni')->default('İletişim'),
                                                Forms\Components\TextInput::make('button_url')->label('Link')->default('/iletisim'),
                                            ])->label('Çağrı (CTA) Şeridi'),

                                        Forms\Components\Builder\Block::make('text_block')
                                            ->schema([
                                                Forms\Components\RichEditor::make('content')->label('İçerik'),
                                            ])->label('Sadece Metin (Rich Text)'),
                                            
                                        Forms\Components\Builder\Block::make('contact_form')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')->default('İletişim')->label('Başlık'),
                                            ])->label('İletişim Formu (Gömülü)'),
                                    ])
                                    ->label('Sayfa Blokları')
                                    ->collapsible()
                                    ->cloneable(),
                            ]),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Başlık')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->label('Link')
                    ->color('gray'),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Durum'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Son Güncelleme'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('view')
                     ->url(fn (Page $record): string => route('page.show', $record->slug))
                     ->icon('heroicon-o-eye')
                     ->label('Siteyi Gör')
                     ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
