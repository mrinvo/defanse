<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'clerk_id',
        'mil_no',
        'mil_batch_no',
         'id_no',
         'id_export_no',
         'id_expire_no',
         'pass_no',
         'pass_export_no',
         'pass_expire_no',
         'notes',
        ];
}
