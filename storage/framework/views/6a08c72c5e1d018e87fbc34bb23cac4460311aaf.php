<div class="page-header navbar navbar-fixed-top">
	<div class="page-header-inner">			
		<div class="page-logo" style="width:60%">
			<h3 style="color:white;">Online Material Withdrawal System</h3>
		</div>
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?php echo e(asset('themes/metronic/assets/admin/layout/img/avatar.png')); ?>"/>
					<span class="username"> <?php echo e(Auth::user()->name); ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo e(route('change-pass')); ?>">
							<i class="icon-lock"></i> Change Password </a>
						</li>
						<li>
							<a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="icon-key"></i> Log Out 
							</a>
							
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="clearfix"></div><?php /**PATH D:\PROJECTS\WEB_FOCUS\CODE\omws\resources\views/layouts/header.blade.php ENDPATH**/ ?>