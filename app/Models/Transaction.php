<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $tabele = "transactions";
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }
    public function getRecordValueAttribute(){
        switch ($this->record_type) {
            case 'package':
              $msg='پکیج';
                break;
            case 'reserve':
              $msg='رزرو سانس';
                break;

            default:
                $msg=$this->record_type;
                break;
        }
        return $msg;
    }
}
