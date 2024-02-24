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
}
