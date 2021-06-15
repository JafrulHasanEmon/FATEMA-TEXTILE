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
                <h3>In-House Settings</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                    <span class="input-group-btn">
                      <!-- <button class="btn btn-default" type="button">Go!</button> -->
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Products</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal_Product_Add"><i class="fa fa-plus"></i></a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product Name</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody id="show_products_data">

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Product Sizes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal_Product_Size_Add"><i class="fa fa-plus"></i></a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product Name</th>
                          <th>Product Size</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody id="show_products_size_data">

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Styles</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal_Style_Add"><i class="fa fa-plus"></i></a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Style Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="show_style_name">

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Style Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal_Style_detail_Add"><i class="fa fa-plus"></i></a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Style Name</th>
                          <th>Cutting Rate</th>
                          <th>Neck Cutting Rate</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="show_style_details">

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cutting Man</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal_Cutting_Man_Add"><i class="fa fa-plus"></i></a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Cutting Man Name</th>
                          <th>Cutting Man Designation</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="show_cutting_man">

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


              <!-- /.modal product start-->
              <div class="modal fade" id="Modal_Product_Add">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>

                      <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Add Product</h4>
                    </div>
                    <div class="modal-body">
                      <form id="form_add_product" class="form-horizontal">

                      <div class="col-sm-12>">
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Name<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input  class="form-control col-md-7 col-xs-12" type="text" name="product_name" id="product_name" required="required">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" id="btn_save_product">Submit</button>
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
              <!-- /.product edit modal start-->
              <div class="modal fade" id="Modal_Product_Edit">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>

                      <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Product</h4>

                    </div>
                    <div class="modal-body">
                      <form id="form_product_edit" class="form-horizontal">
                      <div class="col-sm-12>">
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Name<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input  class="form-control col-md-7 col-xs-12" type="hidden" name="product_id" id="product_id_edit" required="required">
                            <input  class="form-control col-md-7 col-xs-12" type="text" name="product_name" id="product_name_edit" required="required">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" id="btn_update_product">Submit</button>
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
              <!--MODAL product DELETE-->
                 <form>
                    <div class="modal fade" id="Modal_Delete_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="hidden" name="product_id_delete" id="product_id_delete" class="form-control">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="button" type="submit" id="btn_delete_product" class="btn btn-primary">Yes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                <!--END product MODAL DELETE-->

              <!-- /.Modal_Product_Size_Add start-->
              <div class="modal fade" id="Modal_Product_Size_Add">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>

                      <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Add Product Size</h4>
                    </div>
                    <div class="modal-body">
                      <form id="form_add_product_size" class="form-horizontal">

                      <div class="col-sm-12>">
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Name<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="show_product_name">
                              <option>- Select -</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Size<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input  class="form-control col-md-7 col-xs-12" type="number" name="product_size" id="product_size" required="required">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" id="btn_save_Product_Size">Submit</button>
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
              <!-- /.Modal_Product_Size_Edit start-->
              <div class="modal fade" id="Modal_Product_Size_Edit">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>

                      <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Product Size</h4>
                    </div>
                    <div class="modal-body">
                      <form id="form_edit_product_size" class="form-horizontal">

                      <div class="col-sm-12>">
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Name<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input  class="form-control col-md-7 col-xs-12" type="text" name="product_name_edit" required="required" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Size<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input  class="form-control col-md-7 col-xs-12" type="hidden" name="product_id_edit_size" id="product_id_edit_size" required="required">
                            <input  class="form-control col-md-7 col-xs-12" type="hidden" name="product_size_id_edit" id="product_size_id_edit" required="required">
                            <input  class="form-control col-md-7 col-xs-12" type="number" name="product_size_value_edit" id="product_size_value_edit" required="required">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" id="btn_update_Product_Size">Submit</button>
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


              <!--start MODAL product size DELETE-->
                 <form>
                    <div class="modal fade" id="Modal_Delete_Product_Size" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document" style="width:400px;">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-trash"></span> Delete Product Size</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                               <strong style="text-align: center;">Are you sure to delete this record?</strong>
                          </div>
                          <div class="modal-footer">
                            <input type="hidden" name="product_size_id_delete" id="product_size_id_delete" class="form-control">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="button" type="submit" id="btn_delete_product_size" class="btn btn-primary">Yes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                <!--END product size MODAL DELETE-->

                <!-- /.modal Modal_Style_Add  start-->
                <div class="modal fade" id="Modal_Style_Add">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Add Style</h4>
                      </div>
                      <div class="modal-body">
                        <form id="form_add_style" class="form-horizontal">

                        <div class="col-sm-12>">
                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Style Name<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" id="style_name" required="required">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success" id="btn_save_style">Submit</button>
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

                <!-- /.modal Style edit  start-->
                <div class="modal fade" id="Modal_Style_Edit">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Style</h4>
                      </div>
                      <div class="modal-body">
                        <form id="form_edit_style" class="form-horizontal">

                          <input  class="form-control col-md-7 col-xs-12" type="hidden" id="style_id_edit" name="style_id_edit" required="required">
                        <div class="col-sm-12>">
                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Style Name<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" id="style_name_edit" name="style_name_edit" required="required">
                            </div>
                          </div>


                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success" id="btn_update_style">Submit</button>
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

                <!--start MODAL style DELETE-->
                   <form>
                      <div class="modal fade" id="Modal_Delete_Style" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="width:400px;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-trash"></span> Delete Style</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                 <strong style="text-align: center;">Are you sure to delete this record?</strong>
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="style_id_delete" id="style_id_delete" class="form-control">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                              <button type="button" type="submit" id="btn_delete_style" class="btn btn-primary">Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      </form>
                  <!--END product size MODAL DELETE-->


                  <!-- /.modal Modal_Style_detail  add  start-->
                  <div class="modal fade" id="Modal_Style_detail_Add">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>

                          <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Add Style Details</h4>
                        </div>
                        <div class="modal-body">
                          <form id="form_add_style_dtl" class="form-horizontal">

                          <div class="col-sm-12>">
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Style Name<span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="show_style_name_for_dtl">
                                  <option>- Select -</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cutting Rate</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" type="number" id="cutting_rate" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Neck Cutting Rate</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" type="number" id="neck_cutting_rate" >
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-success" id="btn_save_style_dtl">Submit</button>
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

                  <!-- /.modal Modal_Style_detail  add  start-->
                  <div class="modal fade" id="Modal_Style_detail_edit">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>

                          <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Style Details</h4>
                        </div>
                        <div class="modal-body">
                          <form id="form_edit_style_dtl" class="form-horizontal">

                          <div class="col-sm-12>">
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Style Name<span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" type="text" name="style_name_disabled"  disabled>
                                <input  class="form-control col-md-7 col-xs-12" type="hidden" name="style_dtl_id_edit" id="style_dtl_id_edit"  disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cutting Rate</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" type="number" name="cutting_rate_edit" id="cutting_rate_edit" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Neck Cutting Rate</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" type="number" name="neck_cutting_rate_edit" id="neck_cutting_rate_edit" >
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-success" id="btn_update_style_dtl">Submit</button>
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

                  <!--MODAL style details DELETE-->
                     <form>
                        <div class="modal fade" id="Modal_Style_detail_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document" style="width:400px;">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-trash"></span> Delete Style Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                   <strong style="text-align: center;">Are you sure to delete this record?</strong>
                              </div>
                              <div class="modal-footer">
                                <input type="hidden" name="style_dtl_id_del" id="style_dtl_id_del" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="button" type="submit" id="btn_delete_style_dtl" class="btn btn-primary">Yes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
                    <!--END product MODAL DELETE-->

                    <!-- /.modal Modal_Style_detail  add  start-->
                    <div class="modal fade" id="Modal_Cutting_Man_Add">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>

                            <h4 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Add Cutting Man</h4>
                          </div>
                          <div class="modal-body">
                            <form id="form_add_cutting_man" class="form-horizontal">

                            <div class="col-sm-12>">
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cutting Man Designation<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control" id="cutting_man_designation">
                                    <option> Select Option</option>
                                    <option value="cutting">1. CUTTING</option>
                                    <option value="neck cutting">2. NECK CUTTING</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cutting Man Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input  class="form-control col-md-7 col-xs-12" type="text" id="cutting_man_name" required="required">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success" id="btn_save_cutting_man">Submit</button>
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
                    <!-- /.modal Modal_Style_detail  add  start-->
                    <div class="modal fade" id="Modal_Cutting_Man_Edit">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>

                            <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Cutting Man</h4>
                          </div>
                          <div class="modal-body">
                            <form id="form_edit_cutting_man" class="form-horizontal">

                            <div class="col-sm-12>">
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cutting Man Designation<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control" name="cutting_man_designation_edit" id="cutting_man_designation_edit">

                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cutting Man Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input  class="form-control col-md-7 col-xs-12" type="hidden" name="cutting_man_id_edit" id="cutting_man_id_edit" required="required">
                                  <input  class="form-control col-md-7 col-xs-12" type="text" name="cutting_man_name_edit" id="cutting_man_name_edit" required="required">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success" id="btn_update_cutting_man">Submit</button>
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

            <!--MODAL style details DELETE-->
               <form>
                  <div class="modal fade" id="Modal_Cutting_Man_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="width:400px;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-trash"></span> Delete Cutting Man</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <strong style="text-align: center;">Are you sure to delete this record?</strong>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="cutting_man_id_del" id="cutting_man_id_del" class="form-control">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                          <button type="button" type="submit" id="btn_delete_cutting_man" class="btn btn-primary">Yes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
              <!--END product MODAL DELETE-->





              <div class="clearfix"></div>


            </div>
          </div>

        </div>
        <!-- /page content -->
        <?php $this->load->view('layout/footer') ?>

      </div>
    </div>
    <?php $this->load->view('layout/tail') ?>

  </body>

  <?php $this->load->view('js/js_inhouse_setting') ?>


</html>
