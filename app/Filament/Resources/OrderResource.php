<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product_id')->sortable(),
                TextColumn::make('product_name'),
                TextColumn::make('price'),
                TextColumn::make('currency'),
                TextColumn::make('payment_status'),
                TextColumn::make('customer_email'),
                TextColumn::make('customer_mobile'),
                TextColumn::make('customer_name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    // ✅ النسخة المصححة من infolist()
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([

            Section::make('Order Details')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('id')->label('Order ID'),
                            TextEntry::make('created_at')
                                ->label('Order Date')
                                ->dateTime('Y-m-d H:i'),
                            TextEntry::make('product_id')->label('Product ID'),
                            TextEntry::make('product_name')->label('Product Name'),
                            TextEntry::make('price')->label('Price'),
                            TextEntry::make('currency')->label('Currency'),
                            TextEntry::make('payment_status')
                                ->label('Payment Status')
                                ->badge()
                                ->color(fn($state) => match ($state) {
                                    'paid' => 'success',
                                    'pending' => 'warning',
                                    default => 'gray',
                                }),
                        ]),
                ])
                ->columnSpanFull(),

            Section::make('Customer Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('customer_name')->label('Customer Name'),
                            TextEntry::make('customer_email')->label('Email'),
                            TextEntry::make('customer_mobile')->label('Phone'),
                        ]),
                ])
                ->collapsible(),
        ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }
}
