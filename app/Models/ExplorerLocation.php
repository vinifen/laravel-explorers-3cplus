<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExplorerLocation extends Model
{
    protected $fillable = ['explorer_id', 'latitude', 'longitude'];

    public function explorer()
    {
        return $this->belongsTo(Explorer::class);
    }
}
