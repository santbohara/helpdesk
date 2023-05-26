<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ticket;
use App\Models\TicketResponse;
use App\Notifications\Admin\TicketReplyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketReplyController extends Controller
{
    public function index(Request $request,$id)
    {
        // Reply details is required
        $this->validate($request,[
            'details' => 'required|min:20'
        ],[
            'details' => 'Hold on! Response seems too short, add some more text.'
        ]);

        // Prepare reply to save in database
        $reply = new TicketResponse();
        $reply->ticket_id = $id;
        $reply->details  = $request->details;
        $reply->reply_by = Auth::user()->username;
        $reply->updated_at = null;


        // Prepare data for Email
        $ticket = Ticket::with('Topic')->findOrFail($id);
        
        $data = [
            'ticket_id'          => $ticket->ticket_id,
            'name'               => $ticket->name,
            'reply'              => $request->details,
            'original_subject'   => $ticket->subject,
            'original_topic'     => $ticket->Topic->title,
            'original_query'     => $ticket->description,
            'ticket_raised_date' => $ticket->created_at,
        ];

        try{

            // trigger notfication
            $ticket->notify(new TicketReplyNotification($data));

            // Save log to database
            $reply->save();

        }catch(\Exception $e){
            return $e->getMessage();
        }

        return back()->with('success','Reply email send successfully!');
    }
}
