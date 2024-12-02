<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function email(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'], // Validate email exists in users table
        ]);

        $user = User::where('email', $request->email)->first();

        $tempPassword = Str::random(45);
        $user->temp_password = $tempPassword;
        $user->save();

        $userId = $user->id;

        $to_name = $user->name;
        $to_email = $user->email;
        $body = "<a href='" . route('user.reset', [$userId, $tempPassword]) . "'>Click here to reset your password</a>";

        Mail::send('etudiants.mail', ['name' => $to_name, 'body' => $body], function ($message) use ($to_email) {
            $message->to($to_email)->subject('Reset Password');
        });
        
      

        return redirect(route('login'))->withSuccess('Please check your email to reset the password.');
    }

    public function reset(User $user, $token)
    {
        if ($user->temp_password === $token) {
            return view('etudiants.reset', compact('user', 'token'));
        }
        return redirect(route('user.forgot'))->withErrors('Invalid or expired reset token.');
    }
    

    public function resetUpdate(User $user, $token, Request $request)
    {
        if ($user->temp_password === $token) {
            $request->validate([
                'password' => 'required|min:6|max:20|confirmed',
            ]);

            $user->password = Hash::make($request->password);
            $user->temp_password = null;
            $user->save();

            return redirect(route('login'))->withSuccess('Password changed successfully.');
        }
        return redirect(route('user.forgot'))->withErrors('Invalid or expired reset token.');
    }
    
    public function forgot()
{
    return view('auth.forgot');
}

}
