<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleSectorProfileModel extends Model
{
    use HasFactory;
    protected $table = 'module_sector_profile';

    public function module()
    {
        return $this->belongsTo(ModuleModel::class);
    }

    public function profile()
    {
        return $this->belongsTo(ProfileModel::class);
    }

    public function sector()
    {
        return $this->belongsTo(SectorModel::class);
    }

}
