<?php 

include('book.php');



?>

<div style="overflow-x:auto;">
    <table id="t01" class="table table-bordered"> 
                       <h4>
                        <?php
                        foreach($_POST as $post_var){

                        //echo strtoupper($post_var)."<br />";
                        }

                        $date = $_POST['name'];                                               
                        $rooms = rname_patch($date);
                        
                        ?> 
                          </h4>        
                        <tr>
                        <?php for($i=8;$i<=19;$i++) { 
                            
                            
                            ?>
                            <!-- Change 30 min -->
                        <th colspan="2"><center><?php
                         if($i==8){echo "Time";}
                         else{
                             echo $i;
                         }

                                                   
                            
                            ?></center> </th>    
                            
                        <?php  } ?>
                        </tr>
                        <?php foreach($rooms as $rs){?>
                        <tr>
                       <!-- Change 30 min -->
                            <td colspan="2">
                         <?php echo $rs; ?></td>

                        <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                        $timeslotbyroom = timeslotbyroom($rs,$date);
                        
                            $count=0;
                            

                        foreach($timeslots as $ts){
                            $count++;                            
                            
                        ?>
                        

                        <?php if(in_array($ts,$timeslotbyroom)){ 
                            
                            $purpose = purposebyroom($rs,$date,$ts);
                            $valid = validcheck($rs,$date,$ts);
                            
                            ?>
                        <td>
                            
                            <?php if(implode('',$valid)=="y"){ ?>

                            <button type="button" class ="btn btn-danger btn-block purposetooltip" data-toggle="tooltip" data-html="true" data-container="body" data-placement="top" title="<?php echo implode('',$purpose); ?>"> </button>

                            
                             <?php } elseif(implode('',$valid)=="n"){ ?>
                            
                            <button type="button" class ="btn btn-warning btn-block purposetooltip" data-toggle="tooltip" data-html="true" data-container="body" data-placement="top" title="<?php echo implode('',$purpose); ?>"> </button>

                        <?php } elseif(implode('',$valid)=="r"){ ?>
                            
                            <button class ="btn btn-success btn-block" style="border:none;" data-timeslot="
                        <?php echo $ts; ?> " rname="<?php echo $rs; ?>" onclick="clicktimewindows(
                        '<?php echo $ts; ?>','<?php echo $rs; ?>','<?php echo $date; ?>')"> <?php //echo $ts; ?>
                        </button>
                        <?php } ?>
                        
                        </td> 
                        
                         
                         <?php  } else{ if($date<date('Y-m-d')){ ?>
                            
                        <td><button class ="btn btn-block"> 
                        </button></td>
                        
                        <?php }else{ ?>
                                                        
                        <td><button class ="btn btn-success btn-block" style="border:none;" data-timeslot="
                        <?php echo $ts; ?> " rname="<?php echo $rs; ?>" onclick="clicktimewindows(
                        '<?php echo $ts; ?>','<?php echo $rs; ?>','<?php echo $date; ?>')"> <?php //echo $ts; ?>
                        </button></td>
    
                                
                                
                            <?php    }} ?>
                         <?php if($count==22){ ?>
                        </tr><tr>                   

                        <?php $count=0;}
                            

                        } ?></tr>


                        <?php } 
                        ?>
                          
                       
    </table></div>

<script>
   function clicktimewindows() {}
        //alert("반응");
</script>
           
            


  
    


