<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\AdminResource\Pages;
use App\Filament\Resources\Admin\AdminResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Admin';

    protected static ?string $modelLabel = 'Admins List';

    protected static ?string $navigationGroup = 'Team';

    protected static ?string $slug = 'admins';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Admin Information')
                    ->description('Create Admin')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->placeholder('Enter Admin Name'),
                        TextInput::make('email')
                            ->label('Admin Email')
                            ->type('email')
                            ->required()
                            ->placeholder('Enter Admin Email'),
                        TextInput::make('password')
                            ->label('Admin Password')
                            ->required()
                            ->placeholder('Enter Admin Password'),
                        Select::make('roles')
                            ->multiple()
                            ->relationship('roles', 'name')
                    ])->columnSpan(2)->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                TextColumn::make('name')
                    ->label('Name'),
                TextColumn::make('email')
                    ->label('Email'),
                TextColumn::make('roles.name')
                    ->label('Role'),
                TextColumn::make('password')
                    ->label('Password'),
                TextColumn::make('created_at')
                    ->label('Created at'),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}
