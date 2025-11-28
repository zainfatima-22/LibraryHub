<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookUserResource\Pages;
use App\Filament\Resources\BookUserResource\RelationManagers;
use App\Models\Book;
use App\Models\BookUser;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookUserResource extends Resource
{
    protected static ?string $model = BookUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Section::make('Borrow Info')->schema([
            Select::make('user_id')
                ->label('User')
                ->relationship('user', 'name')
                ->searchable()
                ->required(),

            Select::make('borrowable_id')
                ->label('Book')
                ->options(Book::pluck('title', 'id'))
                ->searchable()
                ->required(),

            DateTimePicker::make('borrowed_at')
                ->label('Borrowed at')
                ->default(now())
                ->required(),

            DateTimePicker::make('due_date')
                ->label('Due date')
                ->default(now()->addDays(14))
                ->required(),

            Forms\Components\Hidden::make('borrowable_type')
                ->default(Book::class), 

            DateTimePicker::make('returned_at')
                ->label('Returned at')
                ->nullable(),
        ]),
    ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('user.name')->label('User')->sortable(),
                Tables\Columns\TextColumn::make('borrowable.title')->label('Book')->sortable(),
                Tables\Columns\TextColumn::make('borrowed_at')->dateTime(),
                Tables\Columns\TextColumn::make('due_date')->dateTime(),
                Tables\Columns\TextColumn::make('returned_at')->dateTime(),
                Tables\Columns\BadgeColumn::make('status')
                ->label('Status')
                ->colors([
                    'warning' => 'borrowed',  
                    'success' => 'returned',   
                    'danger'  => 'overdue',    
                ])
                ->formatStateUsing(fn ($state) => ucfirst($state)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('markReturned')
                    ->label('Mark as Returned')
                    ->action(function (BookUser $record) {
                        $record->update(['returned_at' => now(), 'status' => 'returned']);
                    })
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status !== 'returned'),
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
            'index' => Pages\ListBookUsers::route('/'),
            'create' => Pages\CreateBookUser::route('/create'),
            'edit' => Pages\EditBookUser::route('/{record}/edit'),
        ];
    }
}

