<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        "titulo",
        "user_id",
        "descricao",
        "status"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
