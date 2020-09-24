             <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Timeslot Start</label> <button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button>
                        <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                       
                    </div>
                         </div>
                         
                         
                         
                         
                         
 <select class="form-control" readonly name="timeslot" id="timeslot" data-skip-name="true" data-name="skill[]" required>
                                                                          
                                                </select>      
                         
                         
                         
                         
                         <div class="col-md-12">
                  <form method="post" id="insert_form">
                    <div class="table-repsonsive">
                      <span id="error"></span>
                      <table class="table table-bordered" id="item_table">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Timeslot</th>                                                        
                          </tr>
                        </thead>
                        <tbody>
                                <tr>
                                <td><span id="tabledate"></span></td>
                                <td><span id="tabletimeslot"></span></td>
                                </tr>

                            
                        </tbody>
                      </table>
                      <div align="center">
                        <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                      </div>
                    </div>
                  </form>
               
                
 
                    </div>
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                        
                        
                  style      
                        
                        
                        
              <script>

                $('#grid_table').jsGrid({

                 width: "100%",
                 height: "300px",

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

</script>            
        
        
           html += '<tr>';
        html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
        html += '<td><select name="item_category[]" class="form-control item_category" data-sub_category_id="'+count+'"><option value="">Select Category</option><?php echo fill_select_box($connect, "0"); ?></select></td>';
        html += '<td><select name="item_sub_category[]" class="form-control item_sub_category" id="item_sub_category'+count+'"><option value="">Select Sub Category</option></select></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';  
  
  
  
   <?php                                                      
                                                        $timeslots = timeslots($duration, $cleanup, $start, $end);
                                                        $timeslotbyroom = timeslotbyroom($_POST["room"],$_POST["date"]);
                                                        foreach($timeslots as $row)
                                                         {
                                                          
                                                          
                                                           if(in_array($ts,$timeslotbyroom)){} else{ ?>
                                                           
                                                          <option value=""><?php echo $row; ?></option>
                                                         <?php }} 
                                                    ?>






 <div id="creater" class="col-md-12">        
                       <div class="clearfix"></div>
                               <div id="creater" class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                      <div class="row">
                                       <div class="col-md-9">
                                                <label>Timeslot Start</label>
                                                <select class="form-control item_category" name="item_category[]" data-skip-name="true" data-name="skill[]" required>
                                                  

                                                   
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-3" style="margin-top:24px;" align="center">
                                                <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                               <div class="clearfix"></div>
                      
                          </div>



<table class="table table-bordered" id="item_table">
                        <thead>
                        <tr>
                        <th>Enter Item Name</th>
                        <th>Category</th>
                     
                        <th><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
                        </tr>
                        </thead>
                        <tbody class="adding" id="tadd"></tbody>
                        </table>   



 $(document).on('click', '.repeater-add-btn', function(){
        count = count + 1;
        var date = document.getElementById("selecteddate").value;
        var room = document.getElementById("room").value;
            console.log(date);
             console.log(room);
        var html = '';
        var ahtml;
        html += '<tr>';
        html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
        html += '<td><select name="item_category[]" class="form-control item_category" data-sub_category_id="'+count+'">';
            
          $.ajax({
              url:"fill_sub_category.php",
              method:"POST",
              data: {date : date, room : room },
              success:function(data)
              {            
                  
                  
              html += '<option value="">Select Category</option>'+data;   
              html += '</select></td>';         
              html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
              $('#ads').append(html);

                      
              }
            });    
          
           

    <form id="repeater_form" action="" method="post">                                                    ?>
  
  
  
        cursor: not-allowed;
        
        
        
        <button class='btn btn-danger btn-xs tooltip' data-html='true' data-container='body' data-toggle='tooltip' title='<table class=\'kpiTableHov\'><tr><td colspan=\'2\' class=\'text-center\'>Total Accidents</td></tr><tr><td>Year Total &nbsp;</td><td>&nbsp;/ % change from previous year</td></tr></table>'>N/A</button>"
        
        
        
        
        
        <?php

//index.php

include('database_connection.php');

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Remove Dynamic Dependent Select Box using Ajax jQuery with PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <br />
    <div class="container">
      <h3 align="center">Add Remove Dynamic Dependent Select Box using Ajax jQuery with PHP</h3>
      <br />
      <h4 align="center">Enter Item Details</h4>
      <br />
      <form method="post" id="insert_form">
        <div class="table-repsonsive">
          <span id="error"></span>
          <table class="table table-bordered" id="item_table">
            <thead>
              <tr>
                <th>Enter Item Name</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <div align="center">
            <input type="submit" name="submit" class="btn btn-info" value="Insert" />
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
<script>
    $(document).ready(function(){
      
      var count = 0;

      $(document).on('click', '.add', function(){
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
        html += '<td><select name="item_category[]" class="form-control item_category" data-sub_category_id="'+count+'"><option value="">Select Category</option><?php echo fill_select_box($connect, "0"); ?></select></td>';
        html += '<td><select name="item_sub_category[]" class="form-control item_sub_category" id="item_sub_category'+count+'"><option value="">Select Sub Category</option></select></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
        $('tbody').append(html);
      });

      $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
      });

      $(document).on('change', '.item_category', function(){
        var category_id = $(this).val();
        var sub_category_id = $(this).data('sub_category_id');
        $.ajax({
          url:"fill_sub_category.php",
          method:"POST",
          data:{category_id:category_id},
          success:function(data)
          {
            var html = '<option value="">Select Sub Category</option>';
            html += data;
            $('#item_sub_category'+sub_category_id).html(html);
          }
        })
      });

      $('#insert_form').on('submit', function(event){
        event.preventDefault();
        var error = '';
        $('.item_name').each(function(){
          var count = 1;
          if($(this).val() == '')
          {
            error += '<p>Enter Item name at '+count+' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.item_category').each(function(){
          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select Item Category at '+count+' row</p>';
            return false;
          }

          count = count + 1;

        });

        $('.item_sub_category').each(function(){

          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select Item Sub category '+count+' Row</p> ';
            return false;
          }

          count = count + 1;

        });

        var form_data = $(this).serialize();

        if(error == '')
        {
          $.ajax({
            url:"insert.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
              if(data == 'ok')
              {
                $('#item_table').find('tr:gt(0)').remove();
                $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
              }
            }
          });
        }
        else
        {
          $('#error').html('<div class="alert alert-danger">'+error+'</div>');
        }

      });
      
    });
</script>

             