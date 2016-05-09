<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
   <div class="box">
   <div id = "loader" style="text-align: center"><img src="<?php echo base_url(); ?>/assets/css/page-loader.gif" width="100px" height="100px"></div>

    <div class="box-header">
      <h3 class="box-title">Notify</h3>
      <div class="box-tools">
       <form method="post">
        <div class="input-group" style="width: 150px;">
          <input type="text" name="search" class="form-control input-sm pull-right" placeholder="Search">
          <div class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
          </div>
        </div>
        </form>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody><tr>
         
          <th>ลำดับ</th>
          <th>วันที่และเวลา</th>
          <th>ข้อความ</th>
          <th>จาก</th>
           <th>ถึง</th>
          <th></th>
        </tr>

       <?php
        $i = 0;
        foreach ($data as $data) {
          $i++;
          echo "<tr>";
          
          echo "<td>" . $i . "</td>";
          echo "<td>" . $data->datetime . "</td>";
          echo "<td>" . $data->comment . "</td>";
          echo "<td>" . $data->username_s. "</td>";
           echo "<td>" . $data->username_d. "</td>";
          
         
           
          echo '<td><div class="btn-group"><a class="btn btn-danger" data-toggle="tooltip" title="Remove Application" href="'. site_url('/useraccount/deleteNotify/'.$data->notify_id).'"><i class="fa fa-trash-o"></i></a></div></td>';
          echo "</tr>";
        }
        ?>
   </table>
      <div class="modal fade" id="showdata" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-yellow">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><i class="fa  fa-user"></i>แจ้งเตือนฉุกเฉิน</h4>
            </div>
            <form id="form_app" method="post" accept-charset="utf-8">
              <div class="modal-body">
                <div id="place-alert-model"></div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Datetime :</span>
                    <input name="datetime" id="datetime" type="text" class="form-control" placeholder="Datetime">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Comment :</span>
                    <input name="comment" id="comment" type="text" class="form-control" placeholder="Comment">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">FriendList :</span>
                    <input name="friendList" id="friendList" type="text" class="form-control" placeholder="FriendList">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Targetuser:</span>
                    <input name="targetuser" id="targetuser" type="text" class="form-control" placeholder="Targetuser">
                  </div>
                </div>
                <!-- /.modal-content -->
            </form>
          </div>
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
</section>
<script type="text/javascript">
 function getData(id) 
 {
  $.ajax({
    url: "<?php echo site_url('/useraccount/notify'); ?>",
    type: 'POST',
    dataType: 'json',
    crossDomain: true,
    data: {id: id},
  })
  .done(function(data) {
    $('#notify_id').val(data.notify_id);
    $('#datetime ').val(data.datetime );
    $('#user_account_user_account_id').val(data.user_account_user_account_id);
    $('#target_user_account_id').val(data.target_user_account_id);
    $('#showdata').modal('show');
  })
  .fail(function() {
    $('#place-alert').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>Internal Server Error!</div>');
  })
}




$(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass: 'iradio_flat-blue'
        });

      });




</script>