<?php

namespace Modules\CountryManage\Entities;

use Modules\CountryManage\Entities\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }
    protected static function newFactory()
    {
        return \Modules\CountryManage\Database\factories\CountryFactory::new();
    }
}
