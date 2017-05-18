<!-- Page Content -->
<?php $this->load->view('backend/head');?>
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
                        <?php if($this->session->flashdata('item') === 'success_add') { ?>
                        <div class="alert alert-success alert-dismissable" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>The new item(s) has been successfully added.</strong>
                        </div>
                        <?php }?>
                        <?php if($this->session->flashdata('item') === 'success_up') { ?>
                        <div class="alert alert-success alert-dismissable" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>The item's detail has been successfully updateded.</strong>
                        </div>
                        <?php }?>
                        <?php if($this->session->flashdata('restock') === 'success_del') { ?>
                        <div class="alert alert-success alert-dismissable" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Some items has been succesfully restocked.</strong>
                        </div>
                        <?php }?>
                        <?php if($this->session->flashdata('item') === 'cancel_add') { ?>
                        <div class="alert alert-danger alert-dismissable" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong><?php echo $this->session->flashdata('messages');?></strong>
                        </div>
                        <?php }?>
                        <div>
                            <button class="btn btn-primary" onclick="add_new();"><i class="fa fa-plus-circle"></i> New Item</button>
                            <button class="btn btn-info" onclick="restock_item();"><i class="fa fa-plus-circle"></i> Restock Item</button><br><br>
                        
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Item
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="it_table">
                                        <thead>
                                            <tr>
                                                <th width="90" align="center">Item Code</th>
                                                <th width="" align="center">Title</th>
                                                <th width="40" align="center">Qty</th>
                                                <th width="80" align="center">Price</th>
                                                <th width="80" align="center">Catagory</th>
                                                <th width="100" align="center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($stock as $item) {?>
                                            <tr>
                                                <td align="center"><?php echo $item->item_code;?></td>
                                                <td><?php echo $item->book_title;?></td>
                                                <td align="center"><?php echo ($item->item_qty<11?'<font color="red">Need to Restock</font>':$item->item_qty);?></td>
                                                <td align="center"><?php echo "Rp. ".number_format($item->item_price,'0',',','.');?></td>
                                                <td align="center"><?php echo $item->book_cat;?></td>
                                                <td align="center">
                                                    <button onclick="item_detail('<?php echo $item->item_id;?>','<?php echo $item->item_code;?>','<?php echo $item->item_qty;?>','<?php echo "Rp. ".number_format($item->item_price,'0',',','.');?>','<?php echo $item->book_title;?>','<?php echo $item->book_author;?>','<?php echo $item->book_publisher;?>','<?php echo $item->book_cat;?>','<?php echo $item->book_isbn;?>','<?php echo $item->book_img;?>');" class="btn btn-info btn-circle"><i class="fa fa-gear"></i></button>
                                                    <button onclick="item_update('<?php echo $item->item_id;?>','<?php echo $item->item_code;?>','<?php echo $item->item_qty;?>','<?php echo $item->item_price;?>','<?php echo $item->book_title;?>','<?php echo $item->book_author;?>','<?php echo $item->book_publisher;?>','<?php echo $item->book_cat;?>','<?php echo $item->book_isbn;?>','<?php echo $item->book_img;?>');" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></button>
                                                    
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="well">
                                <p><small>*When the item quantity is <strong>less than 6</strong>, it willl be printed as <font color="red">"Need to Restock"</font>.</small></p>
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
<?php $this->load->view('backend/foot');?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#it_table').DataTable({
            responsive: true
        });
    });

    function add_new()
    {
         $('#modal_item_form')[0].reset();
         $('#modal_item_form').get(0).setAttribute('action', 'manage_stock/save_new_item');
         $('#modal_add_edit').modal('show'); // show bootstrap modal
         $('.modal-title').text("Add New Item"); 
    }

    function restock_item()
    {
         $('#modal_restock_form').get(0).setAttribute('action', 'manage_stock/restock_item');
         $('#modal_restock').modal('show'); // show bootstrap modal
         $('.modal-title').text("Restock Item"); 
    }

    function item_detail(id,code,qty,price,title,author,publisher,catagory,isbn,img)
    {
         $('#modal_item_detail').modal('show'); // show bootstrap modal
         $('.modal-title').text("Item Detail"); 
         $('#book_img').attr('src','http://localhost/iph/uploads/' + img + '.jpg'); 
         $('#code').html(code);
         $('#qty').html(qty);
         $('#price').html(price);
         $('#title').html(title);
         $('#author').html(author);
         $('#publisher').html(publisher);
         $('#catagory').html(catagory);
         $('#isbn').html(isbn);
    }

    function item_update(id,code,qty,price,title,author,publisher,catagory,isbn,img)
    {
        $('#modal_item_form')[0].reset();
         $('#modal_add_edit').modal('show'); // show bootstrap modal
         $('.modal-title').text("Update Item Data"); 
         $('#itq').remove();
         $('#it_title').val(title);
         $('#it_author').val(author);
         $('#it_publisher').val(publisher);
         $('#it_price').val(price);
         if (catagory=="Religy") {$('#it_catagory_r').attr('checked',true);$('#it_catagory_h').attr('checked',false);} else if(catagory=="Healthy"){$('#it_catagory_h').attr('checked',true);$('#it_catagory_r').attr('checked',false);};
         $('#it_isbn').val(isbn);
         $('#it_img').attr('required',false);
         $('#modal_item_form').get(0).setAttribute('action', 'manage_stock/update_existing_item?itm=' + id);
    }
</script>

<div class="modal fade" id="modal_add_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel" align="center"></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="modal_item_form" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" id="it_title" name="it_title" placeholder="Enter the book title" required>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input class="form-control" id="it_author" name="it_author" placeholder="Enter the book author" required>
                    </div>
                    <div class="form-group">
                        <label>Publisher</label>
                        <input class="form-control" id="it_publisher" name="it_publisher" placeholder="Enter the book publisher" required>
                    </div>
                    <div class="form-group" id="itq">
                        <label>Quantity</label>
                        <input class="form-control" type="number" id="it_quantity" name="it_quantity" placeholder="Enter the book quantity" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" type="number" id="it_price" name="it_price" placeholder="Enter the book quantity" required>
                        <p class="help-block"><small>*Please, type without comas(,) and/or dot(.). <strong>For example: 724500</strong></small></p>
                    </div>
                    <div class="form-group">
                        <label>Catagory</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="it_catagory" id="it_catagory_r" value="Religy" required> Religy
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="it_catagory" id="it_catagory_h" value="Healthy" required> Healthy
                                </label>
                            </div>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input class="form-control" id="it_isbn" name="it_isbn" placeholder="Enter the book isbn">
                        <p class="help-block"><small>*Leave it empty if ISBN doesn't appear on.</small></p>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" id="it_img" name="it_img" required>
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

<div class="modal fade" id="modal_item_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel" align="center"></h4>
            </div>
            <div class="modal-body">
                <div >
                    <img src="" id="book_img" width="150">
                </div><br>
                <table border="0" class="table table-hover">
                  <tr>
                    <th scope="row">Code:</th>
                    <td id="code"></td>
                  </tr>
                  <tr>
                    <th scope="row">Title:</th>
                    <td id="title"></td>
                  </tr>
                  <tr>
                    <th scope="row">Catagory:</th>
                    <td id="catagory"></td>
                  </tr>
                  <tr>
                    <th scope="row">Author:</th>
                    <td id="author"></td>
                  </tr>
                  <tr>
                    <th scope="row">Publisher:</th>
                    <td id="publisher"></td>
                  </tr>
                  <tr>
                    <th scope="row">Price/<small>pcs</small>:</th>
                    <td id="price"></td>
                  </tr>
                  <tr>
                    <th scope="row">Quantity:</th>
                    <td id="qty"></td>
                  </tr>
                  <tr>
                    <th scope="row">ISBN:</th>
                    <td id="isbn"></td>
                  </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_restock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel" align="center"></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="modal_restock_form" method="post" action="">
                    <div class="form-group">
                        <label>Title</label>
                        <select class="form-control" id="ex_title" name="ex_title">
                            <?php foreach ($stock as $ex_item) {?>
                            <option value="<?php echo $ex_item->item_code;?>"><?php echo $ex_item->book_title;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input class="form-control" type="number" id="ex_qty" name="ex_qty" placeholder="Enter the quantity" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Restock</button>
            </div>
                </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>