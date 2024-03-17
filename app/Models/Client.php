<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name',
        'phone',
        'address',
        'country',
        'state',
        'city',
        'partner_id',
        'status',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
