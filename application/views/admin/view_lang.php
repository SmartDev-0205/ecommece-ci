<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().M_REWRITE.'admin');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>View Languages</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/lang/add" class="btn btn-primary btn-sm">Add New</a>
	</div>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
			<?php
			if($this->session->flashdata('error')) {
				?>
				<div class="callout callout-danger">
					<p><?php echo safe_data($this->session->flashdata('error')); ?></p>
				</div>
				<?php
			}
			if($this->session->flashdata('success')) {
				?>
				<div class="callout callout-success">
					<p><?php echo safe_data($this->session->flashdata('success')); ?></p>
				</div>
				<?php
			}
			?>
	        <div class="box box-info">
	            <div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						    <tr>
						        <th width="50">SL</th>
						        <th>Language Name</th>
						        <th>Language Default</th>
						        <th>Action</th>
						    </tr>
						</thead>
			            <tbody>
				            <?php
				            	$i=0;
				            	foreach($lang as $row) {
				            		$i++;
					            	?>
						            <tr>
						                <td><?php echo safe_data($i); ?></td>
						                <td><?php echo safe_data($row['lang_name']); ?></td>
						                <td><?php echo safe_data($row['lang_default']); ?></td>
						                <td>
						                    <a href="<?php echo base_url().M_REWRITE; ?>admin/lang/detail/<?php echo safe_data($row['lang_id']); ?>" class="btn btn-warning btn-xs">Update Details</a>

						                    <a href="<?php echo base_url().M_REWRITE; ?>admin/lang/edit/<?php echo safe_data($row['lang_id']); ?>" class="btn btn-primary btn-xs">Edit</a>

						                    <?php if($row['lang_id'] != 1): ?>
						                    <a href="<?php echo base_url().M_REWRITE; ?>admin/lang/delete/<?php echo safe_data($row['lang_id']); ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Delete</a>
						                	<?php endif; ?>

						                </td>
						            </tr>
						            <?php
				            	}
				            ?>
			            </tbody>
			        </table>
	            </div>
	        </div>
	    </div>
  	</div>
</section>