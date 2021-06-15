
<script type="text/javascript">


$(document).ready(function(){

display_product_list();
display_product_size_list();
display_product_name();
display_Style_list();
display_Style_Details();
display_style_name();
display_cutting_man_list();
//function show all product
function display_product_list(){
 $.ajax({
     type  : 'ajax',
     url: "<?php echo base_url(); ?>index.php/Inhouse_setting/show_products",
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
                      '<td>'+data[i].product_name+'</td>'+
                      '<div class="col-md-6">'+
                        '<td style="text-align:center;">'+
                          '<a href="javascript:void(0);"  class="btn btn-info btn-sm product_edit" data-product_id="'+data[i].product_id+'" data-product_name="'+data[i].product_name+'"><span class="glyphicon glyphicon-edit"></span></a>'+' '+
                          '<a href="javascript:void(0);" class="btn btn-danger btn-sm product_delete"  data-product_id="'+data[i].product_id+'"><span class="glyphicon glyphicon-trash"></span></a>'+
                        '</td>'+
                     '</div>'+
                     '</tr>';
                     row++;
         }
         $('#show_products_data').html(html);

     }

 });
}

//Save products data to db
$('#btn_save_product').on('click',function(){

  var product_name = $('#product_name').val();

  if (product_name!=='')
  {
    $.ajax({
      type : "POST",
      url: "<?php echo base_url(); ?>index.php/Inhouse_setting/save_product",
      dataType : "JSON",
      data : {product_name:product_name},
      success: function(data){
        if (data==true) {
          $('#Modal_Product_Add').modal('hide');
          display_product_list();
          display_product_name();
          alert('Succssfuly Inserted');
        }else {
          $('#Modal_Product_Add').modal('hide');
          display_product_list();
          alert("Product already Exist");
        }
      }
    });$("#form_add_product").trigger('reset');
}else {
  alert('Form Can not be Empty');
}

  return false;
});

//get product data for update record
$('#show_products_data').on('click','.product_edit',function(){
  var product_id = $(this).data('product_id');
  var product_name = $(this).data('product_name');

  console.log(product_id);
  $('#Modal_Product_Edit').modal('show');
  //
  $('[name="product_id"]').val(product_id);
  $('[name="product_name"]').val(product_name);

});
//update product data to db
$('#btn_update_product').on('click',function(){
    var product_id=$('#product_id_edit').val();
    var product_name = $('#product_name_edit').val();


   if (product_name!=='') {
     console.log('not empty');
   $.ajax({
       type : "POST",
       url: "<?php echo base_url(); ?>index.php/Inhouse_setting/product_update",
       dataType : "JSON",
       data : {product_id:product_id,product_name:product_name},
       success: function(data){
         if (data==true) {
           $('#Modal_Product_Edit').modal('hide');
           display_product_list();
           display_product_name();
           display_product_size_list();
           alert('Succssfuly Updated');
         }else{
           // console.log(data);
           $('#Modal_Product_Edit').modal('hide');
           display_product_list();
           alert("Product already Exist");
       }
     }
   });$("#form_product_edit").trigger('reset');
 }
   return false;
});
//get product data for delete
$('#show_products_data').on('click','.product_delete',function(){
   var product_id = $(this).data('product_id');

   console.log(product_id);
   $('#Modal_Delete_Product').modal('show');
   //
   $('[name="product_id_delete"]').val(product_id);

});

//delete product

$('#btn_delete_product').on('click',function(){
var product_id=$('#product_id_delete').val();
  $.ajax({
      type : "POST",
      url: "<?php echo base_url(); ?>index.php/Inhouse_setting/product_delete",
      dataType : "JSON",
      data : {product_id:product_id},
      success: function(data){
        $('[name="product_id_delete"]').val("");
          $('#Modal_Delete_Product').modal('hide');
          display_product_list();
          display_product_name();
          display_product_size_list();
          alert('Succssfuly Deleted');
      }
  });
  return false;
});

//function show all product size
  function display_product_size_list(){
     $.ajax({
         type  : 'ajax',
         url: "<?php echo base_url(); ?>index.php/Inhouse_setting/show_products_size",
         async : true,
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
                 '<td class="a-center ">'+row+'</td>'+
                 '<td>'+data[i].product_name+'</td>'+
                 '<td>'+data[i].product_size_value+'</td>'+
                 '<div class="col-md-6">'+
                 '<td style="text-align:center;">'+
                 '<a href="javascript:void(0);"  class="btn btn-info btn-sm product_size_edit"  data-product_id="'+data[i].product_id+'" data-product_name="'+data[i].product_name+'" data-product_size_id="'+data[i].product_size_id+'" data-product_size_value="'+data[i].product_size_value+'"><span class="glyphicon glyphicon-edit"></span></a>'+' '+
                 '<a href="javascript:void(0);" class="btn btn-danger btn-sm product_size_delete"  data-product_size_id="'+data[i].product_size_id+'"><span class="glyphicon glyphicon-trash"></span></a>'+
                 '</td>'+
                 '</div>'+
                 '</tr>';
                 row++;
               }
             }
             $('#show_products_size_data').html(html);
         }

     });
 }
//function show all product name in product size
  function display_product_name(){
     $.ajax({
         type  : 'ajax',
         url: "<?php echo base_url(); ?>index.php/Inhouse_setting/show_products_name",
         async : true,
         dataType : 'json',
         success : function(data){
             var i;
             $("#show_product_name").empty();
             for(i=0; i<data.length; i++){
                 var id = data[i]['product_id'];
                 var name = data[i]['product_name'];

              $("#show_product_name").append("<option value='"+id+"'>"+name+"</option>");
             }
         }

     });
 }
 //Save products size data to db
  $('#btn_save_Product_Size').on('click',function(){

      var product_id = $('#show_product_name').val();
      var product_size = $('#product_size').val();
      // console.log(product_name);
      // console.log(product_size);

      if (product_id!=='' && product_size!=='')
      {
        $.ajax({
          type : "POST",
          url: "<?php echo base_url(); ?>index.php/Inhouse_setting/save_product_size",
          dataType : "JSON",
          data : {product_id:product_id,product_size:product_size},
          success: function(data){
            if (data==true) {
              $('#Modal_Product_Size_Add').modal('hide');
              display_product_size_list();
              alert('Succssfuly Inserted');
            }else {
              $('#Modal_Product_Size_Add').modal('hide');
              alert("Product size already Exist");
            }
          }
        });$("#form_add_product_size").trigger('reset');
    }else {
      alert('Form Can not be Empty');
    }

      return false;
  });

  //get product data for update record
  $('#show_products_size_data').on('click','.product_size_edit',function(){
      var product_id = $(this).data('product_id');
      var product_size_id = $(this).data('product_size_id');
      var product_name = $(this).data('product_name');
      var product_size_value = $(this).data('product_size_value');

      console.log('P id: '+product_id);
      $('#Modal_Product_Size_Edit').modal('show');
      //
      $('[name="product_id_edit_size"]').val(product_id);
      $('[name="product_name_edit"]').val(product_name);
      $('[name="product_size_id_edit"]').val(product_size_id);
      $('[name="product_size_value_edit"]').val(product_size_value);

  });
  //update product size data to db
   $('#btn_update_Product_Size').on('click',function(){
        var product_id=$('#product_id_edit_size').val();
        var product_size_id=$('#product_size_id_edit').val();
       var product_size_value = $('#product_size_value_edit').val();
       //
       // console.log(product_id);
       // console.log(product_size_value);
       if (product_size_value!=='') {
         console.log('not empty');
       $.ajax({
           type : "POST",
           url: "<?php echo base_url(); ?>index.php/Inhouse_setting/product_size_update",
           dataType : "JSON",
           data : {product_id:product_id,product_size_id:product_size_id,product_size_value:product_size_value},
           success: function(data){
             if (data==true) {
               $('#Modal_Product_Size_Edit').modal('hide');
               display_product_size_list();
               alert('Succssfuly Updated');
               console.log(data);
             }else{
               console.log(data);
               $('#Modal_Product_Size_Edit').modal('hide');
               alert("Product size already Exist");
           }
         }
       });$("#form_edit_product_size").trigger('reset');
     }
       return false;
   });

   //get product size data for delete
   $('#show_products_size_data').on('click','.product_size_delete',function(){
       var product_size_id = $(this).data('product_size_id');

       console.log(product_size_id);
       $('#Modal_Delete_Product_Size').modal('show');
       //
       $('[name="product_size_id_delete"]').val(product_size_id);

   });

   //delete product's size

   $('#btn_delete_product_size').on('click',function(){
    var product_size_id=$('#product_size_id_delete').val();
      $.ajax({
          type : "POST",
          url: "<?php echo base_url(); ?>index.php/Inhouse_setting/product_size_delete",
          dataType : "JSON",
          data : {product_size_id:product_size_id},
          success: function(data){
            $('[name="product_size_id_delete"]').val("");
              $('#Modal_Delete_Product_Size').modal('hide');
              display_product_size_list();
              alert('Succssfuly Deleted');
          }
      });
      return false;
  });
  //function show all Style
      function display_Style_list(){
         $.ajax({
             type  : 'ajax',
             url: "<?php echo base_url(); ?>index.php/Inhouse_setting/show_style_name",
             async : true,
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
                     '<td class="a-center ">'+row+'</td>'+
                     '<td>'+data[i].style_name+'</td>'+
                     '<div class="col-md-6">'+
                     '<td style="text-align:center;">'+
                     '<a href="javascript:void(0);"  class="btn btn-info btn-sm style_edit"  data-style_id="'+data[i].style_id+'" data-style_name="'+data[i].style_name+'" ><span class="glyphicon glyphicon-edit"></span></a>'+' '+
                     '<a href="javascript:void(0);" class="btn btn-danger btn-sm style_delete"  data-style_id="'+data[i].style_id+'"><span class="glyphicon glyphicon-trash"></span></a>'+
                     '</td>'+
                     '</div>'+
                     '</tr>';
                     row++;
                   }
                 }
                 $('#show_style_name').html(html);
             }

         });
     }
     //Save stye data to db
      $('#btn_save_style').on('click',function(){

          var style_name = $('#style_name').val();

          if (style_name!=='')
          {
            $.ajax({
              type : "POST",
              url: "<?php echo base_url(); ?>index.php/Inhouse_setting/save_style",
              dataType : "JSON",
              data : {style_name:style_name},
              success: function(data){
                if (data==true) {
                  $('#Modal_Style_Add').modal('hide');
                  display_Style_list();
                  display_style_name();
                  alert('Succssfuly Inserted');
                }else {
                  $('#Modal_Style_Add').modal('hide');
                  alert("Style already Exist");
                }
              }
            });$("#form_add_style").trigger('reset');
        }else {
          alert('Form Can not be Empty');
        }

          return false;
      });
      //get Style data for update record
      $('#show_style_name').on('click','.style_edit',function(){
          var style_id = $(this).data('style_id');
          var style_name = $(this).data('style_name');
          // console.log('P id: '+style_id,', style_name:'+style_name,', neck_cutting_rate:'+neck_cutting_rate);
          $('#Modal_Style_Edit').modal('show');
          $('[name="style_id_edit"]').val(style_id);
          $('[name="style_name_edit"]').val(style_name);

      });
      //update Style data to db
       $('#btn_update_style').on('click',function(){
            var style_id=$('#style_id_edit').val();
            var style_name=$('#style_name_edit').val();
           // console.log('style_id:'+style_id,'style_name:'+style_name,'neck_cutting_rate:'+neck_cutting_rate);
           if (style_name!=='') {
             console.log('not empty');
           $.ajax({
               type : "POST",
               url: "<?php echo base_url(); ?>index.php/Inhouse_setting/style_update",
               dataType : "JSON",
               data : {style_id:style_id,style_name:style_name},
               success: function(data){
                 if (data==true) {
                   $('#Modal_Style_Edit').modal('hide');
                   display_Style_list();
                   display_style_name();
                   display_Style_Details();
                   alert('Succssfuly Updated');
                 }else{
                   console.log(data);
                   $('#Modal_Style_Edit').modal('hide');
                   alert("Style Name already Exist");
               }
             }
           });$("#form_edit_style").trigger('reset');
         }
           return false;
       });
       //get product size data for delete
       $('#show_style_name').on('click','.style_delete',function(){
           var style_id = $(this).data('style_id');

           // console.log(product_size_id);
           $('#Modal_Delete_Style').modal('show');
           //
           $('[name="style_id_delete"]').val(style_id);

       });

       //delete product's size

       $('#btn_delete_style').on('click',function(){
        var style_id=$('#style_id_delete').val();
        // console.log(style_id);
          $.ajax({
              type : "POST",
              url: "<?php echo base_url(); ?>index.php/Inhouse_setting/style_delete",
              dataType : "JSON",
              data : {style_id:style_id},
              success: function(data){
                $('[name="style_id_delete"]').val("");
                  $('#Modal_Delete_Style').modal('hide');
                  display_Style_list();
                  display_style_name();
                  display_Style_Details();
                  alert('Succssfuly Deleted');
              }
          });
          return false;
      });
      //function show all Style Details
          function display_Style_Details(){
             $.ajax({
                 type  : 'ajax',
                 url: "<?php echo base_url(); ?>index.php/Inhouse_setting/show_style_details",
                 async : true,
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
                         '<td class="a-center ">'+row+'</td>'+
                         '<td>'+data[i].style_name+'</td>'+
                         '<td>'+data[i].style_dtl_cutting_rate+'</td>'+
                         '<td>'+data[i].style_dtl_neck_cutting_rate+'</td>'+
                         '<div class="col-md-6">'+
                         '<td style="text-align:center;">'+
                         '<a href="javascript:void(0);"  class="btn btn-info btn-sm style_dtl_edit"  data-style_id="'+data[i].style_id+'" data-style_name="'+data[i].style_name+'" data-style_dtl_id="'+data[i].style_dtl_id+'" data-style_dtl_cutting_rate="'+data[i].style_dtl_cutting_rate+'" data-style_dtl_neck_cutting_rate="'+data[i].style_dtl_neck_cutting_rate+'" ><span class="glyphicon glyphicon-edit"></span></a>'+' '+
                         '<a href="javascript:void(0);" class="btn btn-danger btn-sm style_dtl_delete"  data-style_dtl_id="'+data[i].style_dtl_id+'"><span class="glyphicon glyphicon-trash"></span></a>'+
                         '</td>'+
                         '</div>'+
                         '</tr>';
                         row++;
                       }
                     }
                     $('#show_style_details').html(html);
                 }

             });
         }
         //function show all product name in product size
             function display_style_name(){
                $.ajax({
                    type  : 'ajax',
                    url: "<?php echo base_url(); ?>index.php/Inhouse_setting/show_style_name_for_dtl",
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        var i;
                        $("#show_style_name_for_dtl").empty();
                        for(i=0; i<data.length; i++){
                            var id = data[i]['style_id'];
                            var name = data[i]['style_name'];

                         $("#show_style_name_for_dtl").append("<option value='"+id+"'>"+name+"</option>");
                        }
                    }

                });
            }
         //Save style Details data to db
          $('#btn_save_style_dtl').on('click',function(){

              var style_id = $('#show_style_name_for_dtl').val();
              var cutting_rate = $('#cutting_rate').val();
              var neck_cutting_rate = $('#neck_cutting_rate').val();

              if (cutting_rate!=='' || neck_cutting_rate!=='')
              {
                $.ajax({
                  type : "POST",
                  url: "<?php echo base_url(); ?>index.php/Inhouse_setting/save_style_details",
                  dataType : "JSON",
                  data : {style_id:style_id,cutting_rate:cutting_rate,neck_cutting_rate:neck_cutting_rate},
                  success: function(data){
                    if (data==true) {
                      $('#Modal_Style_detail_Add').modal('hide');
                      display_Style_Details();
                      alert('Succssfuly Inserted');
                    }else {
                      $('#Modal_Style_detail_Add').modal('hide');
                      alert("Style already Exist");
                    }
                  }
                });$("#form_add_style_dtl").trigger('reset');
            }else {
              alert('Form Can not be Empty');
            }

              return false;
          });
          //get Style data for update record
          $('#show_style_details').on('click','.style_dtl_edit',function(){
              // var style_id = $(this).data('style_id');
              var style_name = $(this).data('style_name');
              var style_dtl_id = $(this).data('style_dtl_id');
              var cutting_rate = $(this).data('style_dtl_cutting_rate');
              var neck_cutting_rate = $(this).data('style_dtl_neck_cutting_rate');
              // console.log('P id: '+style_id,', style_name:'+style_name,', neck_cutting_rate:'+neck_cutting_rate);
              $('#Modal_Style_detail_edit').modal('show');
              // $('[name="style_id_edit"]').val(style_id);
              $('[name="style_name_disabled"]').val(style_name);
              $('[name="style_dtl_id_edit"]').val(style_dtl_id);
              $('[name="cutting_rate_edit"]').val(cutting_rate);
              $('[name="neck_cutting_rate_edit"]').val(neck_cutting_rate);

          });

          //update Style Details data to db
           $('#btn_update_style_dtl').on('click',function(){
                var style_dtl_id=$('#style_dtl_id_edit').val();
                var cutting_rate=$('#cutting_rate_edit').val();
                var neck_cutting_rate=$('#neck_cutting_rate_edit').val();
               console.log('style_dtl_id:'+style_dtl_id,'cutting_rate:'+cutting_rate,'neck_cutting_rate:'+neck_cutting_rate);
               if (cutting_rate!=='' || neck_cutting_rate!=='') {
                 console.log('not empty');
               $.ajax({
                   type : "POST",
                   url: "<?php echo base_url(); ?>index.php/Inhouse_setting/style_dtl_update",
                   dataType : "JSON",
                   data : {style_dtl_id:style_dtl_id,cutting_rate:cutting_rate,neck_cutting_rate:neck_cutting_rate},
                   success: function(data){
                     if (data==true) {
                       $('#Modal_Style_detail_edit').modal('hide');
                       display_Style_Details();
                       alert('Succssfuly Updated');
                     }
                 }
               });$("#form_edit_style").trigger('reset');
             }else {
               alert('Form Can not be Empty');
             }
               return false;
           });

           //get Style Details for delete record
           $('#show_style_details').on('click','.style_dtl_delete',function(){
               // var style_id = $(this).data('style_id');
               var style_dtl_id = $(this).data('style_dtl_id');
               // console.log('P id: '+style_id,', style_name:'+style_name,', neck_cutting_rate:'+neck_cutting_rate);
               $('#Modal_Style_detail_delete').modal('show');
               // $('[name="style_id_edit"]').val(style_id);
               $('[name="style_dtl_id_del"]').val(style_dtl_id);

           });

           //delete product's size

           $('#btn_delete_style_dtl').on('click',function(){
            var style_dtl_id=$('#style_dtl_id_del').val();
            // console.log(style_id);
              $.ajax({
                  type : "POST",
                  url: "<?php echo base_url(); ?>index.php/Inhouse_setting/style_dtl_delete",
                  dataType : "JSON",
                  data : {style_dtl_id:style_dtl_id},
                  success: function(data){
                      $('[name="style_dtl_id_del"]').val("");
                      $('#Modal_Style_detail_delete').modal('hide');
                      display_Style_Details();
                      alert('Succssfuly Deleted');
                  }
              });
              return false;
          });

    //function show all cutting man
        function display_cutting_man_list(){
           $.ajax({
               type  : 'ajax',
               url: "<?php echo base_url(); ?>index.php/Inhouse_setting/show_cutting_man_list",
               async : true,
               dataType : 'json',
               success : function(data){
                   var html = '';
                   var i;
                   var row=1;
                   var msg="No Data Found"
                   var user_designation = <?php echo json_encode($_SESSION['user_designation']) ?>;
                   var data_length=data.length;
                     if (data_length==0) {
                       html += '<strong class="a-center">'+msg+'</strong>';
                     }else {

                       for(i=0; i<data_length; i++){
                       // console.log(data[i]);
                       html += '<tr class="even pointer">'+
                       '<td class="a-center ">'+row+'</td>'+
                       '<td>'+data[i].cutting_man_name+'</td>'+
                       '<td>'+data[i].cutting_man_designation+'</td>'+
                       '<div class="col-md-6">'+
                       '<td style="text-align:center;">'+
                       '<a href="javascript:void(0);"  class="btn btn-info btn-sm cutting_man_edit"  data-cutting_man_id="'+data[i].cutting_man_id+'" data-cutting_man_name="'+data[i].cutting_man_name+'" data-cutting_man_designation="'+data[i].cutting_man_designation+'" ><span class="glyphicon glyphicon-edit"></span></a>'+' '+
                       '<a href="javascript:void(0);" class="btn btn-danger btn-sm cutting_man_delete"  data-cutting_man_id="'+data[i].cutting_man_id+'"><span class="glyphicon glyphicon-trash"></span></a>'+
                       '</td>'+
                       '</div>'+
                       '</tr>';
                       row++;
                     }

                   }
                   $('#show_cutting_man').html(html);
               }

           });
       }
     //Save Cutting man  Details data to db
      $('#btn_save_cutting_man').on('click',function(){

          var cutting_man_name = $('#cutting_man_name').val();
          var cutting_man_designation = $('#cutting_man_designation').val();

          if (cutting_man_name!=='' && cutting_man_designation!=='')
          {
            $.ajax({
              type : "POST",
              url: "<?php echo base_url(); ?>index.php/Inhouse_setting/save_cutting_man",
              dataType : "JSON",
              data : {cutting_man_name:cutting_man_name,cutting_man_designation:cutting_man_designation},
              success: function(data){
                  $('#Modal_Cutting_Man_Add').modal('hide');
                  display_cutting_man_list();
                  alert('Succssfuly Inserted');

              }
            });$("#form_add_cutting_man").trigger('reset');
        }else {
          alert('Form Can not be Empty');
        }

          return false;
      });
    //get cutting_mans for update record
    $('#show_cutting_man').on('click','.cutting_man_edit',function(){
        var cutting_man_id = $(this).data('cutting_man_id');
        var cutting_man_name = $(this).data('cutting_man_name');
        var cutting_man_designation = $(this).data('cutting_man_designation');
        var select="Select Option"
        var cutting="1. CUTTING"
        var cutting_val="cutting"
        var neck_cutting="2. NECK CUTTING"
        var neck_cutting_val="neck cutting"

        $('#Modal_Cutting_Man_Edit').modal('show');
        $('[name="cutting_man_id_edit"]').val(cutting_man_id);
        $('[name="cutting_man_name_edit"]').val(cutting_man_name);

          $("#cutting_man_designation_edit").empty();
        $.ajax({
          type : "POST",
          url: "<?php echo base_url(); ?>index.php/Inhouse_setting/show_cutting_man_designation",
          dataType : "JSON",
          data : {cutting_man_id:cutting_man_id},
          success: function(data){
            for(i=0; i<data.length; i++){
                var id = data[i]['cutting_man_id'];
                var designation = data[i]['cutting_man_designation'];
                var danger="text-danger";

             $("#cutting_man_designation_edit").prepend("<option  class='"+danger+"'>"+designation+"</option>");
             // $("#cutting_man_designation_edit").prepend("<option value='"+id+"' class='"+danger+"'>"+designation+"</option>");
            }
            $("#cutting_man_designation_edit").append("<option >"+select+"</option>");
            $("#cutting_man_designation_edit").append("<option value='"+cutting_val+"' >"+cutting+"</option>");
            $("#cutting_man_designation_edit").append("<option value='"+neck_cutting_val+"'>"+neck_cutting+"</option>");

          }
        });
    });
    //update Cutting man  Details data to db
     $('#btn_update_cutting_man').on('click',function(){

         var cutting_man_id = $('#cutting_man_id_edit').val();
         var cutting_man_name = $('#cutting_man_name_edit').val();
         var cutting_man_designation = $('#cutting_man_designation_edit').val();

         if (cutting_man_name!=='' && cutting_man_designation!=='')
         {
           $.ajax({
             type : "POST",
             url: "<?php echo base_url(); ?>index.php/Inhouse_setting/update_cutting_man",
             dataType : "JSON",
             data : {cutting_man_id:cutting_man_id,cutting_man_name:cutting_man_name,cutting_man_designation:cutting_man_designation},
             success: function(data){
                 $('#Modal_Cutting_Man_Edit').modal('hide');
                 display_cutting_man_list();
                 alert('Succssfuly Updated');

             }
           });$("#form_edit_cutting_man").trigger('reset');
       }else {
         alert('Form Can not be Empty');
       }

         return false;
     });
     //get cutting_mans for delete record
     $('#show_cutting_man').on('click','.cutting_man_delete',function(){
         var cutting_man_id = $(this).data('cutting_man_id');

         $('#Modal_Cutting_Man_Delete').modal('show');
         $('[name="cutting_man_id_del"]').val(cutting_man_id);

     });
     //delete Cutting man from db
      $('#btn_delete_cutting_man').on('click',function(){

          var cutting_man_id = $('#cutting_man_id_del').val();

          $.ajax({
              type : "POST",
              url: "<?php echo base_url(); ?>index.php/Inhouse_setting/cutting_man_delete",
              dataType : "JSON",
              data : {cutting_man_id:cutting_man_id},
              success: function(data){
                  $('[name="cutting_man_id_del"]').val("");
                  $('#Modal_Cutting_Man_Delete').modal('hide');
                  display_cutting_man_list();
                  alert('Succssfuly Deleted');
              }
          });
          return false;
      });
});

</script>
