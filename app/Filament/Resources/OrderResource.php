<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\DoughSpec;
use App\Models\Order;
use App\Models\Product;
use App\Models\SizeSpec;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static mixed $selected_product_id = 'default value';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema(static::getFormSchema())
                    ->columns(2),

                Forms\Components\Fieldset::make('Delivery address')
                    ->relationship('address')
                    ->schema([
                        Forms\Components\TextInput::make('street')
                            ->required()
                            ->maxValue(128),

                        Forms\Components\TextInput::make('house_number')
                            ->required()
                            ->maxValue(128),

                        Forms\Components\TextInput::make('apartment')
                            ->required()
                            ->maxValue(128),

                        Forms\Components\TextInput::make('entrance')
                            ->required()
                            ->maxValue(128),

                        Forms\Components\TextInput::make('floor')
                            ->numeric()
                            ->required(),

                        Forms\Components\TextInput::make('code')
                            ->required()
                            ->maxValue(128),
                    ]),

                Forms\Components\Section::make('Order products')
                    ->schema(static::getFormSchema('products')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('payment_type'),
                Tables\Columns\TextColumn::make('total_price'),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(?string $section = null): array
    {
        if ($section === 'products') {
            return [
                Forms\Components\Repeater::make('order_products')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->label('Product')
                            ->options(Product::query()->pluck('name', 'id'))
                            ->required()
                            ->reactive()
                            ->columnSpan([
                                'md' => 5,
                            ]),

                        Forms\Components\Select::make('size_spec_id')
                            ->label('Size')
                            ->options(SizeSpec::query()
                                ->pluck('name', 'id'))
                            ->required()
                            ->reactive()
                            ->columnSpan([
                                'md' => 5,
                            ]),

                        Forms\Components\Select::make('dough_spec_id')
                            ->label('Dough only for pizza ')
                            ->options(DoughSpec::query()->pluck('name', 'id'))
                            ->reactive()
                            ->columnSpan([
                                'md' => 2,
                            ]),

                        Forms\Components\Select::make('excluded_ingredients')
                            ->relationship('excluded_ingredients', 'name')
                            ->multiple()
                            ->preload()
                            ->columnSpan([
                                'md' => 2,
                            ]),

                        Forms\Components\Select::make('toppings')
                            ->relationship('toppings', 'name')
                            ->multiple()
                            ->preload()
                            ->columnSpan([
                                'md' => 2,
                            ]),

                        Forms\Components\TextInput::make('quantity')
                            ->numeric()
                            ->default(1)
                            ->columnSpan([
                                'md' => 2,
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('total_price')
                            ->numeric()
                            ->columnSpan([
                                'md' => 2,
                            ])
                            ->required(),
                    ])
                    ->disableLabel()
                    ->columns([
                        'md' => 20,
                    ])
                    ->required(),
            ];
        }

        return [
            Forms\Components\TextInput::make('number')
                ->default('OR-' . random_int(10000000, 99999999))
                ->required(),

            Forms\Components\TextInput::make('total_price')
                ->numeric()
                ->required(),

            Forms\Components\Select::make('status')
                ->options([
                    'new' => 'New',
                    'processing' => 'Processing',
                    'shipped' => 'Shipped',
                    'delivered' => 'Delivered',
                    'cancelled' => 'Cancelled',
                ])
                ->required(),

            Forms\Components\Select::make('payment_type')
                ->options([
                    'сash' => 'Cash',
                    'google pay' => 'Google Pay',
                    'credit card online' => 'Credit Card Online',
                    'credit card in store' => 'Credit Card In Store',
                ])
                ->required(),

            Forms\Components\MarkdownEditor::make('notes')
                ->columnSpan('full'),
        ];
    }
}
