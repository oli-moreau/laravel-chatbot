<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class UserController extends Controller {

    public function index() {
        $user = auth()->user();
        $messages = $user->messages;
        $responses = $user->responses;

        return view('dashboard')->with([
            'user' => $user,
            'messages' => $messages,
            'responses' => $responses
        ]);
    }

    public function account($alerts = null) {
        $user = session('user') ? session('user') : auth()->user();
        return view('account')->with([
            'user' => $user,
            'alerts' => $alerts
        ]);
    }

    public function modify(Request $input) {
        if ($input->isMethod('GET')) {
            return redirect()->route('account');
        }

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->name = $input->name;
        $user->email = $input->email;

        if($input->password || $input->password_confirmation) {
            $validation = Validator::make($input->all(), ['password' => ['confirmed', Rules\Password::defaults()]]);
            if($validation->fails()) {
                return $this->account($validation->errors()->get('password'));
            }
            $user->password = Hash::make($input->password);
        }

        if ($input->image) {
            $validation = Validator::make($input->all(), ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
            if($validation->fails()) {
                return $this->account($validation->errors()->get('image'));
            }
            $imageName = time().'.'.$input->image->extension();
            $input->image->move(public_path('images/user_profile/'), $imageName);
            $user->profile_picture = $imageName;
        }

        $user->update();
        session()->put('user', $user);
        return $this->account(['Changes applied']);
    }
}
