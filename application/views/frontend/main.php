<?php $this->load->view('frontend/head');?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?php echo site_url('main?catagory=1')?>">Religy</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?php echo site_url('main?catagory=2')?>">Healthy</a></h4>
								</div>
							</div>
						</div><!--/category-productsr-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo $page;?></h2>
						<?php foreach ($products as $item) {?>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url('uploads/').$item->book_img.'.jpg';?>" width="300" height="180" alt="" />
										<h2><?php echo "Rp. ".number_format($item->item_price,'0',',','.').',-';?></h2>
										<p><?php echo $item->item_code;?></p>
										<p><small><?php echo (int)$item->item_qty-5;?> Available</small>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<p style="font-size:160%;"><h2><?php echo "Rp. ".number_format($item->item_price,'0',',','.').',-';?></h2></p>
											<p><?php echo $item->book_title;?></p>
											<button onclick="add_to_cart('<?php echo $item->item_code;?>','<?php echo (isset($_SESSION['c_log_stts'])?'1':'0');?>')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
<?php $this->load->view('frontend/foot');?>
<script type="text/javascript">
	function add_to_cart (code,log_stts) {
		if (log_stts=='1') {
			$.ajax({
                url: "<?php echo site_url('main/add_to_cart')?>",
                data: {it_code: code},
                type: "POST",
                dataType: 'json',
	                success:function(data){
	                    alert('The item has been successfully added to cart');
	                },
	                error: function (){
	                    alert('Unsuccesfull added item');
	                }
            });
		} else{
			alert("You must login first");
			window.location.href="<?php echo site_url('customer');?>";
		};
	}
</script>