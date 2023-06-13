<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionProductResource\Pages;
use App\Filament\Resources\PromotionProductResource\RelationManagers;
use App\Models\PromotionProduct;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromotionProductResource extends Resource
{
    protected static ?string $model = PromotionProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name')
                    ->required(),
                Forms\Components\TextInput::make('bannerName')
                    ->required()
                    ->maxLength(128),
                Forms\Components\Section::make('Left Decor Image')
                    ->schema([
                        Forms\Components\FileUpload::make('left_decor_link')
                            ->label('Image')
                            ->image()
                            ->disableLabel(),
                    ])
                    ->collapsible(),
                Forms\Components\Section::make('Right Decor Image')
                    ->schema([
                        Forms\Components\FileUpload::make('right_decor_link')
                            ->label('Image')
                            ->image()
                            ->disableLabel(),
                    ])
                    ->collapsible(),
                Forms\Components\Toggle::make('is_visible')
                    ->required(),
                Forms\Components\DateTimePicker::make('available_until')
                    ->required(),
                Forms\Components\Section::make('Promotion Bullets')
                    ->schema(static::getFormBullets()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name'),
                Tables\Columns\TextColumn::make('bannerName'),
                Tables\Columns\TextColumn::make('left_decor_link'),
                Tables\Columns\TextColumn::make('right_decor_link'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('available_until')
                    ->dateTime(),
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

    public static function getFormBullets(?string $section = null): array
    {
        return [
            Forms\Components\Repeater::make('promo_bullets')
                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->columnSpan([
                            'md' => 10,
                        ])
                        ->maxLength(255)
                        ->required(),
                ])
                ->defaultItems(1)
                ->disableLabel()
                ->columns([
                    'md' => 10,
                ])
        ];
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
            'index' => Pages\ListPromotionProducts::route('/'),
            'create' => Pages\CreatePromotionProduct::route('/create'),
            'edit' => Pages\EditPromotionProduct::route('/{record}/edit'),
        ];
    }
}
