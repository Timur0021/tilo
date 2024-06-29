<?php

namespace App\Filament\Resources\Article;

use App\Filament\Resources\Article\ArticleResource\Pages;
use App\Filament\Resources\Article\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Article';

    protected static ?string $modelLabel = 'Article List';

    protected static ?string $navigationGroup = 'Post';

    protected static ?string $slug = 'articles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Article Information')
                    ->description('This is the information about the article.')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->placeholder('Enter Article Title'),
                        Forms\Components\MarkdownEditor::make('description')
                            ->label('Description')
                            ->required()
                            ->placeholder('Enter Article Description'),
                        Forms\Components\Checkbox::make('published')
                            ->label('Published')
                            ->default(false),
                        Forms\Components\Hidden::make('user_id')
                            ->default(Auth::id()),
                    ]),
                Forms\Components\Section::make('Image Article')
                    ->description('This is the image about the article.')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('image_article')
                            ->label('Icon image')
                            ->collection('image_article')
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
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image_article')
                    ->disk('public')
                    ->collection('image_article')
                    ->circular(),
                Tables\Columns\IconColumn::make('published')
                    ->label('Published')
                    ->boolean(),
                TextColumn::make('user.name')
                    ->label('User'),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
