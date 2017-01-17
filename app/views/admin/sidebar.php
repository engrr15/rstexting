<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <?php 
                                $ci_class = $this->router->fetch_class();
                                $ci_method = $this->router->fetch_method();
                                ?>
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start <?php if($ci_class=='home'):echo 'active';endif;?>">
					<a href="<?php echo admin_url('home');?>">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					</a>
					
				</li>
                <li class="">
					<a href="javascript:;">
					<i class="icon-info"></i>
					<span class="title">Stats</span>
					<span class="arrow open"></span>
					</a>
                    <ul class="sub-menu" style="display: block;">
						<li>
							<a href="javascript:;">
							Texts Today:	<?php echo $totaltTodayMessages;?></a>
						</li>
						<li>
							<a href="javascript:;">
							30 Day Count:	<?php echo $totaltMonthMessages;?></a>
						</li>
						<li>
							<a href="javascript:;">
							Total Texts:	<?php echo $totaltMessages;?></a>
						</li>
						
					</ul>
				</li>
				<li class="">
					<a href="javascript:;">
					<i class="icon-info"></i>
					<span class="title">Setup</span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu" style="display: block;">
		                <li class="start <?php if($ci_class=='messages'):echo 'active';endif;?>">
							<a href="<?php echo admin_url('messages/viewMessage');?>">
							<i class="icon-bubbles"></i>
							<span class="title">Templates</span>
							<span class="selected"></span>
							</a>
							
						</li>
		                <li class="start <?php if($ci_class=='editProfile'):echo 'active';endif;?>">
							<a href="<?php echo admin_url('editProfile');?>">
							<i class="icon-user"></i>
							<span class="title">My Profile</span>
							<span class="selected"></span>
							</a>
						</li>
					</ul>
				</li>
				<li class="start <?php if($ci_class=='help'):echo 'active';endif;?>">
					<a href="<?php echo admin_url('help');?>">
					<i class="icon-question"></i>
					<span class="title">Help</span>
					<span class="selected"></span>
					</a>
				</li>
<!--                                <li id="webNotification_btn">
                                    <a href="javascript:;" onclick="WebNotifications.askForPermission();">
					<i class="icon-bell"></i>
					<span class="title"><input type="button" class="btn blue" value="Ask for permission" onclick="WebNotifications.askForPermission();" /></span>
					<span class="selected"></span>
					</a>
                                </li>-->
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>