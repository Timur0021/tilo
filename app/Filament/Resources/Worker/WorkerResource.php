<?php

namespace App\Filament\Resources\Worker;

use App\Filament\Resources\Worker\WorkerResource\Pages;
use App\Filament\Resources\Worker\WorkerResource\RelationManagers;
use App\Models\Worker;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;
use Pelmered\FilamentMoneyField\Tables\Columns\MoneyColumn;

class WorkerResource extends Resource
{
    protected static ?string $model = Worker::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Workers';

    protected static ?string $modelLabel = 'Workers List';

    protected static ?string $navigationGroup = 'Team';

    protected static ?string $slug = 'workers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Workers Information')
                    ->description('Information about the worker')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter Name'),
                        Forms\Components\TextInput::make('surname')
                            ->label('Surname')
                            ->required()
                            ->placeholder('Enter Surname'),
                        MoneyInput::make('salary')
                            ->label('Salary')
                            ->required(),
                        DateTimePicker::make('birth_date')
                            ->label('Birth Date')
                            ->native(false)
                            ->placeholder('Enter Birth Date'),
                    ])->columnSpan(2)->columns(2),
                Forms\Components\Section::make('Icon Worker')
                        ->description('Upload icon for worker')
                        ->schema([
                            Forms\Components\SpatieMediaLibraryFileUpload::make('avatar_worker')
                                ->label('Icon image')
                                ->collection('avatar_worker')
                                ->image()
                                ->imageEditor(),
                        ])->columnSpan(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name'),
                TextColumn::make('surname')
                    ->label('Surname'),
                MoneyColumn::make('salary')
                    ->label('Salary'),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('avatar_worker')
                    ->disk('public')
                    ->collection('avatar_worker')
                    ->circular(),
                TextColumn::make('birth_date')
                    ->label('Birth Date'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListWorkers::route('/'),
            'create' => Pages\CreateWorker::route('/create'),
            'edit' => Pages\EditWorker::route('/{record}/edit'),
        ];
    }
}
