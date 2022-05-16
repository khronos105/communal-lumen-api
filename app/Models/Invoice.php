<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model {

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