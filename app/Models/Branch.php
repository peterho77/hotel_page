<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Branch extends Model
{
    //
    protected $table = 'branch';

    public function room_types(): BelongsToMany
    {
        return $this->belongsToMany(RoomType::class,"room_type_branch")->withPivot('room_type_id');
    }

}
