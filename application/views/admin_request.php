 <h4 class="page-title">Request Panty</h4>
 <div class="row">
 	<div class="col-lg-12"> 		
	 	<div class="card shadow mb-4">
	        <div class="card-header py-3">
	        	<div class="float-left">
	          		<h6 class="m-0 font-weight-bold text-primary">Data Request</h6>	        		
	        	</div>
	          	<div class="float-right">
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
								<th>Style</th>
								<th>Colour</th>
								<th>Status</th>
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
								<td><?php echo date('d-M', strtotime($data->date)).'/'.date('H:i', strtotime($data->time)) ?></td>
								<td><?php echo $data->style ?></td>
								<td><?php echo $data->colour ?></td>
								<td>
									<?php if ($data->check_qa == 0) {?>
										<span class="badge badge-danger">QA</span>										
									<?php }else{ ?>
										<span class="badge badge-success"><i class="la la-check"></i> QA</span>
									<?php } ?>
									<?php if ($data->check_vse == 0) {?>
										<span class="badge badge-danger">VSE</span>
									<?php }else{ ?>
										<span class="badge badge-success"><i class="la la-check"></i> VSE</span>
									<?php } ?>
									<?php if ($data->check_cutting == 0) {?>
										<span class="badge badge-danger">CUTTING</span>
									<?php }else{ ?>
										<span class="badge badge-success"><i class="la la-check"></i> CUTTING</span>
									<?php } ?>
								</td>
								<td>
									<?php 
									if ($data->check_qa == 0 && $this->session->userdata('level') == "QA") {
										echo "<a href='".base_url('admin/validate_panty/').$data->order_id."' class='btn btn-primary btn-sm' data-original-title='Validate' data-toggle='tooltip' onclick='return confirm(\"Are you sure ?\")'><i class='la la-check'></i></a>";
									}?>
									<?php 
									if ($data->check_cutting == 0 && $this->session->userdata('level') == "CUTTING") {
										echo "<a href='".base_url('admin/validate_panty/').$data->order_id."' class='btn btn-primary btn-sm' data-original-title='Validate' data-toggle='tooltip' onclick='return confirm(\"Are you sure ?\")'><i class='la la-check'></i></a>";
									}?>
									<?php 
									if ($data->check_vse == 0 && $this->session->userdata('level') == "VSE") {
										echo "<a href='".base_url('admin/validate_panty/').$data->order_id."' class='btn btn-primary btn-sm' data-original-title='Validate' data-toggle='tooltip' onclick='return confirm(\"Are you sure ?\")'><i class='la la-check'></i></a>";
									}?>

									<button type="button" onclick="detail('<?php echo $data->order_id ?>')" class="btn btn-warning btn-sm text-white" data-original-title="Detail" data-toggle="tooltip"><i class="la la-search-plus"></i>
									</button>
									<a href="<?php echo base_url('admin/download_panty/'.$data->order_id) ?>" target="_blank" class="btn btn-success btn-sm text-white" data-original-title="Print" data-toggle="tooltip"><i class="la la-print"></i></a>
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
	      					C - Cutting Damage    					
	  					</div>
	  				</div>
				</div><hr>
				<table class="table table-bordered table-sm">
  					<thead>
  						<tr class="text-center">
  							<th>SIZE</th>
  							<th>GUSSET</th>
  							<th>FRONT</th>
  							<th>BACK</th>
  							<th>SIDE</th>
  							<th>INNER</th>
  							<th>REMARKS</th>  							
  						</tr>
  					</thead>
  					<tbody id="show_data">
  						
  					</tbody>
  				</table><hr>
  				<div class="row clearfix row-relative">
  					<div class="col-md-3 col-lg-3">  						
		  				Total Gusset : <span class="tgusset text-danger"></span><br>
		  				Total Front : <span class="tfront text-danger"></span><br>
		  				Total Back : <span class="tback text-danger"></span><br>
		  				Total Side : <span class="tside text-danger"></span><br>
		  				Total Inner : <span class="tinner text-danger"></span>  					
  					</div>
  					<div class="col-md-3 col-lg-3 col-border">
  						<div class="text-center">
  							<p>Check by QA</p>
  							<img src="" class="img-qa" height="70">
  						</div>
  					</div>
  					<div class="col-md-3 col-lg-3 col-border">
  						<div class="text-center">
  							<p>Check by VSE</p>
  							<img src="" class="img-vse" height="70">
  						</div>
  					</div>
  					<div class="col-md-3 col-lg-3 col-border">
  						<div class="text-center">
  							<p>Check by CUTTING</p>
  							<img src="" class="img-cutting" height="70">
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
				<?php echo form_open('admin/exportexcel'); ?>
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



<script>
	function detail(id) {
		$.ajax({
            url : "<?php echo site_url('index.php/welcome/get_panty')?>/"+id,
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
        				"<td>"+data[i].gusset+"</td>"+
        				"<td>"+data[i].front+"</td>"+
        				"<td>"+data[i].back+"</td>"+
        				"<td>"+data[i].side+"</td>"+
        				"<td>"+data[i].inners+"</td>"+
        				"<td>"+data[i].remarks+"</td>"+        				
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
            url : "<?php echo site_url('index.php/welcome/total_panty')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
            	$('.tgusset').text(data.totgusset);
            	$('.tfront').text(data.totfront);
            	$('.tside').text(data.totside);
            	$('.tback').text(data.totback);
            	$('.tinner').text(data.totinners);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
	}

	function xls() {
		$('#export').modal('show');
	}
</script>