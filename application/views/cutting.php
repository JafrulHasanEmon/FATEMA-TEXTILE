<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layout/head') ?>

  <body class="nav-md">
    <?php $this->load->view('layout/header_sidebar') ?>



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Cutting Register</h3>
              </div>
              <!-- <div class="title_right" id="total_amount">
                <h3>Deposit And Cost Register</h3>
              </div> -->

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" >
              <div class="x_title">
                <ul class="nav navbar-left panel_toolbox" >
                  <div class="form-group">
                    <div class="col-md-12">
                      <label>Add Filters</label>
                      <select class="form-control" id="Filters">
                        <option>Select option</option>
                        <option id="date_option" value="date" disabled>Date</option>
                        <option id="prd_name_option" value="prd_name">Product Name</option>
                        <option id="products_size_option" value="prd_size">Product Size</option>
                        <option id="style_name_option" value="style_name">Style Name</option>
                        <option id="cutting_man_option" value="cutting_man">Cutting Man</option>
                      </select>
                    </div>
                  </div>
                </ul>
                <ul class="nav navbar-left panel_toolbox" id="Date_ui">
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" id="filter_date" required="required" class="form-control">
                  </div>
                </ul>
                <ul class="nav navbar-left panel_toolbox" id="products_name_filter_ui">
                  <div class="form-group">
                    <label>Product Name</label>
                    <select class="form-control" id="products_name_filter" required="required" >
                      <option value="">Select Product Name</option>

                    </select>
                  </div>
                </ul>
                <ul class="nav navbar-left panel_toolbox" id="products_size_filter_ui">
                  <div class="form-group">
                    <label>Product Size</label>
                    <select class="form-control" id="products_size_filter" required="required" >
                      <option value="">Select Product Size</option>

                    </select>
                  </div>
                </ul>
                <ul class="nav navbar-left panel_toolbox" id="style_name_filter_ui">
                  <div class="form-group">
                    <label>Style Name</label>
                    <select class="form-control" id="style_name_filter" required="required" >
                      <option value="">Select Style Name</option>

                    </select>
                  </div>
                </ul>
                <ul class="nav navbar-left panel_toolbox" id="cutting_man_filter_ui">
                  <div class="form-group">
                    <label>Cutting Man</label>
                    <select class="form-control" id="cutting_man_filter" required="required" >
                      <option value="">Select Cutting Man Name</option>

                    </select>
                  </div>
                </ul>
                <ul class="nav navbar-left panel_toolbox" style="padding:2%;">
                  <div class="form-group">
                    <button type="submit" class="btn btn-success" id="filter_submit"><span class="fa fa-filter"></span> Filter</button>
                    <button type="submit" class="btn btn-warning" id="filter_clear"><span class="fa fa-refresh"></span> Refresh</button>
                  </div>
                </ul>
                <ul class="nav navbar-right panel_toolbox" style="padding:2%;">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="glyphicon glyphicon-plus"></span>Add Data</button>
                  </div>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="datatable_cutting" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr class="headings" >
                      <th rowspan="2" style="padding:20px;">SR</th>
                      <th rowspan="2" style="text-align:center;padding:20px;">Date</th>
                      <th rowspan="2" style="padding:20px;">Product Name</th>
                      <th rowspan="2" style="padding:20px;">Product Size</th>
                      <th rowspan="2" style="padding:20px;">Style Name</th>
                      <th rowspan="2" style="padding:20px;">Cutting Man</th>
                      <th colspan="2" style="text-align:center;">Quantity</th>
                      <th rowspan="2" style="padding:20px;">Action</th>
                    </tr>
                    <tr>
                      <th >Dozen</th>
                      <th>Piece</th>
                    </tr>
                  </thead>


                  <tbody id="show_cutting_data">

                  </tbody>
                </table>
              </div >
            </div>
          </div>


          <!-- modal starts  -->
      <div class="modal fade" id="Modal_Add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>

              <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Add Cutting Data </h4>
            </div>
            <div class="modal-body">
              <form id="form_add_cutting" class="form-horizontal">

              <div class="col-sm-12>">
                <div class="form-group" >
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" id="date" required="required" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" id="products_name" required="required" >
                      <option value="">Select Product Name</option>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Size<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" id="product_sizes" disabled required="required" >
                      <option value="">Select Product Name First</option>
                    </select>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Style name<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" id="style_names" required="required" >
                      <option value="">Select Style Name</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cutting Man<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" id="cutting_mans" required>
                      <option value="">Select Cutting Man </option>
                    </select>
                  </div>
                </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Dozen<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input   class="form-control col-md-7 col-xs-12" type="number"  id="dozen" >
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Piece<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input   class="form-control col-md-7 col-xs-12" type="number" min="1" max="11" id="piece" >
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                  <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                  <button type="submit" class="btn btn-success" id="btn_save_cutting">Submit</button>
                </div>
              </div>
              </div>
          </div>


          </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal end-->
          <!-- modal starts  -->

          <div class="modal fade" id="Modal_Edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

                  <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Cutting Data </h4>
                </div>
                <div class="modal-body">
                  <form id="form_edit_cutting" class="form-horizontal">
                  <!-- <form id="form_edit_cutting" class="form-horizontal" action="<?php echo base_url(); ?>index.php/Cutting_reg/cutting_update" method="post"> -->

                    <input type="hidden" name="cutting_register_id_edit" id="cutting_register_id_edit" required="required" class="form-control col-md-7 col-xs-12" >
                  <div class="col-sm-12>">
                    <div class="form-group" >
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date" name="date_edit" id="date_edit" required="required" class="form-control col-md-7 col-xs-12" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- <select class="form-control" name="product_name_edit" id="product_name_edit" required="required" disabled>
                          <option value="">Select Product Name</option>

                        </select> -->
                        <input   class="form-control col-md-7 col-xs-12" type="hidden" id="product_id_edit" disabled>
                        <input   class="form-control col-md-7 col-xs-12" type="text" id="product_name_edit" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Size<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- <select class="form-control" name="product_sizes_edit" id="product_sizes_edit" required="required" disabled>
                          <option value="">Select Product Name First</option>
                        </select> -->
                        <input   class="form-control col-md-7 col-xs-12" type="hidden" id="product_size_id_edit" disabled>
                        <input   class="form-control col-md-7 col-xs-12" type="text" id="product_sizes_edit" disabled>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Style name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- <select class="form-control" name="style_name_edit" id="style_name_edit" required="required" disabled>
                          <option value="">Select Style Name</option>
                        </select> -->
                        <input   class="form-control col-md-7 col-xs-12" type="hidden" id="style_id_edit" disabled>
                        <input   class="form-control col-md-7 col-xs-12" type="text" id="style_name_edit" disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cutting Man<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="cutting_man_edit" id="cutting_man_edit" required>
                          <option value="">Select Cutting Man </option>
                        </select>
                        <!-- <input   class="form-control col-md-7 col-xs-12" type="text" id="cutting_man_edit" disabled> -->
                      </div>
                    </div>

                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Dozen<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input   class="form-control col-md-7 col-xs-12" type="number"  name="dozen_edit" id="dozen_edit" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Piece<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input   class="form-control col-md-7 col-xs-12" type="number" min="0" max="11" id="piece_edit" name="piece_edit">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                      <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                      <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                      <button type="submit" class="btn btn-success" id="btn_update_cutting">Submit</button>
                    </div>
                  </div>
                  </div>
              </div>


              </form>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal end-->

      <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document" style="width:400px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-trash"></span> Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong style="text-align: center;">Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="dcr_delete_id" id="dcr_delete_id" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->


        </div>

        <!-- /page content -->
        <?php $this->load->view('layout/footer') ?>

      </div>
    </div>
    <?php $this->load->view('layout/tail') ?>

  </body>

  <?php $this->load->view('js/js_cutting_reg') ?>


</html>
