<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().M_REWRITE.'admin');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Service</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url().M_REWRITE; ?>admin/service" class="btn btn-primary btn-sm">View All</a>
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

			<?php echo form_open_multipart(base_url().M_REWRITE.'admin/service/edit/'.safe_data($service['id']),array('class' => 'form-horizontal'));?>
				<div class="box box-info">
					<div class="box-body">						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name *</label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo safe_data($service['name']); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Slug </label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="slug" value="<?php echo safe_data($service['slug']); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Short Description *</label>
							<div class="col-sm-8">
								<textarea class="form-control h_120" name="short_description"><?php echo safe_data($service['short_description']); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description *</label>
							<div class="col-sm-8">
								<textarea class="form-control editor" name="description"><?php echo safe_data($service['description']); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Existing Photo</label>
							<div class="col-sm-9 pt_5">
								<img src="<?php echo base_url(); ?>public/uploads/<?php echo safe_data($service['photo']); ?>" alt="Service Photo" class="w_200">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Photo </label>
							<div class="col-sm-6 pt_5">
								<input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Language </label>
							<div class="col-sm-2">
								<select name="lang_id" class="form-control select2">
									<?php
									foreach($all_lang as $row)
									{
										?><option value="<?php echo safe_data($row['lang_id']); ?>" <?php if($service['lang_id'] == $row['lang_id']) {echo 'selected';} ?>><?php echo safe_data($row['lang_name']); ?></option><?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</section>