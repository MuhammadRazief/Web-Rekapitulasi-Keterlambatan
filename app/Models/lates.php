<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lates extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','date_time_late','information','bukti',
    ];
      public function students()
    {
        return $this->belongsTo(Students::class);
    }

}
