<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('components.layouts.auth')]

class Login extends Component
{
    #[Rule('required|string|max:255')]
    public $email;
    #[Rule('required|string|min:8|max:255')]
    public $password;

    public function render()
    {
        return view('livewire.auth.login')->title(__('messages.login.title'));
    }

    public function login()
    {
        $this->validate();
        $credentials = $this->only('email', 'password');
        if (!Auth::attempt($credentials)) {

            //return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
        }

        //You have Successfully loggedin;

    }
}
