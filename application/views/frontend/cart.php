<?php $this->load->view('frontend/head');?>
<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="">Item</td>
							<td class="description" style="width: 300px"></td>
							<td class="price" style="" align="center">Price</td>
							<td class="quantity" style="width: 150px" align="center">Quantity</td>
							<td class="total" align="center">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($cart as $item) {?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url('uploads/').$item->book_img.'.jpg';?>" width="110" height="110" alt=""></a>
							</td>
							<td class="cart_description">
								<h5><?php echo $item->book_title;?></h5>
								<p>Item Code: <?php echo $item->item_code;?></p>
							</td>
							<td class="cart_price" align="center">
								<p><?php echo "Rp. ".number_format($item->item_price,'0',',','.').',-';?></p>
							</td>
							<td class="cart_quantity" align="center">
								<?php echo $item->quantity;?>
							</td>
							<td class="cart_total">
								<p class="cart_total_price" align="center"><?php echo "Rp. ".number_format($item->total,'0',',','.').',-';?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" onclick="remove_cart('<?php echo $item->item_code;?>');"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php }?>
						<tr>
							<td class="" colspan="4" ><h4 align="right"><strong>Total Amount</strong></h4></td>
							<td class="cart_total" colspan=""><p class="cart_total_price" align="center"><strong><?php foreach ($amount as $value) {echo "Rp. ".number_format($value->total_amount,'0',',','.').',-';}?></strong></td>
						</tr>
						<tr>
							<td class="" colspan="4" ></td>
							<?php foreach ($amount as $value2) { if((int)$value2->total_amount > 0 ){?>
							<td align="right"><a class="btn btn-primary" onclick="add_to_checkout();"> Order</a></td>
							<?php }}?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
<?php $this->load->view('frontend/foot');?>

<script type="text/javascript">
	function remove_cart(code) {
			$.ajax({
                url: "<?php echo site_url('cart/remove_item')?>",
                data: {it_code: code},
                type: "POST",
                dataType: 'json',
	                success:function(data){
	                    alert('The item has been successfully removed from cart');
	                    window.location.href = "<?php echo site_url('cart')?>";
	                },
	                error: function (){
	                    alert('Unsuccesfull removing item');
	                }
            });
	}

	function add_to_checkout() {
			var get= "ok";
	//		$.ajax({
    //            url: "<?php echo site_url('checkout/add_to_checkout?status=');?>"+get,
    //            type: "GET",
	//                success:function(data){
	//                    alert(data[0]);
	 //               },
	//                error: function (){
	//                    alert('Unsuccesfull removing item');
	//                }
    //        });
			window.location.href = "<?php echo site_url('checkout/add_to_checkout?status=');?>"+get;
	}
</script>