<?php $this->load->view('admin/header'); ?>
<link href="<?php echo base_url() ?>themes/backend/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>themes/backend/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
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
					<h1>Templates </h1>
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
											<i class="fa fa-plus"></i>Add
										</div>
									</div>
									<div class="portlet-body form">
                                                                            <?php $this->load->view('admin/success_html'); ?>
										<!-- BEGIN FORM-->
                                                                                <form action="<?php echo admin_url('messages/addTemplate'); ?>" method="post" id="addTemplateForm" class="form-horizontal">
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-2 control-label">Message </label>
													<div class="col-md-10">
                                                                                                            <textarea type="text" id="messageError" name="message" class="form-control" placeholder="Enter text" value=""></textarea>
													</div>
												</div>
											</div>
											<div class="form-actions right">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
                                                                                                            <button type="submit" class="btn call-to-action" value="Submit" name="newMessage">Add Message</button>
<!--														<button type="button" class="btn btn-circle default">Cancel</button>-->
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
                            </div>
                            <div class="row">
						<div class="col-md-12">
							<div class="portlet box blue">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-comments"></i>Message List
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										
										<a href="javascript:;" class="reload">
										</a>
										
									</div>
								</div>
								<div class="portlet-body ">
									<div class="dd" id="nestable_list_3">
										<ol class="dd-list">
                                                                                        <?php if(isset($templates) and $templates->num_rows()>0)
                                                                {
                                                                foreach($templates->result() as $list){?>
                                                                                        <li class="dd-item dd3-item" data-id="<?php echo $list->list_order?>">
												<div class="dd-handle dd3-handle">
												</div>
												<div class="dd3-content">
													<div class="row">
														<div class="col-md-10">
														 	<div class="make-ellipsis"><?php echo $list->message; ?></div>
														 </div>
	                                                     <div class="col-md-2">
	                                                     	<a id="<?php echo $list->id?>" style="float:right" href="javascript:void(0)" onclick="loadDeleteModel('<?php echo $list->id?>')" class="btn btn-xs red">Delete <i class="fa fa-times"></i></a>
	                                                     </div>
													</div>
													 
                                                 </div>
											</li>
											
                                                                <?php }}?>
											
											
										</ol>
									</div>
								</div>
							</div>
						</div>
						
					</div>
                            
                        </div>
			
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<a class="btn default" data-toggle="modal" id="deletDialog" href="#deleteModel" style="display:none"></a>
<div id="deleteModel" class="modal fade" tabindex="-1" data-width="760">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">Delete Contact</h4>
								</div>
    <form action="<?php echo admin_url('messages/delete_template');?>" method="post" id="deleteGroupForm">
        <input type="hidden" name="C_id" id="delete_CG_id" value="" />
								<div class="modal-body">
                                                                    
									<div class="row">
										<div class="col-md-9">
											
											<p>
												Are you sure?
											</p>
											
										</div>
										
									</div>
                                                                    
								</div>
								<div class="modal-footer">
									<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                                                        <button type="submit" class="btn call-to-action">Delete</button>
								</div>
        </form>
							</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('admin/footer'); ?>
<!-- END FOOTER -->
<?php $this->load->view('admin/footer_script'); ?>
<!-- END JAVASCRIPTS -->
<script>
    function loadDeleteModel(id){
    $("#delete_CG_id").val(id);
    $("#deletDialog").trigger('click');
}
    $(document).ready(function() {
        $("#deleteGroupForm").submit(function(e) {
            e.preventDefault();
            form = $(this);
            $.ajax({
                type: "POST",
                cache: false,
                url: form.attr('action'),
                data: form.serialize(),
                dataType: "json",
                beforeSend: function() {
                    //form.children().last().children('input[type="submit"]').hide();
                    //form.children().last().children('img').fadeIn();
                },
                success: function(res) {
                    if (res.ok) {
                        
                        $("#deleteModel").find(".close").trigger('click');
                        $("#"+$("#delete_CG_id").val()).parent().parent().slideUp();
                        form[0].reset();
                    } else {
                        var data = res.message;
                        for (var key in data) {
                            $("#"+key+"_Err").text(data[key]);
                           // alert(key + ' ' + data[key]);
                        }
                        
                        //App.showError(res.message);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    App.showError('Critical error');
                }
            }).always(function() {
                //form.children().last().children('input[type="submit"]').fadeIn();
                //form.children().last().children('img').hide();
            });
        });
        $("#addTemplateForm").submit(function(e) {
            e.preventDefault();
            form = $(this);
            $.ajax({
                type: "POST",
                cache: false,
                url: form.attr('action'),
                data: form.serialize(),
                dataType: "json",
                beforeSend: function() {
                    //form.children().last().children('input[type="submit"]').hide();
                    //form.children().last().children('img').fadeIn();
                },
                success: function(res) {
                    if (res.ok) {
                        form[0].reset();
                        $( ".dd-item" ).last().after(res.templateHTML);
                        //App.showSuccess(res.message, 10000);
                    } else {
                        var data = res.message;
                        for (var key in data) {
                            $("#"+key+"_Err").text(data[key]);
                           // alert(key + ' ' + data[key]);
                        }
                        
                        //App.showError(res.message);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                   // App.showError('Critical error');
                }
            }).always(function() {
                //form.children().last().children('input[type="submit"]').fadeIn();
                //form.children().last().children('img').hide();
            });
        });
    });
</script>
</body>
<!-- END BODY -->
</html>