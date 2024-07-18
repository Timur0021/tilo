<?php

namespace App\Filament\Resources\AboutUs;

use App\Filament\Resources\AboutUs\AboutUsResource\Pages;
use App\Filament\Resources\AboutUs\AboutUsResource\RelationManagers;
use App\Models\Information\AboutUs;
use App\Models\ServiceCategory;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class AboutUsResource extends Resource
{
    protected static ?string $model = AboutUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationLabel = 'About Us';

    protected static ?string $modelLabel = 'About Us Information';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $slug = 'about-us';

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
                        Forms\Components\Select::make('advantage_id')
                            ->label('Advantage')
                            ->multiple()
                            ->relationship('advantages', 'title')
                    ]),
                Forms\Components\Section::make('Service Banner')
                    ->description('This is the banner about the service.')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('about_us_banner')
                            ->label('About Us banner')
                            ->collection('about_us_banner')
                            ->image()
                            ->imageEditor(),
                    ])->columnSpan(2),
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
            'index' => Pages\ListAboutUs::route('/'),
            'create' => Pages\CreateAboutUs::route('/create'),
            'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }
}
