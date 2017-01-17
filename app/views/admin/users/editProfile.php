<?php $this->load->view('admin/header'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php $this->load->view('admin/sidebar'); ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN PAGE HEADER-->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Edit Personal Information </h1>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit Profile
										</div>
<!--										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>-->
									</div>
									<div class="portlet-body form">
                                                                            <?php $this->load->view('admin/success_html'); ?>
										<!-- BEGIN FORM-->
                                                                                
										<form action="" method="post" class="form-horizontal">
											<div class="form-body">
                                                                                            <div class="form-group <?php if(form_error('Us_email')):echo 'has-error';endif;?>">
													<label class="col-md-3 control-label" <?php if(form_error('Us_email')):echo 'for="Us_emailError"';endif;?>><?php echo $this->lang->line('Email'); ?> <span class="required">* </span></label>
													<div class="col-md-8">
                                                                                                            <input type="text" id="emailError" name="Us_email" class="form-control" placeholder="email" value="<?php echo $admin->Us_email; ?>">
														
                                                                                                                <?php if(form_error('Us_email')):echo '<span class="help-block">'.form_error('Us_email').' </span>';endif;?>
													</div>
												</div>
                                                                                            <div class="form-group">
													<label class="col-md-3 control-label"><?php echo $this->lang->line('Password'); ?></label>
													<div class="col-md-8">
                                                                                                            <input type="password" id="passwordError" name="Us_pasword" class="form-control" placeholder="password" value="">
                                                                                                                
													</div>
												</div>
                                                                                               
                                                                                                 
                                                                                                
											</div>
											<div class="form-actions right">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
                                                                                                            <button type="submit" class="btn call-to-action" value="<?php echo $this->lang->line('Submit');?>" name="editProfile">Submit</button>
													</div>
												</div>
											</div>
                                                                                    
										</form>
                                                                                        
										<!-- END FORM-->
									</div>
								</div>
                            </div>
                            
                        </div>
			
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('admin/footer'); ?>
<!-- END FOOTER -->
<?php $this->load->view('admin/footer_script'); ?>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>