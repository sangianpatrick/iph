<!-- Page Content -->
<?php $this->load->view('backend/head')?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $page;?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata('operator') === 'success_add') { ?>
                        <div class="alert alert-success alert-dismissable" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>The new operator has been successfully added.</strong>
                        </div>
                        <?php }?>
                        <?php if($this->session->flashdata('operator') === 'success_up') { ?>
                        <div class="alert alert-success alert-dismissable" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>The operator's info has been successfully updateded.</strong>
                        </div>
                        <?php }?>
                        <?php if($this->session->flashdata('operator') === 'success_chg') { ?>
                        <div class="alert alert-warning alert-dismissable" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>The operator's password has been succesfully reset to default. Please, notify the related person.</strong>
                        </div>
                        <?php }?>
                        <?php if($this->session->flashdata('operator') === 'success_rm') { ?>
                        <div class="alert alert-danger alert-dismissable" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>The operator has been succesfully inactivated. Please, notify the related person.</strong>
                        </div>
                        <?php }?>
                        <div>
                            <button class="btn btn-primary" onclick="operator_create_form();"><i class="fa fa-plus-circle"></i> Operator</button><br><br>
                        
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Operator
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="op_table">
                                        <thead>
                                            <tr>
                                                <th width="100">Employee ID</th>
                                                <th width="120">Name</th>
                                                <th width="70">Gender</th>
                                                <th width="100">Phone</th>
                                                <th width="130">PDoB</th>
                                                <th>Address</th>
                                                <th width="120">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($operator as  $value) {?>
                                            <tr>
                                                <td><?php echo $value->iu_emp_num;?></td>
                                                <td><?php echo $value->iu_lastname.', '.$value->iu_firstname;?></td>
                                                <td><?php echo ($value->iu_gender==='M'?"Male":"Female");?></td>
                                                <td><?php echo $value->iu_phone;?></td>
                                                <td><?php echo $value->iu_pob.', '.$value->iu_dob;?></td>
                                                <td><?php echo $value->iu_address;?></td>
                                                <td align="center">
                                                    <button onclick="operator_chg_pass('<?php echo $value->iu_detail_id;?>','<?php echo $value->iu_firstname;?>','<?php echo $value->iu_lastname;?>');" class="btn btn-info btn-circle"><i class="fa fa-gear"></i></button>
                                                    <button onclick="operator_update_form('<?php echo $value->iu_detail_id;?>','<?php echo $value->iu_firstname;?>','<?php echo $value->iu_lastname;?>','<?php echo $value->iu_gender;?>','<?php echo $value->iu_dob;?>','<?php echo $value->iu_pob;?>','<?php echo $value->iu_phone;?>','<?php echo $value->iu_address;?>');" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></button>
                                                    <button onclick="operator_removal('<?php echo $value->iu_detail_id;?>','<?php echo $value->iu_firstname;?>','<?php echo $value->iu_lastname;?>');" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php $this->load->view('backend/foot')?>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,  
        });
        $('#op_table').DataTable({
            responsive: true
        });
    });

    function operator_create_form()
    {
         $('#modal_form')[0].reset();
         $('#modal_form').get(0).setAttribute('action', 'manage_operator/save_created_data');
         $('#modal_manage').modal('show'); // show bootstrap modal
         $('.modal-title').text("Create New Operator"); 
    }

    function operator_update_form(id,firstname,lastname,gender,dob,pob,phone,address)
    {
        $('#modal_form')[0].reset();
         $('#modal_manage').modal('show'); // show bootstrap modal
         $('.modal-title').text("Update Operator's Info"); 
         $('#op_firstname').val(firstname);
         $('#op_lastname').val(lastname);
         if (gender=="M") {$('#op_gender_m').attr('checked',true);$('#op_gender_f').attr('checked',false);} else if(gender=="F"){$('#op_gender_f').attr('checked',true);$('#op_gender_m').attr('checked',false);};
         $('#op_dob').val(dob);
         $('#op_pob').val(pob);
         $('#op_phone').val(phone);
         $('#op_address').val(address);
         $('#modal_form').get(0).setAttribute('action', 'manage_operator/save_updated_data?emp=' + id);
    }

    function operator_chg_pass(id,firstname,lastname)
    {
         $('#modal_reset_pass').modal('show'); // show bootstrap modal
         $('.modal-title').text("Reset Password Confirmation"); 
         $('#confirm').attr('href', 'manage_operator/reset_operator_password?emp='+id);
         $('#conf_que').html('<center>Are you sure want to reset the password from <strong>' + lastname + ', ' + firstname + '</strong> ?</center>');

    }

    function operator_removal(id,firstname,lastname)
    {
         $('#modal_reset_pass').modal('show'); // show bootstrap modal
         $('.modal-title').text("Operator Removal"); 
         $('#confirm').attr('class', 'btn btn-danger');
         $('#confirm').html('Yes, I am');
         $('#confirm').attr('href', 'manage_operator/remove_operator?emp='+id);
         $('#conf_que').html('<center>Are you sure want to inactivate <strong>' + lastname + ', ' + firstname + '</strong> from operator ?</center>');

    }
</script>

<div class="modal fade" id="modal_manage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel" align="center"></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="modal_form" method="post" action="">
                    <div class="form-group">
                        <label>First name</label>
                        <input class="form-control" id="op_firstname" name="op_firstname" placeholder="Enter the first name" required>
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input class="form-control" id="op_lastname" name="op_lastname" placeholder="Enter the last name" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="op_gender" id="op_gender_m" value="M" required> Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="op_gender" id="op_gender_f" value="F" required> Female
                                </label>
                            </div>
                    </div>
                    <div class="form-group">
                        <label>Date of birth</label>
                        <input class="form-control datepicker" id="op_dob" name="op_dob" placeholder="Enter the date of birth" type="" required>
                    </div>
                    <div class="form-group">
                        <label>Place of birth</label>
                        <input class="form-control" id="op_pob" name="op_pob" placeholder="Enter the place of birth" required>
                    </div>
                    <div class="form-group">
                        <label>Phone number</label>
                        <input class="form-control" id="op_phone" name="op_phone" placeholder="Enter the phone number" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="op_address" name="op_address" placeholder="Enter the address" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
                </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_reset_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel" align="center"></h4>
            </div>
            <div class="modal-body">
                <p id="conf_que"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a id="confirm" href type="button" class="btn btn-primary">Yes</a>
            </div>
                </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>