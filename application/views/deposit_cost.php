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
                <h3>Deposit And Cost Register</h3>
              </div>
              <div class="title_right" id="total_amount">
                <h3>Deposit And Cost Register</h3>
              </div>

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
                      <label>Filter</label>
                      <select class="form-control" id="dc_group">
                        <option>All</option>
                        <option value="dcr">DCR</option>
                        <option value="ddr">DDR</option>
                      </select>
                    </div>
                  </div>
                </ul>
                <ul class="nav navbar-left panel_toolbox" id="ul_dc_sub_group">
                  <div class="form-group">
                    <div class="col-md-12">
                      <label>Sub Filter</label>
                      <select class="form-control" id="dc_sub_group">
                        <option>All</option>
                        <option value="d">Deposit</option>
                        <option value="c">Cost</option>
                      </select>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-filter"></span>Filter</button> -->
                  </div>
                </ul>
                <ul class="nav navbar-right panel_toolbox">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="glyphicon glyphicon-plus"></span>Add Data</button>
                  </div>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="datatable_dcr" class="table table-striped jambo_table bulk_action" style="width:100%">
                  <thead>
                    <tr class="headings">
                      <th>SR</th>
                      <th>Date</th>
                      <th>Deposit Name</th>
                      <th>Cost Name</th>
                      <th>Amount</th>
                      <th>Action</th>

                    </tr>
                  </thead>


                  <tbody id="show_data">

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

              <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Add Deposit or Cost Data </h4>
            </div>
              <form id="form" class="form-horizontal">

              <div class="col-sm-12>">
                <div class="modal-body">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Options<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" id="option">
                      <option>Choose option</option>
                      <option value="d">Deposit</option>
                      <option value="c">Cost</option>
                    </select>
                  </div>
                </div>

              <div class="form-group" >
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" id="date" required="required" class="form-control col-md-7 col-xs-12" disabled>
                </div>
              </div>
              <div class="form-group" id="dep_name">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Deposit Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="deposit_name" name="deposit_name" required="required" class="form-control col-md-7 col-xs-12" disabled>
                </div>
              </div>
              <div class="form-group" id="cost">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cost Name<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" type="text" id="cost_name" name="cost_name" required="required" disabled>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Amount<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input   class="form-control col-md-7 col-xs-12" type="number" name="amount" id="amount" required="required" disabled>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                  <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                  <button type="submit" class="btn btn-success" id="btn_save">Submit</button>
                </div>
              </div>
              </div>

          </form>
        </div>

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

              <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Add Deposit or Cost Data </h4>
            </div>
            <div class="modal-body">
              <form id="form_edit" class="form-horizontal">
                <input type="hidden" name="dcr_id" id="dcr_id" value="">

              <div class="col-sm-12>">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Options<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" id="option_edit" name="dcr_flag">
                      <option>Choose option</option>
                      <option value="d">Deposit</option>
                      <option value="c">Cost</option>
                    </select>
                  </div>
                </div>

              <div class="form-group" >
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="date_edit" id="date_edit" required="required" class="form-control col-md-7 col-xs-12" disabled>
                </div>
              </div>
              <div class="form-group" id="div_deposit_name_edit">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Deposit Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="deposit_name_edit" name="deposit_name_edit" required="required" class="form-control col-md-7 col-xs-12" disabled>
                </div>
              </div>
              <div class="form-group" id="div_cost_name_edit">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cost Name<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" type="text" id="cost_name_edit" name="cost_name_edit" required="required" disabled>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Amount<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  class="form-control col-md-7 col-xs-12" type="number" name="amount_edit" id="amount_edit" required="required" disabled>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                  <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                  <button type="submit" class="btn btn-success" id="btn_update">Submit</button>
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

  <?php $this->load->view('js/js_dep_cost') ?>


</html>
