 <h4 class="page-title">User Access</h4>
 <div class="row">
 	<div class="col-lg-12"> 		
	 	<div class="card shadow mb-4">
	        <div class="card-header py-3">
	        	<div class="float-left">
	          		<h6 class="m-0 font-weight-bold text-primary">Data User</h6>	        		
	        	</div>
	          	<div class="float-right">
	          		<button type="button" class="btn btn-primary btn-sm" onclick="add()"><i class="la la-plus"></i> Add User</button>
	          	</div>
	        </div>
	        <div class="card-body">
	        	<div class="table-responsive">
	        		<table class="table table-bordered" id="example">
	        			<thead>
	        				<tr>
	        					<th width="5%">No</th>
	        					<th>EPF</th>
	        					<th>Username</th>
	        					<th>Level</th>
	        					<th width="12%">#</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				<?php $no=1; foreach ($get as $data) { ?>
	        				<tr>
	        					<td><?php echo $no++; ?></td>
	        					<td><?php echo $data->epf ?></td>
	        					<td><?php echo $data->username ?></td>
	        					<td><?php echo $data->level ?></td>
	        					<td>
	        						<button type="button" data-toggle="tooltip" title="" class="btn btn-sm btn-primary" data-original-title="Edit"><i class="la la-edit" onclick="edit('<?php echo $data->id ?>')"></i></button>
	        						<a href="<?php echo base_url('admin/delete_user/'.$data->id) ?>" data-toggle="tooltip" title="" class="btn btn-sm btn-danger" data-original-title="Remove" onclick="return confirm('Are you sure ?')"><i class="la la-times"></i></a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    		<?php echo form_open('admin/save_user'); ?>
				  <div class="form-group row" style="padding: 5px;">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">EPF</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="epf" placeholder="EPF">
				    </div>
				  </div>
				  <div class="form-group row" style="padding: 5px;">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="username" placeholder="Username">
				    </div>
				  </div>
				  <div class="form-group row" style="padding: 5px;">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
				    <div class="col-sm-10">
				    	<select name="level" class="form-control">
				    		<option value="CUTTING">CUTTING</option>
				    		<option value="QA">QA</option>
				    		<option value="VSE">VSE</option>
				    		<option value="LAB">LAB</option>
				    	</select>
				    </div>
				  </div>				 				  
				  <span class="text-danger"><i>PASSWORD DEFAULT IS EPF NUMBER</i></span>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    		<?php echo form_open('admin/edit_user'); ?>
				  <div class="form-group row" style="padding: 5px;">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">EPF</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="epf1" disabled="" placeholder="EPF">
				    </div>
				  </div>
				  <div class="form-group row" style="padding: 5px;">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="username1" placeholder="Username">
				      <input type="hidden" name="id">
				    </div>
				  </div>
				  <div class="form-group row" style="padding: 5px;">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
				    <div class="col-sm-10">
				    	<select name="level1" class="form-control">
				    		<option value="CUTTING">CUTTING</option>
				    		<option value="QA">QA</option>
				    		<option value="VSE">VS</option>
				    	</select>
				    </div>
				  </div>				 				  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<script>
	function add() {
		$('#exampleModal').modal('show');
	}

	function edit(id) {
		$.ajax({
            url : "<?php echo site_url('index.php/admin/get_user')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
            	$('[name="epf1"]').val(data.epf);
            	$('[name="id"]').val(data.id);
            	$('[name="username1"]').val(data.username);
            	$('[name="level1"]').val(data.level);
            	$('[name="level1"]').trigger('change');
            	$('#editModal').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
              }
        });
	}
</script>


