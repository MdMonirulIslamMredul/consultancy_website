<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SvcSection extends Model
{
    use HasFactory;

    protected $table = 'svc_sections';

    protected $guarded = ['id'];
}
