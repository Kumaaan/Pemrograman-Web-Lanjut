<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('sku')
                    ->label('SKU')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                \Filament\Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                \Filament\Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->prefix('Rp'),
                \Filament\Forms\Components\TextInput::make('stock')
                    ->required()
                    ->numeric(),
                \Filament\Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('products'),
                \Filament\Forms\Components\Toggle::make('is_active')
                    ->default(true),
                \Filament\Forms\Components\Toggle::make('is_featured')
                    ->default(false),
            ]);
    }
}