<?php

namespace App\Livewire;

use Livewire\Component;


class EducationFilter extends Component
{
    public $category = 'All';

    public function setCategory($cat)
    {
        $this->category = $cat;
    }

    public function render()
    {
        $books = collect(config('education'));

        if ($this->category !== 'All') {
            $books = $books->where('category', $this->category);
        }

        return view('livewire.education-filter', [
            'books' => $books->values()
        ]);
    }
}
