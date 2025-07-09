<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Historique extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
