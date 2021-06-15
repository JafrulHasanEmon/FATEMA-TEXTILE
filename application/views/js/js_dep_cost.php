
<script type="text/javascript">


$(document).ready(function(){

    display_list();
    display_total_costing();
    $("#ul_dc_sub_group").hide();

  $("#dc_group").change(function(){

    var option = $( "#dc_group" ).val();
    console.log(option);
    if (option=='dcr') {
    $("#ul_dc_sub_group").show();
  }else {
    $("#ul_dc_sub_group").hide();

  }
});
  $("#option").change(function(){

    var option = $( "#option" ).val();
    console.log(option);
    if (option=='c') {
    $("#dep_name").hide();
    $("#cost").show();
    $("#amount").prop('disabled', false);
    $("#cost_name").prop('disabled', false);
    $("#date").prop('disabled', false);

  }else if(option=='d'){
    $("#cost").hide();
    $("#dep_name").show();
    $("#amount").prop('disabled', false);
    $("#deposit_name").prop('disabled', false);
    $("#date").prop('disabled', false);
  }
  else {
    $("#cost").show();
    $("#dep_name").show();
    $("#amount").prop('disabled', true);
    $("#deposit_name").prop('disabled', true);
    $("#cost_name").prop('disabled', true);
    $("#date").prop('disabled', true);
    $("#form").trigger('reset');
  }

});

//function show all product
    function display_list(){
       $.ajax({
           type  : 'ajax',
           url: "<?php echo base_url(); ?>index.php/Deposit_Cost/show_data",
           async : true,
           dataType : 'json',
           success : function(data){
               var html = '';
               var i;
               var row=1;
               for(i=0; i<data.length; i++){
                 // console.log(data[i]);
                   html += '<tr class="even pointer">'+
                            '<td class="a-center ">'+row+'</td>'+
                            '<td>'+data[i].dcr_date+'</td>'+
                            '<td>'+data[i].dcr_deposit_name+'</td>'+
                            '<td>'+data[i].dcr_cost_name+'</td>'+
                            '<td>'+data[i].dcr_amount+'</td>'+
                            '<div class="col-md-6">'+
                              // '<div class="col-md-6">'+
                              '<td style="text-align:center;">'+
                                '<a href="javascript:void(0);"  class="btn btn-info btn-sm item_edit" data-dcr_id="'+data[i].dcr_id+'" data-dcr_date="'+data[i].dcr_date+'" data-dcr_deposit_name="'+data[i].dcr_deposit_name+'" data-dcr_cost_name="'+data[i].dcr_cost_name+'" data-dcr_amount="'+data[i].dcr_amount+'" data-dcr_flag="'+data[i].dcr_flag+'"><span class="glyphicon glyphicon-edit"></span></a>'+' '+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete"  data-dcr_id="'+data[i].dcr_id+'"><span class="glyphicon glyphicon-trash"></span></a>'+
                              '</td>'+
                              // '</div>'+
                           '</div>'+
                           '</tr>';
                           row++;
               }
               $('#show_data').html(html);
               if ( $.fn.dataTable.isDataTable( '#datatable_dcr' ) ) {
                   table = $('#datatable_dcr').DataTable();
               }
               else {
                   table = $('#datatable_dcr').DataTable( {
                       ordering: false,
                       responsive: true,

                   } );
               }
           }

       });
   }
  function display_total_costing() {
    $.ajax({
        type  : 'ajax',
        url: "<?php echo base_url(); ?>index.php/Deposit_Cost/show_daily_costing",
        async : true,
        dataType : 'json',
        success : function(data){
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
              // console.log(data[i]);
                // html += '<h4>'+data[i].total_amount+'</h4>';
                html += '<div class="col-sm-12>">'+
                    '<div class="col-sm-4">'+
                      '<div class="form-group">'+
                        '<label for="exampleFormControlSelect1">TOTAL AMOUNT (TK)</label>'+
                        '<h4>'+data[i].total_amount+'<span>৳</span></h4>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-sm-4">'+
                      '<div class="form-group">'+
                      '<label for="exampleFormControlSelect1">DEPOSIT AMOUNT (TK)</label>'+
                      '<h4>'+data[i].dep_amount+'<span>৳</span></h4>'+
                        '</div>'+
                      '</div>'+
                    '<div class="col-sm-4">'+
                      '<div class="form-group">'+
                      '<label for="exampleFormControlSelect1">COST AMOUNT (TK)</label>'+
                      '<h4>'+data[i].cost_amount+'<span>৳</span></h4>'+
                        '</div>'+
                      '</div>'+
                  '</div>';
            }
            $('#total_amount').html(html);
        }

    });
  }

   //Save data to db
    $('#btn_save').on('click',function(){
        var option = $('#option').val();
        var date = $('#date').val();
        var deposit_name = $('#deposit_name').val();
        var cost_name     = $('#cost_name').val();
        var amount     = $('#amount').val();

        // $("#form").validate();


        if (option!=='' && date!=='' && (deposit_name!=='' ||cost_name!=='') && amount!=='') {
          console.log('not empty');
        $.ajax({
            type : "POST",
            url: "<?php echo base_url(); ?>index.php/Deposit_Cost/save",
            dataType : "JSON",
            data : {option:option,date:date , deposit_name:deposit_name, cost_name:cost_name,amount:amount},
            success: function(data){
                $('#Modal_Add').modal('hide');
                display_list();
                display_total_costing();
                alert('Succssfuly Inserted');
            }
        });$("#form").trigger('reset');
      }else {
        console.log('empty');
        alert('Form Can not be Empty');
      }

        return false;
    });

    //get data for update record
    $('#show_data').on('click','.item_edit',function(){
        var dcr_id = $(this).data('dcr_id');
        var dcr_date = $(this).data('dcr_date');
        var dcr_cost_name = $(this).data('dcr_cost_name');
        var dcr_deposit_name = $(this).data('dcr_deposit_name');
        var dcr_amount = $(this).data('dcr_amount');
        var dcr_flag = $(this).data('dcr_flag');

        console.log(dcr_date);
        $('#Modal_Edit').modal('show');

        $('[name="dcr_id"]').val(dcr_id);
        $('[name="dcr_flag"]').val(dcr_flag);
        $('[name="date_edit"]').val(dcr_date);
        $('[name="deposit_name_edit"]').val(dcr_deposit_name);
        $('[name="cost_name_edit"]').val(dcr_cost_name);
        $('[name="amount_edit"]').val(dcr_amount);
    });

    //update data to db
     $('#btn_update').on('click',function(){
          var dcr_id=$('#dcr_id').val();
         var option_edit = $('#option_edit').val();
         var date_edit = $('#date_edit').val();
         var deposit_name_edit = $('#deposit_name_edit').val();
         var cost_name_edit= $('#cost_name_edit').val();
         var amount_edit     = $('#amount_edit').val();

         // $("#form").validate();
         console.log(dcr_id);
         console.log(option_edit);
         console.log(date_edit);
         console.log(deposit_name_edit);
         console.log(cost_name_edit);
         console.log(amount_edit);

         if ((option_edit=='d' || option_edit=='c') && date_edit!=='' && (deposit_name_edit!=='' ||cost_name_edit!=='') && amount_edit!=='') {
           console.log('not empty');
         $.ajax({
             type : "POST",
             url: "<?php echo base_url(); ?>index.php/Deposit_Cost/dcr_update",
             dataType : "JSON",
             data : {dcr_id:dcr_id,option_edit:option_edit,date_edit:date_edit , deposit_name_edit:deposit_name_edit, cost_name_edit:cost_name_edit,amount_edit:amount_edit},
             success: function(data){
                 $('#Modal_Edit').modal('hide');
                 display_list();
                 display_total_costing();
                 alert('Succssfuly Updated');
             }
         });$("#form_edit").trigger('reset');
       }else {
         if (option_edit=='d' || option_edit=='c') {
           if (date_edit=='') {
             alert('Please entry date');
           }
           else if (deposit_name_edit=='') {
             alert('Please Entry Deposit Name');
           }else if (cost_name_edit=='') {
             alert('Please Entry Cost Name');
           }else if (amount_edit=='') {
               alert('Please Entry Amount');
             }
         }else {
           alert('Please Select Your Option');
         }

       }

         return false;
     });

     $("#option_edit").change(function(){

       var option = $( "#option_edit" ).val();
       console.log(option);
       if (option=='c') {
       $("#div_deposit_name_edit").hide();
       $("#div_cost_name_edit").show();
       $("#amount_edit").prop('disabled', false);
       $("#cost_name_edit").prop('disabled', false);
       $("#date_edit").prop('disabled', false);
       $("#deposit_name_edit").val("");


     }
     else if(option=='d'){
       $("#div_cost_name_edit").hide();
       $("#div_deposit_name_edit").show();
       $("#amount_edit").prop('disabled', false);
       $("#deposit_name_edit").prop('disabled', false);
       $("#date_edit").prop('disabled', false);
       $("#cost_name_edit").val("");

     }
     else {
       $("#div_deposit_name_edit").show();
       $("#div_cost_name_edit").show();
       $("#amount_edit").prop('disabled', true);
       $("#cost_name_edit").prop('disabled', true);
       $("#date_edit").prop('disabled', true);
       $("#deposit_name_edit").prop('disabled', true);
       $("#form_edit").trigger('reset');
     }

   });

   //get data for delete record
     $('#show_data').on('click','.item_delete',function(){
         var dcr_id = $(this).data('dcr_id');
         console.log(dcr_id);

         $('#Modal_Delete').modal('show');
         $('[name="dcr_delete_id"]').val(dcr_id);
     });
     //delete record to database
       $('#btn_delete').on('click',function(){
        var dcr_id=$('#dcr_delete_id').val();
         console.log('id:'+dcr_id);
          $.ajax({
              type : "POST",
              url: "<?php echo base_url(); ?>index.php/Deposit_Cost/dcr_delete",
              dataType : "JSON",
              data : {dcr_id:dcr_id},
              success: function(data){
                $('[name="dcr_delete_id"]').val("");
                  $('#Modal_Delete').modal('hide');
                  display_list();
                  display_total_costing();
                  alert('Succssfuly Deleted');
              }
          });
          return false;
      });
});

</script>
