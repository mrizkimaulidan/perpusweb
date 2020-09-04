<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class AuthenticateLog extends Model
{
    protected $fillable = ['user_id', 'last_login_date', 'last_login_time', 'last_login_ip'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function indonesian_date_format($date)
    {
        return date_format(date_create($date), 'd-m-Y');
    }

    public function time($time)
    {
        return date('H:i', strtotime($time));
    }
}
