<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    public function sector()
    {
        return $this->belongsTo(SectorModel::class);
    }

}
