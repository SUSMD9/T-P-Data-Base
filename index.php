<?php
session_start();

if(isset($_SESSION['uid']))
{
	header('location:admin/admindashbord.php');
}

?>



<?php // username/password

include ('dbcon.php');

if(isset($_POST['login']))
{


     $username=$_POST['username'];
     $password=$_POST['password'];

     $query="SELECT * FROM `admin` WHERE username= '$username' and password='$password' ";

     $run=mysqli_query($con,$query);
     $row=mysqli_num_rows($run);

     if($row<1)
     { 
        ?>
        <script>
             alert('! username or password not match ');
             window.open('index.php',_self);
        </script>

        <?php
     }
     else
     {
        $data=mysqli_fetch_assoc($run);
     $id=$data['id'];
       $name=$data['username'];

       
     $_SESSION["uname"]=$name ;
     $_SESSION['uid']=$id;

        header('location:admin/admindashbord.php');
     
        
     }
} // username/password 
?>  

<!-- dont use abouve area -->
<!-- dont use abouve area -->
<!-- dont use abouve area -->
<!-- dont use abouve area -->
<!-- dont use abouve area -->
<!-- dont use abouve area -->
<!-- dont use abouve area -->
<!-- dont use abouve area -->
<!-- dont use abouve area -->
<!-- dont use abouve area -->
<!-- dont use abouve area -->

<?php
include('dbcon.php');
$qry= "SELECT `Branch`, COUNT(*) as number FROM  `student` GROUP BY `Branch`";
$qry1="SELECT avg(`Average_Pointer`) AS branchAverage, branch FROM `student` GROUP BY `Branch";


$result=mysqli_query($con,$qry);
$result1=mysqli_query($con,$qry1);

?>

<!-- ****************************************************************************************************************** --> 

<html>
     <head><meta name="viewport" content="width=device-width, initial-scale=0">
     
     <title>Main Page</title>

 <!-- ****************************************************************************************************************** --> 

<!-- 1st chart starts -->

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
           <script type="text/javascript">
         google.charts.load('current',{'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart()
        { 
            var data=google.visualization.arrayToDataTable([['branch','Number'],
                <?php
                while($row = mysqli_fetch_array($result))
                {
                   
                    echo "['".$row["Branch"]."', ".$row["number"]."],";
                }
                ?>
                ]);
            var options ={
            backgroundColor: 'transparent',
              'width':871,
                     'height':551,
             is3D:true,
          
              
               legend: {position: 'labeled',
        textStyle: { color: '#e0440e' }
    },
              colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6']
               
             
            };
             var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data,options);
        }


</script> <!-- 1st chart end-->



<!-- 2nd chart starts-->

 <script type="text/javascript"> 
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Branch', 'Average Pointer'],
          <?php
           
           while($row = mysqli_fetch_array($result1)){

            echo "['".$row["branch"]."', ".$row["branchAverage"]."],";

           }
           ?>


        
        ]);

        var options = {
          title: 'Branch wise Performance',
          backgroundColor: 'transparent',
          'width':851,
                     'height':550,
          legend: { position: 'bottom' },
          colors: ['#0a92d1'],
          vAxis: { gridlines: { count: 10 } },
         
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script><!-- 2nd chart end-->






 <!-- ****************************************************************************************************************** -->    

 <style>
  
@media only screen and (min-width: 1024px) {



 
.fade {

  opacity: 1;
}

    #logo{
        width: 100%;height: 100%;margin-top: 0px;background-image: url('bg4.png') ;

    overflow: hidden;
    opacity:0.9;
    background-size: 100% 100%;
 background-attachment: fixed;
    
    background-repeat: no-repeat;
    
    
    }
     #logo_bg{
        width: 100%;height: 100%;margin-top: 0px;background-color: rgba(110, 117, 153,0.7);
    }

    #logo_txt{
        width: 100%;height: 11%;margin-top: 0px; 
      }
    #logo_img{
        width:61px;height: 61px;margin-top: 11px;margin-left: 11px;float: left
    }
    #logo_sub_txt{
        margin-left: 11px;float: left;margin-top: 15px;
    }
    #logo_sub_txt_1{
    color: #ffffff;font-size: 27px;
    }
    #logo_sub_txt_2{
    color: #ffffff;font-size: 19px;opacity: 0.9
    }
    .div1{
        background-color: #eceff1;width: 100%;height:81%;
    }
    .div2{
        background-color: rgba(179, 191, 231, 0.3);width: 100%;height:81%;float: ;margin-top: -21px;
    }
    .div1_sub1{
        width: 34%;height:96%;float: left;background-color:#ffffff;border-right: 11px solid #ffffff;
    }
    .div1_sub2{

        width: 65%;height:96%;float: left;background-color:white;border-left: 2px solid #dddddd;
    }
    #div1_id1{
        font-size: 33px;color: #0d72b9;margin-left: 101px;
    }
     .div2_sub1{
        width: 62%;height:100%;float: left;background-color:;margin-top: 0px;
    }
    .div2_sub2{
 
        width: 33%;height:100%;float: left;background-color:;overflow: hidden;border-left: 2px solid #f8f8f8;
    }
    #div2_id1{
        font-size: 45px;color: #0d72b9;margin-left: 101px;
    }
    .form{
        width: 41px;height: 41px;
    }



}

/*******************************************************************************************************************/

@media only screen and (max-width: 1024px) {
    /* For mobile phones: */
    
        #logo{
        width: 100%;height: 100%;margin-top: 0px;background-image: url('bg6.png');
    opacity:0.8;
    background-size: 100% 100%;
 background-attachment: fixed;
    
    background-repeat: no-repeat;
    
    border-bottom: 5px solid red;
    }


    #logo_txt{
        width: 100%;height: 100%;margin-top: 0px;background-color: rgba(0,0,0,0);
    }
    #logo_img{
        width:57px;height: 57px;margin-top: 11px;margin-left: 11px;float: left
    }
    #logo_sub_txt{
        margin-left: 11px;float: left;margin-top: 15px;
    }
    #logo_sub_txt_1{
    color: #ffffff;font-size: 24px;
    }
    #logo_sub_txt_2{
    color: #ffffff;font-size: 16px;opacity: 0.9;
    }
  


}

</style>

<!-- nav bar finish-->

<!-- script for fedin animation on div-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">


$(window).on("load",function() {
  $(window).scroll(function() {
    var windowBottom = $(this).scrollTop() + $(this).innerHeight();
    $(".fade").each(function() {
      /* Check the location of each desired element */
      var objectBottom = $(this).offset().top + $(this).outerHeight();
      
      /* If the element is completely within bounds of the window, fade it in */
      if (objectBottom < windowBottom) { //object comes into view (scrolling down)
        if ($(this).css("opacity")==0) {$(this).fadeTo(500,1);}
      } else { //object goes out of view (scrolling up)
        if ($(this).css("opacity")==1) {$(this).fadeTo(500,0);}
      }
    });
  }).scroll(); //invoke scroll-handler on page-load
});
</script>
<!-- script ends for fedin animation on div-->


<script >
  jQuery(document).ready(function(){
        jQuery('#hideshow').on('click', function(event) {        
             jQuery('#content').toggle('show');
        });
    });
</script>


     </head>

<!-- ****************************************************************************************************************** --> 

<body style="margin: 0;background-color:#eceff1 ">







<div id="logo" >
  <div id="logo_bg">

         <div id="logo_txt" >
              <img src="logo.png" id="logo_img" >   

              <div id="logo_sub_txt" >
              <font id="logo_sub_txt_1" >Training & Placement Cell</font> <br>
              <font id="logo_sub_txt_2" >Student`s DataBase</font>
              </div>
        
              <div style="width:15%;height: 21%;float:right;margin-top: 32px;color: #ffffff;font-size:19px;">
                  <a href="#" style="text-decoration: none;color: #ffffff">Students</a>&nbsp&nbsp |&nbsp&nbsp
                  <a href="#" style="text-decoration: none;color: #ffffff" id='hideshow' value='show/hide'>Admin</a>
              </div>
        </div>

        <br>
 
  

  
   
   
    
        <br>

                                   <div id='content' style="display: none;background-color: #f8f8f8;width: 35%;margin-left:33%;height: 44%;margin-top: 7%;background-color: rgba(0,0,0,0.2);">
                                   <br>
                                   &nbspAdmin SignIn
                                   <form action="#" method="post" style="width: 100%;">
                              
                                    <input type="text" name="username" placeholder=" Username" required style="color:#333;width:60%;height: 43px;border: 2px solid #cccccc;border-radius: 2px;margin-left: 20%;margin-top: 9%;"><br>
                               
                                
                               <br>
                                
                                
                               
                             
                                    <input type="password" name="password" placeholder=" Password" required style="color:#333;width:60%;height: 43px;border: 2px solid #cccccc;border-radius: 2px;margin-left: 20%;">
                               
                                 <br><br>
                                 <button type="submit" name="login" value="Login" style="color:#333;width:60%;height: 43px;border: 2px solid #cccccc;border-radius: 4px;margin-left: 20%;">Login</button>
                               </center>      
                               </form>
                               </div>


</div>
</div>

<div class="div1 " >
    <div class="div1_sub1 " class="hideme"><br><br><font id="div1_id1">Total Students </font></div>
    <div class="div1_sub2 fade " id="piechart" ></div>
</div>
<div class="div2 ">
     <div class="div2_sub1 fade" id="curve_chart"></div>
     <div class="div2_sub2"><br><br><font id="div2_id1">Performance</font></div>
    
</div>


<br><br><br><br><br><br><br><br><br><br>
</body>
</html>


                                


<!-- control link share student form -->
<?php
include('dbcon.php');
$qry=" SELECT `s_add` FROM `control` ";
$run=mysqli_query($con,$qry);
$data=mysqli_fetch_array($run);

if($data[0]=='on'){
?>
<a href='share_add.php'>Insert Details</a>
<?php
}


?>
<!-- close control link share student form --> 



             


