<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donor extends Model
{
    use HasFactory, SoftDeletes;    

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'donors';

    protected $fillable = ['first_name', 'last_name', 'address1', 'address2', 'address3', 'city', 'contact_number', 'identity_number', 'gender',  'source_id' , 'blood_group_id'];
    

    public static function getGenders() {
        return [
            'MALE' => 'MALE',
            'FEMALE' => 'FEMALE'
        ];
    }
}
