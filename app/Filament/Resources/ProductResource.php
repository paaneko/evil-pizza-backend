<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),

                Forms\Components\Select::make('sub_category_id')
                    ->relationship('sub_category', 'name')
                    ->required(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('purchases_count')
                    ->required()
                    ->numeric()
                    ->default(0),

                Forms\Components\TextInput::make('old_price')
                    ->required()
                    ->numeric()
                    ->maxValue(10000),

                Forms\Components\TextInput::make('new_price')
                    ->numeric()
                    ->maxValue(10000),

                Forms\Components\TextInput::make('weight')
                    ->required()
                    ->numeric()
                    ->maxValue(10000),

                Forms\Components\Section::make('Image')
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Image')
                            ->image()
                            ->disableLabel(),
                    ])
                    ->collapsible(),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(128),

                Forms\Components\Toggle::make('is_visible')
                    ->required(),

                Forms\Components\Select::make('ingredients')
                    ->relationship('ingredients', 'name')
                    ->multiple()
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('toppings')
                    ->relationship('toppings', 'name')
                    ->multiple()
                    ->preload(),

                Forms\Components\Section::make('Size Specifications ')
                    ->schema(static::getFormSize()),

                Forms\Components\Section::make('Dough Specifications (Only for Pizza)')
                    ->schema(static::getFormDough()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('sub_category.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('purchases_count'),
                Tables\Columns\TextColumn::make('old_price'),
                Tables\Columns\TextColumn::make('new_price'),
                Tables\Columns\TextColumn::make('weight'),
                Tables\Columns\TextColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getFormSize(?string $section = null): array
    {
        return [
            Forms\Components\Repeater::make('size_specs')
                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->columnSpan([
                            'md' => 2,
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('extra_price')
                        ->label('Extra Price')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->maxValue(10000)
                        ->columnSpan([
                            'md' => 2,
                        ]),
                    Forms\Components\TextInput::make('extra_weight')
                        ->label('Extra Weight')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->maxValue(10000)
                        ->columnSpan([
                            'md' => 2,
                        ]),
                    Forms\Components\TextInput::make('extra_toppings_price')
                        ->label('Extra Toppings Price')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->maxValue(10000)
                        ->columnSpan([
                            'md' => 2,
                        ]),
                    Forms\Components\TextInput::make('extra_toppings_weight_rate')
                        ->label('Extra Toppings Weight Rate %')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->maxValue(10000)
                        ->columnSpan([
                            'md' => 2,
                        ]),
                ])
                ->defaultItems(1)
                ->disableLabel()
                ->columns([
                    'md' => 10,
                ])
                ->required(),
        ];
    }

    public static function getFormDough(?string $section = null): array
    {

        return [
            Forms\Components\Repeater::make('dough_specs')
                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->columnSpan([
                            'md' => 6,
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('extra_price')
                        ->label('Extra Price')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->maxValue(10000)
                        ->columnSpan([
                            'md' => 2,
                        ]),
                    Forms\Components\TextInput::make('extra_weight')
                        ->label('Extra Weight')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->maxValue(10000)
                        ->columnSpan([
                            'md' => 2,
                        ]),
                ])
                ->defaultItems(1)
                ->disableLabel()
                ->columns([
                    'md' => 10,
                ])
        ];
    }
}
