<?php

namespace App\Exports;

use App\Models\FirstTest;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class FirstTestExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FirstTest::all();
    }    

    public function headings(): array
    {
        return [
            '#',
            'Soal',
            'A',
            'B',

        ];
    }

    public function map($firstest): array
    {
        return [
            '',
            $firstest->question,
            $firstest->opt_a,
            $firstest->opt_b,
            
        ];
    }
}
