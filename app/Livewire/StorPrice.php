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
        // نبدأ بالسعر الأساسي للمنتج
        $total = (float) $this->product->price;

        foreach ($this->product->questions as $questionIndex => $question) {
            $selection = $this->selectedAnswers[$questionIndex] ?? null;

            // إذا لم يقم المستخدم بالاختيار، ننتقل للسؤال التالي
            if (is_null($selection) || $selection === '' || $selection === []) {
                continue;
            }

            switch ($question['type_question']) {
                case 'select':
                case 'radio':
                case 'number': // سنعتبر أزرار الأرقام كأنها radio buttons
                    $selectedIndex = (int) $selection;
                    // نضيف السعر المرتبط بالإجابة المحددة
                    if (isset($question['price'][$selectedIndex])) {
                        $total += (float) $question['price'][$selectedIndex];
                    }
                    break;

                case 'chickbox': // تصحيح الخطأ الإملائي هنا إذا قمت بتعديله في قاعدة البيانات
                    // بما أن الإجابات عبارة عن مصفوفة من الـ indices
                    foreach ($selection as $selectedIndex) {
                         if (isset($question['price'][$selectedIndex])) {
                            $total += (float) $question['price'][$selectedIndex];
                        }
                    }
                    break;

                // أسئلة الـ text ليس لها سعر كما ذكرت
                case 'text':
                    break;
            }
        }

        return $total;
    }


    public function render()
    {
        return view('livewire.stor-price');
    }
}
