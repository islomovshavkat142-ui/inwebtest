<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),

                Textarea::make('short_description')
                    ->label('Короткое описание')
                    ->rows(3),

                RichEditor::make('full_description')
                    ->label('Полное описание (HTML)')
                    ->columnSpanFull(),
            ]);
    }
}
