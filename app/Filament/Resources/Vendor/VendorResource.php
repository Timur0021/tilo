<?php

namespace App\Filament\Resources\Vendor;

use App\Filament\Resources\Vendor\VendorResource\Pages;
use App\Filament\Resources\Vendor\VendorResource\RelationManagers;
use App\Models\Vendor;
use App\Models\VendorCategory;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationLabel = 'Vendor';

    protected static ?string $modelLabel = 'Vendor';

    protected static ?string $navigationGroup = 'Partners';

    protected static ?string $slug = 'vendors';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Vendors information')
                    ->description('Information about the vendor')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('vendor_category_id')
                            ->label('Vendor Category')
                            ->relationship('vendorCategory', 'title')
                            ->options(function () {
                                return VendorCategory::where('is_active', true)->pluck('title', 'id')->toArray();
                            }),
                        ColorPicker::make('color')
                            ->rgb(),
                        Forms\Components\Checkbox::make('is_active')
                            ->label('Active')
                            ->default(false),
                    ])->columnSpan(2)->columns(1),
                Forms\Components\Section::make('Vendor Logo')
                    ->description('Upload a logo')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('vendor_logo_banner')
                            ->label('Logo image')
                            ->collection('vendor_logo_banner')
                            ->image()
                            ->imageEditor(),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
