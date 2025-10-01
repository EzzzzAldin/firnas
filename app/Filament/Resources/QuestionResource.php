<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $activeNavigationIcon = 'heroicon-s-chat-bubble-left-right';
    protected static ?string $singularLabel = 'Question';
    protected static ?string $pluralLabel = 'Questions';
    protected static ?string $navigationLabel = 'Questions';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('question_text')
                ->label('Question')
                ->required()
                ->maxLength(255),

            TextInput::make('priority')
                ->label('Priority')
                ->numeric()
                ->default(0)
                ->required(),

            Select::make('type')
                ->label('Type')
                ->options([
                    'text' => 'Text',
                    'select' => 'Select',
                    'checkbox' => 'Checkbox',
                ])
                ->required()
                ->live()
                ->default('text'),


            Textarea::make('options')
                ->label('Options (comma separated)')
                ->placeholder('Example: Yes,No,Maybe')
                ->visible(fn(callable $get) => in_array($get('type'), ['select', 'checkbox'])),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('question_text')
                    ->toggleable()
                    ->label('Question')
                    ->searchable()
                    ->wrap(),
                BadgeColumn::make('type')
                    ->toggleable()
                    ->searchable()
                    ->label('Type'),
                TextColumn::make('priority')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('options')
                    ->label('Options')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime('Y-m-d H:i'),
                TextColumn::make('updated_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime('Y-m-d H:i'),
            ])
            ->filters([])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('priority', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
    public static function getNavigationSort(): ?int
    {
        return 1;
    }
}
