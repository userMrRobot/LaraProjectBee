<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bee extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'bees';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
