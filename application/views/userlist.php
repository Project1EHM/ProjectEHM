<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
   <div class="box">
<div id = "loader" style="text-align: center"><img src="<?php echo base_url(); ?>/assets/css/page-loader.gif" width="100px" height="100px"></div>
    <div class="box-header">
      <h3 class="box-title">User Account</h3>
      <div class="box-tools">
       <form method="post">
        <div class="input-group" style="width: 180px;">
         
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
          <th></th>
          <th>ลำดับ</th>
          <th>ชื่อผู้ใช้</th>
          <th>ชื่อ</th>
          <th>นามสกุล</th>
          <th>อีเมลล์</th>
          <th>โรค</th>
          <th>ประวัติการแพ้ยา</th>
          <th>สิทธิการรักษา</th>
          <th>แพทย์ประจำตัว</th>
          <th>โรงพยาบาลประจำ</th>
          <th>รูป</th>
          <th></th>
        </tr>
        <?php
        $i = 0;
        foreach ($data as $data) {
          $i++;
          echo "<tr>";
          echo "<td><input type=\"checkbox\"></td>";
          echo "<td>" . $i . "</td>";
          echo "<td>" . $data->username . "</td>";
          echo "<td>" . $data->firstname . "</td>";
          echo "<td>" . $data->lastname . "</td>";
          echo "<td>" . $data->email . "</td>";
          echo "<td>" . $data->disease . "</td>";
          echo "<td>" . $data->drug_allergy . "</td>";
          echo "<td>" . $data->treatment . "</td>";
          echo "<td>" . $data->personaldoctor. "</td>";
          echo "<td>" . $data->hospital. "</td>";
          echo "<td><img src='" . base_url() . '../HelperSenior/' . $data->images . "' width='100px' height='100px'></td>";
          echo '<td><div class="btn-group"><button class="btn btn-info" data-toggle="tooltip" title="Edit User" onclick="getData(\''.$data->user_account_id.'\')"><i class="fa fa-pencil-square-o"></i></button><a class="btn btn-danger" data-toggle="tooltip" title="Remove Application" href="'. site_url('/useraccount/deleteAccount/'.$data->user_account_id).'"><i class="fa fa-trash-o"></i></a></div></td>';
          echo "</tr>";
        }
        ?>

      </table>
      <div class="modal fade" id="showdata" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-yellow">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><i class="fa  fa-user"></i> จัดการผู้ใช้</h4>
            </div>
            <form id="form_app" method="post" accept-charset="utf-8">
              <div class="modal-body">
                <div id="place-alert-model"></div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">UserName :</span>
                    <input name="username" id="username" type="text" class="form-control" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Frist Name :</span>
                    <input name="firstname" id="firstname" type="text" class="form-control" placeholder="Firstname">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Last Name :</span>
                    <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Lastname">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Email :</span>
                    <input name="email" id="email" type="text" class="form-control" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Disease :</span>
                    <input name="disease" id="disease" type="text" class="form-control" placeholder="Disease">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">drug_allergy :</span>
                    <input name="drug_allergy" id="drug_allergy" type="text" class="form-control" placeholder="drug_allergy">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Treatment :</span>
                    <input name="treatment" id="treatment" type="text" class="form-control" placeholder="Treatment">
                  </div>
                </div>
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Personaldoctor:</span>
                    <input name="personaldoctor" id="Personaldoctor" type="text" class="form-control" placeholder="Personaldoctor">
                  </div>
                </div>
                 <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Hospital :</span>
                    <input name="hospital" id="hospital" type="text" class="form-control" placeholder="Hospital">
                  </div>
                </div>


                <div class="modal-footer clearfix">
                  <input type="hidden" id="user_account_id" value="">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> ยกเลิก</button>
                  <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i> บันทึก</button>
                </div>
              </div><!-- /.modal-content -->
            </form>
          </div>
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div><!-- /.box-body -->

  </div>
</section>
<script type="text/javascript">
 function getData(id) 
 {
  $.ajax({
    url: "<?php echo site_url('/useraccount/getuser'); ?>",
    type: 'POST',
    dataType: 'json',
    crossDomain: true,
    data: {id: id},
  })
  .done(function(data) {
    $('#username').val(data.username);
    $('#firstname').val(data.firstname);
    $('#lastname').val(data.lastname);
    $('#email').val(data.email);
    $('#disease').val(data.disease);
    $('#drug_allergy').val(data.drug_allergy);
    $('#treatment').val(data.treatment);
    $('#personaldoctor').val(data.personaldoctor);
    $('#hospital').val(data.hospital);
    $('#user_account_id').val(data.user_account_id);
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

