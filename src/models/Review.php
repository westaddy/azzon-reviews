<?php
namespace Westaddy\AzzonReviews\Models;
use Illuminate\Database\Eloquent\Model;
class Review extends Model{
    protected $table = 'reviews';
     public  function getIpAddressAttribute($value)
    {
        return inet_ntop($value);
    }

    public  function setIpAddressAttribute($value)
    {
        $this->attributes['ip_address'] = inet_pton($value);
    }
}
