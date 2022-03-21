<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\EmailReset;
use App\Models\User;
use Carbon\Carbon;


class EmailResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('emailReset');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendChangeEmailLink(Request $request) {

        $request->validate([
            'newEmail' => ['required', 'string', 'email', 'max:255',]
        ]);

        $email = $request->newEmail;

        $token = hash_hmac(
            'sha256',
            Str::random(40) . $email,
            config('app.key')
        );

        DB::beginTransaction();

        try {

            $data = [
                'user_id' => Auth::user()->id,
                'new_email' => $email,
                'token' => $token,
            ];

            $email_reset = EmailReset::create($data);

            DB::commit();

            $email_reset->sendEmailResetNotification($token);

            return redirect('/emailReset')->with('flash_message', '確認メールを送信しました。');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/emailReset')->with('flash_message', 'メールの送信に失敗しました。');
        }
        
    }

    public function reset(Request $request, $token) {
         
        $email_resets = EmailReset::where('token', $token)->first();

        if ($email_resets && !$this->tokenExpired($email_resets->created_at)) {

            $user = User::find($email_resets->user_id);            
            $user->email = $email_resets->new_email;
            $user->save();

            EmailReset::where('token', $token)->delete();

            return redirect('/resetComplete')->with('flash_message', 'メールアドレスを更新しました');

        } elseif ($email_resets) {

            EmailReset::where('token', $token)->delete();

            return redirect('/resetComplete')->with('flash_message', 'メールアドレスの更新に失敗しました。');

        }   
    }


    protected function tokenExpired($createdAt)
    {
        // トークンの有効期限は60分に設定
        $expires = 60 * 60;
        return Carbon::parse($createdAt)->addSeconds($expires)->isPast();
    }


    public function resetComplete() {
        
        return view('resetComplete');
        
    }
}
