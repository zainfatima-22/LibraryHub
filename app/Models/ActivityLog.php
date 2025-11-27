<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityLogFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id', 'action', 'table_name', 'record_id', 'before_data', 'after_data'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

