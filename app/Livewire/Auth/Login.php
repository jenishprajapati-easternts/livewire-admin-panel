<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]

class Login extends Component
{

    public $showLoginInfo = true;
    public $showOTPVerify = false;

    public $email, $password, $generateOTP, $verify_otp_code;

    public function render()
    {
        return view('livewire.auth.login')->title(__('messages.login.title'));
    }

    public function login()
    {

        $this->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        if (Auth::attempt($this->only('email', 'password'))) {
            $this->showLoginInfo = false;
            $this->showOTPVerify = true;
            $this->generateOTP = '123456';
        } else {
            $this->dispatch('alert', type: 'error', message: __('messages.login.invalid_credentials_error'));
        }

    }

    public function verifyOtp()
    {

        $this->validate([
            'verify_otp_code' => 'required|numeric|digits:6',
        ]);

        if ($this->generateOTP != $this->verify_otp_code) {
            $this->dispatch('alert', type: 'error', message: __('messages.login.invalid_otp_error'));
        } else {
            // redirect to dashboard
        }

    }

    public function back()
    {
        $this->showOTPVerify = false;
        $this->showLoginInfo = true;
    }
}
