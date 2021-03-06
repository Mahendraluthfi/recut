<style>
    .list-group-item{
        padding: 5px;
        font-size: 11px;
    }
</style>
<header class="bg-info text-white" style="padding-bottom: 40px; padding-top: 95px;">
    <div class="container text-center">
      <h3>
      <img src="<?php echo base_url() ?>assets/mas_icon.png" height="30" alt="" style="margin-bottom: 8px;"> Recut System</h3><br>
        <a href="<?php echo base_url('welcome/request') ?>" class="btn btn-danger"><i class="fa fa-file"></i> Request Form</a>
    </div>
  </header>    
    <div class="py-3 container">
		<h4>Today's Request</h4>
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
		      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Panty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bra</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-mask" role="tab" aria-controls="pills-mask" aria-selected="false">Mask</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-apparel" role="tab" aria-controls="pills-apparel" aria-selected="false">Apparel</a>
            </li>
		</ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              	<table class="table table-bordered table-sm" id="example">
        			<thead>
        				<tr class="bg-info text-white">
        					<th>PO</th>
        					<th>SO</th>
        					<th>Line</th>
        					<th>Datetime</th>
        					<th>Estimate</th>
        					<th>Last Status</th>
        					<th width="16%">#</th>
        				</tr>
        			</thead>
        			<tbody>
        				<?php $no=1; foreach ($panty as $data) { ?>
        				<tr>
        					<td><?php echo $data->po ?></td>
        					<td><?php echo $data->so ?></td>
        					<td><?php echo $data->line ?></td>
                            <td><?php echo date('d-M', strtotime($data->date)).' / '.date('H:i', strtotime($data->time)) ?></td>
        					<td><?php echo date('d-M / H:i', strtotime($data->time_estimated)) ?></td>
        					<td>
                                <?php foreach ($data->getstatus as $datastatus) {
                                    echo "<span class='badge badge-secondary'>".$datastatus->status."</span>";
                                } ?>               
                            </td>
        					<td>
        						<button type="button" onclick="detail('<?php echo $data->order_id ?>')" class="btn btn-warning btn-sm text-white"><i class="fa fa-search-plus"></i> Detail</button>
                                <?php if($data->remarks == '1' || $data->remarks == '2'){ ?>
                                <button type="button" class="btn btn-success btn-sm" onclick="receive('<?php echo $data->order_id ?>','panty','<?php echo $data->po ?>')"><i class="fa fa-shopping-basket"></i> Receive</button><?php } ?>
        					</td>
        				</tr>
        			<?php } ?>
        			</tbody>
            	</table>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <table class="table table-bordered table-sm" id="example2">
                  <thead>
                    <tr class="bg-info text-white">
                      <th>PO</th>
                      <th>SO</th>
                      <th>Line</th>
                      <th>Datetime</th>
                      <th>Style</th>
                      <th>Colour</th>
                      <th>Last Status</th>
                      <th width="141">#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($bra as $data) { ?>
                    <tr>
                      <td><?php echo $data->po ?></td>
                      <td><?php echo $data->so ?></td>
                      <td><?php echo $data->line ?></td>
                      <td><?php echo date('d-M', strtotime($data->date)).'/'.date('H:i', strtotime($data->time)) ?></td>
                      <td><?php echo $data->style ?></td>
                      <td><?php echo $data->colour ?></td>
                      <td>
                            <?php foreach ($data->getstatus as $datastatus) {
                                echo "<span class='badge badge-secondary'>".$datastatus->status."</span>";
                            } ?>               
                      </td>
                      <td>
                        <button type="button" onclick="detail_bra('<?php echo $data->order_id ?>')" class="btn btn-warning btn-sm text-white"><i class="fa fa-search-plus"></i> Detail</button>
                        <?php if($data->remarks == '1' || $data->remarks == '2'){ ?>
                        <button type="button" class="btn btn-success btn-sm" onclick="receive('<?php echo $data->order_id ?>','bra','<?php echo $data->po ?>')"><i class="fa fa-shopping-basket"></i> Receive</button><?php } ?>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-mask" role="tabpanel" aria-labelledby="pills-mask-tab">    
                <table class="table table-bordered table-sm" id="example3">
                <thead>
                    <tr class="bg-info text-white">
                        <th>PO</th>
                        <th>SO</th>
                        <th>Line</th>
                        <th>Datetime</th>
                        <th>Style</th>
                        <th>Colour</th>
                        <th>Last Status</th>
                        <th width="16%">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($mask as $data) { ?>
                    <tr>
                        <td><?php echo $data->po ?></td>
                        <td><?php echo $data->so ?></td>
                        <td><?php echo $data->line ?></td>
                        <td><?php echo date('d-M', strtotime($data->date)).'/'.date('H:i', strtotime($data->time)) ?></td>
                        <td><?php echo $data->style ?></td>
                        <td><?php echo $data->colour ?></td>
                        <td>
                            <?php foreach ($data->getstatus as $datastatus) {
                                echo "<span class='badge badge-secondary'>".$datastatus->status."</span>";
                            } ?>               
                        </td>
                        <td>
                            <button type="button" onclick="detail_mask('<?php echo $data->order_id ?>')" class="btn btn-warning btn-sm text-white"><i class="fa fa-search-plus"></i> Detail</button>
                            <?php if($data->remarks == '1' || $data->remarks == '2'){ ?>
                            <button type="button" class="btn btn-success btn-sm" onclick="receive('<?php echo $data->order_id ?>','mask','<?php echo $data->po ?>')"><i class="fa fa-shopping-basket"></i> Receive</button><?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-apparel" role="tabpanel" aria-labelledby="pills-apparel-tab">    
                <table class="table table-bordered table-sm" id="example4">
                <thead>
                    <tr class="bg-info text-white">
                        <th>PO</th>
                        <th>SO</th>
                        <th>Line</th>
                        <th>Datetime</th>
                        <th>Style</th>
                        <th>Colour</th>
                        <th>Last Status</th>
                        <th width="16%">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($apparel as $data) { ?>
                    <tr>
                        <td><?php echo $data->po ?></td>
                        <td><?php echo $data->so ?></td>
                        <td><?php echo $data->line ?></td>
                        <td><?php echo date('d-M', strtotime($data->date)).'/'.date('H:i', strtotime($data->time)) ?></td>
                        <td><?php echo $data->style ?></td>
                        <td><?php echo $data->colour ?></td>
                        <td>
                            <?php foreach ($data->getstatus as $datastatus) {
                                echo "<span class='badge badge-secondary'>".$datastatus->status."</span>";
                            } ?>               
                        </td>
                        <td>
                            <button type="button" onclick="detail_apparel('<?php echo $data->order_id ?>')" class="btn btn-warning btn-sm text-white"><i class="fa fa-search-plus"></i> Detail</button>
                            <?php if($data->remarks == '1' || $data->remarks == '2'){ ?>
                            <button type="button" class="btn btn-success btn-sm" onclick="receive('<?php echo $data->order_id ?>','apparel','<?php echo $data->po ?>')"><i class="fa fa-shopping-basket"></i> Receive</button><?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>
        </div>	
    </div>

<div class="modal fade " id="detailmodal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Panty Recut Request Detail</h4>
			</div>
			<div class="modal-body" style="font-size: 13px;">
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
  						<tr class="bg-secondary text-white text-center">
  							<th>SIZE</th>
  							<th>GUSSET</th>
  							<th>FRONT</th>
  							<th>BACK</th>
  							<th>SIDE</th>
  							<th>INNER</th>
                <th>REMARKS</th>                
  							<th>TYPE</th>  							
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
                <center>Status</center>                
                <ul class="list-group status-panty" style="padding-left: 10px;">
                    
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
                    <!-- <div class="col col-border">
                      <div class="text-center">
                      </div>
                    </div>
                    <div class="col col-border">
                      <div class="text-center">
                      </div>
                    </div> -->
                  </div>
            </div>
        </div>            
			<div class="row clearfix row-relative"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade " id="detailbramodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Bra Recut Request Detail</h4>
      </div>
      <div class="modal-body" style="font-size: 13px;">
        <div class="row clearfix row-relative">     
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="form-row">
                    <div class="col-4">
                        <label class="col-form-label">#PO</label>
                    </div>
                    <div class="col-8">
                    <label class="col-form-label text-primary po_bra"></label>
                    </div>
                </div>  
                <div class="form-row">
                    <div class="col-4">
                        <label class="col-form-label">#SO</label>
                    </div>
                    <div class="col-8">
                    <label class="col-form-label text-primary so_bra"></label>
                    </div>
                </div>  
                <div class="form-row">
                    <div class="col-4">
                        <label class="col-form-label">LINE</label>
                    </div>
                    <div class="col-8">
                        <label class="col-form-label text-primary line_bra"></label>
                    </div>
                </div>  
                <div class="form-row">
                    <div class="col-4">
                        <label class="col-form-label">Shift</label>
                    </div>
                    <div class="col-8">
                        <label class="col-form-label text-primary shift_bra"></label>
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
                            <label class="col-form-label text-primary date_bra"></label>
                        </div>
                    </div>  
                    <div class="form-row">
                        <div class="col-4">
                            <label class="col-form-label">Time</label>
                        </div>
                        <div class="col-8">
                            <label class="col-form-label text-primary time_bra"></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-4">
                            <label class="col-form-label">Estimated</label>
                        </div>
                        <div class="col-8">
                            <label class="col-form-label text-primary estimated_bra"></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-4">
                            <label class="col-form-label">Style</label>
                        </div>
                        <div class="col-8">
                            <label class="col-form-label text-primary style_bra"></label>
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
                            <label class="col-form-label text-primary colour_bra"></label>
                        </div>
                    </div>
                        F - Fabric Damage <br>                
                        S - Sewing Damage <br>                
                        C - Cutting Damage  <br>                
                    AC - All Components <br>                
                    P - Panels                 
                </div>
            </div>
        </div><hr>
        <table class="table table-bordered table-sm">
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
              </tr>
            </thead>
            <tbody id="show_data2">
              
            </tbody>
        </table><hr>
        <div class="row clearfix row-relative">
            <div class="col-md-3 col-lg-3">
              Total Wing : <span class="twing text-danger"></span><br>
              Total CF : <span class="tcf text-danger"></span><br>
              Total Cup : <span class="tcup text-danger"></span><br>
              Total Inner : <span class="tinners text-danger"></span><br>
              Total Mesh : <span class="tmesh text-danger"></span><br>            
              Total Liner : <span class="tliner text-danger"></span>            
            </div>
            <div class="col-md-3 col-lg-3 col-border">
                <center>Status</center>                
                <ul class="list-group status-bra" style="padding-left: 10px;">
                    
                </ul>
            </div>
            <div class="col-md-6 col-lg-6 col-border">
                <div class="row">
                    <div class="col">
                        <div class="text-center">                            
                            <p>Check by QA</p>
                            <img src="" class="img-qa-bra" height="70"><hr>
                            <p>Check by VSE</p>
                            <img src="" class="img-vse-bra" height="70">                        
                        </div>
                    </div>
                    <div class="col col-border">
                        <div class="text-center">                                                    
                            <p>Check by LAB</p>
                            <img src="" class="img-lab-bra" height="70"><hr>
                            <p>Check by CUTTING</p>
                            <img src="" class="img-cutting-bra" height="70"> 
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

<div class="modal fade " id="detailmaskmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Mask Recut Request Detail</h4>
      </div>
      <div class="modal-body" style="font-size: 13px;">
        <div class="row clearfix row-relative">     
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="form-row">
              <div class="col-4">
                <label class="col-form-label">#PO</label>
              </div>
            <div class="col-8">
              <label class="col-form-label text-primary po_mask"></label>
            </div>
            </div>  
            <div class="form-row">
              <div class="col-4">
                <label class="col-form-label">#SO</label>
              </div>
            <div class="col-8">
              <label class="col-form-label text-primary so_mask"></label>
            </div>
            </div>  
            <div class="form-row">
              <div class="col-4">
                <label class="col-form-label">LINE</label>
              </div>
            <div class="col-8">
              <label class="col-form-label text-primary line_mask"></label>
            </div>
            </div> 
            <div class="form-row">
                <div class="col-4">
                    <label class="col-form-label">Shift</label>
                </div>
                <div class="col-8">
                    <label class="col-form-label text-primary shift_mask"></label>
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
              <label class="col-form-label text-primary date_mask"></label>
            </div>
            </div>  
            <div class="form-row">
              <div class="col-4">
                <label class="col-form-label">Time</label>
              </div>
            <div class="col-8">
              <label class="col-form-label text-primary time_mask"></label>
            </div>
            </div>
             <div class="form-row">
                <div class="col-4">
                    <label class="col-form-label">Estimated</label>
                </div>
                <div class="col-8">
                    <label class="col-form-label text-primary estimated_mask"></label>
                </div>
            </div>
            <div class="form-row">
              <div class="col-4">
                <label class="col-form-label">Style</label>
              </div>
            <div class="col-8">
              <label class="col-form-label text-primary style_mask"></label>
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
                <label class="col-form-label text-primary colour_mask"></label>
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
              <tr class="bg-secondary text-white text-center">
                <th>SIZE</th>
                <th>MAIN PANEL</th>                
                <th>REMARKS</th>               
              </tr>
            </thead>
            <tbody id="show_data3">
              
            </tbody>
          </table><hr>
          <div class="row clearfix row-relative">
            <div class="col-md-3 col-lg-3">
              Total Main Panel : <span class="tpanel text-danger"></span><br>              
            </div>
            <div class="col-md-3 col-lg-3 col-border">
                <center>Status</center>                
                <ul class="list-group status-mask" style="padding-left: 10px;">
                    
                </ul>
            </div>
            <div class="col-md-6 col-lg-6 col-border">
                <div class="row">
                    <div class="col">
                        <div class="text-center">                            
                            <p>Check by QA</p>
                            <img src="" class="img-qa-mask" height="70"><hr>
                            <p>Check by VSE</p>
                            <img src="" class="img-vse-mask" height="70">                        
                        </div>
                    </div>
                    <div class="col col-border">
                        <div class="text-center">                                                    
                            <p>Check by LAB</p>
                            <img src="" class="img-lab-mask" height="70"><hr>
                            <p>Check by CUTTING</p>
                            <img src="" class="img-cutting-mask" height="70"> 
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

<div class="modal fade " id="detailapparelmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Apparel Recut Request Detail</h4>
      </div>
      <div class="modal-body" style="font-size: 13px;">
        <div class="row clearfix row-relative">     
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="form-row">
              <div class="col-4">
                <label class="col-form-label">#PO</label>
              </div>
            <div class="col-8">
              <label class="col-form-label text-primary po_apparel"></label>
            </div>
            </div>  
            <div class="form-row">
              <div class="col-4">
                <label class="col-form-label">#SO</label>
              </div>
            <div class="col-8">
              <label class="col-form-label text-primary so_apparel"></label>
            </div>
            </div>  
            <div class="form-row">
              <div class="col-4">
                <label class="col-form-label">LINE</label>
              </div>
            <div class="col-8">
              <label class="col-form-label text-primary line_apparel"></label>
            </div>
            </div> 
            <div class="form-row">
                <div class="col-4">
                    <label class="col-form-label">Shift</label>
                </div>
                <div class="col-8">
                    <label class="col-form-label text-primary shift_apparel"></label>
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
              <label class="col-form-label text-primary date_apparel"></label>
            </div>
            </div>  
            <div class="form-row">
              <div class="col-4">
                <label class="col-form-label">Time</label>
              </div>
            <div class="col-8">
              <label class="col-form-label text-primary time_apparel"></label>
            </div>
            </div>
             <div class="form-row">
                <div class="col-4">
                    <label class="col-form-label">Estimated</label>
                </div>
                <div class="col-8">
                    <label class="col-form-label text-primary estimated_apparel"></label>
                </div>
            </div>
            <div class="form-row">
              <div class="col-4">
                <label class="col-form-label">Style</label>
              </div>
            <div class="col-8">
              <label class="col-form-label text-primary style_apparel"></label>
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
                <label class="col-form-label text-primary colour_apparel"></label>
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
              <tr class="bg-secondary text-white text-center">
                    <th>SIZE</th>
                    <th>PANEL WAIST BAND NAME</th>                                      
                    <th>INNER</th>                                      
                    <th>OUTER</th>                                      
                    <th>QTY</th>                                        
                    <th>REMARKS</th>
                    <th>TYPE</th>                                       
                </tr>
            </thead>
            <tbody id="show_data4">
              
            </tbody>
          </table>
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
                  </tr>
              </thead>
              <tbody id="show_data5">
                  
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
                            <img src="" class="img-qa-apparel" height="70"><hr>
                            <p>Check by VSE</p>
                            <img src="" class="img-vse-apparel" height="70">                        
                        </div>
                    </div>
                    <div class="col col-border">
                        <div class="text-center">                                                    
                            <p>Check by LAB</p>
                            <img src="" class="img-lab-apparel" height="70"><hr>
                            <p>Check by CUTTING</p>
                            <img src="" class="img-cutting-apparel" height="70"> 
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

<div class="modal fade" id="receive">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title rctitle"></h5>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('class' => 'frm_receive')); ?>
                <label for="">Receiver :</label>
                <textarea name="status" class="form-control" placeholder="Name"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Receive</button>
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
            	$('.po').text(data.po);
            	$('.so').text(data.so);
            	$('.line').text(data.line);
            	$('.date').text(data.date);
            	$('.time').text(data.time);
            	$('.style').text(data.style);
                $('.colour').text(data.colour);
                $('.estimated').text(data.time_estimated);
            	$('.shift').text(data.shift);
              if (data.check_qa == 1) {
                $('.img-qa').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-qa').attr('src','');
              }
              if (data.check_vse == 1) {
                $('.img-vse').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-vse').attr('src','');
              }
              if (data.check_lab == 1) {
                $('.img-lab').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-lab').attr('src','');
              }
              if (data.check_cutting == 1) {
                $('.img-cutting').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-cutting').attr('src','');
              }
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
        			  "<td>"+data[i].gusset+"<br>"+data[i].gusset_shape+"</td>"+
                "<td>"+data[i].front+"<br>"+data[i].front_shape+"</td>"+
                "<td>"+data[i].back+"<br>"+data[i].back_shape+"</td>"+
                "<td>"+data[i].side+"<br>"+data[i].side_shape+"</td>"+
                "<td>"+data[i].inners+"<br>"+data[i].inners_shape+"</td>"+
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

        $.ajax({
            url : "<?php echo site_url('index.php/welcome/status_panty')?>/"+id,
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
                $('.status-panty').html(html);        
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
	}

    function detail_bra(id) {
        $.ajax({
            url : "<?php echo site_url('index.php/welcome/get_bra')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){                
                $('.po_bra').text(data.po);
                $('.so_bra').text(data.so);
                $('.line_bra').text(data.line);
                $('.date_bra').text(data.date);
                $('.time_bra').text(data.time);
                $('.style_bra').text(data.style);
                $('.colour_bra').text(data.colour);
                $('.estimated_bra').text(data.time_estimated);
                $('.shift_bra').text(data.shift);
              if (data.check_qa == 1) {
                $('.img-qa-bra').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-qa-bra').attr('src','');
              }
              if (data.check_vse == 1) {
                $('.img-vse-bra').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-vse-bra').attr('src','');
              }
              if (data.check_lab == 1) {
                $('.img-lab-bra').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-lab-bra').attr('src','');
              }
              if (data.check_cutting == 1) {
                $('.img-cutting-bra').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-cutting-bra').attr('src','');
              }
                $('#detailbramodal').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });

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
                    "</tr>";                                     
                }
                $('#show_data2').html(html);        
                console.log(data.length);      
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });

         $.ajax({
            url : "<?php echo site_url('index.php/welcome/total_bra')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('.twing').text(data.twing);
                $('.tcf').text(data.tcf);
                $('.tcup').text(data.tcup);
                $('.tinners').text(data.tinners);
                $('.tmesh').text(data.tmesh);
                $('.tliner').text(data.tliner);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });

         $.ajax({
            url : "<?php echo site_url('index.php/welcome/status_bra')?>/"+id,
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
                $('.status-bra').html(html);        
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
    }

    function detail_mask(id) {
        $.ajax({
            url : "<?php echo site_url('index.php/welcome/get_mask')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){                
                $('.po_mask').text(data.po);
                $('.so_mask').text(data.so);
                $('.line_mask').text(data.line);
                $('.date_mask').text(data.date);
                $('.time_mask').text(data.time);
                $('.style_mask').text(data.style);
                $('.colour_mask').text(data.colour);
                $('.estimated_mask').text(data.time_estimated);
                $('.shift_mask').text(data.shift);
              if (data.check_qa == 1) {
                $('.img-qa-mask').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-qa-mask').attr('src','')
              }
              if (data.check_vse == 1) {
                $('.img-vse-mask').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-vse-mask').attr('src','')
              }
              if (data.check_lab == 1) {
                $('.img-lab-mask').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-lab-mask').attr('src','')
              }
              if (data.check_cutting == 1) {
                $('.img-cutting-mask').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-cutting-mask').attr('src','')
              }
                $('#detailmaskmodal').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });

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
                        "</tr>";                                    
                }
                $('#show_data3').html(html);        
                console.log(data.length);      
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });

         $.ajax({
            url : "<?php echo site_url('index.php/welcome/total_mask')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('.tpanel').text(data.tpanel);                
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });

         $.ajax({
            url : "<?php echo site_url('index.php/welcome/status_mask')?>/"+id,
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
                $('.status-mask').html(html);        
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
    }

    function detail_apparel(id) {
        $.ajax({
            url : "<?php echo site_url('index.php/welcome/get_apparel')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){                
                $('.po_apparel').text(data.po);
                $('.so_apparel').text(data.so);
                $('.line_apparel').text(data.line);
                $('.date_apparel').text(data.date);
                $('.time_apparel').text(data.time);
                $('.style_apparel').text(data.style);
                $('.colour_apparel').text(data.colour);
                $('.estimated_apparel').text(data.time_estimated);
                $('.shift_apparel').text(data.shift);
              if (data.check_qa == 1) {
                $('.img-qa-apparel').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-qa-apparel').attr('src','')
              }
              if (data.check_vse == 1) {
                $('.img-vse-apparel').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-vse-apparel').attr('src','')
              }
              if (data.check_lab == 1) {
                $('.img-lab-apparel').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-lab-apparel').attr('src','')
              }
              if (data.check_cutting == 1) {
                $('.img-cutting-apparel').attr('src','<?php echo base_url('dist/img/approved.png') ?>')
              }else{
                $('.img-cutting-apparel').attr('src','')
              }
                $('#detailapparelmodal').modal('show');
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
                        "</tr>";                                       
                }
                $('#show_data5').html(html);        
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

    function receive(id,type,po) {
        $('.rctitle').text('Receive Recut '+type+' #PO '+po);
        $('.frm_receive').attr('action','<?php echo base_url('welcome/receive_status/') ?>'+type+'/'+id);
        $('#receive').modal('show');
    }
</script>