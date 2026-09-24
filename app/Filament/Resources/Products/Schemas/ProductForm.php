<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'title')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                FileUpload::make('image')
                    ->image(),
                Textarea::make('short_description')
                    ->columnSpanFull(),
                Textarea::make('full_description')
                    ->columnSpanFull(),
            ]);
    }
}
