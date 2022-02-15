<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'shop_domain',
        'text',
        'time',
        'button_text',
        'button_link',
        'enabled'
       
    ];
}
