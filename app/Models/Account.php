<?php

namespace App\Models;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "accounts";
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function activeTheme($accountId, $projectId)
    {
        $settingModel = new Setting;
        $theme = $settingModel->getSetting('active_theme', $accountId, $projectId);
        if ($theme) {
            return $theme;
        }
        return null;
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'account_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'account_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function paymentTypes()
    {
        return $this->belongsToMany(PaymentType::class, 'account_payment_types', 'account_id', 'payment_type_id');
    }

    public function paymentTypeVariables()
    {
        return $this->hasMany(AccountPaymentTypeVariable::class);
    }

    public function transports()
    {
        return $this->belongsToMany(Transport::class, 'account_transports', 'account_id', 'transport_id');
    }

    public function addons()
    {
        return $this->hasMany(Addon::class);
    }
    public function getAccountAclValueAttribute() {
        switch ($this->account_acl) {
            case 'customer':
               return "مشتری";
                break;
            case 'agent':
               return "نماینده";
                break;
            case 'cos':
               return "همکار فروش";
                break;

            default:
           return $this->account_acl;
                break;
        }
    }
}
