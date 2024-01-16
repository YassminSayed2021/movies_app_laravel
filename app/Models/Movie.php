<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table='movies';

    public function user(){
        return $this->belongsTO(User::class);
    }

    protected $fillable=[
        'mtitle',
        'desc',
        'rate',
        'image',
        //'category',
    ];


}
