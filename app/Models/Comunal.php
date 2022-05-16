<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model {

    protected $fillable = [
        'image',
        'date'
    ];

    public function invoices()
    {
       return $this->belongsToMany(Invoice::class);
    }
}