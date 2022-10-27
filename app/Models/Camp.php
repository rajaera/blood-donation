<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    use HasFactory;

    /**
     * static camps for temporary usage
     */

     public static function getCamps() {
         return [
             1 => 'Bopitiya Church DB Youth',
             2 => 'Kerawalapitiya  People\'s Pharmacy',
             3 => 'Pamunugama Church RC',
             4 => 'Nagoda Church Youth',
             5 => 'Mattumagala Church TCOL'
         ];
     }
}
