<?php

namespace App\Filament\Resources\Service;

use App\Filament\Resources\Service\ServiceResource\Pages;
use App\Filament\Resources\Service\ServiceResource\RelationManagers;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Worker;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Service';

    protected static ?string $modelLabel = 'Service List';

    protected static ?string $navigationGroup = 'Service';

    protected static ?string $slug = 'services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Service Information')
                    ->description('This is the information about the service.')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter Title'),
                        Forms\Components\MarkdownEditor::make('description')
                            ->label('Description')
                            ->required()
                            ->placeholder('Enter description'),
                        MoneyInput::make('price')
                            ->label('Price')
                            ->required(),
                        Forms\Components\Select::make('worker_id')
                            ->label('Worker')
                            ->relationship('worker', 'name'),
                        Forms\Components\Select::make('service_category_id')
                            ->label('Service Category')
                            ->relationship('serviceCategory', 'title')
                            ->options(function () {
                                return ServiceCategory::where('is_active', true)->pluck('title', 'id')->toArray();
                            }),
                        Checkbox::make('is_active')
                            ->label('Active')
                            ->default(false),
                    ]),
                Forms\Components\Section::make('Service Banner')
                    ->description('This is the banner about the service.')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('service_banner_image')
                            ->label('Service banner')
                            ->collection('service_banner_image')
                            ->image()
                            ->imageEditor(),
                    ])->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description'),
                Tables\Columns\TextColumn::make('worker.name')
                    ->label('Worker'),
                Tables\Columns\TextColumn::make('serviceCategory.title')
                    ->label('Service Category'),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('service_banner_image')
                    ->disk('public')
                    ->collection('service_banner_image')
                    ->circular(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
