<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Classes extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'classes';
    protected $primaryKey = 'id_class';

    protected $fillable = [
        'name',
        'description',
        'mentor',
        'start_date',
        'start_time',
        'end_time',
        'day_of_week',
        'duration_weeks',
        'price',
        'max_participant',
        'status'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'id_class', 'id_class');
    }

}
