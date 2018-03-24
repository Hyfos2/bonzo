@extends('master')
@section('content')
    {!! Charts::assets() !!}
<div class="row">

    <div class="col-md-12">
        <a>
            <div class="box box-info">
                <div class="box-header">
                    <h5 class="box-title" style="margin-left:5px;">Working Staff  <a href="{{'getstaffOnleave'}}" class="btn btn-sm">Staff on Leave</a> <a id="save-pdf" class="btn btn-sm">Download Pdf</a></h5>
                    
                    <hr class="whiter m-b-20">
                </div>
                <div style="margin:20px 20px 20px 20px;">
                <div class="box-body chart-responsive">
                    <div id="chart_div" style="width: auto;"></div>
                </div>
                </div>
            </div>
        </a>



    </div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script type="text/javascript">

        var first =   {!! $first !!};
        var two =     {!! $two !!};
        var third =     {!! $third !!};
        var forth =     {!! $forth !!};
        var fifth =     {!! $fifth !!};

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');
      data.addRows([
        ['Finance', first],
        ['Human Resources', two],
        ['Mining', third],
        ['Technical Services', forth],
        ['Security ', fifth]
      ]);

      // Set chart options
      var options = {'title':'Number of Working Staff per Department',
                     'height':500};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

     chart.draw(data,options);

    var btnSave = document.getElementById('save-pdf');

  google.visualization.events.addListener(chart, 'ready', function () {
    btnSave.disabled = false;
  });

  btnSave.addEventListener('click', function () {
    var doc = new jsPDF();
    doc.addImage(chart.getImageURI(), 0, 0);
    doc.save('chart.pdf');
  }, false);
    }
    </script>

    @endsection