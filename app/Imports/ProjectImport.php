<?php

namespace App\Imports;

use App\Models\Project;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProjectImport implements ToModel,WithStartRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $col)
    {
        // var_dump($row);
        
        return new Project([

            'nama'                  =>$col[1],
            'progressStatus'         =>$col[2],
            'prioritas'               =>$col[3],
            'live'                         =>$col[4],
            'perkiraanLive'         =>$col[5],
            'onTrack'           =>$col[6],
            'impactDelayed'          =>$col[7],
            'keyDepedency'        =>$col[8],
            'issue'              =>$col[9],
            'eskalasi'           =>$col[10],
            'picOne'                =>$col[11],
            'picTwo'                    =>$col[12],
            'responsibleUnit'           =>$col[13],
            'keySegment'            =>$col[14],
            'nasabah'                   =>$col[15],
            'channelProduct'                =>$col[16],
            'jenis'                                 =>$col[17],
            'nomorCr'                   =>$col[18],
            'pihakEksternal'                =>$col[19],
            'tanggalRequirement'               =>$col[20],
            'jadwalImplementasi'                =>$col[21],
            'keterangan'                        =>$col[22]
            
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
{
    return [
        '1' => 'unique:projects,nama',
        //Rule::unique('projects', 'nama'), // Table name, field in your db
    ];
}

public function customValidationMessages()
{
    return [
        '1.unique' => 'Nama Project already exists, check your excel file',
    ];
   
}
}
