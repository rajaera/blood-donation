<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    use HasFactory;

    public static function getGroups() {
        return [
            1 => 'A RhD positive (A+)',
            2 => 'A RhD negative (A-)',
            3 => 'B RhD positive (B+)',
            4 => 'B RhD negative (B-)',
            5 => 'O RhD positive (O+)',
            6 => 'O RhD negative (O-)',
            7 => 'AB RhD positive (AB+)',
            8 => 'AB RhD negative (AB-)'
        ];
    }

    public static function getNameById($id) {
        $groups = self::getGroups();

        return $groups[$id];
    }
}
