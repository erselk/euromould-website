<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Hizmetler';
    protected static ?string $modelLabel = 'Hizmet';
    protected static ?string $pluralModelLabel = 'Hizmetler';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Site Yönetimi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hizmet Detayları (Türkçe)')->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', \Illuminate\Support\Str::slug($state)))
                        ->label('Başlık'),
                    Forms\Components\RichEditor::make('description')
                        ->label('Kısa Açıklama')
                        ->columnSpanFull(),
                ]),
                Forms\Components\Section::make('Hizmet Detayları (İngilizce)')->schema([
                    Forms\Components\TextInput::make('title_en')
                        ->label('Başlık (İngilizce)'),
                    Forms\Components\RichEditor::make('description_en')
                        ->label('Kısa Açıklama (İngilizce)')
                        ->columnSpanFull(),
                ]),
                Forms\Components\Hidden::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\Hidden::make('sort'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->maxSize(5120)
                    ->imageResizeTargetWidth(1200)
                    ->imageResizeTargetHeight(1200)
                    ->disk('root_public')
                    ->directory('images')
                    ->label('Görsel')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('root_public')
                    ->label('Görsel'),
                Tables\Columns\TextColumn::make('title')->searchable()->label('Başlık'),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
