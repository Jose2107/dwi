<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
    use HasFactory;
    protected $table ='country';
    protected $Code;
    protected $Capital;
    protected $Code2;
    protected $Continent;
    protected $GNP;
    protected $GNPold;
    protected $Government;
    protected $HeadOfState;
    protected $IndepYear;
    protected $LifeExpectancy;
    protected $LocalName;
    protected $Name;
    protected $Population;
    protected $Region;
    protected $active;
    protected $imagen;
    protected $SurfaceArea;
    public $timestamps = false;
}
