<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampSchedule extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'camp_schedule';

    protected $fillable = ['camp_id', 'title', 'schedule_at', 'comment'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'camp_id' => 1        
    ];


    /**
     *@return BoodCamp
     */
    public function bloodCamp()
    {
        return $this->belongsTo(BloodCamp::class, 'camp_id');
    }
}
