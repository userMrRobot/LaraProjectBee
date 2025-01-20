<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;
    protected $guarded = false;

    protected $table = 'moneys';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
