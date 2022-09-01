<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $guarded = false;

    public function ticket(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'id', 'id');
    }

    public function serverCredentials(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ServerCredentials::class, 'message_id', 'id');
    }
}
