<?php

namespace App\Filament\Resources\VandorCategory;

use App\Filament\Resources\VandorCategory\VendorCategoryResource\Pages;
use App\Filament\Resources\VandorCategory\VendorCategoryResource\RelationManagers;
use App\Models\VendorCategory;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Tables\Columns\IconColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VendorCategoryResource extends Resource
{
    protected static ?string $model = VendorCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    protected static ?string $navigationLabel = 'Vendor Category';

    protected static ?string $modelLabel = 'Vendor Category';

    protected static ?string $navigationGroup = 'Category';

    protected static ?string $slug = 'vendor-categories';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Vendor Categories Information')
                    ->description('Information about vendor categories')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Vendor Category Title'),
                        Forms\Components\MarkdownEditor::make('description')
                            ->label('Description'),
                        Forms\Components\Checkbox::make('is_active')
                            ->label('Is Active')
                            ->default(false),
                    ])->columns(1),
                Forms\Components\Section::make('Banner')
                    ->description('Banner image')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('vendor_category_banner')
                            ->label('Banner image')
                            ->collection('vendor_category_banner')
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
                    ->label('Description'),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('vendor_category_banner')
                    ->label('Banner image')
                    ->disk('public')
                    ->collection('vendor_category_banner')
                    ->circular(),
                IconColumn::make('is_active')
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
            'index' => Pages\ListVendorCategories::route('/'),
            'create' => Pages\CreateVendorCategory::route('/create'),
            'edit' => Pages\EditVendorCategory::route('/{record}/edit'),
        ];
    }
}
