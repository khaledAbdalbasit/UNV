<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Partner extends Model implements JWTSubject, Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'partner_name',
        'email',
        'phone',
        'password',
        'status',
        'country',
        'company',
        'contact_name',
        'contact_phone',
        'status',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getAuthIdentifierName()
    {
        return 'id'; // Assuming the primary key column is 'id'
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Return the primary key value
    }

    public function getAuthPassword()
    {
        return $this->password; // Assuming the password column is 'password'
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Assuming the remember token column is 'remember_token'
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Assuming the remember token column is 'remember_token'
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Assuming the remember token column is 'remember_token'
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    
}
