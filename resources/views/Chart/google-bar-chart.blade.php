@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha512-oM0dc37yV3+DHLyISesrGcv1tbKcQ5PaBo3PH59wedInPsSVJ0oTW53GISbMBD+3UO/WWrXnQ5DCM7hsRNolJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>  
    var year = ['08','09','10', '11'];  
    var data_viewer = <?php echo $viewer; ?>;  
  
    var barChartData = {  
        labels: year,  
        datasets: [{  
         
            label: 'View',  
            backgroundColor: "rgba(151,187,205,0.5)",  
            data: data_viewer  
        }]  
    };  
  
    window.onload = function() {  
        var ctx = document.getElementById("canvas").getContext("2d");  
        window.myBar = new Chart(ctx, {  
            type: 'bar',  
            data: barChartData,  
            options: {  
                elements: {  
                    rectangle: {  
                        borderWidth: 1,  
                        borderColor: 'rgb(0, 255, 0)',  
                        borderSkipped: 'bottom'  
                    }  
                },  
                responsive: true,  
                title: {  
                    display: true,  
                    text: 'Yearly Website Visitor'  
                }  
            }  
        });  
  
    };  

    
</script>  


  
<div class="container">  
    <div class="row">  
        <div class="col-md-10 col-md-offset-1">  
            <div class="panel panel-default">  
                <div class="panel-heading">Dashboard</div>  
                <div class="panel-body">  
                    <canvas id="canvas" height="280" width="600"></canvas> 
                    <canvas id="canvas1" height="280" width="600"></canvas> 

 
                </div>  
            </div>  
        </div>  
    </div>  
</div>  


  
@endsection