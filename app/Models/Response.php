<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable = ['message_id', 'text', 'search'];

    public function messages() {
        return $this->belongsTo(Message::class);
    }
}
