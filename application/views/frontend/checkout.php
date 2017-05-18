<?php $this->load->view('frontend/head');?>
<section id="cart_items">
		<div class="container">
			<div class="step-one">
				<h2 class="heading">Order Code: <?php echo $code;?></h2>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="">Item</td>
							<td class="description" style="width: 300px"></td>
							<td class="price" style="" align="center">Price</td>
							<td class="quantity" style="width: 150px" align="center">Quantity</td>
							<td class="total" align="center">Total</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($items as $item) {?>
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
						</tr>
						<?php }?>
						<tr>
							<td class="" colspan="4" ><h4 align="right"><strong>Total Amount</strong></h4></td>
							<td class="cart_total" colspan=""><p class="cart_total_price" align="center"><strong><?php foreach ($amount as $value) {echo "Rp. ".number_format($value->total_amount,'0',',','.').',-';}?></strong></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="register-req">
				<p><strong><u>Bank Transfer</u></strong>
				<p>BNI: 092347264 Mandiri: 16894093749836 BCA: 847638838</p><br><br>
				<p><small>*Please, append the order code to description in transfer payment.</small>
			</div>
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-6">
						<div class="shopper-info">
							<p>Payment Confirmation</p>
							<form id="payment_form">
								<input id="pass" name="pass" type="password" placeholder="Confirm password" required>
								<select id="bank" name="bank" required>
									<option value="0">--Select Bank--</option>
									<option value="BNI">BNI</option>
									<option value="Mandiri">Mandiri</option>
									<option value="BCA">BCA</option>
								</select><br><br>
								<input id="acc_num" name="acc_num" type="text" placeholder="Account Number" required>
								<input id="acc_name" name="acc_name" type="text" placeholder="Account Name" required>
								<input id="receipt" name="receipt" type="file" required>
								<input name="code" id="code" type="hidden" value="<?php echo $code;?>">
								<small class="help-block">*Please, upload the bank transfer receipt.</small></p>
								<button class="btn btn-primary pull-right" href="">Continue</button>
							</form>
						</div>
					</div>				
				</div>
				<br>
			</div>
		</div>
</section>
<?php $this->load->view('frontend/foot');?>
<!--
<script type="text/javascript">
	function send_conf(code){
		var pass = $('#pass').val();
		var bank = $('#bank').val();
		var acc_num = $('#acc_num').val();
		var acc_name = $('#acc_name').val();
		var trf_date = $('#trf_date').val();
		var formdata = new FormData($('form')[0]);
		//var receipt = $('#receipt').val();
		if (pass===''||bank==='0'||acc_num===''||acc_name===''||trf_date==='') {
			alert('Complete the form confirmation');
			$('#payment_form')[0].reset();
		} else{
				$.ajax({
		            url : "<?php echo site_url('checkout/confirm_payment?order=')?>"+code,
		            type: "POST",
		            data: formdata,
		                success:function(data){
		                	if(data['c_log_stts']=='0'){
                    			alert('Sorry, you type a wrong password');
                    			$('#payment_form')[0].reset();
                    		}else if(data['c_log_stts']=='1'){
                    			alert('Thank you. Your confirmation has been sent.');
                    			window.location.href = "<?php echo site_url('order_list');?>"
                    		};
		                },
		                error: function (jqXHR, textStatus, errorThrown){
		                	alert('error');
		                }
		        });
		};
		
	}
</script>
-->

<script type="text/javascript">
	
	$("form#payment_form").submit(function(event){

 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	  var json;
	  var code = $('#code').val();

	  if($('#bank').val()==='0'){
	  	alert('Please, select the bank');
		$('#payment_form')[0].reset();
	  }else{
	  		 $.ajax({
			    url: "<?php echo site_url('checkout/confirm_payment?order=')?>"+code,
			    type: 'POST',
			    data: formData,
			    async: false,
			    cache: false,
			    contentType: false,
			    processData: false,
			    success: function (returndata) {
			      if (returndata == "0") {
			      	$('#payment_form')[0].reset();
			      	alert("Your confirmation has not been sent. This is caused by incorrect password typed. Please, re-type the correct one.");
			      }else if(returndata == "1"){
			      	alert("Thank you. Your confirmation has been sent. Please wait for the item(s) to be delivered.");
			      	window.location.href = "<?php echo site_url('order_list')?>";
			      }else if(returndata == "2"){
			      	alert("Sorry. There are several problem with our network or system. Please, try again later.");
			      };
			    }
			 });
	  };
	  return false;
	});
</script>
