
<script type="text/javascript">
// SELECT sum(dcr_amount) total_tran,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="d") total_deposit,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="c") total_cost,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_date=CURDATE()) daily_tran,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="d" and dcr_date=CURDATE()) total_daily_deposit,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="c" and dcr_date=CURDATE()) total_daily_cost from deposit_cost_register
$(document).ready(function(){

  display_product_name(0);
  display_style_name(0);
  // display_cutting_man(0);
  display_sale_data();
  display_product_size_filter();
  initialization();
  //Filter cutting data
  $("#Filters").change(function(){
    var option = $( "#Filters" ).val();
    console.log(option);
    if (option=='date') {
      $("#Date_ui").show();
      $("#date_option").prop('disabled', true);
    }
    if (option=='prd_name') {
      $("#products_name_filter_ui").show();
      $("#prd_name_option").prop('disabled', true);
    }
    if (option=='prd_size') {
      $("#products_size_filter_ui").show();
      $("#products_size_option").prop('disabled', true);
    }
    if (option=='style_name') {
      $("#style_name_filter_ui").show();
      $("#style_name_option").prop('disabled', true);
    }
    // if (option=='cutting_man') {
    //   $("#cutting_man_filter_ui").show();
    //   $("#cutting_man_option").prop('disabled', true);
    // }

  });
  $("#filter_submit").click(function () {
    var filter_date= $("#filter_date").val();
    var product_id=$("#products_name_filter").val();
    var products_size=$("#products_size_filter").val();
    var style_id=$("#style_name_filter").val();
    console.log(filter_date+', '+product_id+', '+products_size+', '+style_id);
    display_sale_data(filter_date,product_id,products_size,style_id);

  });
  $("#filter_clear").click(function () {
    $("#filter_date").val("");
    $("#products_name_filter").val("");
    $("#products_size_filter").val("");
    $("#Filters").val("");
    $("#Date_ui").hide();
    $("#products_name_filter_ui").hide();
    $("#products_size_filter_ui").hide();
    $("#style_name_filter_ui").hide();
    // $("#cutting_man_filter_ui").hide();
    $("#date_option").prop('disabled', false);
    $("#prd_name_option").prop('disabled', false);
    $("#products_size_option").prop('disabled', false);
    $("#style_name_option").prop('disabled', false);
    // $("#cutting_man_option").prop('disabled', false);
    display_sale_data();



  });
  // Initialize activities for this page;
  function initialization() {
    $("#product_sizes").prop('disabled', true);
    $("#product_sizes").val("");
    $("#Date_ui").hide();
    $("#products_name_filter_ui").hide();
    $("#products_size_filter_ui").hide();
    $("#style_name_filter_ui").hide();
    // $("#cutting_man_filter_ui").hide();
    $("#date_option").prop('disabled', false);
    data_insert_initialization();

  }
  function data_insert_initialization() {
    $("#date").prop('disabled', true);
    $("#products_name").prop('disabled', true);
    $("#product_sizes").prop('disabled', true);
    $("#style_names").prop('disabled', true);
    $("#dozen").prop('disabled', true);
    $("#piece").prop('disabled', true);

  }
  $("#insert_option").change(function(){
    // var x=$("#insert_option").val();
    // console.log(x);
      $("#date").prop('disabled', false);
      $("#products_name").prop('disabled', false);
      $("#style_names").prop('disabled', false);
      $("#dozen").prop('disabled', false);
      $("#piece").prop('disabled', false);
  });
  //function show all product name in product size
    function display_product_name(flag){
       $.ajax({
           type  : 'get',
           url: "<?php echo base_url(); ?>index.php/Inhouse_setting/show_products_name",
           async : true,
           dataType : 'json',
           success : function(data){
               var i;
               for(i=0; i<data.length; i++){
                   var id = data[i]['product_id'];
                   var name = data[i]['product_name'];

                   if (flag==1) {
                     $("#product_name_edit").append("<option value='"+id+"'>"+name+"</option>");
                   }else{
                     $("#products_name_filter").append("<option value='"+id+"'>"+name+"</option>");
                     $("#products_name").append("<option value='"+id+"'>"+name+"</option>");
                   }
               }
           }

       });
   }
   $("#products_name").change(function(){

     var product_id = $( "#products_name" ).val();
     $("#product_sizes").prop('disabled', false);
     display_product_size(0,product_id);

 });

 function display_product_size(flag,product_id) {
   var i;

   $.ajax({
     type : "POST",
     url: "<?php echo base_url(); ?>index.php/Cutting_reg/show_products_size",
     dataType : "JSON",
     data : {product_id:product_id},
     success: function(data){
       $("#product_sizes").empty();
       for(i=0; i<data.length; i++){
           var id = data[i]['product_size_id'];
           var product_size = data[i]['product_size_value'];
           if (flag==0) {
             $("#product_sizes").append("<option value='"+id+"'>"+product_size+"</option>");

           }else {

             $("#product_sizes_edit").append("<option value='"+id+"'>"+product_size+"</option>");
           }
       }

     }
   });
 }
 function display_product_size_filter() {
   var i;

   $.ajax({
     type : "POST",
     url: "<?php echo base_url(); ?>index.php/Cutting_reg/show_products_size_filter",
     dataType : "JSON",
     // data : {},
     success: function(data){
       $("#product_sizes").empty();
       for(i=0; i<data.length; i++){
           // var id = data[i]['product_size_id'];
           var product_size = data[i]['product_size_value'];
           $("#products_size_filter").append("<option >"+product_size+"</option>");
           // $("#products_size_filter").append("<option value='"+id+"'>"+product_size+"</option>");

       }

     }
   });
 }

 //function show all product name in product size
     function display_style_name(flag){
        $.ajax({
            type  : 'get',
            url: "<?php echo base_url(); ?>index.php/Inhouse_setting/show_style_name_for_dtl",
            async : true,
            dataType : 'json',
            success : function(data){
                var i;
                for(i=0; i<data.length; i++){
                    var id = data[i]['style_id'];
                    var name = data[i]['style_name'];
                    if (flag==0) {

                      $("#style_names").append("<option value='"+id+"'>"+name+"</option>");
                      $("#style_name_filter").append("<option value='"+id+"'>"+name+"</option>");
                    }else {
                      $("#style_name_edit").append("<option value='"+id+"'>"+name+"</option>");

                    }
                }
            }

        });
    }


    //function show all Style Details
        function display_sale_data(filter_date,product_id,products_size,style_id){

           $.ajax({
               type  : 'POST',
               url: "<?php echo base_url(); ?>index.php/Sale_product/show_sale_data",
               async : true,
               data : {date:filter_date,product_id:product_id,products_size:products_size,style_id:style_id},
               dataType : 'json',
               success : function(data){
                   var html = '';
                   var i;
                   var row=1;
                   var msg="No Data Found"
                   var data_length=data.length;
                   // console.log(data.length);

                     if (data_length==0) {
                       // html += '<p class="a-center ">'+msg+'</p>';
                       html += '<strong class="a-center">'+msg+'</strong>';
                     }else {

                       for(i=0; i<data_length; i++){
                       // console.log(data[i]);
                       html += '<tr class="even pointer">'+
                       '<td style="text-align:center;">'+row+'</td>'+
                       '<td style="text-align:center;">'+data[i].sale_date+'</td>'+
                       '<td style="text-align:center;">'+data[i].product_name+'</td>'+
                       '<td style="text-align:center;">'+data[i].product_size_value+'</td>'+
                       '<td style="text-align:center;">'+data[i].style_name+'</td>'+
                       // '<td style="text-align:center;">'+data[i].cutting_man_name+'</td>'+
                       '<td style="text-align:center;">'+data[i].sale_dozen+'</td>'+
                       '<td style="text-align:center;">'+data[i].sale_piece+'</td>'+
                       '<td style="text-align:center;">'+data[i].sale_return_dozen+'</td>'+
                       '<td style="text-align:center;">'+data[i].sale_return_piece+'</td>'+
                       '<div class="col-md-6">'+
                       // '<td style="text-align:center;">'+
                    //   '<a href="javascript:void(0);" class="btn btn-info btn-sm cutting_edit" data-cutting_register_id="'+data[i].cutting_register_id+'" data-cutting_register_date="'+data[i].cutting_register_date+'" data-cutting_register_dozen="'+data[i].cutting_register_dozen+'"  data-cutting_register_piece="'+data[i].cutting_register_piece+'"><span class="glyphicon glyphicon-edit"></span></a>'+' '+
                       // '<a href="javascript:void(0);" class="btn btn-danger btn-sm cutting_delete"  data-cutting_register_id="'+data[i].cutting_register_id+'"><span class="glyphicon glyphicon-trash"></span></a>'+
                       // '</td>'+
                       '</div>'+
                       '</tr>';
                       row++;
                     }
                   }
                   $('#show_sale_data').html(html);
                   // $('#datatable_sale').dataTable();


                   if ( $.fn.dataTable.isDataTable( '#datatable_sale' ) ) {
                       var table = $('#datatable_sale').DataTable();
                       fixedHeader:true;
                   }
                   else {
                      var table = $('#datatable_sale').DataTable( {
                           ordering: false,
                           fixedHeader:{header:true,footer: true},
                       } );
                   }



               }

           });
       }
       //Save Cutting data to db
       $('#btn_save_sale').on('click',function(){

         var option = $('#insert_option').val();
         var date = $('#date').val();
         var product_id = $('#products_name').val();
         var product_size_id = $('#product_sizes').val();
         var style_id = $('#style_names').val();
         var dozen = $('#dozen').val();
         var piece = $('#piece').val();

         // console.log('date: '+date,'product_id: '+product_id,'product_size_id: '+product_size_id,'style_id:'+style_id,'dozen:'+dozen,'piece:'+piece);
         if (date!=='' && product_id!=='' && product_size_id!=='' && style_id!=='' && (dozen!=='' || piece!=='') )
         {
           if (dozen<0 || piece<0) {
             alert('Dozen Or Piece Can Not Be Negative')
           }
           else {
             if (piece>11) {
               alert('Piece can not more than 11')
             }else {

             $.ajax({
               type : "POST",
               url: "<?php echo base_url(); ?>index.php/Sale_product/save_sale_data",
               dataType : "JSON",
               data : {option:option,date:date,product_id:product_id,product_size_id:product_size_id,style_id:style_id,dozen:dozen,piece:piece},
               success: function(data){
                 console.log(data);
                 if (data==1) {
                   alert('Stock Limited');
                 }
                  if (data==2) {
                   console.log(data);
                   $('#Modal_Add').modal('hide');
                   display_sale_data();
                   initialization();
                   form_reset();
                   alert('Succssfuly Inserted');
                 }
                 if (data==3) {
                   $('#Modal_Add').modal('hide');
                   display_sale_data();
                   initialization();
                   form_reset();
                   alert('Succssfuly Inserted with new stock created');
                 }

             }
           });
         }
       }

       }else {
         alert('Form Can not be Empty');
       }

         return false;
       });
       function form_reset() {
         $("#form_sale").trigger('reset');
       }
       //get cutting data for update record
       $('#show_cutting_data').on('click','.cutting_edit',function(){

         var cutting_register_id = $(this).data('cutting_register_id');
         var cutting_register_date = $(this).data('cutting_register_date');
         var cutting_register_dozen = $(this).data('cutting_register_dozen');
         var cutting_register_piece = $(this).data('cutting_register_piece');
         console.log(cutting_register_date);
         $('#Modal_Edit').modal('show');
         $('[name="cutting_register_id_edit"]').val(cutting_register_id);
         $('[name="date_edit"]').val(cutting_register_date);
         $('[name="dozen_edit"]').val(cutting_register_dozen);
         $('[name="piece_edit"]').val(cutting_register_piece);

         $.ajax({
           type : "POST",
           url: "<?php echo base_url(); ?>index.php/Cutting_reg/fetch_cutting_data_show",
           dataType : "JSON",
           data : {cutting_register_id:cutting_register_id},
           success: function(data){
             // $("#product_name_edit").empty();
             // $("#product_sizes_edit").empty();
             // $("#style_name_edit").empty();
             $("#cutting_man_edit").empty();
             for(i=0; i<data.length; i++){
                 var product_id = data[i]['product_id'];
                 var product_name = data[i]['product_name'];
                 var product_size_id = data[i]['product_size_id'];
                 var product_size_value = data[i]['product_size_value'];
                 var style_id = data[i]['style_id'];
                 var style_name = data[i]['style_name'];
                 var cutting_man_id = data[i]['cutting_man_id'];
                 var cutting_man_name = data[i]['cutting_man_name'];
                 var danger="text-danger";

              // $("#product_name_edit").prepend("<option value='"+product_id+"' class='"+danger+"'>"+product_name+"</option>");
              // $("#product_sizes_edit").prepend("<option value='"+product_size_id+"' class='"+danger+"'>"+product_size_value+"</option>");
              // $("#style_name_edit").prepend("<option value='"+style_id+"' class='"+danger+"'>"+style_name+"</option>");
              $("#cutting_man_edit").prepend("<option value='"+cutting_man_id+"' class='"+danger+"'>"+cutting_man_name+"</option>");
              $("#product_id_edit").val(product_id);
              $("#product_name_edit").val(product_name);
              $("#product_size_id_edit").val(product_size_id);
              $("#product_sizes_edit").val(product_size_value);
              $("#style_id_edit").val(style_id);
              $("#style_name_edit").val(style_name);
              // $("#cutting_man_edit").val(cutting_man_name);
             }
             // display_product_name(1);
             // display_product_size(1,product_id);
             // display_style_name(1);
             display_cutting_man(1);
          }
         });

       });

       //update cutting data to db
       $('#btn_update_cutting').on('click',function(){

           var cutting_register_id=$('#cutting_register_id_edit').val();
           var date = $('#date_edit').val();
           var product_id = $('#product_name_edit').val();
           var product_size_id = $('#product_sizes_edit').val();
           var style_id = $('#style_name_edit').val();
           var cutting_man_id = $('#cutting_man_edit').val();
           var cutting_dozen = $('#dozen_edit').val();
           var cutting_piece = $('#piece_edit').val();

           // console.log(cutting_dozen);
          if (date!==''  && (cutting_dozen!=='' || cutting_piece!=='' ))
          {
            if (cutting_piece>11) {
              alert('Piece can not more than 11')

            }else {
              $.ajax({
                  type : "POST",
                  url: "<?php echo base_url(); ?>index.php/Cutting_reg/cutting_update",
                  dataType : "JSON",
                  data : {cutting_register_id:cutting_register_id,date:date,product_id:product_id,product_size_id:product_size_id,style_id:style_id,cutting_man_id:cutting_man_id,cutting_dozen:cutting_dozen,cutting_piece:cutting_piece},
                  success: function(data){
                    if (data==0) {
                      alert('Can not update!!!');
                      $('#Modal_Edit').modal('hide');
                    }else {
                      $('#Modal_Edit').modal('hide');
                      display_cutting_data();
                      alert('Succssfuly Updated!!!');
                    }

                    }
                  });
                  // $("#form_edit_cutting").trigger('reset');
            }
          }
          return false;
       });

});
</script>
