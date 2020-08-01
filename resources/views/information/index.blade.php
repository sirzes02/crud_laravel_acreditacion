@extends('layouts.app')

@section('content')
  <div id="chart_div"></div>
  <div id="prueba"></div>
@endsection

@section('scripts')
  <!--Load the AJAX API-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
      'packages': ['corechart']
    });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');
      data.addRows([
        ['Mushrooms', 3],
        ['Onions', 1],
        ['Olives', 1],
        ['Zucchini', 1],
        ['Pepperoni', 2]
      ]);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));


      chart.draw(data, {
        'title': 'How Much Pizza I Ate Last Night',
        'width': 400,
        'height': 300
      });

      var data2 = new google.visualization.DataTable();
      data2.addColumn('string', 'Element');
      data2.addColumn('number', 'Percentage');
      data2.addRows([
        ['Nitrogen', 0.78],
        ['Oxygen', 0.21],
        ['Other', 0.01]
      ]);

      var chart2 = new google.visualization.PieChart(document.getElementById('prueba'));

      chart2.draw(data2, null);
    }

  </script>
@endsection
