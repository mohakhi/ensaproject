@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha512-oM0dc37yV3+DHLyISesrGcv1tbKcQ5PaBo3PH59wedInPsSVJ0oTW53GISbMBD+3UO/WWrXnQ5DCM7hsRNolJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>  
   var year1 = ['08','09','10', '11'];  
    var data_viewer1 = <?php echo $viewer1; ?>;  
    var data_view_user = <?php echo $view_user; ?>;  

    var barChartData = {  
        labels: year1,  
        datasets: [{  
            label: 'category',  
            backgroundColor: "rgba(220,220,220,0.5)",  
            data: data_viewer1
        }, {  
            label: 'user',  
            backgroundColor: "rgba(151,187,205,0.5)",  
            data: data_view_user  
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
                    text: 'category/post Website Visitor'  
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
                    <canvas id="canvas" height="280" width="600"></canvas> 

 
                </div>  
            </div>  
        </div>  
    </div>  
</div>  


<script>

</script>



@endsection