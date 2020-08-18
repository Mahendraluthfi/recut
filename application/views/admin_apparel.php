<style>	
   .list-group-item{
        padding: 5px;
        font-size: 11px;
    }
</style>
 <h4 class="page-title">Request Apparel</h4>
 <div class="row">
 	<div class="col-lg-12"> 		
	 	<div class="card shadow mb-4">
	        <div class="card-header py-3">
	        	<div class="float-left">
	          		<h6 class="m-0 font-weight-bold text-primary">Data Request</h6>	        		
	        	</div>
	          	<div class="float-right">
	          		<button type="button" class="btn btn-success btn-sm" onclick="sent()"><i class="la la-check"></i> Sent</button>	          			
	          		<button type="button" class="btn btn-primary btn-sm" onclick="xls()"><i class="la la-file-excel-o"></i> Export</button>
	          	</div>
	        </div>
	        <div class="card-body">
	        	<div class="table-responsive">
	        		<table class="table table-bordered" id="example">
	        			<thead>
	        				<tr>
	        					<th width="5%">No</th>
								<th>PO</th>
								<th>SO</th>
								<th>Line</th>
								<th>Datetime</th>
								<th>Estimate</th>
								<th>Last Status</th>
								<th>Approved</th>
								<th>#</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				<?php $no=1; foreach ($get as $data) { ?>
	        				<tr>
	        					<td><?php echo $no++ ?></td>
								<td><?php echo $data->po ?></td>
								<td><?php echo $data->so ?></td>
								<td><?php echo $data->line ?></td>
								<td><?php echo date('d-M', strtotime($data->date)).' / '.date('H:i', strtotime($data->time)) ?></td>
								<td
								<?php if(date('Y-m-d H:i:s') > date('Y-m-d H:i:s', strtotime($data->time_estimated))){echo "class='bg-danger text-white'";} ?>
								><?php echo date('d-M / H:i', strtotime($data->time_estimated)) ?></td>								
								<td>
                        			<?php foreach ($data->getstatus as $datastatus) {
                            		echo "<span class='badge badge-info'>".$datastatus->status."</span>";
                        			} ?>               
                    			</td>
                    			<td class="text-center">
                    				<?php if ($data->check_qa == 0) {?>
										<span class="badge badge-danger">QA</span>										
									<?php }else{ ?>
										<span class="badge badge-success">QA</span>
									<?php } ?>
									<?php if ($data->check_lab == 0) {?>
										<span class="badge badge-danger">Lab</span>										
									<?php }else{ ?>
										<span class="badge badge-success">Lab</span>
									<?php } ?>
									<p></p>
									<?php if ($data->check_vse == 0) {?>
										<span class="badge badge-danger">VSE</span>
									<?php }else{ ?>
										<span class="badge badge-success">VSE</span>
									<?php } ?>
									<?php if ($data->check_cutting == 0) {?>
										<span class="badge badge-danger">Cutting</span>
									<?php }else{ ?>
										<span class="badge badge-success">Cutting</span>
									<?php } ?>                            		
                    			</td>
								<td>
									<?php 
									if ($data->check_qa == 0 && $this->session->userdata('level') == "QA") {
										echo "<a href='".base_url('admin/validate_apparel/').$data->order_id."' class='btn btn-danger btn-sm' data-original-title='Validate' data-toggle='tooltip' onclick='return confirm(\"Are you sure ?\")'><i class='la la-check'></i></a>";
									}?>
									<?php 
									if ($data->check_cutting == 0 && $data->check_qa == 1 && $this->session->userdata('level') == "CUTTING") {
										echo "<a href='".base_url('admin/validate_apparel/').$data->order_id."' class='btn btn-danger btn-sm' data-original-title='Validate' data-toggle='tooltip' onclick='return confirm(\"Are you sure ?\")'><i class='la la-check'></i></a>";		
									}?>
									<?php 
									if ($data->check_lab == 0 && $data->check_qa == 1 && $this->session->userdata('level') == "LAB") {
										echo "<a href='".base_url('admin/validate_apparel/').$data->order_id."' class='btn btn-danger btn-sm' data-original-title='Validate' data-toggle='tooltip' onclick='return confirm(\"Are you sure ?\")'><i class='la la-check'></i></a>";										
									}?>
									<?php 
									if ($data->check_vse == 0 && $data->check_qa == 1 && $this->session->userdata('level') == "VSE") {
										echo "<a href='".base_url('admin/validate_apparel/').$data->order_id."' class='btn btn-danger btn-sm' data-original-title='Validate' data-toggle='tooltip' onclick='return confirm(\"Are you sure ?\")'><i class='la la-check'></i></a>";
									}?>
									<button onclick="status_get('<?php echo $data->order_id ?>','<?php echo $data->po ?>')" class="btn btn-info btn-sm" data-original-title="Add Status" data-toggle="tooltip"><i class="la la-pencil-square" ></i></button>
									<button type="button" onclick="detail('<?php echo $data->order_id ?>')" class="btn btn-warning btn-sm text-white" data-original-title="Detail" data-toggle="tooltip"><i class="la la-search-plus"></i>
									</button>
									<?php if ($this->session->userdata('level')=="CUTTING") { ?>
										<button onclick="send_item('<?php echo $data->order_id ?>','<?php echo $data->po ?>')" class="btn btn-success btn-sm" data-original-title="Send" data-toggle="tooltip"><i class="la la-cart-arrow-down"></i></button>
									<?php } ?>
									<a href="<?php echo base_url('admin/download_apparel/'.$data->order_id) ?>" target="_blank" class="btn btn-secondary btn-sm text-white" data-original-title="Print" data-toggle="tooltip"><i class="la la-print"></i></a>
								</td>
	        				</tr>
	        				<?php } ?>
	        			</tbody>
	        		</table>
	        	</div>
	        </div>
      	</div>
 	</div>
 </div>

<div class="modal fade bd-example-modal-lg" id="sent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width: 960px;">
    <div class="modal-content">
    	<div class="modal-header">
			<h5 class="modal-title">Sent Record</h5>
		</div>
		<div class="modal-body">			
	        	<div class="table-responsive">
	        		<table class="table table-bordered" id="example2">
	        			<thead>
	        				<tr>
	        					<th width="5%">No</th>
								<th>PO</th>
								<th>SO</th>
								<th>Line</th>
								<th>Datetime</th>
								<th>Estimate</th>
								<th>Last Status</th>
								<th>Approved</th>
								<th>#</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				<?php $no=1; foreach ($sent as $data) { ?>
	        				<tr>
	        					<td><?php echo $no++ ?></td>
								<td><?php echo $data->po ?></td>
								<td><?php echo $data->so ?></td>
								<td><?php echo $data->line ?></td>
								<td><?php echo date('d-M', strtotime($data->date)).' / '.date('H:i', strtotime($data->time)) ?></td>
								<td
								<?php if(date('Y-m-d H:i:s') > date('Y-m-d H:i:s', strtotime($data->time_estimated))){echo "class='bg-danger text-white'";} ?>
								><?php echo date('d-M / H:i', strtotime($data->time_estimated)) ?></td>								
								<td>
                        			<?php foreach ($data->getstatus as $datastatus) {
                            		echo "<span class='badge badge-info'>".$datastatus->status."</span>";
                        			} ?>               
                    			</td>
                    			<td class="text-center">
                    				<?php if ($data->check_qa == 0) {?>
										<span class="badge badge-danger">QA</span>										
									<?php }else{ ?>
										<span class="badge badge-success">QA</span>
									<?php } ?>
									<?php if ($data->check_lab == 0) {?>
										<span class="badge badge-danger">Lab</span>										
									<?php }else{ ?>
										<span class="badge badge-success">Lab</span>
									<?php } ?>
									<p></p>
									<?php if ($data->check_vse == 0) {?>
										<span class="badge badge-danger">VSE</span>
									<?php }else{ ?>
										<span class="badge badge-success">VSE</span>
									<?php } ?>
									<?php if ($data->check_cutting == 0) {?>
										<span class="badge badge-danger">Cutting</span>
									<?php }else{ ?>
										<span class="badge badge-success">Cutting</span>
									<?php } ?>                            		
                    			</td>
								<td>																	
									<button type="button" onclick="detail('<?php echo $data->order_id ?>')" class="btn btn-warning btn-sm text-white" data-original-title="Detail" data-toggle="tooltip"><i class="la la-search-plus"></i>
									</button>
									<a href="<?php echo base_url('admin/download_apparel/'.$data->order_id) ?>" target="_blank" class="btn btn-secondary btn-sm text-white" data-original-title="Print" data-toggle="tooltip"><i class="la la-print"></i></a>
								</td>
	        				</tr>
	        				<?php } ?>
	        			</tbody>
	        		</table>
	        	</div>
	        
		</div>
    </div>
  </div>
</div>

<div class="modal fade " id="detailmodal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Request Detail</h4>
			</div>
			<div class="modal-body">
  				<div class="row clearfix row-relative">			
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	  					<div class="form-row">
	  						<div class="col-4">
	  							<label class="col-form-label">#PO</label>
	  						</div>
							<div class="col-8">
								<label class="col-form-label text-primary po"></label>
							</div>
	  					</div>	
	  					<div class="form-row">
	  						<div class="col-4">
	  							<label class="col-form-label">#SO</label>
	  						</div>
							<div class="col-8">
								<label class="col-form-label text-primary so"></label>
							</div>
	  					</div>	
	  					<div class="form-row">
	  						<div class="col-4">
	  							<label class="col-form-label">LINE</label>
	  						</div>
							<div class="col-8">
								<label class="col-form-label text-primary line"></label>
							</div>
	  					</div>
	  					<div class="form-row">
	  						<div class="col-4">
	  							<label class="col-form-label">Shift</label>
	  						</div>
							<div class="col-8">
								<label class="col-form-label text-primary shift"></label>
							</div>
	  					</div>	
	  				</div>
	  				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-border">
	  					<div class="col-border-padding">
	  					<div class="form-row">
	  						<div class="col-4">
	  							<label class="col-form-label">Date</label>
	  						</div>
							<div class="col-8">
								<label class="col-form-label text-primary date"></label>
							</div>
	  					</div>	
	  					<div class="form-row">
	  						<div class="col-4">
	  							<label class="col-form-label">Time</label>
	  						</div>
							<div class="col-8">
								<label class="col-form-label text-primary time"></label>
							</div>
	  					</div>
	  					<div class="form-row">
	  						<div class="col-4">
	  							<label class="col-form-label">Estimated</label>
	  						</div>
							<div class="col-8">
								<label class="col-form-label text-primary estimated"></label>
							</div>
	  					</div>
	  					<div class="form-row">
	  						<div class="col-4">
	  							<label class="col-form-label">Style</label>
	  						</div>
							<div class="col-8">
								<label class="col-form-label text-primary style"></label>
							</div>
	  					</div>	
	  					</div>      					
	  				</div>
	  				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-border">
	  					<div class="col-border-padding">
	  						<div class="form-row">
	      						<div class="col-4">
	      							<label class="col-form-label">Colour</label>
	      						</div>
								<div class="col-8">
									<label class="col-form-label text-primary colour"></label>
								</div>
	  						</div>
	  						F - Fabric Damage <br>      					
	      					S - Sewing Damage <br>      					
	      					C - Cutting Damage <br>
                			AC - All Components <br>
                			P - Panels            					
	  					</div>
	  				</div>
				</div><hr>
				<table class="table table-bordered table-sm">
  					<thead>
  						<tr class="text-center">
		                    <th>SIZE</th>
		                    <th>PANEL WAIST BAND NAME</th>                                      
		                    <th>INNER</th>                                      
		                    <th>OUTER</th>                                      
		                    <th>QTY</th>                                        
		                    <th>REMARKS</th>
		                    <th>TYPE</th>                                       
		                </tr>
  					</thead>
  					<tbody id="show_data">
  						
  					</tbody>
  				</table>
  				 <table class="table table-bordered">
		              <thead>
		                  <tr class="text-center">
		                      <th>SIZE</th>
		                      <th>PANEL BODY BAND NAME</th>                                       
		                      <th>LEFT</th>                                       
		                      <th>RIGHT</th>                                      
		                      <th>QTY</th>                                        
		                      <th>REMARKS</th>
		                      <th>TYPE</th>                                       
		                  </tr>
		              </thead>
		              <tbody id="show_data2">
		                  
		              </tbody>
		          </table>
  				<hr>
  				<div class="row clearfix row-relative">
  					<div class="col-md-3 col-lg-3">
		                Full Garment Waist : <span class="total_waist text-danger"></span><br>
		                Total Inner : <span class="total_inners text-danger"></span><br>
		                Total Outer : <span class="total_outers text-danger"></span><br>
		                Full Garment Body : <span class="total_waist text-danger"></span><br>
		                Total Left : <span class="total_lefts text-danger"></span><br>
		                Total Right : <span class="total_rights text-danger"></span><br>
		            </div>
  					<div class="col-md-3 col-lg-3 col-border">
		                <center>Status</center>                
		                <ul class="list-group status-apparel" style="padding-left: 10px;">
		                    
		                </ul>
		            </div>
		            <div class="col-md-6 col-lg-6 col-border">
		                <div class="row">
		                    <div class="col">
		                        <div class="text-center">                            
		                            <p>Check by QA</p>
		                            <img src="" class="img-qa" height="70"><hr>
		                            <p>Check by VSE</p>
		                            <img src="" class="img-vse" height="70">                        
		                        </div>
		                    </div>
		                    <div class="col col-border">
		                        <div class="text-center">                                                    
		                            <p>Check by LAB</p>
		                            <img src="" class="img-lab" height="70"><hr>
		                            <p>Check by CUTTING</p>
		                            <img src="" class="img-cutting" height="70"> 
		                        </div>                       
		                    </div>                    
		                </div>                
		            </div>  
  				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade " id="export">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Export Data</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open('admin/apparelexcel'); ?>
				<div class="form-group">
					<label for="datestart">Date Start</label>
					<input type="date" class="form-control form-control-sm" id="datestart" placeholder="Date Start" name="ds">
				</div>
				<div class="form-group">
					<label for="dateend">Date End</label>
					<input type="date" class="form-control form-control-sm" id="dateend" placeholder="Date End" name="de">
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-sm"><i class="la la-download"></i> Export</button>
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<div class="modal fade " id="send">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title sendtitle"></h6>
			</div>
			<div class="modal-body">
			<?php echo form_open('', array('class' => 'frmsent')); ?>
				<div class="alert alert-warning text-center" style="padding-left: 20px;">
					This issue has been cleared and move to sent request record.<br>
					<b>Are you sure to fix this issue ?</b>  
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary btn-sm"><i class="la la-check"></i> Send Item</button>				
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<div class="modal fade " id="status">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title statustitle"></h6>
			</div>
			<div class="modal-body">
				<ul class="list-group status-apparel2" style="padding-left: 10px;"></ul>
				<?php echo form_open('', array('class' => 'statusform')); ?>
				<div class="form-group text-center">
					<input type="hidden" name="vid">
					<textarea name="status" class="form-control" placeholder="Add Status"></textarea><br>
					<button type="submit" class="btn btn-success btn-sm"><i class="la la-plus"></i> Add Status</button>
				</div>
			<?php echo form_close(); ?>				
			</div>			
		</div>
	</div>
</div>

<script>
	function detail(id) {
		$.ajax({
            url : "<?php echo site_url('index.php/welcome/get_apparel')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
            	const date = new Date(data.date)
				const dateTimeFormat = new Intl.DateTimeFormat('en', { year: 'numeric', month: 'short', day: '2-digit' }) 
				const [{ value: month },,{ value: day },,{ value: year }] = dateTimeFormat .formatToParts(date )
            	$('.po').text(data.po);
            	$('.so').text(data.so);
            	$('.line').text(data.line);
            	$('.date').text(`${day}-${month}-${year }`);
            	$('.time').text(data.time);
            	$('.style').text(data.style);
            	$('.colour').text(data.colour);
            	$('.shift').text(data.shift);
            	$('.estimated').text(data.time_estimated);
            	$('.remarks').text("Remarks: "+data.remarks);            	            	
            	if (data.check_qa == 1) {
            		$('.img-qa').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
            	}else{
            		$('.img-qa').attr('src','')            		
            	}
            	if (data.check_vse == 1) {
            		$('.img-vse').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
            	}else{
            		$('.img-vse').attr('src','')            		
            	}
            	if (data.check_lab == 1) {
            		$('.img-lab').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
            	}else{
            		$('.img-lab').attr('src','')            		
            	}
            	if (data.check_cutting == 1) {
            		$('.img-cutting').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
            	}else{
            		$('.img-cutting').attr('src','')            		
            	}
            	console.log(data);
				$('#detailmodal').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
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
                        "</tr>";                                       
                }
                $('#show_data').html(html);        
                console.log(data.length);      
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
                        "</tr>";                                       
                }
                $('#show_data2').html(html);        
                // console.log(data.length);      
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });

        $.ajax({
            url : "<?php echo site_url('index.php/welcome/total_apparel')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('.total_waist').text(data.total_waist);
                $('.total_body').text(data.total_body);
                $('.total_inners').text(data.total_inners);
                $('.total_outers').text(data.total_outers);
                $('.total_lefts').text(data.total_lefts);
                $('.total_rights').text(data.total_rights);
                // console.log(data);              
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });

        $.ajax({
            url : "<?php echo site_url('index.php/welcome/status_apparel')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;               
                for(i=0; i<data.length; i++){   
            html += '<li class="list-group-item list-group-item-action list-group-item-success d-flex justify-content-between align-items-center">'+data[i].status+
                    '<span class="badge badge-primary badge-pill">'+data[i].time+'</span>'+
                    '</li>';                                    
                }
                $('.status-apparel').html(html);        
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
	}

	function xls() {
		$('#export').modal('show');
	}

	function sent() {
		$('#sent').modal('show');
	}

	function send_item(id,po) {
		$('.frmsent').attr('action','<?php echo base_url('admin/senditem/order_apparel/') ?>'+id);
		$('.sendtitle').text('Send Request #PO-'+po);
		$('#send').modal('show');
	}

	function status_get(id,po) {
		$.ajax({
            url : "<?php echo site_url('index.php/welcome/status_apparel')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;               
                for(i=0; i<data.length; i++){   
            html += '<li class="list-group-item list-group-item-action list-group-item-success d-flex justify-content-between align-items-center">'+data[i].status+
                    '<span class="badge badge-primary badge-pill">'+data[i].time+'</span>'+
                    '</li>';                                    
                }
                $('.status-apparel2').html(html);        
				$('.statustitle').text('Status PO# - '+po);
				$('.statusform').attr('action','<?php echo base_url('admin/addstatus_apparel/') ?>'+id);				
				$('#status').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });

	}
</script>