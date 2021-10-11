@extends('template')
@section('content')
    <div class="content">
        <h1>Edit <mark style="background-color: yellow"> {{ $project->nama }}</mark> Project</h1>
        <br>
        <form action='/projects/editProjects/{{ $project->id }}' method="POST">
            @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama project</label>
                <div class="col-sm-10">
                  <input name="nama" class="form-control" id="inputEmail3" placeholder="Nama Project" value="{{ $project->nama }}">
                  @error('nama')
                  <p style="color: red">{{ $message }}</p>
              @enderror
                </div>
              </div>
            
             
              <div class="form-group row">
                <label for="exampleFormControlSelect1">Progress Status</label>
                <div class="col-sm-8">
                    <select class="form-select" id="exampleFormControlSelect1" name="progressStatus" >
                      <option value="{{ $project->progressStatus }}" selected  hidden>{{ $project->progressStatus }}</option>
                        <option value="1. Create Requirement">1. Create Requirement</option>
                        <option value="2. Submit Requirement">2. Submit Requirement</option>
                        <option value="3. Confirm Requirement">3. Confirm Requirement</option>
                        <option value="4. Development">4. Development</option>
                        <option value="5. SIT">5. SIT</option>
                        <option value="6. UAT">6. UAT</option>
                        <option value="7. Pre-production">7. Pre-production</option>
                        <option value="8. Production">8. Production</option>
                        <option value="9. PIR">9. PIR</option>
                        <option value="10. Live">10. Live</option>
                      </select> 
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleFormControlSelect1">Prioritas</label>
                <div class="col-sm-8">
                    <select class="form-select" id="exampleFormControlSelect1" name="prioritas" >
                      <option value="{{ $project->prioritas }}" selected  hidden>{{ $project->prioritas }}</option>
                        <option value="1 - Report Internal">1 - Report Internal</option>
                        <option value="2 - Proses Flow Enhancement / Office Automation">2 - Proses Flow Enhancement / Office Automation</option>
                        <option value="3 - Market Demand / Bisnis Impact / Skala Bisnis - Innovation">3 - Market Demand / Bisnis Impact / Skala Bisnis - Innovation</option>
                        <option value="4 - Market Demand / Bisnis Impact / Skala Bisnis - Existing">4 - Market Demand / Bisnis Impact / Skala Bisnis - Existing</option>
                        <option value="5 - Audit / SAI / Carry over Project">5 - Audit / SAI / Carry over Project</option>
                        <option value="6 - Regulatory / Mandatory / Compliance">6 - Regulatory / Mandatory / Compliance</option>
                       
                      </select> 
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleFormControlSelect1">Live</label>
                <div class="col-sm-8">
                    <select class="form-select" id="exampleFormControlSelect1" name="live" >
                      <option value="{{ $project->live }}" selected  hidden>{{ $project->live }}</option>
                        <option value="W1">W1</option>
                        <option value="W2">W2</option>
                        <option value="W3">W3</option>
                        <option value="W4">W4</option>
                        <option value="Live">Live</option>
                
                      </select> 
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleFormControlSelect1">Perkiraan Live</label>
                <div class="col-sm-8">
                    <select class="form-select" id="exampleFormControlSelect1" name="perkiraanLive" >
                      <option value="{{ $project->perkiraanLive }}" selected  hidden>{{ $project->perkiraanLive }}</option>
                        <option value="Jan-21">Jan-21</option>
                        <option value="Feb-21">Feb-21</option>
                        <option value="Mar-21">Mar-21</option>
                        <option value="Apr-21">Apr-21</option>
                        <option value="May-21">May-21</option>
                        <option value="Jun-21">Jun-21</option>
                        <option value="Jul-21">Jul-21</option>
                        <option value="Aug-21">Aug-21</option>
                        <option value="Sep-21">Sep-21</option>
                        <option value="Oct-21">Oct-21</option>
                        <option value="Nov-21">Nov-21</option>
                        <option value="Dec-21">Dec-21</option>
                        <option value="2022">2022</option>
                        <option value="Live">Live</option>
                
                      </select> 
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleFormControlSelect1">On Track/Delay</label>
                <div class="col-sm-8">
                    <select class="form-select" id="exampleFormControlSelect1" name="onTrack" >
                      <option value="" selected  hidden>{{ $project->onTrack }}</option>
                        <option value="On Track" >On Track</option>
                        <option value="Delay">Delay</option>
                      </select> 
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Impact If Delay</label>
                <div class="col-sm-10">
                  <input name="impactDelayed" class="form-control" id="inputEmail3" placeholder="Impact If Delay" value="{{ $project->impactDelayed }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleFormControlSelect1">Project Key</label>
                <div class="col-sm-8">
                    <select class="form-select" id="exampleFormControlSelect1" name="keyDepedency" >
                      <option value="{{ $project->keyDepedency }}" selected  hidden>{{ $project->keyDepedency }}</option>
                        <option value="Tidak ada">Tidak ada</option>
                        <option value="KPS 1">KPS 1</option>
                        <option value="KPS 2">KPS 2</option>
                        <option value="KPS 3">KPS 3</option>
                        <option value="SSK">SSK</option>
                        <option value="SME">SME</option>
                        <option value="BSP">BSP</option>
                        <option value="HLB 1">HLB 1</option>
                        <option value="HLB 2">HLB 2</option>
                        <option value="Wilayah">Wilayah</option>
                        <option value="KOM 1">KOM 1</option>
                        <option value="KOM 2">KOM 2</option>
                        <option value="INT">INT</option>
                        <option value="REN">REN</option>
                        <option value="MCM">MCM</option>
                        <option value="KMP">KMP</option>
                        <option value="Cabang">Cabang</option>
                        <option value="STI">STI</option>
                        <option value="ISU">ISU</option>
                        <option value="PFA">PFA</option>
                        <option value="KPN">KPN</option>
                        <option value="JAL">JAL</option>
                        <option value="PGV">PGV</option>
                        <option value="RTL">RTL</option>
                        <option value="DGO">DGO</option>
                        <option value="ERM">ERM</option>
                        <option value="DMA">DMA</option>
                        <option value="HUK">HUK</option>
                        <option value="Divisi Bisnis Lain">Divisi Bisnis Lain</option>
                        <option value="Divisi Non Bisnis Lain">Divisi Non Bisnis Lain</option>
                      </select> 
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Issue</label>
                <div class="col-sm-10">
                  <input name="issue" class="form-control" id="inputEmail3" placeholder="Issue" value="{{ $project->issue }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kebutuhan Eskalasi</label>
                <div class="col-sm-10">
                  <input name="eskalasi" class="form-control" id="inputEmail3" placeholder="Kebutuhan Eskalasi" value="{{ $project->eskalasi }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleFormControlSelect1">PIC1</label>
                <div class="col-sm-8">
                    <select class="form-select" id="exampleFormControlSelect1" name="picOne" >
                      <option value="{{ $project->picOne }}" selected  hidden>{{ $project->picOne }}</option>
                        <option value="Auzaiy">Auzaiy</option>
                        <option value="Bagya">Bagya</option>
                        <option value="Fifi Muladi">Fifi Muladi</option>
                        <option value="Sri Utomo">Sri Utomo</option>
                      </select> 
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">PIC2</label>
                <div class="col-sm-10">
                  <input name="picTwo" class="form-control" id="inputEmail3" placeholder="PIC2" value="{{ $project->picTwo }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleFormControlSelect1">Responsible Unit</label>
                <div class="col-sm-8">
                    <select class="form-select" id="exampleFormControlSelect1" name="responsibleUnit" >
                      <option value="{{ $project->responsibleUnit }}" selected  hidden>{{ $project->responsibleUnit }}</option>
                        <option value="STI">STI</option>
                        <option value="WHS">WHS</option>
                        <option value="Other">Other</option>
                      </select> 
                </div>
              </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Key Segment</label>
                    <div class="col-sm-10">
                      <input name="keySegment" class="form-control" id="inputEmail3" placeholder="Key Segment" value="{{ $project->keySegment }}">
                    </div>
                  </div>
              
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nasabah Spesifik</label>
                <div class="col-sm-10">
                  <input name="nasabah" class="form-control" id="inputEmail3" placeholder="Nasabah Spesifik" value="{{ $project->nasabah }}">
                </div>
              </div>
          
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Channel/Product</label>
            <div class="col-sm-10">
              <input name="channelProduct" class="form-control" id="inputEmail3" placeholder="Channel/Product" value="{{ $project->channelProduct }}">
            </div>
          </div>
      
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Project</label>
        <div class="col-sm-10">
          <input name="jenis" class="form-control" id="inputEmail3" placeholder="Jenis Project" value="{{ $project->jenis }}">
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor</label>
        <div class="col-sm-10">
          <input name="nomorCr" class="form-control" id="inputEmail3" placeholder="Nomor" value="{{ $project->nomorCr }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Pihak Eksternal</label>
        <div class="col-sm-10">
          <input name="pihakEksternal" class="form-control" id="inputEmail3" placeholder="Pihak Eksternal" value="{{ $project->pihakEksternal }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Requirement</label>
        <div class="col-sm-10">
          <input name="tanggalRequirement" class="form-control" id="inputEmail3" placeholder="Tanggal Requirement" value="{{ $project->tanggalRequirement }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Jadwal Implementasi</label>
        <div class="col-sm-10">
          <input name="jadwalImplementasi" class="form-control" id="inputEmail3" placeholder="Jadwal Implementasi" value="{{ $project->jadwalImplementasi }}">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-10">
            <textarea name="keterangan" class="form-control"  id="exampleFormControlTextarea1" rows="3" placeholder="Keterangan">{{ $project->keterangan }}</textarea>
        </div>
      </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </div>
        </form>
    </div>
@endsection