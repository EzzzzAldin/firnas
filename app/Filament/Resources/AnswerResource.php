<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnswerResource\Pages;
use App\Models\Answer;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;

class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $activeNavigationIcon = 'heroicon-s-chat-bubble-left-ellipsis';
    protected static ?string $navigationLabel = 'Answers';
    protected static ?string $pluralModelLabel = 'Answers';
    protected static ?string $modelLabel = 'Answer';

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(
                Answer::query()
                    ->with(['user'])
                    ->select('user_id as id', 'user_id')
                    ->selectRaw('COUNT(*) as total_answers')
                    ->selectRaw('MAX(created_at) as last_answer_date')
                    ->groupBy('user_id')
                    ->orderByDesc('last_answer_date')
            )

            ->columns([
                TextColumn::make('user.name')
                    ->label('User Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.phone')
                    ->label('Phone')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('total_answers')
                    ->label('Total Answers')
                    ->sortable()
                    ->badge()
                    ->color('success'),

                TextColumn::make('last_answer_date')
                    ->label('Last Answer Date')
                    ->sortable()
                    ->searchable()
                    ->dateTime('Y-m-d H:i'),
            ])
            ->actions([
                ViewAction::make()->url(fn($record) => Pages\ViewUserAnswers::getUrl(['userId' => $record->user_id])),
            ]);
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User')
                    ->required()
                    ->searchable(),

                Select::make('question_id')
                    ->relationship('question', 'question_text')
                    ->label('Question')
                    ->required(),

                Textarea::make('answer_text')
                    ->label('Answer')
                    ->nullable(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnswers::route('/'),
            'view-user-answers' => Pages\ViewUserAnswers::route('/user/{userId}'),
        ];
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }
}
