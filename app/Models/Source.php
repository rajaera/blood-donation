<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    /**
     * static camps for temporary usage
     */

    public static function getSources() {
        return [
            1 => 'Social Media',
            2 => 'Church Announcment',
            3 => 'Looudspeakers',
            4 => 'Poster',
            5 => 'Call',
            6 => 'Letter',
            7 => 'Reference',
            8 => 'TCOL',
            9 => 'Navy'
        ];
    }

    public static function getSourceById($id) {
        $groups = self::getSources();

        return $groups[$id];
    }
}
