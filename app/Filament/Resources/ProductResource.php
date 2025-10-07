<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $activeNavigationIcon = 'heroicon-s-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Name')->required(),
                Select::make('services_id')
                    ->relationship('service', 'name')
                    ->label('Service')->required(),

                FileUpload::make('image')->columnSpanFull()->label('Image')
                    ->disk('public'),

                TextInput::make('price')->label('Price')->required(),

                Textarea::make('dis')
                    ->columnSpanFull()
                    ->label('Description')->required(),

                FileUpload::make('slider')->label('Slider Images')->multiple()->columnSpanFull()->disk('public'),
                Repeater::make('questions')
                    ->schema([
                        Select::make('type_question')
                            ->label('Type')
                            ->options([
                                'text' => 'Text',
                                'select' => 'Select',
                                'radio' => 'Radio',
                                'chickbox' => 'Chickbox',
                                'number' => 'Number',
                            ])
                            ->required()
                            ->live()
                            ->default('text'),

                        TextInput::make('question')->visible(fn(callable $get) => in_array($get('type_question'), ['text'])),
                        // TextInput::make('price')->label('The Price')->visible(fn(callable $get) => in_array($get('type_question'), ['text']))->default(0),

                        TextInput::make('question')->label('Question')->visible(fn(callable $get) => in_array($get('type_question'), ['number'])),
                        TagsInput::make('answers')->label('The Options Numbers')->placeholder('New Number')
                            ->visible(fn(callable $get) => in_array($get('type_question'), ['number'])),
                        TagsInput::make('price')->label('Put the prices in order according to the options you have set')->placeholder('Next Price')
                            ->visible(fn(callable $get) => in_array($get('type_question'), ['number']))->default(0),

                        TextInput::make('question')->label('The Question')->visible(fn(callable $get) => in_array($get('type_question'), ['select'])),
                        TagsInput::make('answers')->label('The Answers')->placeholder('New Option')
                            ->visible(fn(callable $get) => in_array($get('type_question'), ['select'])),
                        TagsInput::make('price')->label('Put the prices in order according to the options you have set.')->placeholder('Next Price')
                            ->visible(fn(callable $get) => in_array($get('type_question'), ['select']))->default(0),

                        TextInput::make('question')->label('The Question')->visible(fn(callable $get) => in_array($get('type_question'), ['radio'])),
                        Radio::make('yesOrNo')->options(
                            ['Yes', 'No']
                        )->label('Do you want to add a question about the number of designs and posts? ')->visible(fn(callable $get) => in_array($get('type_question'), ['radio'])),
                        TagsInput::make('answers')->label('Radio Options')->placeholder('New Radio')->visible(fn(callable $get) => in_array($get('type_question'), ['radio'])),
                        TagsInput::make('price')->label('Put the prices in order according to the options you have set.')->placeholder('Next Price')->visible(fn(callable $get) => in_array($get('type_question'), ['radio']))->default(0),

                        TextInput::make('question')->label('The Question')->visible(fn(callable $get) => in_array($get('type_question'), ['chickbox'])),
                        TagsInput::make('answers')->label('Chickbox Options')->placeholder('New Chickbox')->visible(fn(callable $get) => in_array($get('type_question'), ['chickbox'])),
                        TagsInput::make('price')->label('Put the prices in order according to the options you have set.')->placeholder('Next Price')->visible(fn(callable $get) => in_array($get('type_question'), ['chickbox']))->default(0),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Service Name'),
                ImageColumn::make('image')->label('Image')->circular()
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
