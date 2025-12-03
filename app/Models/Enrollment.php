<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = 'enrollments';
    protected $primaryKey = 'id_enrollment';

    protected $fillable = [
        'id_user',
        'id_class',
        'status',
        'progress',
        'enrolled_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'id_class', 'id_class');
    }
}
