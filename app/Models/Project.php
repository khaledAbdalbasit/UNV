<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_code',
        'project_title',
        'start_date',
        'end_date',
        'client_id',
        'partner_id',
        'country',
        'state',
        'city',
        'address',
        'created_by',
        'status',
    ];

    public function partners()
    {
        return $this->hasMany(Partner::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
