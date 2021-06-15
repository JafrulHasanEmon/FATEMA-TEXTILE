<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layout/head') ?>

  <body class="nav-md">
    <?php $this->load->view('layout/header_sidebar') ?>


        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count" id="tran_history">

          </div>
          <!-- /top tiles -->


          <br />



        </div>
        <!-- /page content -->

        <?php $this->load->view('layout/footer') ?>

      </div>
    </div>
    <?php $this->load->view('layout/tail') ?>

  </body>

  <?php $this->load->view('js/js_dashboard') ?>


</html>
