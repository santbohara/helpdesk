<?php

namespace App\Http\Livewire\Public;

use App\Models\QuestionFeedback;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SupportFeedback extends Component
{
    public $message, $question_id;

    public function mount($question_id)
    {
        $this->question_id = $question_id;
    }
    
    public function render()
    {
        return view('livewire.public.support-feedback');
    }

    public function submitFeedback($val,$id)
    {
        $Key = 'feedback_' . $id;

        if (!Session::has($Key)) {

            $update = QuestionFeedback::whereQuestionsId($id)->increment($val,1);

            if(!$update){
                QuestionFeedback::create([
                    'questions_id' => $id, 
                    'yes' => $val == 'yes' ? 1 : 0,
                    'no' => $val == 'yes' ? 0 : 1,
                ]);
            }
        
            Session::put($Key, 1);
        }

        $this->message = "&#128151; Thank you for your feedback.";
    }
}
