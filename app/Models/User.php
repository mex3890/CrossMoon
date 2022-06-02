<?php

namespace App\Models;

use App\Models\Traits\User\Relationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Relationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function rules()
    {
        return [
            'name' => 'required|min:3|max:100|',
            'password' => 'required', Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
            'email' => 'required|email',
            //'role_id' => 'required'
        ];
    }

    public static function feedback()
    {
        return [
            'required' => 'The :attribute is mandatory',
            'name.min' => 'Need min 3 characters',
            'name.max' => 'Max 100 characters',
            'email.email' => 'Send a valid email address'
        ];
    }
}
