<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestResource extends Resource
{
    protected static ?string $model = \App\Models\Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationLabel = 'Test';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Admin\Resources\TaskResource\Pages\ListTasks::route('/'),
        ];
    }
}
