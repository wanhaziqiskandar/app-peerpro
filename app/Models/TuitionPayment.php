<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tutee_id',
        'request_id',
        'amount',
        'date',
    ];

    /**
     * Get the tutee associated with the payment.
     */
    public function tutee()
    {
        return $this->belongsTo(User::class, 'tutee_id');
    }

    /**
     * Get the tuition request associated with the payment.
     */
    public function tuitionRequest()
    {
        return $this->belongsTo(TuitionRequest::class, 'request_id');
    }
}
