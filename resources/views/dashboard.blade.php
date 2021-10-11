<style>
  .container-diagram{
    overflow: hidden;
  }

  #myBtnContainer{
    padding: 2vh;
  }

  .filterDiv {
  display: none; /* Hidden by default */
  }

  /* The "show" class is added to the filtered elements */
  .show {
  display: block;
  }

  /* Style the buttons */
  .batn {
  border: none;
  border-radius: 10px;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
  }

  /* Add a light grey background on mouse-over */
  .batn:hover {
  background-color: #ddd;
  }

  /* Add a dark background to the active button */
  .batn.active {
  background-color: #666;
  color: white;
  }
 
  .dropdown{
    padding : 16px;
  }

  /* Dropdown Button */
.dropbtn {
  /* background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer; */
  border: none;
  border-radius: 10px;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
  align-items: center;
}

.dropbtnn {
  /* background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer; */
  border: none;
  border-radius: 10px;
  outline: none;
  padding: 12px 16px;
  background-color: #FFFF;
  cursor: pointer;
  align-items: center;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #DEBA9D;
}
.dropbtnn:hover, .dropbtnn:focus {
  background-color: #DEBA9D;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}

.row-btn{
  display: flex;
  flex-direction: row;
  -ms-overflow-style: none;
  scrollbar-width: none;
  align-items: center
  /* overflow: -moz-hidden-unscrollable; */
}

.row-btn::-webkit-scrollbar{
  display: none;
}

.categ-btn{
  background-color: floralwhite;
  border: none;
  margin-block: 13px;
  padding: 7px 5px;
  border-radius: 2px
}

.categ-btn:hover{
  background-color: #666;
}
</style>

@extends('template')
@section('content')

<div class="content">
    <div class="row">
      <div class="dropdown">
        <button onclick="myDropdownn()" class="dropbtnn" id="drop-title">
          Statistic
          <span>
            <img src="assets/img/down-arrow.png" alt="" style="width: 12px; height: 12px;">
          </span>
        </button>
        <div id="myDropdownn" class="dropdown-content">
          <a onclick="filterBtn('all')">All</a>
          @isset($perkiraanLive)
            @foreach ($perkiraanLive as $item)
              @if ($item   != null && $item != 'TBC')
                <a onclick="filterBtn('{{ $item }}')">{{ $item }}</a>
              @endif
            @endforeach
          @endisset
          <a onclick="filterBtn('others')">Others</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-bullet-list-67"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Total Project</p>
                  <p class="card-title" id="total-project">{{ $count }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-delivery-fast text-info"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Project's On Track</p>
                  <p class="card-title" id="total-ontrack">{{ $onTrack }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-alert-circle-i text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Project's Delay</p>
                  <p class="card-title" id="total-delay">{{ $delay }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-check-2 text-success"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Project's Live</p>
                  <p class="card-title" id="total-live">{{ $live }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="dropdown">
            <button onclick="myDropdown()" class="dropbtn">
              Diagram Chart
              <span>
                <img src="assets/img/down-arrow.png" alt="" style="width: 12px; height: 12px;">
              </span>
            </button>
            <div id="myDropdown" class="dropdown-content">
              <a onclick="filterSelection('priorityChart')">Project's Priority</a>
              <a onclick="filterSelection('progressChart')">Project's Progress Status</a>
            </div>
          </div>

          <div class="container-diagram">
            <div class="filterDiv priorityChart">
              <h5 class="card-title">Project's Priority Chart Diagram</h5>
            <canvas id="chartPriority" class="col-13" width="400" height="180px">Project's Priority Chart Diagram</canvas>
            </div>
            <div class="filterDiv progressChart">
              <h5 class="card-title">Project's Progress Status Chart Diagram</h5>
            <canvas id="chartOnTrack" class="col-13" width="400" height="180px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

<script>
  function filterBtn(a){
    var i, j;
    var tempPro, tempOnTrack, tempDelay, tempLive;

    var tempNullOnTrack = 0, tempTbcOnTrack = 0, tempNullDelay = 0, tempTbcDelay = 0;
    const len = {!! json_encode($perkiraanLive) !!};
    const nameTotalPro = {!! json_encode($nameTotalPro) !!};
    const nameOnTrack = {!! json_encode($nameOnTrack) !!};
    const nameDelay = {!! json_encode($nameDelay) !!};
    const totalPro = {!! json_encode($totalPro) !!};
    const totalOnTrack = {!! json_encode($totalOnTrack) !!};
    const totalDelay = {!! json_encode($totalDelay) !!};

    for (j = 0; j < nameTotalPro.length; j++) {
      if(a==nameTotalPro[j]){
        tempPro = totalPro[j];
      }
    }
    for (j = 0; j < nameOnTrack.length; j++) {
      if(a==nameOnTrack[j]){
        tempOnTrack = totalOnTrack[j];
      }
      if(nameOnTrack[j]==''){
        tempNullOnTrack = totalOnTrack[j];
      }
      if(nameOnTrack[j]=='TBC'){
        tempTbcOnTrack = totalOnTrack[j];
      }
    }
    for (j = 0; j < nameDelay.length; j++) {
      if(a==nameDelay[j]){
        tempDelay = totalDelay[j];
      }
      if(nameOnTrack[j]==''){
        tempNullDelay = totalDelay[j];
      }
      if(nameOnTrack[j]=='TBC'){
        tempTbcDelay = totalDelay[j];
      }
    }

    if(a == 'all'){
      document.getElementById('drop-title').innerHTML = 'All';
      document.getElementById('total-project').innerHTML = {{ $count }};
      document.getElementById('total-ontrack').innerHTML = {{ $onTrack }};
      document.getElementById('total-delay').innerHTML = {{ $delay }};
      document.getElementById('total-live').innerHTML = {{ $live }};
    }
    if(a == 'others'){
      document.getElementById('drop-title').innerHTML = 'Others';
      document.getElementById('total-project').innerHTML = {{ $totalProTBC }};
      document.getElementById('total-ontrack').innerHTML = tempNullOnTrack + tempTbcOnTrack;
      document.getElementById('total-delay').innerHTML = tempNullDelay + tempTbcDelay;
      document.getElementById('total-live').innerHTML = '--';
    }
    if(a == 'Live'){
      document.getElementById('drop-title').innerHTML = 'Live';
      document.getElementById('total-project').innerHTML = {{ $live }};
      document.getElementById('total-ontrack').innerHTML = {{ $totalLiveOnTrack }};
      document.getElementById('total-delay').innerHTML = {{ $totalLiveDelay }};
      document.getElementById('total-live').innerHTML = {{ $live }};
    }
    else{
      for(i=0;i<len.length;i++){
        if(a==len[i]){
          document.getElementById('drop-title').innerHTML = len[i];
          document.getElementById('total-project').innerHTML = tempPro;
          document.getElementById('total-ontrack').innerHTML =tempOnTrack;
          if(tempDelay){
            document.getElementById('total-delay').innerHTML = tempDelay;
          }
          else{
            document.getElementById('total-delay').innerHTML = 0;
          }
          document.getElementById('total-live').innerHTML = 0;
        }
      }
    }
  }

  


  // DIAGRAM BATANG PRIORITAS
  var ctx = document.getElementById('chartPriority').getContext('2d');
  var cts = document.getElementById('chartPriority').getContext('2d'); 
  var myChart = new Chart(ctx, {                                                                                                                            
    type: 'bar',
    data: {
        labels: ['Report Internal', 'Proses Flow Enhancement / Office Automation ', 'Market Demand / Bisnis Impact / Skala Bisnis - Innovationllow', 
        'Market Demand / Bisnis Impact / Skala Bisnis - Existing', 'Audit / SAI / Carry over Project', 'Regulatory / Mandatory / Compliance'],
        datasets: [{
            label: 'Total Project per Prioritas',
            data: [{{ $prioritas_1 }}, {{ $prioritas_2 }}, {{ $prioritas_3 }}, {{ $prioritas_4 }}, {{ $prioritas_5 }}, {{ $prioritas_6 }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// DIAGRAM BATANG ON TRACK DAN DELAY
var ctxx = document.getElementById('chartOnTrack').getContext('2d');  
  var myChartt = new Chart(ctxx, {
    type: 'bar',
    data: {
        labels: ['Create Requirement', 'Submit Requirement', 'Confirm Requirement', 
        'Development', 'SIT', 'UAT','Pre-production','Production','PIR','Live','Others'],
        datasets: [{
            label: 'Total Project per Prioritas',
            data: [{{ $ps1 }}, {{ $ps2 }}, {{ $ps3 }}, {{ $ps4 }}, {{ $ps5 }}, {{ $ps6 }}
            , {{ $ps7 }}, {{ $ps8 }}, {{ $ps9 }}, {{ $ps10 }},{{ $others }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});




//SCRIPT UNTUK FILTER DIAGRAM
filterSelection("priorityChart")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "priorityChart") c = "priorityChart";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    removeClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
  }
}

// Show filtered elements
function addClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function removeClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

function myDropdown() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function myDropdownn() {
  document.getElementById("myDropdownn").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn') && !event.target.matches('.dropbtnn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
    
@endsection