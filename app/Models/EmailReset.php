<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ChangeEmail;

class EmailReset extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'user_id',
        'new_email',
        'token',
    ];

    public function sendEmailResetNotification($token) {

        $this->notify(new ChangeEmail($token));

    }

    public function routeNotificationForMail($notification)
    {
        return $this->new_email;
    }
}
