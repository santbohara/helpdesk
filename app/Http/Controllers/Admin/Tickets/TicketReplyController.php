<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Controller;
use App\Models\TicketResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketReplyController extends Controller
{
    public function index(Request $request,$id)
    {
        $this->validate($request,[
            'details' => 'required|min:20'
        ],[
            'details' => 'Hold on! Response seems too short, add some more text.'
        ]);

        //Save reply to database
        $data = new TicketResponse();

        $data->ticket_id = $id;
        $data->details  = $request->details;
        $data->reply_by = Auth::user()->username;
        $data->updated_at = null;

        $data->save();

        //then Trigger Email alert to customer

        return back()->with('success','Reply email send successfully!');
    }
}
