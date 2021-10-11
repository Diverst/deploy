
@extends('template')
@section('css')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/>   
@endsection
@section('content')

    <div class="content">
        @if (session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
            
        </div>
    </div>
@endif
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.dataTables.min.css"> --}}
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body" style="overflow: auto;">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                {{-- <a class="btn btn-success" style="float: right;" href="/addProjects"> Add New</a>
                                <a class="btn btn-danger" style="float: right; color:white"  data-toggle="modal" data-target="#exampleModal"> Import Data</a> --}}
                                <a class="btn btn-success" style="float: right;" href="/exportProjects"> Export file</a>
                                <!-- Example single danger button -->
<div class="btn-group" style="float: right">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Add Project
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/projects/addProjects">Add New</a></li>
      <li><a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Import File</a></li>
      
      
    </ul>
  </div>
                                <h3> Projects</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="min-width: 100px">Actions</th>
                                            <th style="min-width: 100px">Nama Project</th>
                                            <th style="min-width: 100px">Project Status</th>
                                            <th style="min-width: 200px">Prioritas</th>
                                            <th style="min-width: 100px">Live</th>
                                            <th style="min-width: 100px">Perkiraan Live</th>
                                            <th style="min-width: 100px">On Track/Delay</th>         
                                            <th style="min-width: 100px">Impact If Delay</th>
                                            <th style="min-width: 100px">Project Key</th>
                                            <th style="min-width: 200px">issue</th>
                                            <th style="min-width: 100px">Kebutuhan Eskalasi</th>
                                            <th style="min-width: 100px">Pic1</th>
                                            <th style="min-width: 100px">Pic2</th>
                                            <th style="min-width: 100px">Responsible Unit</th>
                                            <th style="min-width: 100px">Key Segment</th>
                                            <th style="min-width: 100px">Nasabah Spesifik</th>
                                            <th style="min-width: 100px">Channel Product</th>
                                            <th style="min-width: 100px">Jenis Project</th>
                                            <th style="min-width: 100px">Nomor</th>
                                            <th style="min-width: 200px">Pihak Eksternal</th>
                                            <th style="min-width: 100px">Tanggal Requirement</th>
                                            <th style="min-width: 100px">Jadwal Implementasi</th>
                                            <th style="min-width: 300px">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($projects)
                                            @foreach ($projects as $project)
                                                <tr>
                                                    <td><a href="/projects/{{ $project->id }}"><span class="badge badge-pill badge-warning mr-3" style="margin: 3px;height: 25px;"><i class="fa fa-pencil">  Edit</i></span></a>
                                                        <a href="/projects/deleteProjects/{{ $project->id  }}"><span class="badge badge-pill badge-danger mr-3" style="margin: 3px; height: 25px;"><i class="fa fa-trash" > Delete</i></span></a></td>
                                                    <td>{{ $project->nama }}</td>
                                                    {{-- <td>{{ $project->responsibleUnit }}</td> --}}
                                                    <td>{{ $project->progressStatus }}</td>
                                                    <td>{{ $project->prioritas }}</td>
                                                    @if ($project->live == 'Live')
                                                        <td><span class="badge badge-pill badge-success"> Live</span></td>
                                                    @else
                                                        <td><span class="badge badge-pill badge-info text-capitalize">
                                                                {{ $project->live ?? '-' }}</span></td>
                                                    @endif
                                                    @if ($project->perkiraanLive == 'Live')
                                                        <td><span class="badge badge-pill badge-success"> Live</span></td>
                                                    @else
                                                        <td><span class="badge badge-pill badge-info text-capitalize">
                                                                {{ $project->perkiraanLive ?? '-' }}</span></td>
                                                    @endif
                                                    @if ($project->onTrack == 'Delay')
                                                        <td><span class="badge badge-pill badge-danger">Delay</span></td>
                                                    @else
                                                        <td><span class="badge badge-pill badge-success">On Track</span></td>
                                                    @endif
                                                    <td>{{ $project->impactDelayed }}</td>
                                                 
                                                    
                                                    <td>{{ $project->keyDepedency ?? '-' }}</td>
                                                    <td>{{ $project->issue ?? '-' }}</td>
                                                    <td><span class="badge badge-pill badge-primary">{{$project->eskalasi}}</span></td>
                                                    <td><span class="badge badge-pill badge-warning">{{$project->picOne}}</span></td>
                                                    <td><span class="badge badge-pill badge-info">{{$project->picTwo}}</span></td>
                                                    <td>{{ $project->responsibleUnit }}</td>
                                                    <td>{{$project->keySegment}}</td>
                                                    <td><span class="badge badge-pill badge-primary">{{$project->nasabah}}</span></td>
                                                    <td><span class="badge badge-pill badge-warning">{{$project->channelProduct}}</span></td>
                                                    <td>{{$project->jenis}}</td>

                                                    <td>{{$project->nomorCr}}</td>
                                                    <td>{{$project->pihakEksternal}}</td>

                                                    @if ($project->tanggalRequirement == 'Live')
                                                        <td><span class="badge badge-pill badge-success"> Live</span></td>
                                                    @else
                                                        <td><span class="badge badge-pill badge-info text-capitalize">
                                                                {{ $project->tanggalRequirement ?? '-' }}</span></td>
                                                    @endif

                                                    <td>{{$project->jadwalImplementasi}}</td>
                                                    <td>{{$project->keterangan}}</td>
                                                </tr>
                                            @endforeach

                                        @endisset
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="POST" enctype="multipart/form-data" action="/import">
@csrf
<input type="file" name="file" class="form-control">
<small style="color: grey">*Download template terlebih dahulu untuk import file</small>
<br><br>
<a href="/fileTemplate">Download template</a>

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save changes">
    </form>  
    </div>
    </div>
  </div>
@endsection
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
<script>
  $(document).ready( function () {
   $('#example').DataTable({
    responsive: true
//     fixedHeader: {
//             header: true,
//             footer: true
//         }
   });
} );
</script> --}}
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>  
$(document).ready(function() {
      $('#example').DataTable();
    });
  </script> 
@endsection
