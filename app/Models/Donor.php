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

    protected $fillable= ['first_name', 'last_name', 'address1', 'address2', 'address3', 'city', 'contact_number', 'identity_number', 'gender', 'updated_at', 'created_at', 'source_id', 'donation_camp_id'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'source_id' => 1,
        'donation_camp_id' => 1
    ];

}
