
$(document).ready(function(){
    display_list();
    $('#datatable_dcr').DataTable();

  $("#option").change(function(){

    var option = $( "#option" ).val();
    console.log(option);
    if (option='cost') {
    // $("#cost_name").hide();
    $("#dep_name").hide();
  }else {
    console.log(1);
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
               for(i=0; i<data.length; i++){
                 // console.log(data[i]);
                   html += '<tr>'+
                           '<td>'+data[i].dcr_date+'</td>'+
                           '<td>'+data[i].dcr_deposit_name+'</td>'+
                           '<td>'+data[i].dcr_cost_name+'</td>'+
                           '<td>'+data[i].dcr_amount+'</td>'+
                           // '<td style="text-align:right;">'+
                           //     '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_code="'+data[i].product_code+'" data-product_name="'+data[i].product_name+'" data-price="'+data[i].product_price+'">Edit</a>'+' '+
                           //     '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="'+data[i].product_code+'">Delete</a>'+
                           // '</td>'+
                           '</tr>';
               }
               $('#show_data').html(html);
           }

       });
   }

//Save product
    $('#btn_save').on('click',function(){
        var date = $('#date').val();
        var deposit_name = $('#deposit_name').val();
        var cost_name     = $('#cost_name').val();
        var amount     = $('#amount').val();

        if (date!=='' && (deposit_name!=='' ||cost_name!=='') && amount!=='') {
          console.log('not empty');
        $.ajax({
            type : "POST",
            url: "<?php echo base_url(); ?>index.php/Deposit_Cost/save",
            dataType : "JSON",
            data : {date:date , deposit_name:deposit_name, cost_name:cost_name,amount:amount},
            success: function(data){
                // $('[name="product_code"]').val("");
                // $('[name="product_name"]').val("");
                // $('[name="price"]').val("");
                // $('#Modal_Add').modal('hide');
                // show_product();
                display_list();
                $("#form").trigger('reset');
                alert('Succssfuly Inserted',1000);

            }
        });
      }else {
        console.log('empty');
        alert('Data Can not be Empty');
      }

        return false;
    });
});
