<?php

namespace App;

use App\Address;
use App\File;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'birthday', 'status'];

    protected $dates = ['birthday', 'created_at'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function avatar()
    {
        return $this->belongsTo(File::class);
    }
}
