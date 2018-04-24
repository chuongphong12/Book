@extends('master')
@section('content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{ url ('/')}}">Trang chủ</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Dashboard</a></li>
</ul>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
 <div class="row">
       <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-default">
               <div class="panel-body" style="margin-left: 20px">
                   <canvas id="canvas" height="280" width="600"></canvas>
               </div>
           </div>
       </div>
     </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <script>
        var url = "{{url('admin/pages/survey/chart')}}";
        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                Years.push(data.title);
                Labels.push(data.description);
                Prices.push(data.view);
            });
            var ctx = document.getElementById("canvas").getContext('2d');    
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:Years,
                      datasets: [{
                          label: 'View',
                          data: Prices,
                          backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                          borderColor: [
                            'rgba(255,99,132,1)',
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
                    xLabel:false,
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }],
                          xAxes: [{ 
                            display: false 
                          }]
                      }
                  }
              });
          });
        });
      </script>
@endsection