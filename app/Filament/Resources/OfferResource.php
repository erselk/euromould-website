<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfferResource\Pages;
use App\Models\Offer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OfferResource extends Resource
{
    protected static ?string $model = Offer::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';
    protected static ?string $navigationLabel = 'Gelen Teklifler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Teklif Detayları')
                    ->schema([
                        Forms\Components\TextInput::make('name')->label('Ad Soyad')->readonly(),
                        Forms\Components\TextInput::make('company')->label('Firma')->readonly(),
                        Forms\Components\TextInput::make('email')->label('E-posta')->email()->readonly(),
                        Forms\Components\TextInput::make('phone')->label('Telefon')->readonly(),
                        Forms\Components\Textarea::make('message')->label('Mesaj')->columnSpanFull()->readonly(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'new' => 'Yeni',
                                'read' => 'Okundu',
                                'contacted' => 'İletişime Geçildi',
                            ])
                            ->label('Durum'),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->label('Ad Soyad'),
                Tables\Columns\TextColumn::make('company')->searchable()->label('Firma'),
                Tables\Columns\TextColumn::make('email')->searchable()->label('E-posta'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->label('Tarih'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'danger',
                        'read' => 'warning',
                        'contacted' => 'success',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'new' => 'Yeni',
                        'read' => 'Okundu',
                        'contacted' => 'İletişime Geçildi',
                        default => $state,
                    })
                    ->label('Durum'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'new' => 'Yeni',
                        'read' => 'Okundu',
                        'contacted' => 'İletişime Geçildi',
                    ])
                    ->label('Durum'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(), // To change status
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListOffers::route('/'),
            'create' => Pages\CreateOffer::route('/create'), // Optional, usually disabled
            'edit' => Pages\EditOffer::route('/{record}/edit'),
        ];
    }
    
    public static function canCreate(): bool
    {
        return false;
    }
}
