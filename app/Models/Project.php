<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'yarn_type',
        'hook_size',
        'notes',
        'is_complete'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
