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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Customer
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="op_table">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Postal Code</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($customers as  $value) {?>
                                            <tr>
                                                <td><?php echo $value->cd_fullname;?></td>
                                                <td><?php echo $value->cd_email;?></td>
                                                <td><?php echo $value->cd_phone;?></td>
                                                <td><?php echo $value->cd_address;?></td>
                                                <td><?php echo $value->cd_postal_code;?></td>
                                                <td><button class="btn btn-default" onclick="test();">test</button></td>
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
        $('#op_table').DataTable({
            responsive: true
        });
    });
</script>