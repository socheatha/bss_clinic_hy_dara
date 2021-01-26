
<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4  {{ ((Auth::user()->setting()->sidebar_color != '')? Auth::user()->setting()->sidebar_color : 'sidebar-dark-primary') }}">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="/images/setting/{{ Auth::user()->setting()->logo }}" alt="{{ Auth::user()->setting()->clinic_name }}" class="brand-image img-circle elevation-3">
		<span class="brand-text font-weight-light">{{ Auth::user()->setting()->clinic_name }}</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-flat nav-child-indent text-sm" data-widget="treeview" role="menu" data-accordion="false">

				<!-- Add icons to the links using the .nav-icon class
						with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="{{ route('home') }}" class="nav-link {{ ((Auth::user()->sidebarActive() == 'home' )? 'active':'') }}">
						<i class="fa fa-home nav-icon"></i>
						<p>{{ __('sidebar.home.main') }}</p>
					</a>
				</li>



				{{-- User Management --}}
				@canany(['Patient Index', 'Patient Create', 'Patient Edit', 'Patient Delete', 'Medicine Index', 'Medicine Create', 'Medicine Edit', 'Medicine Delete'])
				
					<li class="nav-header">{{ __('sidebar.header.main_data') }}</li>

					@can('Patient Index', 'Patient Create', 'Patient Edit', 'Patient Delete')
					<li class="nav-item">
						<a href="{{ route('patient.index') }}" class="nav-link {{ ((Auth::user()->sidebarActive() == 'patient' )? 'active':'') }}">
							<i class="fa fa-user-injured nav-icon"></i>
							<p>{{ __('sidebar.patient.main') }}</p>
						</a>
					</li>
					@endcan

					@can('Medicine Index', 'Medicine Create', 'Medicine Edit', 'Medicine Delete')
					<li class="nav-item">
						<a href="{{ route('medicine.index') }}" class="nav-link {{ ((Auth::user()->sidebarActive() == 'medicine' )? 'active':'') }}">
							<i class="fa fa-pills nav-icon"></i>
							<p>{{ __('sidebar.medicine.main') }}</p>
						</a>
					</li>
					@endcan

				@endcan


				{{-- User Management --}}
				@canany(['User Index', 'User Create', 'User Edit', 'User Delete', 'User Assign Role', 'User Assign Permission', 'Role Index', 'Role Create', 'Role Edit', 'Role Delete', 'Role User Assign', 'Permission Index', 'Permission Create', 'Permission Edit', 'Permission Delete', 'Permission Role Assign', 'Permission User Assign', 'Province Index', 'Province Create', 'Province Edit', 'Province Delete', 'District Index', 'District Create', 'District Edit', 'District Delete'])
				
					<li class="nav-header">{{ __('sidebar.header.other_management') }}</li>

					@can('User Index', 'User Create', 'User Edit', 'User Delete', 'User Assign Role', 'User Assign Permission')
					<li class="nav-item">
						<a href="{{ route('user.index') }}" class="nav-link {{ ((Auth::user()->sidebarActive() == 'user' )? 'active':'') }}">
							<i class="fa fa-user nav-icon"></i>
							<p>{{ __('sidebar.user.sub.user') }}</p>
						</a>
					</li>
					@endcan

					@can('Role Index', 'Role Create', 'Role Edit', 'Role Delete', 'Role User Assign')
					<li class="nav-item">
						<a href="{{ route('role.index') }}" class="nav-link {{ ((Auth::user()->sidebarActive() == 'role' )? 'active':'') }}">
							<i class="fa fa-user-graduate nav-icon"></i>
							<p>{{ __('sidebar.user.sub.role') }}</p>
						</a>
					</li>
					@endcan

					@can('Permission Index', 'Permission Create', 'Permission Edit', 'Permission Delete', 'Permission Role Assign', 'Permission User Assign')
					<li class="nav-item">
						<a href="{{ route('permission.index') }}" class="nav-link {{ ((Auth::user()->sidebarActive() == 'permission' )? 'active':'') }}">
							<i class="fa fa-shield-alt nav-icon"></i>
							<p>{{ __('sidebar.user.sub.permission.sub.permission') }}</p>
						</a>
					</li>
					@endcan

					@can('Setting Index')
					<li class="nav-item">
						<a href="{{ route('setting.index') }}" class="nav-link {{ ((Auth::user()->sidebarActive() == 'setting' )? 'active':'') }}">
							<i class="fa fa-cogs nav-icon"></i>
							<p>{{ __('sidebar.setting.main') }}</p>
						</a>
					</li>
					@endcan

					@can('Province Index', 'Province Create', 'Province Edit', 'Province Delete')
					<li class="nav-item">
						<a href="{{ route('province.index') }}" class="nav-link {{ ((Auth::user()->sidebarActive() == 'province' )? 'active':'') }}">
							<i class="fa fa-map nav-icon"></i>
							<p>{{ __('sidebar.province.main') }}</p>
						</a>
					</li>
					@endcan

					@can('District Index', 'District Create', 'District Edit', 'District Delete')
					<li class="nav-item">
						<a href="{{ route('district.index') }}" class="nav-link {{ ((Auth::user()->sidebarActive() == 'district' )? 'active':'') }}">
							<i class="fa fa-map-marker-alt nav-icon"></i>
							<p>{{ __('sidebar.district.main') }}</p>
						</a>
					</li>
					@endcan

				@endcan

			</ul>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>