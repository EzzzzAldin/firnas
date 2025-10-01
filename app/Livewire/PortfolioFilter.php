<?php

namespace App\Livewire;

use Livewire\Component;

class PortfolioFilter extends Component
{
    public $selectedCategory = 'الكل';

    public function render()
    {
        $projects = config('projects');

        $staticCategories = collect(['العلامة التجارية', 'التسويق', "الانتاج الاعلاني"]);
        $configCategories = collect($projects)->pluck('category');

        $categories = $staticCategories
            ->merge($configCategories)
            ->unique()
            ->prepend('الكل')
            ->values()
            ->toArray();

        $filteredProjects = $this->selectedCategory === 'الكل'
            ? $projects
            : collect($projects)->where('category', $this->selectedCategory)->values();

        return view('livewire.portfolio-filter', [
            'categories' => $categories,
            'filteredProjects' => $filteredProjects
        ]);
    }
}
