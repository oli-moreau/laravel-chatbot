<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller {

    public function add(Request $input) {

        if($input->text == null || $input->method() == 'GET') {
            return redirect()->route('dashboard');
        }

        $user = Auth::user();
        $message = Message::create([
            'user_id' => Auth::user()->id,
            'text' => $input->text
        ]);

        event(new MessageSent($input->text, $message->id, $user));

        return redirect()->route('dashboard');
    }

    public function clear(Request $input) {
        if($input->method() == 'GET') {
            return redirect()->route('dashboard');
        }

        $user = auth()->user();
        Message::where('user_id', $user->id)->delete();
        return redirect()->route('dashboard');
    }
}
