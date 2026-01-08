<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleModel extends Model
{
    use HasFactory;
    protected $table = 'modules';

    protected $fillable = [
        'name',
        'controller',
        'status'
    ];

    public function sectorProfiles()
    {
        return $this->hasMany(ModuleSectorProfileModel::class);
    }
}
