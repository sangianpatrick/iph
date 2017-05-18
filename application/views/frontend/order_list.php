<?php $this->load->view('frontend/head');?>
<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td align="center">Order Date</td>
							<td align="center">Order Code</td>
							<td align="center">Payment Status</td>
							<td align="center">Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($order as $value) {?>
						<tr>
							<td align="center"><?php echo $value->order_date;?></td>
							<td align="center" width="200"><?php echo $value->order_code;?></td>
							<?php if(empty($value->payment_status)){?>
							<td align="center"><i class="fa fa-times"></i></td>
							<td align="center" class="cart_delete">
								<button class="btn btn-primary" onclick="checkout('<?php echo $value->order_code;?>');">Checkout</button>
								<button class="btn btn-primary" onclick="remove_order('<?php echo $value->order_code;?>');"><i class="fa fa-times"></i></button>
							</td>
							<?php }else{?>
							<td align="center"><i class="fa fa-check"></i></td>
							<?php }?>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
<?php $this->load->view('frontend/foot');?>

<script type="text/javascript">
	function remove_order(code) {
			$.ajax({
                url: "<?php echo site_url('order_list/remove_order')?>",
                data: {it_code: code},
                type: "POST",
                dataType: 'json',
	                success:function(data){
	                    alert('The item has been successfully removed from order list');
	                    window.location.href = "<?php echo site_url('order_list')?>";
	                },
	                error: function (){
	                    alert('Unsuccesfull canceling order');
	                }
            });
	}

	function checkout(code) {
			
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
			window.location.href = "<?php echo site_url('checkout?order=');?>"+code;
	}
</script>