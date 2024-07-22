<?php

namespace App\Filament\Resources\AboutUs;

use App\Filament\Resources\AboutUs\AboutUsResource\Pages;
use App\Filament\Resources\AboutUs\AboutUsResource\RelationManagers;
use App\Models\AboutUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

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
                            ->multiple()
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
                    ->label('Description')
                    ->limit(20),
                Tables\Columns\TextColumn::make('advantages.title')
                    ->label('Advantages'),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('about_us_banner')
                    ->disk('public')
                    ->collection('about_us_banner')
                    ->circular(),
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
            'index' => Pages\ListAboutUs::route('/'),
            'create' => Pages\CreateAboutUs::route('/create'),
            'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }
}
