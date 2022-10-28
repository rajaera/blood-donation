<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    use HasFactory;

    public static function getGroups() {
        return [
            1 => 'A+',
            2 => 'A-',
            3 => 'B+',
            4 => 'B-',
            5 => 'O+',
            6 => 'O-',
            7 => 'AB+',
            8 => 'AB-'
        ];
    }

    public static function getNameById($id) {
        $groups = self::getGroups();

        return $groups[$id];
    }
}
