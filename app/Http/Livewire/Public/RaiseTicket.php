<?php

namespace App\Http\Livewire\Public;

use App\Helpers\GenerateTicketID;
use App\Models\Admin\Ticket;
use App\Models\Admin\Topic;
use App\Notifications\Public\TicketRaisedNotification;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RaiseTicket extends Component
{
    public $your_name;
    public $account_number;
    public $mobile_number;
    public $email;
    public $topic;
    public $subject;
    public $description;

    public $captcha = 0;

    protected $rules = [
        'your_name'      => 'required|min:6',
        'account_number' => 'required|min:10',
        'mobile_number'  => 'required|digits:10',
        'email'          => 'required|email',
        'topic'          => 'required',
        'subject'        => 'required',
        'description'    => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.public.raise-ticket',[
            'topics' => Topic::whereActive(true)->orderBy('order')->get()
        ]);
    }

    public function updatedCaptcha($token)
    {
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('CAPTCHA_SECRET_KEY') . '&response=' . $token);
        $this->captcha = $response->json()['score'];

        if ($this->captcha > .3) {

            $this->submit();
        } else {

            return session()->flash('fail', 'Google thinks you are a bot, please refresh and try again');
        }

    }

    public function submit()
    {
        $this->validate();

        $save = Ticket::create([
            'ticket_id'      => GenerateTicketID::generateNumber('H'),
            'name'           => $this->your_name,
            'account_number' => $this->account_number,
            'mobile'         => $this->mobile_number,
            'email'          => $this->email,
            'topic_id'       => $this->topic,
            'subject'        => $this->subject,
            'description'    => $this->description,
            'status'         => '1',
            'ip'             => \Request::ip(),
            'user_agent'     => \Request::server('HTTP_USER_AGENT'),
            'updated_at'     => null
        ]);

        // Prepare data for notification
        $data = [
            'ticket_id' => $save->ticket_id,
            'name'      => $save->name,
            'subject'   => $save->subject,
            'topic'     => $save->Topic->title,
            'query'     => $save->description,
            'date'      => $save->created_at,
        ];

        if($save->exists){

            // trigger notification
            try{
                $save->notify(new TicketRaisedNotification($data));
            }catch(\Exception $e){
                $e->getMessage();
            }

            //return message
            session()->flash('success',$save->ticket_id);
        }else{
            session()->flash('fail','Something went wrong!');
        }

        return redirect()->route('raise.ticket');
    }
}
