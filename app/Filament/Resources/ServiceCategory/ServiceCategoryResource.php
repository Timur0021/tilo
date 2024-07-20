<?php

namespace App\Filament\Resources\ServiceCategory;

use App\Filament\Resources\ServiceCategory\ServiceCategoryResource\Pages;
use App\Filament\Resources\ServiceCategory\ServiceCategoryResource\RelationManagers;
use App\Models\ServiceCategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceCategoryResource extends Resource
{
    protected static ?string $model = ServiceCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    protected static ?string $navigationLabel = 'Service Category';

    protected static ?string $modelLabel = 'Service Category';

    protected static ?string $navigationGroup = 'Service';

    protected static ?string $slug = 'service-categories';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Service Categories')
                    ->description('Service Category information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Service Category Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter Service Category Title'),
                        Forms\Components\MarkdownEditor::make('description')
                            ->label('Description')
                            ->required()
                            ->placeholder('Enter description'),
                        Forms\Components\Checkbox::make('is_active')
                            ->label('Is Active')
                            ->default(false),
                    ]),
                Forms\Components\Section::make('Service Category Banner')
                    ->description('This is the banner about the service category.')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('service_category_banner')
                            ->label('Service Category banner')
                            ->collection('service_category_banner')
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
                TextColumn::make('title')
                    ->label('Title'),
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(20),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('Banner')
                    ->disk('public')
                    ->collection('service_category_banner')
                    ->circular(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Is Active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Created At'),
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
            'index' => Pages\ListServiceCategories::route('/'),
            'create' => Pages\CreateServiceCategory::route('/create'),
            'edit' => Pages\EditServiceCategory::route('/{record}/edit'),
        ];
    }
}
