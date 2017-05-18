</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets');?>/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets');?>/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('assets');?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets');?>/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets');?>/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>

    <script type="text/javascript">
    function chg_pass(){
         $('#chgpass_form')[0].reset();
         //$('#chgpass_form').get(0).setAttribute('action', 'change_password/index');
         $('#modal_chg_pass').modal('show'); // show bootstrap modal
         $('.modal-title').text("Change Password");
    }

    function save_chg_pass(){
        var pass = $('#c_pass').val();
        var rpass = $('#c_re_pass').val();
        var npass = $('#c_new_pass').val();

        if (pass===''||rpass===''||npass==='') {
            alert("You must complete the form.");
        }else{
            if (pass!==rpass) {
                alert("The re-typed password did not match.")
            }else{
                $.ajax({
                url: "<?php echo site_url('change_password/index')?>",
                data: $('#chgpass_form').serialize(),
                type: "POST",
                dataType: 'json',
                    success:function(data){
                        if(data['chgpass']==1){
                            alert("Your user password has been changed.");
                        }else if(data['chgpass']==0){
                            alert("You typed a wrong password. The password changed cannot be done.");
                        }
                    },
                    error: function (){
                        alert('Unsuccesfull added item');
                    }
                });
            }
        };
    }
    </script>

    <div class="modal fade" id="modal_chg_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel" align="center"></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="chgpass_form" method="post" action="">
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" id="c_pass" name="c_pass" placeholder="Enter the password" required>
                    </div>
                    <div class="form-group">
                        <label>Re-type Password</label>
                        <input class="form-control" type="password" id="c_re_pass" name="c_re_pass" placeholder="Re-type the password" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input class="form-control" type="password" id="c_new_pass" name="c_new_pass" placeholder="Enter the new password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="btn_c_pass" onclick="save_chg_pass();" class="btn btn-primary" data-dismiss="modal">Change</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

</body>

</html>