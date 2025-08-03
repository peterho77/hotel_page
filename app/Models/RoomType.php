<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomType extends Model
{
    //
    protected $table = 'room_type';

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
