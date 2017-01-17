<?php $this->load->view('admin/header'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php $this->load->view('admin/sidebar'); ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Setting </h1>
				</div>
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE HEADER-->
			
			<!-- END PAGE HEADER-->
			<div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-settings"></i>Basic Settings
										</div>
									</div>
									<div class="portlet-body form">
                                                                            <?php $this->load->view('admin/success_html'); ?>
										<!-- BEGIN FORM-->
										<form action="<?php echo admin_url('siteSettings'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
											<div class="form-body">
												<div class="form-group <?php if(form_error('site_title')):echo 'has-error';endif;?>">
													<label class="col-md-4 control-label" <?php if(form_error('site_title')):echo 'for="site_titleError"';endif;?>><?php echo $this->lang->line('website_title'); ?> <span class="required">* </span></label>
													<div class="col-md-8">
														<input type="text" id="site_titleError" name="site_title" class="form-control" placeholder="Enter text" value="<?php if(isset($settings['SITE_TITLE'])) echo $settings['SITE_TITLE']; ?>">
														
                                                                                                                <?php if(form_error('site_title')):echo '<span class="help-block">'.form_error('site_title').' </span>';endif;?>
													</div>
												</div>
                                                                                                
                                                                                                
												
                                                                                                <div class="form-group <?php if(form_error('TWILIO_ACCOUNT_SID')):echo 'has-error';endif;?>">
													<label class="col-md-4 control-label" <?php if(form_error('TWILIO_ACCOUNT_SID')):echo 'for="TWILIO_ACCOUNT_SIDError"';endif;?>>TWILIO_ACCOUNT_SID <span class="required">* </span></label>
													<div class="col-md-8">
														<input type="text" id="TWILIO_ACCOUNT_SIDError" name="TWILIO_ACCOUNT_SID" class="form-control" placeholder="Enter text" value="<?php if(isset($settings['TWILIO_ACCOUNT_SID'])) echo $settings['TWILIO_ACCOUNT_SID']; ?>">
														<?php if(form_error('TWILIO_ACCOUNT_SID')):echo '<span class="help-block">'.form_error('TWILIO_ACCOUNT_SID').' </span>';endif;?>
													</div>
												</div>
                                                                                                <div class="form-group <?php if(form_error('TWILIO_ACCOUNT_TOKEN')):echo 'has-error';endif;?>">
													<label class="col-md-4 control-label" <?php if(form_error('TWILIO_ACCOUNT_TOKEN')):echo 'for="TWILIO_ACCOUNT_TOKENError"';endif;?>>TWILIO_ACCOUNT_TOKEN <span class="required">* </span></label>
													<div class="col-md-8">
														<input type="text" id="TWILIO_ACCOUNT_TOKENError" name="TWILIO_ACCOUNT_TOKEN" class="form-control" placeholder="Enter text" value="<?php if(isset($settings['TWILIO_ACCOUNT_TOKEN'])) echo $settings['TWILIO_ACCOUNT_TOKEN']; ?>">
														<?php if(form_error('TWILIO_ACCOUNT_TOKEN')):echo '<span class="help-block">'.form_error('TWILIO_ACCOUNT_TOKEN').' </span>';endif;?>
													</div>
												</div>
                                                                                            <div class="form-group <?php if(form_error('TWILIO_FROM_VALID_PHONE_NUMBER')):echo 'has-error';endif;?>">
													<label class="col-md-4 control-label" <?php if(form_error('TWILIO_FROM_VALID_PHONE_NUMBER')):echo 'for="TWILIO_FROM_VALID_PHONE_NUMBERError"';endif;?>>TWILIO_FROM_VALID_PHONE_NUMBER <span class="required">* </span></label>
													<div class="col-md-8">
														<input type="text" id="TWILIO_FROM_VALID_PHONE_NUMBERError" name="TWILIO_FROM_VALID_PHONE_NUMBER" class="form-control" value="<?php if(isset($settings['TWILIO_FROM_VALID_PHONE_NUMBER'])) echo $settings['TWILIO_FROM_VALID_PHONE_NUMBER']; ?>">
														<?php if(form_error('TWILIO_FROM_VALID_PHONE_NUMBER')):echo '<span class="help-block">'.form_error('TWILIO_FROM_VALID_PHONE_NUMBER').' </span>';endif;?>
													</div>
												</div>
                                                                                            <div class="form-group <?php if(form_error('SITE_SIGNATURE')):echo 'has-error';endif;?>">
													<label class="col-md-4 control-label" <?php if(form_error('SITE_SIGNATURE')):echo 'for="SITE_SIGNATUREError"';endif;?>>SITE_SIGNATURE <span class="required">* </span></label>
													<div class="col-md-8">
														<input type="text" id="SITE_SIGNATUREError" name="SITE_SIGNATURE" class="form-control" value="<?php if(isset($settings['SITE_SIGNATURE'])) echo $settings['SITE_SIGNATURE']; ?>">
														<?php if(form_error('SITE_SIGNATURE')):echo '<span class="help-block">'.form_error('SITE_SIGNATURE').' </span>';endif;?>
													</div>
												</div>
                                                                                            <div class="form-group <?php if(form_error('SITE_DEFAULT_TIME')):echo 'has-error';endif;?>">
													<label class="col-md-4 control-label" <?php if(form_error('SITE_DEFAULT_TIME')):echo 'for="SITE_DEFAULT_TIMEError"';endif;?>>SITE_DEFAULT_TIME <span class="required">* </span></label>
													<div class="col-md-8">
														<input type="text" id="SITE_DEFAULT_TIMEError" name="SITE_DEFAULT_TIME" class="form-control" value="<?php if(isset($settings['SITE_DEFAULT_TIME'])) echo $settings['SITE_DEFAULT_TIME']; ?>">
														<?php if(form_error('SITE_DEFAULT_TIME')):echo '<span class="help-block">'.form_error('SITE_DEFAULT_TIME').' </span>';endif;?>
													</div>
												</div>
											</div>
											<div class="form-actions right">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
                                                                                                            <button type="submit" class="btn call-to-action" value="<?php echo $this->lang->line('Submit');?>" name="siteSettings">Submit</button>
<!--														<button type="button" class="btn btn-circle default">Cancel</button>-->
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