<?php

session_start();  
if(!isset($_SESSION["name"]))
{
 header("location:index.php");
}

//include book.php;
include('build_calendar.php');
//include('book.php');
//include('timewindows.php');


    

?>



<html>

<head>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
       <script src="js/jquery.min.js/jquery.min.js"></script>
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <!--     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="repeater.js" type="text/javascript"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
<!-- 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

-->
        <script src="/js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/v3bootstrap.min.css" /> 
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="js/v3bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

   
    <style>
        
      .modal-body {
    max-height: calc(100vh - 310px);
    overflow-y: auto;
}    
        
        
        .btn-danger{
      opacity: 0.6;    

    }
        
        
        
        
        .btn-block
            {  
      border: none;
      color: white;
      padding: 15px 15px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;} 
        
        .btn-danger{
      opacity: 0.6;    

    }
        
        
        table#t01 th{
            
        padding-top: 12px;
        padding-bottom: 12px;
        
            
        }
        table#t01 td{
            
            position: relative;
            padding-left: 0px;
            padding-right: 0px;

            }        
        table#t01 {
            width: 100%;
            table-layout: fixed;
            }
        
        table#t02 {
            position: relative;
            display: inline;
                 padding-left: 0px;
            padding-right: 0px;
            }
        
        
        
        
        .row.content {height: 800px}
        .sidenav {
          background-color: #f1f1f1;
          height: 100%;
            }
        footer {
          background-color: #555;
          color: white;
          padding: 10px;
            }
        
        
        @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) 
        {
            .sidenav {
            height: auto;
            padding: 15px;
            }
            .row.content {height: auto;} 

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
            display: block;


            }
            .empty {
                display: none;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }



            /*
		Label the data
		*/
            td:nth-of-type(1):before {
                content: "Sunday";
            }
            td:nth-of-type(2):before {
                content: "Monday";
            }
            td:nth-of-type(3):before {
                content: "Tuesday";
            }
            td:nth-of-type(4):before {
                content: "Wednesday";
            }
            td:nth-of-type(5):before {
                content: "Thursday";
            }
            td:nth-of-type(6):before {
                content: "Friday";
            }
            td:nth-of-type(7):before {
                content: "Saturday";
            }


        }

        /* Smartphones (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }
        
        
  /*  -----------*/ 
        @media (min-width:641px) {
            table#calendar {
                table-layout: fixed;
            }
            td#calendar  {
                width: 33%;
            }
        }
        
        .row{
            margin-top: 20px;
        }
        
        .today{
            background:yellow;
        }
            
      
        
        
    </style>
    
    
    
</head>


<body>
   
<button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()">&#9776;</button>
<div class="container-fluid">

   <div class="row content">
        <div class="col-md-2 sidenav" >
            <h4>한국문화원 회의실 <br> 예약 시스템</h4>
                <div class="well">
                    <h15 align="center">Welcome -  <?php echo $_SESSION["name"]; ?>
                        <br>
                    <?php echo $_SESSION["email"]; ?>
                        <br>
                        <?php
                        
                        if($_SESSION["master"]=="y"){ echo "Master User";}else{ echo "Normal User";}?>
                    
                    <p align="right"><a href="logout.php">Logout</a></p></h15>
                </div>
                   
                   <?php if($_SESSION["master"]=="y"){ ?>
                    <ul class="nav nav-tabs" >
                    <li class="active"><a data-toggle="tab" href="#calendarbooking">Booking system</a></li>
                         <li ><a data-toggle="tab" href="#section1">Approval Status</a></li>
                    <li><a data-toggle="tab" href="#manageroom">Manage Room</a></li>
                    <li><a data-toggle="tab" href="#manageuser">Manage User</a></li>
                    <li><a data-toggle="tab" href="#manageholiday">Manage holiday</a></li>
                    <li><a data-toggle="tab" href="#section2">Report</a></li>
                    </ul><br>
                    <?php }else{ ?>
                    <ul class="nav nav-tabs" >
                    <li class="active"><a data-toggle="tab" href="#calendarbooking">Booking system</a></li>
                    <li><a data-toggle="tab" href="#section2">Report</a></li>    
                    </ul><br>
                    <?php } ?>




                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Blog..">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>


                </div>
        </div>

        <div class="tab-content">
                <div id="calendarbooking" class="tab-pane fade in active">
                    <div class="col-md-9">
                    <?php echo isset($msg)?$msg:"";?>

                    </div>
                    <div class = "col-md-9">
                    <?php
                     $dateComponents = getdate();
                     if(isset($_GET['month']) && isset($_GET['year'])){
                         $month = $_GET['month']; 			     
                         $year = $_GET['year'];
                     }elseif(isset($_GET['date']))
                     {
                         //echo date('m', strtotime($_GET['date']));
                         //echo date('Y', strtotime($_GET['date']));
                             //echo '<script>','alert ($_GET["date"]','</script>';
                         //echo '<script>openRightMenu();</script>';
                         $month = date('m', strtotime($_GET['date']));			     
                         $year = date('Y', strtotime($_GET['date']));
                         //define ('sidate', $_GET['date']);
                         //echo '<script>','$("#myModal").modal("show")';'</script>';
                         ?>
                         <?php
                     }
                     else{
                         $month = $dateComponents['mon']; 			     
                         $year = $dateComponents['year'];
                     }
                        
                    echo build_calendar($month,$year);
                        ?>
                    </div>
                    
                         
                    </div>


               
                <div id="section2" class="tab-pane fade">
                    <div class = "col-md-10">
                   
                        
                        
                        <h3 align="center">Report</h3>
                        <br />
                        <div class="panel panel-default">
                        <div class="panel-heading">Booking data</div>
                        <div class="panel-body">
                        <div class="table-responsive">
                        <table id="sample_data" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>1. ID</th>
                        <th>2. Room </th>
                        <th>3. submitted Date</th>
                        <th>4. Date</th>                        
                        <th>5. Time slot</th>
                        <th>6. Submiter</th>
                        <th>7. Attendee</th>
                        <th>8. Sector</th>
                        <th>9. Purpose</th>
                        <th>10. remark</th>
                        <th>11. Status</th>

                            
                        </tr>
                        </thead>
                        <tbody></tbody>
                        </table>
                        </div>
                        </div>
                       
                        
                        
                        
                        </div>
                        
                    </div>
                </div>

            
               
                <div id="section1" class="tab-pane fade">
                    <div class = "col-md-10">
                   
                        
                        
                        <h3 align="center">Approval</h3>
                        <br />
                        <form method="post" id="update_form">
                        <div align="left">
                            <div class = "col-md-4">
                            <select class="form-control summaryname" required name="All" id="summaryname">
                            <option selected value="all">All</option>
                                </select></div><div class = "col-md-4">
                            <button type="button" name="approval" id="approval" class="btn btn-info approval" value="approval">Approval</button> 
                            <button type="submit" name="refusal" id="refusal" class="btn btn-warning refusal" value="refusal">Refusal</button>
                            </div>
                            
                            </div>    
                        <br /> 
                            
                        
                     <br /> 
                       <!--     
                        <div class="table-responsive">
                           <table id="sample_data3" class="table table-bordered table-striped">
                            <thead>

                            <th><input type="checkbox" id="checkall" name="checktall" value="checktall" onClick="toggle(this)" class="check_box"/></th>
                            <th> Reserved subject </th>
                            </thead>
                             <tbody id="summarytable"></tbody>
                            </table></div>    
               -->
                        <div class="table-responsive">
                       <table id="sample_data2" class="table table-bordered table-striped">
                        <thead>
                       
                        <th><input type="checkbox" id="checkall" name="checkall" value="checkall" onClick="toggle(this)" class="check_box"/></th>
                        <th>2. Room </th>
                        <th>3. submitted Date</th>
                        <th>4. Date</th>                        
                        <th>5. Time slot</th>
                        <th>6. Submiter</th>
                        <th>7. Attendee</th>
                        <th>8. Sector</th>
                        <th>9. Purpose</th>
                        <th>10. remark</th>
                        <th>11. Status</th>

                            
                        
                        </thead>
                        <tbody id="approvaltable"></tbody>
                            </table></div>

                        </form>
                    </div>
                </div>

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

                <div id="manageroom" class="tab-pane fade">
                    <div class = "col-md-10">
                    <h1 align="center">Meetingroom management</h1>
                    <div  id="grid_table"></div>
                    </div>
                </div>
                
   
                <div id="manageuser" class="tab-pane fade">
                    <div class = "col-md-10">
                    <h1 align="center">User Management</h1>
                    <div  id="grid_table2"></div>
                    </div>
                </div>
                
                 <div id="manageholiday" class="tab-pane fade">
                    <div class = "col-md-10">
                    <h1 align="center">Holiday Management</h1>
                        
                    <form id="upload_csv" method="post" enctype="multipart/form-data">
                    <div class="col-md-3">
                    <br />
                    <label>Select CSV File</label>
                    </div>  
                    <div class="col-md-4">  
                    <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
                    </div>  
                    <div class="col-md-5">  
                    <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
                    </div>  
                    <div style="clear:both"></div>
                    </form>
                     <div id="csv_file_data"></div>
       
                        
                    <div id="grid_table3"></div>
                    </div>
                </div>
                
                
               
                
       </div>      
                
                
                
                
                
                
                
              
 
    </div>
    </div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="padding:10px 10px;" >
            <div class="col-md-5"></div>
               <div class="col-md-5" id = "modal-header"></div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
              
        </div>
      
        
        <div class="modal-body" >
          <p id="serverResponse">Reading the data</p>
        
                        </div>
          
          <div class="modal-footer" style="padding: 10px 10px;">
              <div class="col-md-4">
              <table id="t02" > 
                  <tr>
                  <td><button type="button" class ="btn btn-danger ">Booked</button>
                      </td>
                  <td><button type="button" class ="btn btn-warning ">Not approved</button>                  <td>
                      <button type="button" class ="btn btn-success ">Available</button>  
                      </td>
                  <td>
                      <button class ="btn"><font color="black">N/A</font> 
                        </button> 
                      </td>
                  
                  </tr>
              
              
              </table></div>
          </div>
          
                        </div>
        </div>
    
    </div>   
    
    
 <!-- pop-up -->   
   
    <div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking :<span id="slot"></span> </h4>
        <span id="error"></span>
      </div>
      <div class="modal-body">
        <div class="row">
                 <div class="col-md-12">
                <form id="repeater_form" action="" method="post">
                <div class="col-md-6">
                 
                    
                <div class="form-group">
                    <label for="">Submiter</label>
                    <input required type="text" readonly name="userid" class="form-control" value="<?php echo $_SESSION["name"]; ?>">

                </div>
                    
                <div class="form-group">
                <label for="">Attendee</label>
                <input required type="text" name="attendee" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Remark</label>
                <input required type="text" name="remark" class="form-control">
                </div>
                    
                    
                    
                    </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="">Room</label>
                    <input required type="text" readonly name="room" id="room" class="form-control">
                    

                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control internal" required name="internal" id="internal">
                                   <option selected value="none">Select</option>
                                    <option value="in">Internal</option>
                                    <option value="out">External</option>
                                                </select>
                    
                </div>
                    
                <div id="purpose" class="form-group">
                <label for="">Purpose</label>
                <input required type="text" name="purpose" class="form-control" value="meeting">

                </div>

                    
                    
                    
                    
                    
                      </div> 
                    <div class="col-md-12">
                    <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                      <div class="row">
                                        
                                          <div class="col-md-12">  <label for="">Date</label></div>
                                           <div class="col-md-12">
                                           <div class="col-md-5"><label for="">From:</label></div>
                                           <div class="col-md-5"> <label size="1">To: multiple</label> <input type="checkbox" id="datemulitiple" name="datemulitiple" class=" datemulitiple">
                                               
                                       </div>
                                           <div class="col-md-2"><label for="">Day</label>
                                                                                       
                                           </div>
                                           <div id ="sdate" class="form-group">
                                       
                                              
                                              
                                             <div class="col-md-5">  
                                                 <input required type="date" name="selecteddate" id="selecteddate" class="form-control">    </div>
                                               <div class="col-md-5"> 
                                               <input type="date" name="selecteddate2" id="selecteddate2" class="form-control">  
                                                   
                                               </div>
                                                <div class="col-md-2">
                                                       <select class="form-control" name="days" id="days">
                                                               <option value="10" selected>Select</option>
                                                    <option value="10" >Everyday</option>
                                                    <option value="1">Monday</option>
                                                    <option value="2">Tuesday</option>
                                                    <option value="3">Wednesday</option>
                                                    <option value="4">Thursday</option>       
                                                    <option value="5">Friday</option>
                                                           
                                                           
                                                           
                                                           
                                                    </select>
                                               </div>
                                                   
                                                </div></div>
                                          

                                           
                                           
                                           
                                           
                                          <div class="row"><div class="col-md-12"> </div></div>
                                          <div class="col-md-12"> <Br></Br>  <label >Timeslot Start</label>
                                                
                                           </div>
                                           <div id="items" class="col-md-6"> <select class="form-control" readonly name="timeslot">
                                                           <option id="timeslot" selected>Audi</option>
                                                </select>
                                                <select class="form-control" readonly name="etimeslot">
                                                           <option id="etimeslot" selected>Audi</option>
                                                </select>
                                                
                                                </div><!--<div class="col-md-3">
                                                <button type="button" id="edit-btn" class="btn btn-primary edit-btn">Edit timeslot</button>
                                           </div>-->
                                            <div id="edit" class="col-md-12"> </div>    
                                                
                                              <div id="added" class="col-md-12"> </div>    
                                                
                                                
                                                
                                                
                                           
                                           
                                           
                                           
                                          </div>
                                          </div>
                                    </div>
                        </div></div>
                            
                    
              
                    

                 
                <!--
                      <div id="repeater" class="col-md-12">
                                <div class="repeater-heading" align="right">
                                    <button id="fapply" type="button" class="btn btn-primary repeater-add-btn">AApply</button>
                                </div>
                                <label id="addtimelabel">Timeslot Start</label>
                        <div id="creater" class="col-md-12">        
                       <div class="clearfix"></div>
                               <div id="creater" class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                      <div id="ads" class="col-md-12" >
                                      
                                          
                                          </div>
                                    </div>
                                </div>
                            </div>
                               <div class="clearfix"></div>
                      
                          </div>
        
           
                                
                      </div>-->
                    
                 
                 
                    <div class="col-md-12">      
                   <div class="form-group pull-right">
                       <button class="btn btn-primary" id="submit" type="submit" name="submit">Submit</button>                        
                    </div></div>
                    
                </form>
                
            </div>
                </div>
  
      
    </div>
    </div>
</div>
 </div>
    
  <script>
    $(document).ready(function(){
        
       $('.testtooltip').tooltip({
          sanitize: false
        });
        
 
  
        
        
        //$('[data-toggle="tooltip"]').tooltip(){sanitize: false};
        //document.getElementById("apply-btn").style.display = 'none';
        //document.getElementById("sdate").style.display = 'none';
        document.getElementById("items").style.display = 'none';
        //document.getElementById("addtimelabel").style.display = 'none';
        //document.getElementById("fapply").style.display = 'none';
        document.getElementById("purpose").style.display = 'none';
        document.getElementById("selecteddate2").disabled= true;
        document.getElementById("days").disabled= true;
        var count = 0;

        //$("#repeater").createRepeater();
        
        
    
        
        $(document).on('click', '.datemulitiple', function(){
         if(this.checked)
        { 
        document.getElementById("selecteddate2").disabled= false;
            document.getElementById("days").disabled= false;
        }else{document.getElementById("selecteddate2").disabled= true;
             document.getElementById("days").disabled= true;
             }
    
        //var sub_category_id = $(this).data('sub_category_id');
            
        });
        
           $(document).on('change', '.internal', function(){
        var selectedpurpose = $(this).val();
        if(selectedpurpose !=="none"){
        document.getElementById("purpose").style.display = 'block';    
        }else{document.getElementById("purpose").style.display = 'none';    }
    
        //var sub_category_id = $(this).data('sub_category_id');
            
        }); 
        
        
        
        $(document).on('change', '.item_edit', function(){
        var selectedtime = $(this).val();
        //var sub_category_id = $(this).data('sub_category_id');
            var date = document.getElementById("selecteddate").value;
        var room = document.getElementById("room").value;
        $.ajax({
          url:"fill_sub.php",
          method:"POST",
          data:{selectedtime:selectedtime,date : date, room : room},
          success:function(data)
          {
            var html = '<option value="">Select Sub Category</option>';
            html += data;
            $('.item_sub_category').html(html);
          }
        })
      });
        
 
        
        $(document).on('click', '.repeater-add-btn', function(){
            document.getElementById("submit").style.display = 'block';
            //document.getElementById("addtimelabel").style.display = 'block';
            //document.getElementById("ads").style.display = 'block';
        count = count + 1;
        var date = document.getElementById("selecteddate").value;
        var edate = document.getElementById("selecteddate2").value;
        var days = document.getElementById("days").value;    
        var room = document.getElementById("room").value;
        var stime = document.getElementById("item_edit").value;
        var etime = document.getElementById("item_sub_category").value;
        var html = '';           
            console.log(stime);
             console.log(etime);
              $.ajax({
              url:"fill_differ_category.php",
              method:"POST",
              data: {date : date, edate : edate, days : days, room : room, stime : stime, etime : etime},
              success:function(data)
              {
               html += data;   
                $('#added').append(html);  
              
              }
        
     /* $(document).on('click', '.edit-btn', function(){
        //document.getElementById("addtimelabel").style.display = 'block';
        document.getElementById("items").style.display = 'none';
         document.getElementById("edit-btn").style.display = 'none';
         //document.getElementById("apply-btn").style.display = 'none';
         document.getElementById("submit").style.display = 'none';
        // document.getElementById("fapply").style.display = 'none';
        //count = count + 1;
        var date = document.getElementById("selecteddate").value;
        var room = document.getElementById("room").value;
         var tslot = document.getElementById("timeslot").value;
        //    console.log(date);
        //     console.log(room);
        var html = '';
        
            
          $.ajax({
              url:"fill_sub_category.php",
              method:"POST",
              data: {date : date, room : room, tslot : tslot },
              success:function(data)
              {                            
                  
             html += data;   
                            
             
              $('#edit').append(html);

                      
              }
            });
         
      });*/
        
      //  html += '<span><div class="col-md-4">From :<select name="item_category[]" class="form-control item_category" data-sub_category_id="'+count+'">';
            
        //  $.ajax({
        //      url:"fill_sub_category.php",
        //      method:"POST",
         //     data: {date : date, room : room },
         //     success:function(data)
         //     {            
                  
                  
        //      html += '<option value="">Select Category</option>'+data;   
        //    html +='</select></div><div class="col-md-4"> To : <select name="item_category[]" class="form-control item_category" data-sub_category_id="'+count+'"><option value="">Select Category</option>'+data+'</select></div><div class="col-md-4" align="center"><button id="remove-btn" class="btn btn-danger remove">Remove</button></div></span>';                    
              
              

                      
           //   }
              
              
              
            });    
          
           
      });
        
       $(document).on('click', '.remove-btn', function(){
          console.log("delete"); 
        $(this).closest('span').remove()
      });  
        
        $('#myModal3').on('hidden.bs.modal', function () {
            console.log("hi");
            //$(this).closest('tr').remove();
         $('.items').slice(1).empty();
            location.reload();
             //$('.adding').slice(1).empty();
            //$("#creater").click();
            //$(.item).remove();
         });
       
        
        
        /*$(document).on('load', '.repeater-add-btn', function(){
            //var category_id = $(this).val();
            var date = document.getElementById("selecteddate").value;
             var room = document.getElementById("room").value;
             console.log(date);
             console.log(room);
    
             
             var self= $(this);
             console.log(self);
             $.ajax({
              url:"fill_sub_category.php",
              method:"POST",
              data: {date : date, room : room },
              success:function(data)
              {
                
                var html = data;
                    //'<option value="">Select Sub Category</option>';
                //html += data;
                  //console.log(html);
                  $(self).html(html);
                 //console.log($(this).closest('select'));
               //$(this).closest('span').html(html);
              }
            })
          });
        /*
          $('#repeater_form').on('close', function(event){
            alert("gg");
                    $('#repeater_form').reset();
                    $("#repeater").createRepeater();

           
        });*/
        
        
         $('#repeater_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"insert.php",
                method:"POST",
                data:$(this).serialize(),
                success:function(data)
                {
                    if(data == 'ok'){
                       $('#ads').find('tr:gt(0)').remove();
                         $("#submit").attr("disabled", true);
                        $('#error').html('<div class="alert alert-success">Booking Successfull </div>');
                        setInterval(function(){
                        location.reload();
                    }, 3000);
                    //$('#repeater_form')[0].reset();
                    //$("#repeater").createRepeater();
                    //$('#success_result').html(data);
                    /*setInterval(function(){
                        location.reload();
                    }, 3000);*/
                    }
                }
            });
        });
        
        

  
        

    });
        
    </script>
    
    
    
     
  <script type="text/javascript">
      
      $(function () {
               $(".purposetooltip").tooltip({
          sanitize: false
        });
    });
    
      
      const xhr = new XMLHttpRequest();
      function refreshmodal(a) {
          //location.reload();
           openRightMenu(a);
          //openRightMenu(a);
           //$("#myModal").on('hidden.bs.modal', function(){
   // alert('The modal is now hidden.');
              // openRightMenu(a);
  
          
      };
      
      
      $("#myModal").on("shown.bs.modal",function(){
   $(this).hide().show(); 
});
      
      
      function openRightMenu(a) {
             console.log(a);
          $('.testtooltip').tooltip("hide");
          //$("#myModal").modal("hide");
       
    
            var sdate = new Date(a*1000);
            
            var ndate = new Date();
             ndate.setTime(sdate.getTime() +86400000);
         
            var pdate = new Date();
             pdate.setTime(sdate.getTime() -86400000);
          
          console.log("sdate:"+sdate);
          console.log("ndate:"+ndate);
          console.log("pdate:"+pdate);
            var MyDateString;
            var day = sdate.getDate();
            var month_index = sdate.getMonth()+1;
            var year = sdate.getFullYear();
            MyDateString = year+'-'+('0' + month_index).slice(-2) + '-'
             + ('0' + day).slice(-2);
            //alert(MyDateString);
            //location.href ="main.php?date="+MyDateString;
          //var html = '';
          //html + = MyDateString;       
               console.log("Mydate:"+MyDateString);
          
          
           $('#modal-header').html("<a class='btn btn-xs btn-primary' onclick='openRightMenu("+(pdate/1000)+")'> < </a>");
          
          $('#modal-header').append(" "+MyDateString+" ");
          $('#modal-header').append("<a class='btn btn-xs btn-primary' onclick='openRightMenu("+(ndate/1000)+")'> > </a>");
          
         
            xhr.onload=function(){
                const serverResponse = document.getElementById("serverResponse");
                serverResponse.innerHTML =this.responseText;
                
            };
          xhr.open("POST","timewindows.php");
          xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          xhr.send("name="+MyDateString);          
          console.log(MyDateString);
           
          $("#myModal").modal("show"); 
          //$("#myModal").val(null).trigger("change");
            
        }
          

        function closeRightMenu() {
          document.getElementById("rightMenu").style.display = "none";
        }
      
      </script>
    <script>
        var count =0;
        var timeslot;
        var pcd;
        var rname;
        function clicktimewindows(tl,rn,cd) {
       
        count=count+1;
        
        if(count =="1")
        {
            timeslot = tl;     
            rname=rn;
            pcd=cd;  
        }
        else{            
        var etimeslot=tl;
        if(rname!==rn){
         alert("Room selected wrong");
        count=0;
        return;
        }
        if(timeslot==etimeslot){
            
            $("#timeslot").val(timeslot.trim());
        }
            
            var res = timeslot.substr(0, 8);
            var eres = etimeslot.substr(8,7);
            $("#slot").html(res+eres);
            $("#tabledate").html(pcd);
            $("#tabletimeslot").html(timeslot);           
            $("#selecteddate").val(pcd.trim());
            $("#selecteddate2").val(pcd.trim());
            
            
            document.getElementById("timeslot").text =timeslot.trim();
            document.getElementById("etimeslot").text =etimeslot.trim();
            
            
                
        var date = pcd;
        var room = rname;
         var tslot = timeslot;
            var eslot = etimeslot;
        //    console.log(date);
        //     console.log(room);
        var html = '';
        
            
          $.ajax({
              url:"default_fill_sub_category.php",
              method:"POST",
              data: {date : date, room : room, tslot : tslot, eslot : eslot },
              success:function(data)
              {                            
                  
             html += data;   
                            
             
              $('#edit').append(html);

                      
              }
            });
         
      
            
            
            
            //$("#timeslot").val(timeslot.trim());
            //$("#etimeslot").val(etimeslot.trim());
            $("#room").val(rname.trim());
           
            $("#myModal3").modal("show");
            $("#myModal").modal("hide");
            
             count=count+1;
           
           }}
       
     
    </script>
<script type="text/javascript" language="javascript" >
    
$(document).ready(function(){

 var dataTable = $('#sample_data').DataTable({
  "processing" : true,
  "serverSide" : true, 
 "aaSorting": [[0, 'asc']],
  "order" : [],
  "ajax" : {
   url:"fetch_report.php",
   type:"POST"  
  }
     
 });

 $('#sample_data').on('draw.dt', function(){
     
  <?php if($_SESSION["master"]=="y"){ ?>
     
  $('#sample_data').Tabledit({
   url:'action_report.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id'],
    editable:[[1, 'room'], [2, 'sdate'], [3, 'date'],[4, 'timeslot'],[5, 'submiter'],[6, 'attendee'],[7, 'sector', '{"in":"In","out":"Out"}'],
             [8, 'purpose'],[9, 'remark'],[10, 'status','{"y":"Approved(y)","n":"Pending(n)"}']
             ]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     
    }
       $('#sample_data').DataTable().ajax.reload();
       fetch_data();
   }
  });
     
     <?php }else{} ?>
     
 });
    
    
// Approval 
    
    
  
     function fetch_data()    
    {
        console.log("reloaded");
        
         $.ajax({
            url:"selectsummary.php",
            method:"POST",            
            success:function(data)
            {
                var html = '';
                 html += data;                           
             
            $('#summaryname').html('<option selected value="all">All</option>');
              $('#summaryname').append(html);
               
            }
        });
        
        var groupname= document.getElementById("summaryname").value;
         console.log(groupname);
        $.ajax({
            url:"select.php",
            method:"POST",
            data:{groupname:groupname},
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><input type="checkbox" id="'+data[count].reservid+'" name="hidden_id[]" value="'+data[count].reservid+'" class="check_box"/></td>';
                    html += '<td>'+data[count].rrname+'</td>';
                    html += '<td>'+data[count].sdate+'</td>';
                    
                    html += '<td>'+data[count].date+'</td>';
                    html += '<td>'+data[count].timeslot+'</td>';
                    html += '<td>'+data[count].userid+'</td>';
                    html += '<td>'+data[count].attendee_user+'</td>';
                    html += '<td>'+data[count].purposecate+'</td>';
                    html += '<td>'+data[count].purpose+'</td>';
                    html += '<td>'+data[count].remark+'</td>';
                    html += '<td>'+data[count].status+'</td></tr>';
                }
                console.log(html);    
                $('#approvaltable').html(html);
            }
            
        });
    }
    
    
    

    fetch_data();
    
   
        $('#checkall').click(function(event) {   
        if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
        } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
        }
        });

    
    
        
        $(document).on('click', '.summaryname', function(){
       fetch_data();
      });
    
    
    
    
     $(document).on('click', '.approval', function(){
                
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {        
            
             if(confirm("Are you sure you want to approve this?")){
                var id = [];
                $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
                 console.log(id[i]);    
               });


                $.ajax({
                    url:"multiple_update.php",
                    method:"POST",
                    data:{id:id},
                    success:function()
                    {
                        alert('Data Updated');
                                         
                        $('#sample_data').DataTable().ajax.reload();
                        $('#approvaltable').html("");
                        fetch_data();
                        $('#checkall').each(function() {
                            this.checked = false;                        
                        });
                       // $('#approvaltable').refresh();
                    }
                })
            }else{return false;}
        
        }
        else{
            alert("Please Select atleast one checkbox");
        }
        
         
    });
    
    
     $(document).on('click', '.refusal', function(){
                
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {        
            
             if(confirm("Are you sure you want to refusal this?")){
                var id = [];
                $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
                 console.log(id[i]);    
               });


                $.ajax({
                    url:"multiple_refusal.php",
                    method:"POST",
                    data:{id:id},
                    success:function()
                    {
                        alert('Data Updated');
                                         
                        $('#sample_data').DataTable().ajax.reload();
                        $('#approvaltable').html("");
                        fetch_data();
                        $('#checkall').each(function() {
                            this.checked = false;                        
                        });
                       // $('#approvaltable').refresh();
                    }
                })
            }else{return false;}
        
        }
        else{
            alert("Please Select atleast one checkbox");
        }
        
         
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}); 
    
    // import
            $(document).ready(function(){
            $('#upload_csv').on('submit', function(event){
            event.preventDefault();
            $.ajax({
            url:"fetch.php",
            method:"POST",
            data:new FormData(this),
            dataType:'json',
            contentType:false,
            cache:false,
            processData:false,
            success:function(data)
            {
            var html = '<table class="table table-striped table-bordered">';
            if(data.column)
            {
            html += '<tr>';
            for(var count = 0; count < data.column.length; count++)
            {
            html += '<th>'+data.column[count]+'</th>';
            }
            html += '</tr>';
            }

            if(data.row_data)
            {
            for(var count = 0; count < data.row_data.length; count++)
            {
            html += '<tr>';
            html += '<td class="student_date" contenteditable>'+data.row_data[count].student_date+'</td>';
            html += '<td class="student_name" contenteditable>'+data.row_data[count].student_name+'</td><td class="student_valid" contenteditable>'+data.row_data[count].student_valid+'</td>           </tr>';
            }
            }
            html += '<table>';
            html += '<div align="center"><button type="button" id="import_data" class="btn btn-success">Import</button></div>';

            $('#csv_file_data').html(html);
            $('#upload_csv')[0].reset();
            }
            })
            });

            $(document).on('click', '#import_data', function(){
            var student_date = [];
            var student_name = [];
            var student_valid = [];

            $('.student_date').each(function(){
            student_date.push($(this).text());
            });
            $('.student_name').each(function(){
            student_name.push($(this).text());
            });
            $('.student_valid').each(function(){
            student_valid.push($(this).text());
            });
                
            $.ajax({
            url:"import.php",
            method:"post",
            data:{student_date:student_date, student_name:student_name, student_valid:student_valid},
            success:function(data)
            {
            $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
            }
            })
            });
            });
    
    
    
     
    
    
</script>  
      
      
      
      
      
      
      

              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>

              <script>

                $('#grid_table').jsGrid({

                 width: "100%",
                 //height: "100%",

                 filtering: true,
                 inserting:true,
                 editing: true,
                 sorting: true,
                 paging: true,
                 autoload: true,
                 pageSize: 10,
                 pageButtonCount: 5,
                 deleteConfirm: "Do you really want to delete data?",

                 controller: {
                  loadData: function(filter){
                   return $.ajax({
                    type: "GET",
                    url: "fetch_data.php",
                    data: filter
                   });
                  },
                  insertItem: function(item){
                   return $.ajax({
                    type: "POST",
                    url: "fetch_data.php",
                    data:item
                   });
                  },
                  updateItem: function(item){
                   return $.ajax({
                    type: "PUT",
                    url: "fetch_data.php",
                    data: item
                   });
                  },
                  deleteItem: function(item){
                   return $.ajax({
                    type: "DELETE",
                    url: "fetch_data.php",
                    data: item
                   });
                  },
                 },

                 fields: [
                  {
                    name: "id",
                    type: "hidden",
                    css: 'hide'
                  },
                  {
                    name: "Room_name", 
                    align: "center",
                    type: "text", 
                    width: 100, 
                    validate: "required"
                  },
                  {
                    name: "location", 
                    align: "center",
                    type: "text", 
                    width: 100, 
                    validate: "required"
                  },
                  {
                    name: "capacity", 
                    align: "center",
                    type: "text", 
                    width: 50, 
                    validate: function(value)
                    {
                     if(value > 0)
                         {
                          return true;
                         }
                    }
                  },
                  {
                    name: "valid", 
                    type: "select", 
                    items: [
                        { Name: "", Id: '' },
                        { Name: "y", Id: 'y' },
                        { Name: "n", Id: 'N' }
                    ], 
                    valueField: "Id", 
                    textField: "Name", 
                    validate: "required"
                  },
                  {
                   type: "control"
                  }
                 ]

                });
                  
                  // User Management
                $('#grid_table2').jsGrid({

                 width: "100%",
                // height: "100%",

                 filtering: true,
                 inserting:true,
                 editing: true,
                 sorting: true,
                 paging: true,
                 autoload: true,
                 pageSize: 10,
                 pageButtonCount: 5,
                 deleteConfirm: "Do you really want to delete data?",

                 controller: {
                  loadData: function(filter){
                   return $.ajax({
                    type: "GET",
                    url: "fetch_user.php",
                    data: filter
                   });
                  },
                  insertItem: function(item){
                   return $.ajax({
                    type: "POST",
                    url: "fetch_user.php",
                    data:item
                   });
                  },
                  updateItem: function(item){
                   return $.ajax({
                    type: "PUT",
                    url: "fetch_user.php",
                    data: item
                   });
                  },
                  deleteItem: function(item){
                   return $.ajax({
                    type: "DELETE",
                    url: "fetch_user.php",
                    data: item
                   });
                  },
                 },

                 fields: [
                  {
                    name: "id",
                    type: "hidden",
                    css: 'hide'
                  },
                  {
                    name: "name", 
                    align: "center",
                    type: "text", 
                    width: 50, 
                    validate: "required"
                  },
                  {
                    name: "email", 
                    align: "center",
                    type: "text", 
                    width: 50, 
                    validate: "required"
                  },
                  {
                    name: "master", 
                    align: "center",
                    type: "text", 
                    width: 10, 
                    validate: "required"
                  },
                     {
                    name: "password", 
                    align: "center",
                    type: "text", 
                    width: 100, 
                    validate: "required"
                  },
                  {
                   type: "control"
                  }
                 ]

                });  
                  
                  
                  // Holiday Management
                  
                    $('#grid_table3').jsGrid({

                 width: "100%",
                 //height: "200%",

                 filtering: true,
                 inserting:true,
                 editing: true,
                 sorting: true,
                 paging: true,
                 autoload: true,
                 pageSize: 10,
                 pageButtonCount: 5,
                 deleteConfirm: "Do you really want to delete data?",

                 controller: {
                  loadData: function(filter){
                   return $.ajax({
                    type: "GET",
                    url: "fetch_holiday.php",
                    data: filter
                   });
                  },
                  insertItem: function(item){
                   return $.ajax({
                    type: "POST",
                    url: "fetch_holiday.php",
                    data:item
                   });
                  },
                  updateItem: function(item){
                   return $.ajax({
                    type: "PUT",
                    url: "fetch_holiday.php",
                    data: item
                   });
                  },
                  deleteItem: function(item){
                   return $.ajax({
                    type: "DELETE",
                    url: "fetch_holiday.php",
                    data: item
                   });
                  },
                 },

                 fields: [
                  {
                    name: "id",
                    type: "hidden",
                    css: 'hide'
                  },
                  {
                    name: "date", 
                    align: "center",
                    type: "text", 
                    width: 50, 
                    validate: "required"
                  },
                  {
                    name: "name", 
                    align: "center",
                    type: "text", 
                    width: 50, 
                    validate: "required"
                  },
                  {
                    name: "valid", 
                    align: "center",
                    type: "text", 
                    width: 10, 
                    validate: "required"
                  },
                  {
                   type: "control"
                  }
                 ]

                });  

</script>            
 
    
  
    
    
    
</body>

</html>
