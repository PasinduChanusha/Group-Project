  
<!DOCTYPE html>
<html>
<head>
	<?php include("header.php"); ?>
	<style>
	.razorpay-payment-button{
		display:none;
	}
	</style>
	<div class="columns-container">
		<div class="container" id="columns">
			<div class="row">
				<div class="modal-dialog">
					<div class="modal-content box-shadow-site">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Payments Type</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="container">
									<div id="online_amt_1" style="padding-left:50px;">
										<form action="<?php echo base_url('paymentstype/success'); ?>" method="post" onSubmit="return checkvalidation_payment(this.form);" enctype="multipart/form-data">
											<?php if(isset($payment_disable['payment_option']) && $payment_disable['payment_option']==1){ ?>
											<input type="radio" id="radio1"  name="payment" onclick="payment_type(this.value);" value="2"><span > Cash On Delivery</span>
											<br>
											<br>
											<input type="radio" id="radio2" name="payment" onclick="payment_type(this.value);"  value="3"><span > Swipe on Delivery</span>
											<?php } ?>	
											<br>
											<?php if(isset($online_payment_disable->account_status) && $online_payment_disable->account_status == 1) { ?>
												<br>
												<input type="radio" id="radio4" name="payment" onclick="payment_type(this.value);" value="4"><span> Bank Account / UPI</span>
												<br>
												<br>
												<div id="screenshot4" style="display:none;">
													Upload payment success screenshot
													<input type="file" name="screenshot" value="">
													<br>
													<ul>
														<li>
															<span>
																<b>Account Number : </b>
																<?php echo  (isset($online_payment_disable->account_number)) ? $online_payment_disable->account_number : '-' ; ?>
															</span>
														</li>
														<li>
															<span>
																<b>Account Name : </b>
																<?php echo  (isset($online_payment_disable->account_name)) ? $online_payment_disable->account_name : '-' ; ?>
															</span>
														</li>
														<li>
															<span>
																<b>IFSC : </b>
																<?php echo  (isset($online_payment_disable->ifsc)) ? $online_payment_disable->ifsc : '-' ; ?>
															</span>
														</li>
														<li>
															<span>
																<b>UPI ID : </b>
																<?php echo  (isset($online_payment_disable->upi_code)) ? $online_payment_disable->upi_code : '-' ; ?>
															</span>
														</li>
													</ul>
												</div>
											<?php } else { ?>
												<br>
												<input type="radio" id="radio3" name="payment" onclick="payment_type(this.value);" value="1"><span> Online Payment</span>
												<br>
											<?php } ?>
											<br>
											<?php echo form_error('payment_type','<div class="text-danger">', '</div>'); ?>
											<button type="submit" class="btn btn-success" name="pay_submit">Pay</button>
										</form>
									</div>
									<div id="online_amt" style="display:none;padding-left:50px;">
										<form action="<?php echo base_url('paymentstype/success'); ?>" method="post" onSubmit="return checkvalidation(this.form);" enctype="multipart/form-data">
											<div class="" >
												<span id="paymenterrormsg" style="color:red"></span>
												<?php if(isset($payment_disable['payment_option']) && $payment_disable['payment_option']==1){ ?>
												<input type="radio" id="radio11"  name="payment" onclick="payment_type(this.value);" value="2"><span > Cash On Delivery</span>
												<br>
												<br>
												<input type="radio" id="radio22" name="payment" onclick="payment_type(this.value);"  value="3"><span > Swipe on Delivery</span>
												<?php } ?>
												<br>
												<?php if(isset($online_payment_disable->account_status) && $online_payment_disable->account_status ==1 && $this->session->userdata('milk_order') == 'MILK') { ?>

													<br>
													<input type="radio" id="radio44" name="payment" onclick="payment_type(this.value);" value="4"><span> Bank Account / UPI</span>
													<br>
													<div id="screenshot44" style="display:none;">
														Upload payment success screenshot
														<input type="file" name="screenshot" value="">
														<br>
														<ul>
															<li>
																<span>
																	<b>Account Number : </b>
																	<?php echo  (isset($online_payment_disable->account_number)) ? $online_payment_disable->account_number : '-' ; ?>
																</span>
															</li>
															<li>
																<span>
																	<b>Account Name : </b>
																	<?php echo  (isset($online_payment_disable->account_name)) ? $online_payment_disable->account_name : '-' ; ?>
																</span>
															</li>
															<li>
																<span>
																	<b>IFSC : </b>
																	<?php echo  (isset($online_payment_disable->ifsc)) ? $online_payment_disable->ifsc : '-' ; ?>
																</span>
															</li>
															<li>
																<span>
																	<b>UPI ID : </b>
																	<?php echo  (isset($online_payment_disable->upi_code)) ? $online_payment_disable->upi_code : '-' ; ?>
																</span>
															</li>
														</ul>
													</div>
												<?php } else { ?>
													<br>
													<input type="radio" id="radio33" name="payment" onclick="payment_type(this.value);" value="1"><span> Online Payment</span>
													<br>
												<?php } ?>
												<br>
											</div>
											<script
											src="https://checkout.razorpay.com/v1/checkout.js"
											data-key="<?php echo $details['key']?>"
											data-amount="<?php echo $details['amount']?>"
											data-currency="INR"
											data-name="<?php echo $details['name']?>"
											data-image="<?php echo $details['image']?>"
											data-description="<?php echo $details['description']?>"
											data-prefill.name="<?php echo $details['prefill']['name']?>"
											data-prefill.email="<?php echo $details['prefill']['email']?>"
											data-prefill.contact="<?php echo $details['prefill']['contact']?>"
											data-notes.shopping_order_id="3456"
											data-order_id="<?php echo $details['order_id']?>"
											<?php if ($details['display_currency'] !== 'INR') { ?> data-display_amount="<?php echo $details['amount']?>" <?php } ?>
											<?php if ($details['display_currency'] !== 'INR') { ?> data-display_currency="<?php echo $details['display_currency']?>" <?php } ?>
											>
											</script>
											<button type="submit" class="btn btn-success" name="pay_submit">Pay</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div id="sucessmsg">
		</div> -->
	</div>
	<?php include("footer.php"); ?>
	<script>
	$(document).ready(function(){
		$('#radio4,#radio44').click(function(){
			if($(this).prop("checked")){
				$('#screenshot4,#screenshot44').css('display','block');
			}
		});
		$('#radio2,#radio22,#radio3,#radio33').click(function(){
			if($(this).prop("checked")){
				$('#screenshot4,#screenshot44').css('display','none');
			}
		});
	});
	function payment_type(ids){
		$('#paymenterrormsg').html('');
		if(ids==1){
			$('#online_amt').show();
			$('#online_amt_1').hide();
			document.getElementById("radio33").checked = true;
		}else{
			$('#online_amt').hide();
			$('#online_amt_1').show();
			if(ids==1){
				document.getElementById("radio1").checked = true;
				document.getElementById("radio3").checked = false;
			}else if(ids==3){
				document.getElementById("radio2").checked = true;
				document.getElementById("radio3").checked = false;
			} else if(ids==4) {
				document.getElementById("radio4").checked = true;
				document.getElementById("radio3").checked = false;
			}else{
				document.getElementById("radio3").checked = false;
			}
		}
	}
	function checkvalidation(form){
		if ($("#radio11").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}if ($("#radio22").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}if ($("#radio33").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}if($("#radio44").prop("checked")){
			$('#paymenterrormsg').html('');
			return true;
		}if ($("#radio1").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}else if ($("#radio2").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}else if ($("#radio3").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}else if ($("#radio4").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}else{
			$('#paymenterrormsg').html('Please select a payment mode method');
			return false;
		}
	}
	function checkvalidation_payment(form){

		if ($("#radio1").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}if ($("#radio11").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}else if ($("#radio2").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}else if ($("#radio22").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}else if ($("#radio3").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}else if ($("#radio33").prop("checked")) {
			$('#paymenterrormsg').html('');
			return true;
		}else if($("#radio4").prop("checked")){
			$('#paymenterrormsg').html('');
			return true;
		}else if($("#radio44").prop("checked")){
			$('#paymenterrormsg').html('');
			return true;
		}else{
			$('#paymenterrormsg').html('Please select a payment mode method');
			return false;
		}
	}
	</script>
</body>
</html>