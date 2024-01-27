<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";
    protected $guarded = [];

    use SoftDeletes;

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
        'password' => 'hashed',
    ];


    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function paymentTypeVariables()
    {
        return $this->hasMany(PaymentTypeVariable::class, 'user_id');
    }

    public function accountFieldsCompleted()
    {
        return (isset($this->account->slug) && isset($this->account->company));
    }
    public function getRoleAttribute() {
        switch ($this->user_type) {
            case 'admin':
                return "سازنده";
                break;
            case 'support_admin':
                return "ادمین";
                break;

            default:
                return $this->user_type;
                break;
        }
    }
}
