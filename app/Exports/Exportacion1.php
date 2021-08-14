<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Country;
use App\Models\City;

// class Exportacion1 implements FromQuery,WithHeadings
class Exportacion1 implements FromCollection,WithHeadings
{
  use Exportable;

    public function collection()
    {
        return Country::all();
    }
    // public function query()
    // {
    //     return City::
    //     query()->
    //     select('idproductos','nombre','precio');
    // }

    public function headings():array{
      return[
        'Code',
        'Name',
        'Continent',
        'Region',
        'SurfaceArea',
        'IndepYear',
        'Population',
        'LifeExpectancy',
        'GNP',
        'GNPOld',
        'LocalName',
        'GovernmentForm',
        'HeadOfState',
        'Capital',
        'Code2',
        'active',
        'imagen',
      ];
    }
}?>
