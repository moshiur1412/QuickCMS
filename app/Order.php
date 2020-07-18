<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id', 'quantity', 'customer_name', 'phone_number', 'address', 'status'];

    
    public function setOrderAttribute($value='')
    {
    	$this->attributes['order'] = !empty($value) ? $value : 'Pending';
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

}
