<?php $this->load->view('admin/header'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php $this->load->view('admin/sidebar'); ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb hide">
				<li>
					<a href="javascript:;">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Dashboard
				</li>
			</ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            Send Text
                                        </div>

                                    </div>
                                    <div class="portlet-body form">
                                        <?php
                                        if($this->session->userdata('msgSuccess')){
                                            echo '<div class="alert alert-success">'.$this->session->userdata('msgSuccess').'</div>';
                                            $this->session->unset_userdata('msgSuccess');
                                        }
                                        if($this->session->userdata('msgError')){
                                            echo '<div class="alert alert-danger">'.$this->session->userdata('msgError').'</div>';
                                            $this->session->unset_userdata('msgError');
                                        }
                                        ?>
                                        <!-- BEGIN FORM-->

                                        <form action="<?php echo admin_url('home/send_message');?>" method="post" class="form-horizontal" id="sendMessageForm" enctype="multipart/form-data">
                                            <input type="hidden" name="countrycallingcode" value="+1">
                                            
                                            <div class="form-body">
                                                <div class="alert alert-success alert-dismissable" id="succes_sendmsgalert" <?php if(!$this->session->flashdata('flash_message')):echo 'style="display:none"';endif;?>>
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    successfully send.
                                            </div>
                                                <div class="row">
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="C_nameError" name="C_name" class="form-control live-search" onkeyup="showResult(this.value)" placeholder="Name" value="">
                                                                <div id="livesearch"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Template </label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="message" id="messageError">
                                                                    <option value="">Select Template</option>
                                                                    <?php 
                                                                if(isset($templates) and $templates->num_rows()>0)
                                                                {
                                                                foreach($templates->result() as $list){?>
                                                                    <option value="<?php echo $list->message; ?>"><?php echo $list->message; ?></option>
                                                                <?php }}?>
										</select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Number</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="C_phoneError" name="C_phone" class="form-control" placeholder="Number" value="">
<!--                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <select class="form-control input-xsmall" name="countrycallingcode" id="countrycallingcodeError">
                                                                            <?php foreach($country->result() as $list){?>
                                                                            <option value="+<?php echo $list->phonecode?>" <?php echo ($list->id=='226')?' selected="selected"':'';?>><?php echo $list->iso?></option>
                                                                            <?php }?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" id="C_phoneError" name="C_phone" class="form-control" placeholder="Number" value="">
                                                                    </div>
                                                                </div>-->
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Custom</label>
                                                            <div class="col-md-9">
                                                                <textarea  id="C_messageError" name="C_message" class="form-control" placeholder="" value=""></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Media </label>
                                                            <div class="col-md-9">
                                                                <input type="file" id="media_file" name="media_file" class="form-control" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Schedule </label>
                                                            <div class="col-md-9">
                                                                <label>
                                                                    <input type="radio" onclick="scheduleF('yes')" name="scheduleDate" value="yes">&nbsp;Yes
                                                                </label>
                                                                <label style="margin-left: 10px;">
                                                                    <input type="radio" onclick="scheduleF('no')" name="scheduleDate" checked="" value="no">&nbsp;No
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group sh-group" style="display:none">
                                                            <label class="col-md-3 control-label">&nbsp;</label>
                                                            <div class="col-md-6">
                                                                <div class="input-icon">
                                                                    <i class="fa fa-calendar"></i>
                                                                    <input size="16" class="form-control form-control-inline input-medium date-picker" type="text" name="message_date" value="<?php echo date('Y-m-d'); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group sh-group" style="display:none">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Time </label>
                                                                <div class="col-md-9">
                                                                    <label>
                                                                        <input type="radio" onclick="scheduleC('yes')" name="scheduleTime" value="yes">&nbsp;Yes
                                                                    </label>
                                                                    <label style="margin-left: 10px;">
                                                                        <input type="radio" onclick="scheduleC('no')" name="scheduleTime" checked="" value="no">&nbsp;No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group sht-group" style="display:none">
                                                            <label class="col-md-3 control-label">&nbsp;</label>
                                                            <div class="col-md-6">
                                                                <div class="input-icon">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <input type="text" class="form-control timepicker timepicker-24" name="message_time" value="<?php if(isset($settings['SITE_DEFAULT_TIME'])) echo date('H:i',strtotime($settings['SITE_DEFAULT_TIME'])); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">&nbsp;</label>
                                                            <div class="col-md-9">
                                                                <button type="submit" class="btn call-to-action pull-right" value="Submit" name="Submit">Send Text</button>
                                                            </div>
                                                        </div>
                                                    </div>                                                
                                                 </div>

<!--                                            <div class="form-actions right">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn blue" value="Submit" name="Submit">Send Text</button>
                                                    </div>
                                                </div>
                                            </div>-->

                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                            </div>

                        </div>
			<div class="row">
				<div class="col-md-7 col-sm-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font-color hide"></i>
								<span class="caption-subject theme-font-color bold uppercase">Recent Activity</span>
							</div>
							<label style="padding-right:5px;float: right;"><input class="form-control input-small input-inline" type="text" id="nameFilter" placeholder="search" /></label>
						</div>
						<div class="portlet-body">
							
								<table class="table table-striped  table-hover"  id="view_admin_1">
                                                                    <thead>
								<tr>
									
									
									
                                                                        <th scope="col">
										 name
									</th>
                                                                        
                                                                        <th scope="col">
										 phone
									</th>
                                                                        <th scope="col">
										 date
									</th>
<!--                                                                        <th scope="col" style="text-align:right;">
										 Action
									</th>-->
                                                                        </thead>
								<tbody>
                                                                <?php 
                                                                if(isset($contacts) and $contacts->num_rows()>0)
                                                                {
                                                                    $i=0;
                                                                foreach($contacts->result() as $list){
                                                                    $tr_class= '';
                                                                    if($list->is_replied==0){
                                                                        $tr_class= 'class="warning"';
                                                                    }elseif($i==0){
                                                                        $tr_class= 'class="active"';
                                                                    }
                                                                    ?>
								<tr <?php echo $tr_class;?>>
									
									
                                                                        
                                                                       
                                                                        <td>
                                                                            <a href="javascript:;" onclick="loadCustomerMessage(this,'<?php echo $list->C_id; ?>')"><?php echo $list->C_name; ?></a>
									</td>
                                                                        
                                                                        <td>
										 <a href="javascript:;" onclick="loadCustomerMessage(this,'<?php echo $list->C_id; ?>')"><?php echo $list->C_phone; ?></a>
									</td>
                                                                        <td>
										 <?php echo date('m/d/y h:i a', strtotime($list->last_message_date)); ?>
									</td>
<!--									<td>
                                                                            <a href="javascript:;" onclick="loadCustomerMessage(this,'<?php echo $list->C_id; ?>')" class="btn btn-xs green pull-right"><i class="fa fa-edit"></i></a>
                                                                                 
                                                                                 
									</td>-->
								</tr>
                                                                <?php $i++;}
                                                                
                                                                }?>
								
								</tbody>
								</table>
							
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
                            <div class="col-md-5 col-sm-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font-color hide"></i>
								<span class="caption-subject theme-font-color bold uppercase" id="conersationUserInfo"><?php if(isset($conersationUserInfo)):echo $conersationUserInfo;endif;?></span>
<!--								<span class="caption-helper"  id="conersationUserInfo">45</span>-->
							</div>
							
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
								<div class="general-item-list">
                                                                    <?php 
                                                                if(isset($messages) and $messages->num_rows()>0)
                                                                {
                                                                foreach($messages->result() as $list){?>
									<div class="item">
										<div class="item-head">
											<div class="item-details">
												<a href="" class="item-name primary-link"><?php echo ($list->type=='1')?$settings['SITE_SIGNATURE']:$client_name?></a>
                                                                                                <span class="item-label"><?php echo date('m/d/y g:iA', strtotime($list->added_at));//echo $this->all_function->timeAgo(strtotime($list->added_at));?></span>
											</div>
										</div>
										<div class="item-body">
											 <?php echo $list->message?>
										</div>
									</div>
                                                                <?php }}?>
									
								</div>
							</div>
                                                    <?php 
                                                                if(isset($messages) and $messages->num_rows()>0)
                                                                {?>
<!--                                                    <form action="<?php echo admin_url('home/message_reply');?>" method="post" class="form-horizontal" id="messageReplyForm">
                                                        <input type="hidden" name="client_id" id="client_id" value="<?php echo $client_id;?>" />
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="message_reply">
											<span class="input-group-btn">
                                                                                            <button type="submit" class="btn blue">Reply</button>
											</span>
										</div>
                                                    </form>-->
                                                                <?php }?>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption caption-md">
                                <i class="icon-bar-chart theme-font-color hide"></i>
                                <span class="caption-subject theme-font-color bold uppercase">Incoming SMS</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive" style="width: 100%">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>From Number</th>
                                        <th>Message</th>
                                        <th>Media</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($incomingSms as $inSms){
                                            $msgClass = 'class="unread"';
                                            if($inSms->msgStatus == 'Yes'){
                                                $msgClass = '';
                                            }
                                            echo '<tr id="msg-'.$inSms->id.'" '.$msgClass.'>';
                                                echo '<td>'.$inSms->number.'</td>';
                                                echo '<td>'.$inSms->message.'</td>';
                                                if($inSms->mediaUrl != ''){
                                                     echo '<td><img src="'.$inSms->mediaUrl.'" style="max-width:100px;"></td>';
                                                }else{
                                                     echo '<td></td>';
                                                }
                                                echo '<td>';
                                                    echo '<a href="javascript:;" onclick="deleteMsg('.$inSms->id.')" title="Delete"><i class="fa fa-trash-o"></i></a>';
                                                echo '</td>';
                                            echo '</tr>';
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                                <?= '<ul class="pagination pull-right">'.$this->pagination->create_links().'</ul>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			<!-- END PAGE CONTENT INNER -->
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
<script>
    $('.date-picker').datepicker({format: 'yyyy-mm-dd'});
    function loadCustomerMessage(obj,id){
        $.ajax({
                type: "POST",
                cache: false,
                url: '<?php echo admin_url('home/loadCustomerMessage');?>',
                data: {id:id},
                dataType: "json",
                
                success: function(res) {
                    $("#client_id").val(id);
                    $("#C_nameError").val(res.contact_name);
                    $("#C_phoneError").val(res.contact_phone);
                    $("#conersationUserInfo").html(res.conersationUserInfo);
                    $( ".general-item-list" ).html(res.message);
                    $("#view_admin_1").find('tr').removeClass('active');
                    $(obj).parent().parent().addClass('active');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                   // App.showError('Critical error');
                }
            });
    }
$(document).ready(function() {
    $("#messageError").change(function(){
        $("#C_messageError").val($("#messageError option:selected").text());
    });
    $("#messageReplyForm").submit(function(e) {
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
                        $( ".item" ).first().before(res.message);
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
        $("#sendMessageForm2").submit(function(e) {
            e.preventDefault();
            form = $(this);
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    //form.children().last().children('input[type="submit"]').hide();
                    //form.children().last().children('img').fadeIn();
                },
                success: function(res) {
//                    alert(res.ok);
//                    if (res.ok) {
//                        form[0].reset();
//                        $("#succes_sendmsgalert").show();
//                        location.reload();
//                    } else {
//                        var data = res.message;
//                        for (var key in data) {
//                            $("#"+key+"_Err").text(data[key]);
//                           // alert(key + ' ' + data[key]);
//                        }
//                        
//                        //App.showError(res.message);
//                    }
                    location.reload();
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
function scheduleF(val){
    if(val == 'yes'){
        $('.sh-group').show();
    }else{
        $('.sh-group').hide();
    }
}
function scheduleC(val){
    if(val == 'yes'){
        $('.sht-group').show();
    }else{
        $('.sht-group').hide();
    }
}
function deleteMsg(msgId){
    if(confirm('Are you sure?')){
        $.ajax({
            data: {msgId:msgId},
            type: 'post',
            url: '<?= admin_url('home/deleteMsg') ?>',
            success: function(response){
                $('#msg-'+msgId).remove();
            }
        })
    }
}
///live contact search
function showResult(str) {
    if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.padding="0px";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
    }else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            $('.live-search').removeClass('spinner');
            document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
            document.getElementById("livesearch").style.padding="5px";
            document.getElementById("livesearch").style.display="block";
            $('input[name="C_phone"]').val('');
        }
    }
    var md_name='<?php echo $md_name; ?>';
    xmlhttp.open("GET","<?= admin_url('home/getContact'); ?>?q="+str,true);
    xmlhttp.send();
    $('.live-search').addClass('spinner');
}
$(document).mouseup(function (e){
    var container = $(".searchable-form");
    if (!container.is(e.target) && container.has(e.target).length === 0){
        $('#livesearch').hide();
    }
});
function pickNumber(phone,name){
    $('input[name="C_phone"]').val(phone);
    $('input.live-search').val(name);
}
</script>
</body>
<!-- END BODY -->
</html>
<style type="text/css">
.unread td {
    background-color: #3d3dfe;
    color: #ffffff;
}
#livesearch {background-color: #44b6ae;max-height: 400px;opacity: 1;overflow-y: auto;position: absolute;width: 97%;z-index: 99;}
#livesearch a{ color:#fff;display: block;width: 100%;}
#table-call-log{cursor:pointer;}
#livesearch a:hover{ text-decoration:none; }
</style>