<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Workertask;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Database extends Model
{
    
    protected $table = 'database';
    public $timestamps = false;
    public function workertask(): HasMany
    {
        return $this->hasMany(Workertask::class);
    }
}
