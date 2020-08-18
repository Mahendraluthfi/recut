<style>
	.form-row{
		padding-bottom: 5px;
	}
</style>
<header class="bg-info text-white" style="padding-bottom: 40px; padding-top: 95px;">
    <div class="container text-center">
      <h3>
      <img src="<?php echo base_url() ?>assets/mas_icon.png" height="30" alt="" style="margin-bottom: 8px;"> Recut System</h3><br>
        <a href="<?php echo base_url() ?>" class="btn btn-success"><i class="fa fa-file"></i> Home</a>
    </div>
  </header>    
  <div class="py-3 container">  		
		<h4><a href="<?php echo base_url() ?>"><i class="fa fa-chevron-left"></i></a> Form Recut</h4><hr>
		<div id="accordion">
			<div class="card">
		    	<div class="card-header" id="headingOne">
	      		<h6 class="mb-0">
		        	<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		        		Form Request Panty
		        	</button>
		        	<?php echo $button_panty; ?>
		      	</h6>
		    	</div>

		    	<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
		      		<div class="card-body">
		      			<div class="row clearfix row-relative">
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<?php echo form_open('welcome/submit_apply/'.$order_id); ?>      					
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">#PO</label>
		      						</div>
									<div class="col-8">
										<!-- <input type="text" name="po" class="form-control" placeholder="#PO"> -->
										<?php echo $po ?>
									</div>
		      					</div>	
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">#SO</label>
		      						</div>
									<div class="col-8">
										<!-- <input type="text" name="so" class="form-control" placeholder="#SO"> -->
										<?php echo $so ?>
									</div>
		      					</div>	
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">LINE</label>
		      						</div>
									<div class="col-8">
										<!-- <select name="line" class="form-control"> -->
											<?php echo $line ?>
											<?php for ($i=1; $i <= 54 ; $i++) { 
												echo '<option value="LINE '.$i.'">LINE '.$i.'</option>';
											} ?>

										</select>
									</div>
		      					</div>	
		      				</div>
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-border">
		      					<div class="col-border-padding">		      					
			      					<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Style</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="style" class="form-control" placeholder="Style">-->
											<?php echo $style; ?>
										</div>
			      					</div>	
			      					<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Colour</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="colour" class="form-control" placeholder="Colour"> -->
											<?php echo $colour ?>
										</div>
		      						</div>
		      						<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Shift</label>
			      						</div>
										<div class="col-8">
												<?php echo $shift ?>
												<option value="A">A</option>
												<option value="B">B</option>
											</select>
										</div>
		      						</div>
		      					</div>      					
		      				</div>
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-border">
		      					<div class="col-border-padding">
		      						
		      					F - Fabric Damage <br>      					
		      					S - Sewing Damage <br>      					
		      					C - Cutting Damage <br>      					
		      					AC - All Components <br>       					
		      					P - Panels       					
		      					</div>
		      				</div>
		      			</div><hr>
		      			<div class="row clearfix">
		      				<div style="padding-bottom: 5px;">		      					
			      				<button type="button" class="btn btn-info btn-sm add-row" <?php echo $btnadd ?>><i class="fa fa-plus"></i> Add Row</button>
			      				<!-- <button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i> Delete Row</button> -->
		      				</div>
		      				<table class="table table-bordered">
		      					<thead>
		      						<tr class="bg-secondary text-white text-center">
		      							<th>SIZE</th>
		      							<th>GUSSET</th>
		      							<th>FRONT</th>
		      							<th>BACK</th>
		      							<th>SIDE</th>
		      							<th>INNER</th>
		      							<th>REMARKS</th>
		      							<th>TYPE</th>
		      							<th width="1%">#</th>
		      						</tr>
		      					</thead>
		      					<tbody id="show_data">
		      						
		      					</tbody>
		      				</table>
		      				<div class="float-right">
		      					<button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-primary" <?php echo $btnsub ?>><i class="fa fa-save"></i> Apply</button>
		      				</div>
		      				<?php echo form_close(); ?>
		      			</div>
		      		</div>
		    	</div>
		  	</div>
	  		<div class="card">
	    		<div class="card-header" id="headingTwo">
	      			<h6 class="mb-0">
	        		<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	        			Form Request Bra
	       			 </button>
		        	<?php echo $button_bra; ?>	       			 
	      			</h6>
	    		</div>
		   		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
			      	<div class="card-body">
			      		<div class="row clearfix row-relative">
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<?php echo form_open('welcome/submit_bra/'.$order_id_bra); ?>      					
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">#PO</label>
		      						</div>
									<div class="col-8">
										<!-- <input type="text" name="po" class="form-control" placeholder="#PO"> -->
										<?php echo $po_bra ?>
									</div>
		      					</div>	
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">#SO</label>
		      						</div>
									<div class="col-8">
										<!-- <input type="text" name="so" class="form-control" placeholder="#SO"> -->
										<?php echo $so_bra ?>
									</div>
		      					</div>	
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">LINE</label>
		      						</div>
									<div class="col-8">
										<!-- <select name="line" class="form-control"> -->
											<?php echo $line_bra ?>
											<?php for ($i=1; $i <= 54 ; $i++) { 
												echo '<option value="LINE '.$i.'">LINE '.$i.'</option>';
											} ?>
										</select>
									</div>
		      					</div>	
		      				</div>
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-border">
		      					<div class="col-border-padding">		      					
			      					<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Style</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="style" class="form-control" placeholder="Style">-->
											<?php echo $style_bra; ?>
										</div>
			      					</div>	
			      					<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Colour</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="colour" class="form-control" placeholder="Colour"> -->
											<?php echo $colour_bra ?>
										</div>
		      						</div>
		      						<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Shift</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="colour" class="form-control" placeholder="Colour"> -->
											<?php echo $shift_bra ?>
												<option value="A">A</option>
												<option value="B">B</option>
											</select>
										</div>
		      						</div>
		      					</div>      					
		      				</div>
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-border">
		      					<div class="col-border-padding">
		      						
		      					F - Fabric Damage <br>      					
		      					S - Sewing Damage <br>      					
		      					C - Cutting Damage <br>      					
		      					AC - All Components <br>       					
		      					P - Panels       	      					
		      					</div>
		      				</div>
		      			</div><hr>
		      			<div class="row clearfix">
		      				<div style="padding-bottom: 5px;">		      					
			      				<button type="button" class="btn btn-info btn-sm add-row_bra" <?php echo $btnadd_bra ?>><i class="fa fa-plus"></i> Add Row</button>
			      				<!-- <button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i> Delete Row</button> -->
		      				</div>
		      				<table class="table table-bordered">
		      					<thead>
		      						<tr class="bg-secondary text-white text-center">
		      							<th>SIZE</th>
		      							<th>WING</th>
		      							<th>CF</th>
		      							<th>CUP</th>
		      							<th>INNER</th>
		      							<th>MESH</th>
		      							<th>LINER</th>
		      							<th>REMARKS</th>
		      							<th>TYPE</th>
		      							<th width="1%">#</th>
		      						</tr>
		      					</thead>
		      					<tbody id="show_data2">
		      						
		      					</tbody>
		      				</table>
		      				<div class="float-right">
		      					<button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-primary" <?php echo $btnsub_bra ?>><i class="fa fa-save"></i> Apply</button>
		      				</div>
		      				<?php echo form_close(); ?>
		      			</div>
			      	</div>
		    	</div>
		  	</div>
		  	<div class="card">
	    		<div class="card-header" id="headingThree">
	      			<h6 class="mb-0">
	        		<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	        			Form Request Mask
	       			 </button>
		        	<?php echo $button_mask; ?>	       			 
	      			</h6>
	    		</div>
		   		<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
			      	<div class="card-body">
			      		<div class="row clearfix row-relative">
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<?php echo form_open('welcome/submit_mask/'.$order_id_mask); ?>      					
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">#PO</label>
		      						</div>
									<div class="col-8">
										<!-- <input type="text" name="po" class="form-control" placeholder="#PO"> -->
										<?php echo $po_mask ?>
									</div>
		      					</div>	
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">#SO</label>
		      						</div>
									<div class="col-8">
										<!-- <input type="text" name="so" class="form-control" placeholder="#SO"> -->
										<?php echo $so_mask ?>
									</div>
		      					</div>	
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">LINE</label>
		      						</div>
									<div class="col-8">
										<!-- <select name="line" class="form-control"> -->
											<?php echo $line_mask ?>
											<?php for ($i=1; $i <= 54 ; $i++) { 
												echo '<option value="LINE '.$i.'">LINE '.$i.'</option>';
											} ?>
										</select>
									</div>
		      					</div>	
		      				</div>
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-border">
		      					<div class="col-border-padding">		      					
			      					<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Style</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="style" class="form-control" placeholder="Style">-->
											<?php echo $style_mask; ?>
										</div>
			      					</div>	
			      					<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Colour</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="colour" class="form-control" placeholder="Colour"> -->
											<?php echo $colour_mask ?>
										</div>
		      						</div>
		      						<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Shift</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="colour" class="form-control" placeholder="Colour"> -->
											<?php echo $shift_mask ?>
												<option value="A">A</option>
												<option value="B">B</option>
											</select>
										</div>
		      						</div>
		      					</div>      					
		      				</div>
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-border">
		      					<div class="col-border-padding">
		      						
		      					F - Fabric Damage <br>      					
		      					S - Sewing Damage <br>      					
		      					C - Cutting Damage       					
		      					</div>
		      				</div>
		      			</div><hr>
		      			<div class="row clearfix">
		      				<div style="padding-bottom: 5px;">		      					
			      				<button type="button" class="btn btn-info btn-sm add-row_mask" <?php echo $btnadd_mask ?>><i class="fa fa-plus"></i> Add Row</button>
			      				<!-- <button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i> Delete Row</button> -->
		      				</div>
		      				<table class="table table-bordered">
		      					<thead>
		      						<tr class="bg-secondary text-white text-center">
		      							<th>SIZE</th>
		      							<th>MAIN PANEL</th>		      							
		      							<th>REMARKS</th>
		      							<th width="1%">#</th>
		      						</tr>
		      					</thead>
		      					<tbody id="show_data3">
		      						
		      					</tbody>
		      				</table>
		      				<div class="float-right">
		      					<button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-primary" <?php echo $btnsub_mask ?>><i class="fa fa-save"></i> Apply</button>
		      				</div>
		      				<?php echo form_close(); ?>
		      			</div>
			      	</div>
		    	</div>
		  	</div>
		  	<div class="card">
	    		<div class="card-header" id="headingFour">
	      			<h6 class="mb-0">
	        		<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
	        			Form Request Apparel
	       			 </button>
		        	<?php echo $button_apparel; ?>	       			 
	      			</h6>
	    		</div>
		   		<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
			      	<div class="card-body">
			      		<div class="row clearfix row-relative">
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<?php echo form_open('welcome/submit_apparel/'.$order_id_apparel); ?>      					
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">#PO</label>
		      						</div>
									<div class="col-8">
										<!-- <input type="text" name="po" class="form-control" placeholder="#PO"> -->
										<?php echo $po_apparel ?>
									</div>
		      					</div>	
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">#SO</label>
		      						</div>
									<div class="col-8">
										<!-- <input type="text" name="so" class="form-control" placeholder="#SO"> -->
										<?php echo $so_apparel ?>
									</div>
		      					</div>	
		      					<div class="form-row">
		      						<div class="col-4">
		      							<label class="col-form-label">LINE</label>
		      						</div>
									<div class="col-8">
										<!-- <select name="line" class="form-control"> -->
											<?php echo $line_apparel ?>
											<?php for ($i=1; $i <= 54 ; $i++) { 
												echo '<option value="LINE '.$i.'">LINE '.$i.'</option>';
											} ?>
										</select>
									</div>
		      					</div>	
		      				</div>
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-border">
		      					<div class="col-border-padding">		      					
			      					<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Style</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="style" class="form-control" placeholder="Style">-->
											<?php echo $style_apparel; ?>
										</div>
			      					</div>	
			      					<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Colour</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="colour" class="form-control" placeholder="Colour"> -->
											<?php echo $colour_apparel ?>
										</div>
		      						</div>
		      						<div class="form-row">
			      						<div class="col-4">
			      							<label class="col-form-label">Shift</label>
			      						</div>
										<div class="col-8">
											<!-- <input type="text" name="colour" class="form-control" placeholder="Colour"> -->
											<?php echo $shift_apparel ?>
												<option value="A">A</option>
												<option value="B">B</option>
											</select>
										</div>
		      						</div>
		      					</div>      					
		      				</div>
		      				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-border">
		      					<div class="col-border-padding">		      						
		      					F - Fabric Damage <br>      					
		      					S - Sewing Damage <br>      					
		      					C - Cutting Damage  <br>      					
		      					AC - All Components <br>       					
		      					P - Panels       	     					
		      					</div>
		      				</div>
		      			</div><hr>
		      			<div class="row clearfix">
		      				<div style="padding-bottom: 5px;">		      					
			      				<button type="button" class="btn btn-info btn-sm add-row_apparel" <?php echo $btnadd_apparel ?>><i class="fa fa-plus"></i> Add Row</button>
			      				<!-- <button type="button" class="btn btn-danger btn-sm delete-row"><i class="fa fa-trash"></i> Delete Row</button> -->
		      				</div>
		      				<table class="table table-bordered">
		      					<thead>
		      						<tr class="bg-secondary text-white text-center">
		      							<th>SIZE</th>
		      							<th>PANEL WAIST BAND NAME</th>		      							
		      							<th>INNER</th>		      							
		      							<th>OUTER</th>		      							
		      							<th>QTY</th>		      							
		      							<th>REMARKS</th>
		      							<th>TYPE</th>		      							
		      							<th width="1%">#</th>
		      						</tr>
		      					</thead>
		      					<tbody id="show_data4">
		      						
		      					</tbody>
		      				</table>
		      				<div style="padding-bottom: 5px;">		      					
			      				<button type="button" class="btn btn-info btn-sm add-row_apparel2" <?php echo $btnadd_apparel2 ?>><i class="fa fa-plus"></i> Add Row</button>
		      				</div>
		      				<table class="table table-bordered">
		      					<thead>
		      						<tr class="bg-secondary text-white text-center">
		      							<th>SIZE</th>
		      							<th>PANEL BODY BAND NAME</th>		      							
		      							<th>LEFT</th>		      							
		      							<th>RIGHT</th>		      							
		      							<th>QTY</th>		      							
		      							<th>REMARKS</th>
		      							<th>TYPE</th>		      							
		      							<th width="1%">#</th>
		      						</tr>
		      					</thead>
		      					<tbody id="show_data5">
		      						
		      					</tbody>
		      				</table>
		      				<div class="float-right">
		      					<button type="submit" onclick="return confirm('Are you sure ?')" class="btn btn-primary" <?php echo $btnsub_apparel ?>><i class="fa fa-save"></i> Apply</button>
		      				</div>
		      				<?php echo form_close(); ?>
		      			</div>
			      	</div>
		    	</div>
		  	</div>	
		</div>
  </div>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     		<form id="form">
			 	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Size</label>
			    	<div class="col-sm-3">
			    		<div class="form-check">
						  <input class="form-check-input" type="radio" name="size" id="exampleRadios1" value="S">
						  <label class="form-check-label" for="exampleRadios1">
						    S
						  </label>
						</div>			    		
			    	</div>
			    	<div class="col-sm-3">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="size" id="exampleRadios2" value="M">
						  <label class="form-check-label" for="exampleRadios2">
						    M
						  </label>
						</div>			    		
			    	</div>
			    	<div class="col-sm-3">
			    		<div class="form-check">
						  <input class="form-check-input" type="radio" name="size" id="exampleRadios3" value="L">
						  <label class="form-check-label" for="exampleRadios3">
						    L
						  </label>
						</div>
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Type</label>
			    	<div class="col-sm-9">
			    		<select name="type_panty" class="form-control" onchange="selectpanty(this)">
			    			<option value="AC">All Components</option>
			    			<option value="P">Panels</option>
			    		</select>
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Gusset</label>
			    	<div class="col-sm-4">
			      		<input name="gusset" type="number" min="0" class="form-control" placeholder="Gusset">
			    	</div>
			    	<div class="col-sm-5 shape_panty" style="display: none;">
			      		<input name="gusset_shape" type="text" class="form-control" placeholder="Gusset Shape">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Front</label>
			    	<div class="col-sm-4">
			      		<input name="front" type="number" min="0" class="form-control" placeholder="Front">
			    	</div>
			    	<div class="col-sm-5 shape_panty" style="display: none;">
			      		<input name="front_shape" type="text" class="form-control" placeholder="Front Shape">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Back</label>
			    	<div class="col-sm-4">
			      		<input name="back" type="number" min="0" class="form-control" placeholder="Back">
			    	</div>
			    	<div class="col-sm-5 shape_panty" style="display: none;">
			      		<input name="back_shape" type="text" class="form-control" placeholder="Back Shape">
			    	</div>
			  	</div>			  
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Side</label>
			    	<div class="col-sm-4">
			      		<input name="side" type="number" min="0" class="form-control" placeholder="Side">
			    	</div>
			    	<div class="col-sm-5 shape_panty" style="display: none;">
			      		<input name="side_shape" type="text" class="form-control" placeholder="Side Shape">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Inner</label>
			    	<div class="col-sm-4">
			      		<input name="inner" type="number" min="0" class="form-control" placeholder="Inner">
			    	</div>
			    	<div class="col-sm-5 shape_panty" style="display: none;">
			      		<input name="inner_shape" type="text" class="form-control" placeholder="Inner Shape">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Remarks</label>
			    	<div class="col-sm-9">
			    		<select name="remarks" name="remarks" class="form-control">
			    			<option value="F">F - Fabric Damage</option>
			    			<option value="C">C - Cutting Damage</option>
			    			<option value="S">S - Sewing Damage</option>
			    		</select>
			    	</div>
			  	</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary add-panty">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     		<form id="form_bra">
			 	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Size</label>
			    	<div class="col-sm-9">
			    		<input type="text" class="form-control" placeholder="Size" name="size">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Type</label>
			    	<div class="col-sm-9">
			    		<select name="type_bra" class="form-control" onchange="selectbra(this)">
			    			<option value="AC">All Components</option>
			    			<option value="P">Panels</option>
			    		</select>
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Wing</label>
			    	<div class="col-sm-4">
			      		<input name="wing" type="number" min="0" class="form-control" placeholder="Wing">
			    	</div>
			    	<div class="col-sm-5 shape_bra" style="display: none;">
			    		<input type="text" name="wing_shape" class="form-control" placeholder="wing shape">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">CF</label>
			    	<div class="col-sm-4">
			      		<input name="cf" type="number" min="0" class="form-control" placeholder="CF">
			    	</div>
			    	<div class="col-sm-5 shape_bra" style="display: none;">
			    		<input type="text" name="cf_shape" class="form-control" placeholder="cf shape">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Cup</label>
			    	<div class="col-sm-4">
			      		<input name="cup" type="number" min="0" class="form-control" placeholder="Cup">
			    	</div>
			    	<div class="col-sm-5 shape_bra" style="display: none;">
			    		<input type="text" name="cup_shape" class="form-control" placeholder="cup shape">
			    	</div>
			  	</div>			  
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Inner</label>
			    	<div class="col-sm-4">
			      		<input name="inner" type="number" min="0" class="form-control" placeholder="Inner">
			    	</div>
			    	<div class="col-sm-5 shape_bra" style="display: none;">
			    		<input type="text" name="inners_shape" class="form-control" placeholder="inner shape">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Mesh</label>
			    	<div class="col-sm-4">
			      		<input name="mesh" type="number" min="0" class="form-control" placeholder="Mesh">
			    	</div>
			    	<div class="col-sm-5 shape_bra" style="display: none;">
			    		<input type="text" name="mesh_shape" class="form-control" placeholder="mesh shape">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Liner</label>
			    	<div class="col-sm-4">
			      		<input name="liner" type="number" min="0" class="form-control" placeholder="Liner">
			    	</div>
			    	<div class="col-sm-5 shape_bra" style="display: none;">
			    		<input type="text" name="liner_shape" class="form-control" placeholder="liner shape">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Remarks</label>
			    	<div class="col-sm-9">
			    		<select name="remarks" name="remarks" class="form-control">
			    			<option value="F">F - Fabric Damage</option>
			    			<option value="C">C - Cutting Damage</option>
			    			<option value="S">S - Sewing Damage</option>
			    		</select>
			    	</div>
			  	</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary add-bra">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     		<form id="form_mask">
			 	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Size</label>
			    	<div class="col-sm-9">
			    		<input type="text" class="form-control" placeholder="Size" name="size">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Main Panel</label>
			    	<div class="col-sm-9">
			      		<input name="panel" type="number" min="0" class="form-control" placeholder="Main Panel">
			    	</div>
			  	</div>			  	
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Remarks</label>
			    	<div class="col-sm-9">
			    		<select name="remarks" name="remarks" class="form-control">
			    			<option value="F">F - Fabric Damage</option>
			    			<option value="C">C - Cutting Damage</option>
			    			<option value="S">S - Sewing Damage</option>
			    		</select>
			    	</div>
			  	</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary add-mask">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     		<form id="form_apparel">
			 	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Size</label>
			    	<div class="col-sm-9">
			    		<input type="text" class="form-control" placeholder="Size" name="size">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Type</label>
			    	<div class="col-sm-9">
			    		<select name="type_apparel" class="form-control" onchange="selectapparel(this)">
			    			<option value="AC">All Components</option>
			    			<option value="P">Panels</option>
			    		</select>
			    	</div>
			  	</div>
			  	<div class="form-group row ac-apparel">
			    	<label class="col-sm-3 col-form-label">QTY</label>
			    	<div class="col-sm-9">
			    		<input type="number" min="0" class="form-control" placeholder="Quantity" name="qty">
			    	</div>
			  	</div>				  	
			  	<div class="p-apparel" style="display: none;">			  		
				  	<div class="form-group row">
				    	<label class="col-sm-3 col-form-label">Panel Name</label>
				    	<div class="col-sm-9">
				    		<input type="text" class="form-control" placeholder="Panel Waist Band Name" name="waist">
				    	</div>
				  	</div>				
				  	<div class="form-group row">
				    	<label class="col-sm-3 col-form-label">Inner</label>
				    	<div class="col-sm-9">
				    		<input type="number" min="0" class="form-control" placeholder="Inner" name="inners">
				    	</div>
				  	</div>				
				  	<div class="form-group row">
				    	<label class="col-sm-3 col-form-label">Outer</label>
				    	<div class="col-sm-9">
				    		<input type="number" min="0" class="form-control" placeholder="Outer" name="outers">
				    	</div>
				  	</div>
			  	</div>
			  			  	
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Remarks</label>
			    	<div class="col-sm-9">
			    		<select name="remarks" name="remarks" class="form-control">
			    			<option value="F">F - Fabric Damage</option>
			    			<option value="C">C - Cutting Damage</option>
			    			<option value="S">S - Sewing Damage</option>
			    		</select>
			    	</div>
			  	</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary add-apparel">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     		<form id="form_apparel2">
			 	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Size</label>
			    	<div class="col-sm-9">
			    		<input type="text" class="form-control" placeholder="Size" name="size">
			    	</div>
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Type</label>
			    	<div class="col-sm-9">
			    		<select name="type_apparel" class="form-control" onchange="selectapparel2(this)">
			    			<option value="AC">All Components</option>
			    			<option value="P">Panels</option>
			    		</select>
			    	</div>
			  	</div>
			  	<div class="form-group row ac-apparel2">
			    	<label class="col-sm-3 col-form-label">QTY</label>
			    	<div class="col-sm-9">
			    		<input type="number" min="0" class="form-control" placeholder="Quantity" name="qty">
			    	</div>
			  	</div>				  	
			  	<div class="p-apparel2" style="display: none;">			  		
				  	<div class="form-group row">
				    	<label class="col-sm-3 col-form-label">Panel Name</label>
				    	<div class="col-sm-9">
				    		<input type="text" class="form-control" placeholder="Panel Body Band Name" name="body">
				    	</div>
				  	</div>				
				  	<div class="form-group row">
				    	<label class="col-sm-3 col-form-label">Left</label>
				    	<div class="col-sm-9">
				    		<input type="number" min="0" class="form-control" placeholder="Left" name="lefts">
				    	</div>
				  	</div>				
				  	<div class="form-group row">
				    	<label class="col-sm-3 col-form-label">Right</label>
				    	<div class="col-sm-9">
				    		<input type="number" min="0" class="form-control" placeholder="Right" name="rights">
				    	</div>
				  	</div>				  	
			  	</div>
			  	<div class="form-group row">
			    	<label class="col-sm-3 col-form-label">Remarks</label>
			    	<div class="col-sm-9">
			    		<select name="remarks" name="remarks" class="form-control">
			    			<option value="F">F - Fabric Damage</option>
			    			<option value="C">C - Cutting Damage</option>
			    			<option value="S">S - Sewing Damage</option>
			    		</select>
			    	</div>
			  	</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary add-apparel2">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="wait" style="display:none;width:auto;height:89px;position:absolute;top:50%;left:43%;padding:2px;"><img src='<?php echo base_url() ?>assets/demo_wait.gif'/><br>Loading ...</div>

<script>

function addrow() {
	$('#exampleModal').modal('show');
}

function selectpanty(id) {
	var type = id.value;
	if (type == "AC") {
		$(".shape_panty").attr("style", "display: none;");;
	}else{
		$(".shape_panty").removeAttr("style", "display: block;");;
	}
}

function selectbra(id) {
	var type = id.value;
	if (type == "AC") {
		$(".shape_bra").attr("style", "display: none;");;
	}else{
		$(".shape_bra").removeAttr("style", "display: block;");;
	}
}

function selectapparel(id) {
	var type = id.value;
	if (type == "AC") {
		$(".ac-apparel").removeAttr("style", "display: none;");		
		$(".p-apparel").attr("style", "display: none;");		
	}else{
		$(".p-apparel").attr("style", "display: block;");		
		$(".ac-apparel").attr("style", "display: none;");				
	}
}

function selectapparel2(id) {
	var type = id.value;
	if (type == "AC") {
		$(".ac-apparel2").removeAttr("style", "display: none;");		
		$(".p-apparel2").attr("style", "display: none;");		
	}else{
		$(".p-apparel2").attr("style", "display: block;");		
		$(".ac-apparel2").attr("style", "display: none;");				
	}
}


$(document).ready(function(){	
	$(document).ajaxStart(function(){
    	$("#wait").css("display", "block");
  	});
	$(document).ajaxComplete(function(){
	    $("#wait").css("display", "none");
	});

	
	view_attachment();
	function view_attachment() {
        var id = '<?php echo $order_id ?>';
        $.ajax({
            url : "<?php echo site_url('index.php/welcome/view_panty')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){   
                	html += "<tr class='text-center'>"+
        				"<td>"+data[i].size+"</td>"+
        				"<td>"+data[i].gusset+"<br>"+data[i].gusset_shape+"</td>"+
        				"<td>"+data[i].front+"<br>"+data[i].front_shape+"</td>"+
        				"<td>"+data[i].back+"<br>"+data[i].back_shape+"</td>"+
        				"<td>"+data[i].side+"<br>"+data[i].side_shape+"</td>"+
        				"<td>"+data[i].inners+"<br>"+data[i].inners_shape+"</td>"+
        				"<td>"+data[i].remarks+"</td>"+
        				"<td>"+data[i].type+"</td>"+
        				"<td>"+
        				'<button type="button" class="btn btn-danger btn-sm delete-panty" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
        				"</td></tr>";               	                    
                }
                $('#show_data').html(html);        
                // console.log(data.length);      
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
	}

	$('#show_data').on('click','.delete-panty',function(){
        var id = $(this).attr('data');                        
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/welcome/delete_panty')?>",
                dataType : "JSON",
                    data : {id: id},
                    success: function(data){                        
                        view_attachment();
                    }
            });                                          
    });


    $(".add-row").click(function(){
		$('#exampleModal').modal('show');
    }); 

    $(".add-panty").click(function(){
        var id = '<?php echo $order_id ?>';    	        
		url = "<?php echo site_url('index.php/welcome/add_row_panty/')?>"+id;                              
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),            
            dataType: "JSON",
            success: function(data)
            {
               $('#exampleModal').modal('hide');
               $('#form')[0].reset();
              	view_attachment();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    });

    $(".add-row_bra").click(function(){
		$('#exampleModal2').modal('show');
    }); 

    view_bra();
	function view_bra() {
        var id = '<?php echo $order_id_bra ?>';
        $.ajax({
            url : "<?php echo site_url('index.php/welcome/view_bra')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){   
                	html += "<tr class='text-center'>"+
        				"<td>"+data[i].size+"</td>"+
        				"<td>"+data[i].wing+"<br>"+data[i].wing_shape+"</td>"+
        				"<td>"+data[i].cf+"<br>"+data[i].cf_shape+"</td>"+
        				"<td>"+data[i].cup+"<br>"+data[i].cup_shape+"</td>"+
        				"<td>"+data[i].inners+"<br>"+data[i].inners_shape+"</td>"+
        				"<td>"+data[i].mesh+"<br>"+data[i].mesh_shape+"</td>"+
        				"<td>"+data[i].liner+"<br>"+data[i].liner_shape+"</td>"+
        				"<td>"+data[i].remarks+"</td>"+
        				"<td>"+data[i].type+"</td>"+        				
        				"<td>"+
        				'<button type="button" class="btn btn-danger btn-sm delete-bra" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
        				"</td></tr>";               	                    
                }
                $('#show_data2').html(html);        
                // console.log(data.length);      
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
	}

	$(".add-bra").click(function(){
        var id = '<?php echo $order_id_bra ?>';    	        
		url = "<?php echo site_url('index.php/welcome/add_row_bra/')?>"+id;                              
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form_bra').serialize(),            
            dataType: "JSON",
            success: function(data)
            {
               $('#exampleModal2').modal('hide');
               $('#form_bra')[0].reset();
              	view_bra();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    });

    $('#show_data2').on('click','.delete-bra',function(){
        var id = $(this).attr('data');                        
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/welcome/delete_bra')?>",
                dataType : "JSON",
                    data : {id: id},
                    success: function(data){                        
                        view_bra();
                    }
            });                                          
    });

    $(".add-row_mask").click(function(){
		$('#exampleModal3').modal('show');
    }); 

    view_mask();
	function view_mask() {
        var id = '<?php echo $order_id_mask ?>';
        $.ajax({
            url : "<?php echo site_url('index.php/welcome/view_mask')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){   
                	html += "<tr class='text-center'>"+
        				"<td>"+data[i].size+"</td>"+
        				"<td>"+data[i].panel+"</td>"+        				
        				"<td>"+data[i].remarks+"</td>"+
        				"<td>"+
        				'<button type="button" class="btn btn-danger btn-sm delete-mask" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
        				"</td></tr>";               	                    
                }
                $('#show_data3').html(html);        
                // console.log(data.length);      
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
	}

	$(".add-mask").click(function(){
        var id = '<?php echo $order_id_mask ?>';    	        
		url = "<?php echo site_url('index.php/welcome/add_row_mask/')?>"+id;                              
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form_mask').serialize(),            
            dataType: "JSON",
            success: function(data)
            {
               $('#exampleModal3').modal('hide');
               $('#form_mask')[0].reset();
              	view_mask();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    });

    $('#show_data3').on('click','.delete-mask',function(){
        var id = $(this).attr('data');                        
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/welcome/delete_mask')?>",
                dataType : "JSON",
                    data : {id: id},
                    success: function(data){                        
                        view_mask();
                    }
            });                                          
    });

    $(".add-row_apparel").click(function(){
		$('#exampleModal4').modal('show');
    }); 

    $(".add-row_apparel2").click(function(){
		$('#exampleModal5').modal('show');
    }); 

    view_apparel();
	function view_apparel() {
        var id = '<?php echo $order_id_apparel ?>';
        $.ajax({
            url : "<?php echo site_url('index.php/welcome/view_apparel')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){   
                	html += "<tr class='text-center'>"+
        				"<td>"+data[i].size+"</td>"+
        				"<td>"+data[i].waist+"</td>"+        				
        				"<td>"+data[i].inners+"</td>"+        				
        				"<td>"+data[i].outers+"</td>"+        				
        				"<td>"+data[i].qty+"</td>"+        				
        				"<td>"+data[i].remarks+"</td>"+
        				"<td>"+data[i].type+"</td>"+
        				"<td>"+
        				'<button type="button" class="btn btn-danger btn-sm delete-apparel" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
        				"</td></tr>";               	                    
                }
                $('#show_data4').html(html);        
                console.log(data);      
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });

        $.ajax({
            url : "<?php echo site_url('index.php/welcome/view_apparel2')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){   
                	html += "<tr class='text-center'>"+
        				"<td>"+data[i].size+"</td>"+
        				"<td>"+data[i].body+"</td>"+        				
        				"<td>"+data[i].lefts+"</td>"+        				
        				"<td>"+data[i].rights+"</td>"+        				
        				"<td>"+data[i].qty+"</td>"+        				
        				"<td>"+data[i].remarks+"</td>"+
        				"<td>"+data[i].type+"</td>"+
        				"<td>"+
        				'<button type="button" class="btn btn-danger btn-sm delete-apparel2" data="'+data[i].id+'"><i class="icon fa fa-trash"></i></button>' +
        				"</td></tr>";               	                    
                }
                $('#show_data5').html(html);        
                // console.log(data.length);      
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
	}

	$(".add-apparel").click(function(){
        var id = '<?php echo $order_id_apparel ?>';    	        
		url = "<?php echo site_url('index.php/welcome/add_row_apparel/')?>"+id;                              
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form_apparel').serialize(),            
            dataType: "JSON",
            success: function(data)
            {
               $('#exampleModal4').modal('hide');
               $('#form_apparel')[0].reset();
              	view_apparel();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    });

    $(".add-apparel2").click(function(){
        var id = '<?php echo $order_id_apparel ?>';    	        
		url = "<?php echo site_url('index.php/welcome/add_row_apparel2/')?>"+id;                              
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form_apparel2').serialize(),            
            dataType: "JSON",
            success: function(data)
            {
               $('#exampleModal5').modal('hide');
               $('#form_apparel2')[0].reset();
              	view_apparel();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    });

    $('#show_data4').on('click','.delete-apparel',function(){
        var id = $(this).attr('data');                        
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/welcome/delete_apparel')?>",
                dataType : "JSON",
                    data : {id: id},
                    success: function(data){                        
                        view_apparel();
                    }
            });                                          
    });

    $('#show_data5').on('click','.delete-apparel2',function(){
        var id = $(this).attr('data');                        
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/welcome/delete_apparel2')?>",
                dataType : "JSON",
                    data : {id: id},
                    success: function(data){                        
                        view_apparel();
                    }
            });                                          
    });

});
</script>