<?php

namespace App\Exports;

use App\Models\Project;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class ProjectsExport implements FromCollection,WithHeadings,ShouldAutoSize,WithColumnWidths,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

   
    public function collection()
    {
        return Project::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Name Project',
            'Project Status',
            'Prioritas',
            'Live',
            'Perkiraan Live',
            'On Track / Delay',
            'Impact if Delay',
            'Project Key',
            'Issue',
            'Kebutuhan Eskalasi',
            'Pic1',
            'Pic2',
            'Responsible Unit',
            'Key Segment',
            'Nasabah Spesifik',
            'Channel/Product',
            'JenisProject',
            'Nomor',
            'Pihak Eksternal',
            'Tanggal Requirement',
            'Jadwal Implementasi',
            'Keterangan',
        ];
    }
    public function columnWidths(): array
    {
        return [
            
            'C'=>30,
            'H' => 20,
            'J' => 40,   
            'K' => 40,  
            'S' => 30,
            'U' =>30,    
            'V' =>30 
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
               $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14)->setBold(true);
                
            },
        ];
    }

}
