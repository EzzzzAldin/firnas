<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Computed; // استيراد الخاصية المحسوبة

class StorPrice extends Component
{
    public $product;

    // هذا المتغير سيحتوي على جميع إجابات المستخدم
    // المفتاح هو index الخاص بالسؤال، والقيمة هي إجابة المستخدم
    public array $selectedAnswers = [];

    public function mount($product)
    {
        $this->product = $product;
        // نقوم بتهيئة المصفوفة لتجنب أي أخطاء
        $this->initializeAnswers();
    }

    /**
     * دالة لتهيئة مصفوفة الإجابات بقيم فارغة
     */
    public function initializeAnswers()
    {
        foreach ($this->product->questions as $index => $question) {
            // أسئلة الـ checkbox يمكن أن تحتوي على إجابات متعددة، لذا نهيئها كمصفوفة فارغة
            if ($question['type_question'] === 'chickbox') { // انتبه: يوجد خطأ إملائي في كلمة checkbox
                $this->selectedAnswers[$index] = [];
            } else {
                $this->selectedAnswers[$index] = null;
            }
        }
    }

    /**
     * هذه خاصية محسوبة (Computed Property)
     * ستقوم بحساب السعر الإجمالي تلقائيًا كلما تغيرت قيمة $selectedAnswers
     */
    #[Computed]

    public function totalPrice()
    {
        // نتحقق أولاً إذا كل الإجابات فاضية
        $allEmpty = collect($this->selectedAnswers)->every(function ($answer) {
            return is_null($answer) || $answer === '' || $answer === [] || $answer === false;
        });

        // لو كلها فاضية → نرجع السعر الأساسي فقط بدون حساب أي إضافات
        if ($allEmpty) {
            return (float) $this->product->price;
        }

        // نبدأ بالسعر الأساسي للمنتج
        $total = (float) $this->product->price;

        // نضيف الأسعار بناءً على الإجابات المختارة
        foreach ($this->product->questions as $questionIndex => $question) {
            $selection = $this->selectedAnswers[$questionIndex] ?? null;

            if (is_null($selection) || $selection === '' || $selection === []) {
                continue;
            }

            switch ($question['type_question']) {
                case 'select':
                case 'radio':
                case 'number':
                    $selectedIndex = (int) $selection;
                    if (isset($question['price'][$selectedIndex])) {
                        $total += (float) $question['price'][$selectedIndex];
                    }
                    break;

                case 'chickbox':
                    foreach ($selection as $selectedIndex) {
                        if (isset($question['price'][$selectedIndex])) {
                            $total += (float) $question['price'][$selectedIndex];
                        }
                    }
                    break;
            }
        }

        return $total;
    }


    public function render()
    {
        $this->totalPrice();
        return view('livewire.stor-price');
    }
}
