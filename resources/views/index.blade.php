@extends('layouts.main')

@section('container')

@section('title', 'Kazee Hackathon')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150</h3>

            <p>New Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Bounce Rate</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>44</h3>

            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Sales
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>                  
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart">
                  <div id="container"></div>                         
               </div>
              <div class="chart tab-pane" id="sales-chart">
                  <div id="container2"></div>                       
              </div>  
            </div>
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->            
        
      </section>

@endsection

@section('page-script')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiYXVsaXlhYXFtYSIsImEiOiJjazFrNTg3Y24wOGEwM2xyNGhjNjM0d3J5In0.ZsiU0OzvHEtdSd7TrSfNNg';
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v10', // stylesheet location
    center: [107.587822, -6.877151], // starting position [lng, lat]
    zoom: 15 // starting zoom
});

var size = 80;

// implementation of CustomLayerInterface to draw a pulsing dot icon on the map
// see https://docs.mapbox.com/mapbox-gl-js/api/#customlayerinterface for more info
var pulsingDot = {
	width: size,
	height: size,
	data: new Uint8Array(size * size * 4),

	// get rendering context for the map canvas when layer is added to the map
	onAdd: function() {
		var canvas = document.createElement("canvas");
		canvas.width = this.width;
		canvas.height = this.height;
		this.context = canvas.getContext("2d");
	},

  	// called once before every frame where the icon will be used
	render: function() {
		var duration = 1000;
		var t = (performance.now() % duration) / duration;

		var radius = (size / 2) * 0.3;
		var outerRadius = (size / 2) * 0.7 * t + radius;
		var context = this.context;

		// draw outer circle
		context.clearRect(0, 0, this.width, this.height);
		context.beginPath();
		context.arc(this.width / 2, this.height / 2, outerRadius, 0, Math.PI * 2);
		context.fillStyle = "rgba(255, 200, 200," + (1 - t) + ")";
		context.fill();

	    // draw inner circle
	    context.beginPath();
	    context.arc(this.width / 2, this.height / 2, radius, 0, Math.PI * 2);
	    context.fillStyle = "rgba(255, 100, 100, 1)";
	    context.strokeStyle = "white";
	    context.lineWidth = 2 + 4 * (1 - t);
	    context.fill();
	    context.stroke();

	    // update this image's data with data from the canvas
	    this.data = context.getImageData(0, 0, this.width, this.height).data;

	    // continuously repaint the map, resulting in the smooth animation of the dot
	    map.triggerRepaint();

	    // return `true` to let the map know that the image was updated
	    return true;
	}
};

map.on("load", function() {
 	map.addImage("pulsing-dot", pulsingDot, { pixelRatio: 2 });

 	map.addLayer({
		id: "points",
    	type: "symbol",
    	source: {
    		type: "geojson",
      		data: {
        		type: "FeatureCollection",
        		features: [{
            		type: "Feature",
            		geometry: {
              			type: "Point",
              			coordinates: [107.587822, -6.877151]
              		}
              	}]
            }
        },
        layout: {
			"icon-image": "pulsing-dot"
		}
	});
});
</script>

<script>
$(function () {
	Highcharts.chart('container', {
	    chart: {
	        type: 'area'
	    },
	    title: {
	        text: 'Area chart with negative values'
	    },
	    xAxis: {
	        categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
	    },
	    credits: {
	        enabled: false
	    },
	    series: [{
	        name: 'John',
	        data: [5, 3, 4, 7, 2]
	    }, {
	        name: 'Jane',
	        data: [2, -2, -3, 2, 1]
	    }, {
	        name: 'Joe',
	        data: [3, 4, 4, -2, 5]
	    }]
	});
});
</script>

<script type="text/javascript">
	$(function(){
		Highcharts.chart('container2', {
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Browser market shares in January, 2018'
	    },
	    tooltip: {
	        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	    },
	    accessibility: {
	        point: {
	            valueSuffix: '%'
	        }
	    },
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: true,
	                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
	            }
	        }
	    },
	    series: [{
	        name: 'Brands',
	        colorByPoint: true,
	        data: [{
	            name: 'Chrome',
	            y: 61.41,
	            sliced: true,
	            selected: true
	        }, {
	            name: 'Internet Explorer',
	            y: 11.84
	        }, {
	            name: 'Firefox',
	            y: 10.85
	        }, {
	            name: 'Edge',
	            y: 4.67
	        }, {
	            name: 'Safari',
	            y: 4.18
	        }, {
	            name: 'Sogou Explorer',
	            y: 1.64
	        }, {
	            name: 'Opera',
	            y: 1.6
	        }, {
	            name: 'QQ',
	            y: 1.2
	        }, {
	            name: 'Other',
	            y: 2.61
	        }]
	    }]
	});
	});
</script>

@endsection