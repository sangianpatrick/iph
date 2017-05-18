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
                        <?php if($this->session->flashdata('confirm') === 'success') { ?>
                        <div class="alert alert-success alert-dismissable" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('succ_m');?>
                        </div>
                        <?php }?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Payment
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="op_table">
                                        <thead>
                                            <tr>
                                                <th>Payment Date</th>
                                                <th>Order Date</th>
                                                <th>Order Code</th>
                                                <th>Customer</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($payment as  $value) {?>
                                            <tr>
                                                <td><?php echo $value->payment_date;?></td>
                                                <td><?php echo $value->order_date;?></td>
                                                <td><?php echo $value->order_code;?></td>
                                                <td><?php echo $value->cd_fullname;?></td>
                                                <td><button class="btn btn-info btn-block" onclick="open_payment('<?php echo $value->order_code;?>');">Open</button></td>
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

    function open_payment(code){
        $('#confirm_btn').attr("onclick","confirm_payment('"+code+"');");
        $.ajax({
            url: "<?php echo site_url('payment/get_payment_detail')?>",
            data: {it_code: code},
            type: "POST",
            dataType: 'json',
                success:function(data){
                    //alert(data['cart'][0].item_code);
                    //alert(data['amount'][0].total_amount);
                    var item = data['cart'];
                    var tr;
                    var total;
                    if ($('tbody#item > tr').length >0) {
                        $('tbody#item > tr').remove();
                    };
                    for (var i = 0; i < item.length; i++) {
                        tr = $('<tr/>');
                        tr.append("<td>" + item[i].item_code + "</td>");
                        tr.append("<td>" + item[i].book_title + "</td>");
                        tr.append("<td>" + item[i].quantity + "</td>");
                        tr.append("<td>" + toRp(item[i].item_price) + "</td>");
                        tr.append("<td>" + toRp(item[i].total) + "</td>");
                        $('tbody#item').append(tr);
                    }
                    total = $('<tr/>');
                    total.append("<td colspan='4' align='center'> <strong>Total Amount</strong></td>");
                    total.append("<td >" + "<strong>" + toRp(data['amount'][0].total_amount) + "</strong></td>");
                    $('tbody#item').append(total);


                    $('#modal_open_payment').modal('show'); // show bootstrap modal
                    $('.modal-title').text("Payment for "+'"'+code+'"');
                    $('#receipt_img').attr('src','http://localhost/iph/uploads/payment/' + data['payment'][0]['payment_receipt'] ); 
                    $('#code').html(data['payment'][0]['order_code']);
                    $('#payment_date').html(data['payment'][0]['payment_date']);
                    $('#bank').html(data['payment'][0]['bank']);
                    $('#acc_num').html(data['payment'][0]['bank_acc_num']);
                    $('#acc_name').html(data['payment'][0]['bank_acc_name']);
                    $('#cd_fullname').html(data['payment'][0]['cd_fullname']);
                    $('#cd_email').html(data['payment'][0]['cd_email']);
                    $('#cd_phone').html(data['payment'][0]['cd_phone']);
                    $('#cd_address').html(data['payment'][0]['cd_address']);
                    $('#cd_postal_code').html(data['payment'][0]['cd_postal_code']);

                },
                 error: function (){
                    alert('Unsuccesful opened payment');
                }
            });
    }

    function confirm_payment(code){
        $.ajax({
            url: "<?php echo site_url('payment/confirm')?>",
            data: {order_code: code},
            type: "POST",
            dataType: 'json',
                success:function(data){
                    if(data['status']=="Ok"){
                        window.location.href = "<?php echo site_url('payment');?>";
                    }
                },
                 error: function (){
                    alert('Unsuccesful confirm payment');
                }
            });
    }

    function toRp(angka){
        var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2    = '';
        for(var i = 0; i < rev.length; i++){
            rev2  += rev[i];
            if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                rev2 += '.';
            }
        }
        return 'Rp. ' + rev2.split('').reverse().join('') + ',-';
    }
</script>

<div class="modal fade" id="modal_open_payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel" align="center"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Order Detail
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="cart" class="table">
                                        <thead>
                                        <tr>
                                            <th>Item Code</th>
                                            <th>Title</th>
                                            <th>Qty</th>
                                            <th width="150">Price</th>
                                            <th width="150">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody id="item">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Payment Detail
                            </div>

                            <div class="panel-body">
                                    <div align="center">
                                        <img src="" id="receipt_img" width="200"><br>
                                        <small>Bank Transfer Receipt</small>
                                    </div><br>
                                    <div class="table-responsive">
                                       <table border="0" class="table">
                                      <tr>
                                        <th scope="row">Order Code:</th>
                                        <td id="code"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Payment Date:</th>
                                        <td id="payment_date"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Bank:</th>
                                        <td id="bank"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Acc. Number:</th>
                                        <td id="acc_num"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Acc. Name:</th>
                                        <td id="acc_name"></td>
                                      </tr>
                                    </table> 
                                    </div>
                                    
                            </div>
                            </div>
                        <!-- /.panel -->
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Ship to
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table border="0" class="table">
                                      <tr>
                                        <th scope="row">Full Name:</th>
                                        <td id="cd_fullname"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Email:</th>
                                        <td id="cd_email"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Phone:</th>
                                        <td id="cd_phone"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Address:</th>
                                        <td id="cd_address"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Postal Code:</th>
                                        <td id="cd_postal_code"></td>
                                      </tr>
                                    </table>
                                </div>
                            </div>
                            </div>
                        <!-- /.panel -->
                    </div>
                </div>
                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button id="confirm_btn" class="btn btn-primary">Confirm</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>