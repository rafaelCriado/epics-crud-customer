<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Customer;

class Address extends Model
{
    protected $fillable = ['type', 'street', 'district', 'zip_code', 'city', 'state'];

    public function custumer()
    {
        return $this->bolongsTo(Customer::class);
    }
}
