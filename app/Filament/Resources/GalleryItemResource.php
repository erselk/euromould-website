<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryItemResource\Pages;
use App\Models\GalleryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;
    protected static bool $shouldRegisterNavigation = true;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Galeri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->maxSize(102400) // 100MB
                    ->getUploadedFileNameForStorageUsing(
                        fn (\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string => 
                            md5(uniqid()) . '.' . $file->getClientOriginalExtension()
                    )
                    ->disk('root_public')
                    ->directory('images/gallery')
                    ->required()
                    ->label('Görsel'),
                Forms\Components\TextInput::make('title')
                    ->label('Başlık (Opsiyonel)'),
                Forms\Components\TextInput::make('sort')
                    ->numeric()
                    ->default(0)
                    ->label('Sıralama'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('root_public')
                    ->label('Görsel'),
                Tables\Columns\TextColumn::make('title')->label('Başlık'),
                Tables\Columns\TextColumn::make('sort')->sortable()->label('Sıra'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->label('Tarih'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort', 'asc');
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
            'index' => Pages\ListGalleryItems::route('/'),
            'create' => Pages\CreateGalleryItem::route('/create'),
            'edit' => Pages\EditGalleryItem::route('/{record}/edit'),
        ];
    }
}
