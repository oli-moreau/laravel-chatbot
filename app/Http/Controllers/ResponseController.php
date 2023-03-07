<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    public function add($response, $message_id, $search) {

        Response::create([
            'message_id' => $message_id,
            'text' => $response,
            'search' => $search
        ]);

        return redirect()->route('dashboard');
    }
}
