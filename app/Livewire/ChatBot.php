<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class ChatBot extends Component
{
    public $questions;
    public $answers = [];
    public $currentIndex = 0;
    public $currentAnswer = '';
    public $checkboxAnswers = [];
    public $showChat = false;

    protected $listeners = ['user-authenticated' => 'initializeChat'];

    public function mount()
    {
        $this->initializeChat();
    }

    public function initializeChat()
    {
        $userId = auth()->id();

        $this->questions = Question::orderBy('priority', 'asc')->get();

        $userAnswers = Answer::where('user_id', $userId)->get()->keyBy('question_id');

        foreach ($userAnswers as $questionId => $ans) {
            $this->answers[$questionId] = $ans->answer_text;
        }

        $this->currentIndex = $this->questions->search(function ($q) use ($userAnswers) {
            return !$userAnswers->has($q->id);
        });

        if ($this->currentIndex === false) {
            $this->currentIndex = $this->questions->count(); // إذا تم الإجابة عن جميع الأسئلة
        }

        $this->showChat = true;
    }

    public function saveAnswer()
    {
        $q = $this->questions[$this->currentIndex] ?? null;
        if (!$q) return;

        $answerText = $q->type === 'checkbox'
            ? implode(', ', $this->checkboxAnswers)
            : $this->currentAnswer;

        if (!$answerText) return;

        Answer::updateOrCreate(
            [
                'question_id' => $q->id,
                'user_id' => Auth::id(),
            ],
            [
                'answer_text' => $answerText,
            ]
        );

        $this->answers[$q->id] = $answerText;
        $this->currentAnswer = '';
        $this->checkboxAnswers = [];
        $this->currentIndex++;

        $this->dispatch('scroll-bottom');
    }

    public function render()
    {
        return view('livewire.chat-bot');
    }
}
