<?php

namespace App\Filament\Resources\AnswerResource\Pages;

use App\Filament\Resources\AnswerResource;
use App\Models\Answer;
use App\Models\User;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ViewUserAnswers extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = AnswerResource::class;
    protected static string $view = 'filament.resources.answers.pages.view-user-answers';

    public $userId;
    public $user;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($userId);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Answer::query()
                    ->with('question')
                    ->where('user_id', $this->userId)
            )
            ->columns([
                TextColumn::make('question.question_text')
                    ->label('Question')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('answer_text')
                    ->label('Answer')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
