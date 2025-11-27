<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;
    protected $fillable = ['fine_id', 'amount', 'method', 'paid_at'];

    protected $dates = ['paid_at'];

    public function fine()
    {
        return $this->belongsTo(Fine::class);
    }
}
