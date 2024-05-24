<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'activity_date',
        'start_time',
        'end_time',
        'collaborator_name',
        'cpf',
        'activity_name',
        'mobile_number',
        'room',
        'company',
        'responsible',
        'materials_used',
        'cordage_length',
        'from_row',
        'from_rack',
        'to_row',
        'to_rack',
    ];
}
