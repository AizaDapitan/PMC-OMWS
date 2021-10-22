<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
			<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
			<li class="sidebar-toggler-wrapper">
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				<div class="sidebar-toggler">
				</div>
				<!-- END SIDEBAR TOGGLER BUTTON -->
			</li>
			<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
			<li class="sidebar-search-wrapper">
				<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
				<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
				<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
				<form class="sidebar-search" action="index.php" method="POST">
					<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
					</a>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
						</span>
					</div>
				</form>
				<!-- END RESPONSIVE QUICK SEARCH FORM -->

			</li>
			<li class="start <?php if(request()->route()->uri == 'dashboard'): ?> active <?php endif; ?>">
				<a href="<?php echo e(env('APP_URL')); ?>">
					<i class="icon-home"></i>
					<span class="title">Home</span>
					<span class="selected"></span>
					<span class="arrow open hide"></span>
				</a>
			</li>
			<li class="<?php if(request()->route()->uri == 'ppe-transactions' || request()->route()->uri == 'ppe-transaction/{id}'): ?> active <?php endif; ?>">
				<a href="<?php echo e(route('ppe-transactions')); ?>">
					<i class="icon-home"></i>
					<span class="title">PPE Issuance Requests</span>
					<span class="title"></span>
				</a>
			</li>
			<li class="<?php if(request()->routeIs('maintenance*')): ?> active open <?php endif; ?>">
				<a href="javascript:;">
					<i class="fa fa-th-large"></i>
					<span class="title">Maintenance</span>
					<span class="arrow <?php if(request()->routeIs('maintenance*')): ?> open <?php endif; ?>"></span>
				</a>
				<ul class="sub-menu">
					<li class="<?php if(request()->routeIs('maintenance.contractors*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.contractors.index')); ?>">
							<i class="fa fa-group"></i>
							Contractors
						</a>
					</li>
					<li class="<?php if(request()->routeIs('maintenance.locations*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.locations.index')); ?>">
							<i class="fa fa-flag"></i>
							Locations</a>
					</li>
					<li class="<?php if(request()->routeIs('maintenance.receivers*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.receivers.index')); ?>">
							<i class="fa fa-share"></i>
							Receivers</a>
					</li>
					<li class="<?php if(request()->routeIs('maintenance.approvers*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.approvers.index')); ?>">
							<i class="fa fa-gavel"></i>
							Approvers</a>
					</li>
					<li class="<?php if(request()->routeIs('maintenance.costcodes*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.costcodes.index')); ?>">
							<i class="fa fa-barcode"></i>
							Cost Codes</a>
					</li>
					<li class="<?php if(request()->routeIs('maintenance.cutoffs*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.cutoffs.index')); ?>" }>
							<i class="fa fa-lock"></i>
							Cutoffs</a>
					</li>
					<li class="<?php if(request()->routeIs('maintenance.categories*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.categories.index')); ?>">
							<i class="fa fa-lock"></i>
							Categories</a>
					</li>					
					
					<li class="<?php if(request()->routeIs('maintenance.sequence*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.sequence.index')); ?>">
							<i class="fa fa-lock"></i>
							Sequences Control</a>
					</li>
					
					
					<li class="<?php if(request()->routeIs('maintenance.users')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.users.index')); ?>">
							<i class="icon-users"></i>
							<span class="title">Users</span>
							<span class="arrow hide"></span>
						</a>
					</li>
							<li class="<?php if(request()->routeIs('maintenance.roles*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.roles.index')); ?>">
						<i class="fa fa-lock"></i>
						Roles</a>
					</li>

					<li class="<?php if(request()->routeIs('maintenance.permissions*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.permissions.index')); ?>">
						<i class="fa fa-lock"></i>
						Permissions</a>
					</li>

					<li class="<?php if(request()->routeIs('maintenance.roleaccessrights*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.roleaccessrights.index')); ?>">
						<i class="fa fa-lock"></i>
						Role Access Rights</a>
					</li>
					
					<li class="<?php if(request()->routeIs('maintenance.useraccessrights*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.useraccessrights.index')); ?>">
						<i class="fa fa-lock"></i>
						User Access Rights</a>
					</li>
					
					<li class="<?php if(request()->routeIs('maintenance.application*')): ?> active <?php endif; ?>">
						<a href="<?php echo e(route('maintenance.application.index')); ?>">
						<i class="fa fa-lock"></i>
						Application</a>
					</li>					
										
				</ul>
			</li>

			<li class="<?php if(request()->routeIs('items*')): ?> active <?php endif; ?>">
				<a href="<?php echo e(route('items.index')); ?>">
					<i class="fa fa-link"></i>
					<span class="title">Items</span>
					<span class="arrow hide"></span>
				</a>
			</li>

			<li class="<?php if(request()->route()->uri == 'transactions'): ?> active <?php endif; ?>">
				<a href="<?php echo e(route('transactions')); ?>">
					<i class="fa fa-truck"></i>
					<span class="title">Transactions</span>
					<span class="arrow hide"></span>
				</a>
			</li>
			<li class="<?php if(request()->route()->uri == 'transaction-new'): ?> active <?php endif; ?>">
				<a href="<?php echo e(route('transaction-new')); ?>">
					<i class="fa fa-send"></i>
					<span class="title">Add Transaction</span>
					<span class="arrow hide"></span>
				</a>
			</li>
			<li class="<?php if(request()->routeIs('transaction-batch*')): ?> active open <?php endif; ?>">
				<a href="javascript:;">
					<i class="fa fa-list"></i>
					<span class="title">Batch Posting</span>
					<span class="arrow <?php if(request()->routeIs('transaction-batch*')): ?> open <?php endif; ?>"></span>
				</a>
				<ul class="sub-menu">
					<li class="<?php if(request()->routeIs('transaction-batch-per-id')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('transaction-batch-per-id')); ?>">
							<i class="fa fa-calendar"></i>
							<span class="title">per Transaction ID</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="<?php if(request()->routeIs('transaction-batch-per-date')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('transaction-batch-per-date')); ?>">
							<i class="fa fa-calendar"></i>
							<span class="title">per Document Date</span>
							<span class="arrow hide"></span>
						</a>
					</li>
				</ul>
			</li>
			<li class="<?php if(request()->routeIs('rpt*')): ?> active open <?php endif; ?>">
				<a href="javascript:;">
					<i class="fa fa-list"></i>
					<span class="title">Reports</span>
					<span class="arrow <?php if(request()->routeIs('rpt*')): ?> open <?php endif; ?>"></span>
				</a>
				<ul class="sub-menu">
					<li class="<?php if(request()->routeIs('rpt.transaction-all')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('rpt.transaction-all')); ?>">
							<i class="fa fa-calendar"></i>
							<span class="title">Issuance Report</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="<?php if(request()->routeIs('rpt.item-issuance')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('rpt.item-issuance')); ?>">
							<i class="fa fa-calendar"></i>
							<span class="title">Item Issuance Summary</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="<?php if(request()->routeIs('rpt.item-issuance-details')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('rpt.item-issuance-details')); ?>">
							<i class="fa fa-calendar"></i>
							<span class="title">Item Issuance Details</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="<?php if(request()->routeIs('rpt.location-history')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('rpt.location-history')); ?>">
							<i class="fa fa-calendar"></i>
							<span class="title">Location History</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="<?php if(request()->routeIs('rpt.contractor-history')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('rpt.contractor-history')); ?>">
							<i class="fa fa-calendar"></i>
							<span class="title">Contractor History</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="<?php if(request()->routeIs('rpt.unposted-transactions')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('rpt.unposted-transactions')); ?>?status=saved">
							<i class="fa fa-calendar"></i>
							<span class="title">Unposted Transactions</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="<?php if(request()->routeIs('rpt.issuance-by-transactionID')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('rpt.issuance-by-transactionID')); ?>">
							<i class="fa fa-calendar"></i>
							<span class="title">Summary per Transaction #</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="<?php if(request()->routeIs('rpt.audit-logs')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('rpt.audit-logs')); ?>">
							<i class="fa fa-calendar"></i>
							<span class="title">User Action</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="<?php if(request()->routeIs('rpt.error-logs')): ?> active open <?php endif; ?>">
						<a href="<?php echo e(route('rpt.error-logs')); ?>">
							<i class="fa fa-calendar"></i>
							<span class="title">Error Logs</span>
							<span class="arrow hide"></span>
						</a>
					</li>
				</ul>
			</li>
			<!--Added dated 11-30-2017 to cater the link for manual by AAG -->
			<li>
				<a href="/">
					<i class="icon-docs"></i>
					<span class="usersmanual">OMWS Manual</span>
					<span class="arrow hide"></span>
				</a>

			</li>

			<li>
				<a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<i class="icon-logout"></i>
					<span class="title">Logout</span>
					<span class="arrow hide"></span>
				</a>
				<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
					<?php echo e(csrf_field()); ?>

				</form>
			</li>

		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
<!-- END SIDEBAR --><?php /**PATH C:\xampp\htdocs\omws\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>