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
			<li class="start @if (request()->route()->uri == 'dashboard') active @endif">
				<a href="{{ env('APP_URL')}}">
					<i class="icon-home"></i>
					<span class="title">Home</span>
					<span class="selected"></span>
					<span class="arrow open hide"></span>
				</a>
			</li>
			<li class="@if (request()->route()->uri == 'ppe-transactions' || request()->route()->uri == 'ppe-transaction/{id}') active @endif">
				<a href="{{ route('ppe-transactions') }}">
					<i class="icon-home"></i>
					<span class="title">PPE Issuance Requests</span>
					<span class="title"></span>
				</a>
			</li>
			<li class="@if (request()->routeIs('maintenance*')) active open @endif">
				<a href="javascript:;">
					<i class="fa fa-th-large"></i>
					<span class="title">Maintenance</span>
					<span class="arrow @if (request()->routeIs('maintenance*')) open @endif"></span>
				</a>
				<ul class="sub-menu">
					<li class="@if (request()->routeIs('maintenance.contractors*')) active @endif">
						<a href="{{ route('maintenance.contractors.index') }}">
							<i class="fa fa-group"></i>
							Contractors
						</a>
					</li>
					<li class="@if (request()->routeIs('maintenance.locations*')) active @endif">
						<a href="{{ route('maintenance.locations.index') }}">
							<i class="fa fa-flag"></i>
							Locations</a>
					</li>
					<li class="@if (request()->routeIs('maintenance.receivers*')) active @endif">
						<a href="{{ route('maintenance.receivers.index') }}">
							<i class="fa fa-share"></i>
							Receivers</a>
					</li>
					<li class="@if (request()->routeIs('maintenance.approvers*')) active @endif">
						<a href="{{ route('maintenance.approvers.index') }}">
							<i class="fa fa-gavel"></i>
							Approvers</a>
					</li>
					<li class="@if (request()->routeIs('maintenance.costcodes*')) active @endif">
						<a href="{{ route('maintenance.costcodes.index') }}">
							<i class="fa fa-barcode"></i>
							Cost Codes</a>
					</li>
					<li class="@if (request()->routeIs('maintenance.cutoffs*')) active @endif">
						<a href="{{ route('maintenance.cutoffs.index') }}" }>
							<i class="fa fa-lock"></i>
							Cutoffs</a>
					</li>
					<li class="@if (request()->routeIs('maintenance.categories*')) active @endif">
						<a href="{{ route('maintenance.categories.index') }}">
							<i class="fa fa-lock"></i>
							Categories</a>
					</li>					
					{{-- @if(\Auth::user()->can_open_sequence) --}}
					<li class="@if (request()->routeIs('maintenance.sequence*')) active @endif">
						<a href="{{ route('maintenance.sequence.index') }}">
							<i class="fa fa-lock"></i>
							Sequences Control</a>
					</li>
					{{-- @endif --}}
					
					<li class="@if (request()->routeIs('maintenance.users')) active @endif">
						<a href="{{ route('maintenance.users.index') }}">
							<i class="icon-users"></i>
							<span class="title">Users</span>
							<span class="arrow hide"></span>
						</a>
					</li>
							<li class="@if (request()->routeIs('maintenance.roles*')) active @endif">
						<a href="{{ route('maintenance.roles.index') }}">
						<i class="fa fa-lock"></i>
						Roles</a>
					</li>

					<li class="@if (request()->routeIs('maintenance.permissions*')) active @endif">
						<a href="{{ route('maintenance.permissions.index') }}">
						<i class="fa fa-lock"></i>
						Permissions</a>
					</li>

					<li class="@if (request()->routeIs('maintenance.roleaccessrights*')) active @endif">
						<a href="{{ route('maintenance.roleaccessrights.index') }}">
						<i class="fa fa-lock"></i>
						Role Access Rights</a>
					</li>
					
					<li class="@if (request()->routeIs('maintenance.useraccessrights*')) active @endif">
						<a href="{{ route('maintenance.useraccessrights.index') }}">
						<i class="fa fa-lock"></i>
						User Access Rights</a>
					</li>						
										
				</ul>
			</li>

			<li class="@if (request()->routeIs('items*')) active @endif">
				<a href="{{ route('items.index') }}">
					<i class="fa fa-link"></i>
					<span class="title">Items</span>
					<span class="arrow hide"></span>
				</a>
			</li>

			<li class="@if (request()->route()->uri == 'transactions') active @endif">
				<a href="{{ route('transactions') }}">
					<i class="fa fa-truck"></i>
					<span class="title">Transactions</span>
					<span class="arrow hide"></span>
				</a>
			</li>
			<li class="@if (request()->route()->uri == 'transaction-new') active @endif">
				<a href="{{ route('transaction-new') }}">
					<i class="fa fa-send"></i>
					<span class="title">Add Transaction</span>
					<span class="arrow hide"></span>
				</a>
			</li>
			<li class="@if (request()->routeIs('transaction-batch*')) active open @endif">
				<a href="javascript:;">
					<i class="fa fa-list"></i>
					<span class="title">Batch Posting</span>
					<span class="arrow @if (request()->routeIs('transaction-batch*')) open @endif"></span>
				</a>
				<ul class="sub-menu">
					<li class="@if (request()->routeIs('transaction-batch-per-id')) active open @endif">
						<a href="{{ route('transaction-batch-per-id') }}">
							<i class="fa fa-calendar"></i>
							<span class="title">per Transaction ID</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="@if (request()->routeIs('transaction-batch-per-date')) active open @endif">
						<a href="{{ route('transaction-batch-per-date') }}">
							<i class="fa fa-calendar"></i>
							<span class="title">per Document Date</span>
							<span class="arrow hide"></span>
						</a>
					</li>
				</ul>
			</li>
			<li class="@if (request()->routeIs('rpt*')) active open @endif">
				<a href="javascript:;">
					<i class="fa fa-list"></i>
					<span class="title">Reports</span>
					<span class="arrow @if (request()->routeIs('rpt*')) open @endif"></span>
				</a>
				<ul class="sub-menu">
					<li class="@if (request()->routeIs('rpt.transaction-all')) active open @endif">
						<a href="{{ route('rpt.transaction-all')}}">
							<i class="fa fa-calendar"></i>
							<span class="title">Issuance Report</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="@if (request()->routeIs('rpt.item-issuance')) active open @endif">
						<a href="{{ route('rpt.item-issuance')}}">
							<i class="fa fa-calendar"></i>
							<span class="title">Item Issuance Summary</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="@if (request()->routeIs('rpt.item-issuance-details')) active open @endif">
						<a href="{{ route('rpt.item-issuance-details')}}">
							<i class="fa fa-calendar"></i>
							<span class="title">Item Issuance Details</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="@if (request()->routeIs('rpt.location-history')) active open @endif">
						<a href="{{ route('rpt.location-history') }}">
							<i class="fa fa-calendar"></i>
							<span class="title">Location History</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="@if (request()->routeIs('rpt.contractor-history')) active open @endif">
						<a href="{{ route('rpt.contractor-history') }}">
							<i class="fa fa-calendar"></i>
							<span class="title">Contractor History</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="@if (request()->routeIs('rpt.issuance-by-status')) active open @endif">
						<a href="{{ route('rpt.issuance-by-status') }}?status=saved">
							<i class="fa fa-calendar"></i>
							<span class="title">Unposted Transactions</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="@if (request()->routeIs('rpt.issuance-by-transactionID')) active open @endif">
						<a href="{{ route('rpt.issuance-by-transactionID') }}">
							<i class="fa fa-calendar"></i>
							<span class="title">Summary per Transaction #</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="@if (request()->routeIs('rpt.audit-logs')) active open @endif">
						<a href="{{ route('rpt.audit-logs') }}">
							<i class="fa fa-calendar"></i>
							<span class="title">User Action</span>
							<span class="arrow hide"></span>
						</a>
					</li>
					<li class="@if (request()->routeIs('rpt.error-logs')) active open @endif">
						<a href="{{ route('rpt.error-logs') }}">
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
				<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<i class="icon-logout"></i>
					<span class="title">Logout</span>
					<span class="arrow hide"></span>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</li>

		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
<!-- END SIDEBAR -->