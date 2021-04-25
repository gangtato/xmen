<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Skill;

class SimulasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    private $data1;
    private $data2;

    public function __construct(int $data1, int $data2)
    {
        $this->data1 = $data1;
        $this->data2 = $data2;
    }

    public function collection()
    {
        $data_suami = $this->data1;
        $data_istri = $this->data2;
        return Skill::whereIn('hero_id',[$data_suami,$data_istri])->get();
    }
}
