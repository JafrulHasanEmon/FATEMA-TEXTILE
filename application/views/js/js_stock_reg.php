
<script type="text/javascript">
// SELECT sum(dcr_amount) total_tran,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="d") total_deposit,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="c") total_cost,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_date=CURDATE()) daily_tran,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="d" and dcr_date=CURDATE()) total_daily_deposit,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="c" and dcr_date=CURDATE()) total_daily_cost from deposit_cost_register
$(document).ready(function(){

display_stock_data();
    //function show all Style Details
        function display_stock_data(){
           $.ajax({
               type  : 'ajax',
               url: "<?php echo base_url(); ?>index.php/Stock/show_stock_data",
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
                       '<td style="text-align:center;">'+row+'</td>'+
                       '<td style="text-align:center;">'+data[i].product_name+'</td>'+
                       '<td style="text-align:center;">'+data[i].product_size_value+'</td>'+
                       '<td style="text-align:center;">'+data[i].style_name+'</td>'+
                       '<td style="text-align:center;">'+data[i].stock_previous_dozen+'</td>'+
                       '<td style="text-align:center;">'+data[i].stock_previous_piece+'</td>'+
                       '<td style="text-align:center;">'+data[i].stock_cutting_dozen+'</td>'+
                       '<td style="text-align:center;">'+data[i].stock_cutting_piece+'</td>'+
                       '<td style="text-align:center;">'+data[i].stock_total_sale_dozen+'</td>'+
                       '<td style="text-align:center;">'+data[i].stock_total_sale_piece+'</td>'+
                       '<td style="text-align:center;">'+data[i].stock_current_dozen+'</td>'+
                       '<td style="text-align:center;">'+data[i].stock_current_piece+'</td>'+
                       '</tr>';
                       row++;
                     }
                   }
                   $('#show_stock_data').html(html);

                   if ( $.fn.dataTable.isDataTable( '#datatable_stock' ) ) {
                       table = $('#datatable_stock').DataTable();
                       fixedHeader:true;
                   }
                   else {
                       table = $('#datatable_stock').DataTable( {
                           ordering: false,
                           fixedHeader:true
                           // responsive: true
                       } );
                   }



               }

           });
       }

});
</script>
