<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ["from", "to", "content"];


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
