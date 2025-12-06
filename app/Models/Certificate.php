<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    use HasFactory;

    protected $table = 'certificates';
    protected $primaryKey = 'id_certificate';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_class',
        'verified',
        'file_path',
        'code_certificate',
        'issued_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function class()
    {
        // Pastikan model Classes di-import atau path lengkap
        return $this->belongsTo(Classes::class, 'id_class');
    }
}
