<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $guarded = 'id';

    protected $fillable=[ 'nama',              
    'progressStatus'    ,
    'prioritas'         ,
    'live'              ,
    'perkiraanLive'     ,
    'onTrack'           ,
    'impactDelayed'     ,
    'keyDepedency'      ,
    'issue'             ,
    'eskalasi'          ,
    'picOne'            ,
    'picTwo'            ,
    'responsibleUnit'   ,
    'keySegment'        ,
    'nasabah'           ,
    'channelProduct'    ,
    'jenis'             ,
    'nomorCr'           ,
    'pihakEksternal'    ,
    'tanggalRequirement',
    'jadwalImplementasi',
    'keterangan'        ];

    public $timestamps = false;
}
