<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('title')->label('Title')->sortable()->searchable()->toggleable(),
                TextColumn::make('slug')->label('Slug')->sortable()->searchable()->toggleable(),
                TextColumn::make('category.name')->label('Category')->sortable()->searchable()->toggleable(),
                ColorColumn::make('color')->toggleable(),
                ImageColumn::make('image')->disk('public')->toggleable(),
                TextColumn::make('created_at')->label('Created At')->dateTime()->sortable()->toggleable(),
                TextColumn::make('tags')->label('Tags')->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('published')->label('Published')->boolean()->toggleable(),
            ])
            ->defaultSort('created_at', 'asc')
            ->filters([
                Filter::make('created_at')
                    ->label('Creation Date')
                    ->schema([ DatePicker::make('created_at')->label('Select Date:'), ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when($data['created_at'], fn (Builder $query, $date): Builder => $query->whereDate('created_at', $date));
                    }),
                SelectFilter::make('category_id')->label('Category')->relationship('category', 'name')->preload(),
            ])
            ->recordActions([
                ReplicateAction::make(),
                
                EditAction::make(),
                
                DeleteAction::make(),

                Action::make('status')
                    ->label('Status Change')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation() 
                    ->schema([
                        Checkbox::make('published')
                            ->default(fn($record): bool => (bool) $record->published),
                    ])
                    ->action(function ($record, array $data) {
                        $record->update(['published' => $data['published']]);
                    }),
            ]);
    }
}
