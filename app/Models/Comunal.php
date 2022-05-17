<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comunal extends Model 
{
    use HasFactory;

    protected $fillable = [
        'image',
        'date'
    ];

    public function invoices()
    {
       return $this->belongsToMany(Invoice::class);
    }
}