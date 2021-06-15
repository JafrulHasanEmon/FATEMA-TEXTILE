
<script type="text/javascript">
// SELECT sum(dcr_amount) total_tran,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="d") total_deposit,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="c") total_cost,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_date=CURDATE()) daily_tran,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="d" and dcr_date=CURDATE()) total_daily_deposit,(SELECT sum(dcr_amount) from deposit_cost_register where dcr_flag="c" and dcr_date=CURDATE()) total_daily_cost from deposit_cost_register
$(document).ready(function(){
  show_daily_costing();



function show_daily_costing() {
  $.ajax({
      type  : 'ajax',
      url: "<?php echo base_url(); ?>index.php/Dashboard/show_daily_costing",
      async : true,
      dataType : 'json',
      success : function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++){
            // console.log(data[i]);
              // html += '<h4>'+data[i].total_amount+'</h4>';
              html +=   '<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">'+
                          '<span class="count_top"><i class="fa fa-money"></i> Total Transaction</span>'+
                          '<div class="count">'+data[i].total_tran+'<span>৳</span></div>'+
                          // '<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>'+
                        '</div>'+

                        '<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">'+
                          '<span class="count_top"><i class="fa fa-money"></i> Total Deposit</span>'+
                          '<div class="count">'+data[i].total_deposit+'<span>৳</span></div>'+
                          // '<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>'+
                        '</div>'+
                        '<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">'+
                          '<span class="count_top"><i class="fa fa-money"></i> Total Cost</span>'+
                          '<div class="count">'+data[i].total_cost+'<span>৳</span></div>'+
                          // '<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>'+
                        '</div>'+
                        // '<br />'+
                        '<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">'+
                          '<span class="count_top"><i class="fa fa-money"></i> Daily Transaction</span>'+
                            '<div class="count">'+data[i].daily_tran+'<span>৳</span></div>'+
                          // '<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>'+
                        '</div>'+
                        '<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">'+
                          '<span class="count_top"><i class="fa fa-money"></i> Daily Deposit</span>'+
                          '<div class="count">'+data[i].total_daily_deposit+'<span>৳</span></div>'+
                          // '<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>'+
                        '</div>'+
                        '<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">'+
                          '<span class="count_top"><i class="fa fa-money"></i> Daily Cost</span>'+
                          '<div class="count">'+data[i].total_daily_cost+'<span>৳</span></div>'+
                          // '<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>'+
                        '</div>';
          }
          $('#tran_history').html(html);
      }

  });
}
});
</script>
