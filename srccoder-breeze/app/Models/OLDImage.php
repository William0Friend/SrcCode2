<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OLDImage extends Model
{
    use HasFactory;
//    protected $fillable = [
//        'id',
//        'file_name',
//        'uploaded_on',
//        'status',
//        'user_id',
//    ];
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
