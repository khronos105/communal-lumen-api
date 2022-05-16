<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model 
{
    use HasFactory;

    protected $fillable = [
        'title',
        'quantity'
    ];

    public function comunals()
    {
        return $this->belongsToMany(Comunal::class);
    }

    public function docs()
    {
       return $this->hasMany(Doc::class);
    }
}