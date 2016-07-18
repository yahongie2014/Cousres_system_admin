<div class="page-sidebar-wrapper">
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<li class="start ">
				<a href="{{ route('dashboard') }}">
				<i class="icon-home"></i>
				<span class="title">Dashboard</span>
				</a>
			</li>
			@if ( \Auth::user()->hasRole('admin') )
			<li class="{{ \Request::segment(2) == 'users' && \Input::get('type') == 1 ? 'active open' : '' }}">
				<a href="{{ route('admin.users.index', ['type' => 1]) }}">
				<i class="icon-user"></i>
				<span class="title">Admins</span>
				</a>
			</li>
			<li class="{{ \Request::segment(2) == 'users' && \Input::get('type') == 2 ? 'active open' : '' }}">
				<a href="{{ route('admin.users.index', ['type' => 2]) }}">
				<i class="icon-graduation "></i>
				<span class="title">Instractors</span>
				</a>
			</li>
			<li class="{{ \Request::segment(2) == 'users' && \Input::get('type') == 3 ? 'active open' : '' }}">
				<a href="{{ route('admin.users.index', ['type' => 3]) }}">
				<i class="icon-rocket "></i>
				<span class="title">Students</span>
				</a>
			</li>
			<li class="{{ \Request::segment(2) == 'users-confirm' ? 'active open' : '' }}">
				<a href="{{ route('usersConfirm') }}">
				<i class="icon-check"></i>
				<span class="title">Students Confirmation</span>
				</a>
			</li>
			<li class="{{ in_array(\Request::segment(2), ['pages', 'pageDescs']) ? 'active open' : '' }}">
				<a href="{{ route('admin.pages.index') }}">
				<i class="icon-docs"></i>
				<span class="title">Pages</span>
				</a>
			</li>
			<li class="{{ \Request::segment(2) == 'sliders' ? 'active open' : '' }}">
				<a href="{{ route('admin.sliders.index') }}">
				<i class="icon-picture "></i>
				<span class="title">Sliders</span>
				</a>
			</li>
			<li class="{{ in_array(\Request::segment(2), ['placements']) ? 'active open' : '' }}">
				<a href="{{ route('admin.placements.index') }}">
				<i class="icon-directions "></i>
				<span class="title">Placements</span>
				</a>
			</li>
			@endif
			<li class="{{ in_array(\Request::segment(2), ['modules', 'courses', 'sessions']) ? 'active open' : '' }}">
				<a href="{{ route('admin.modules.index') }}">
				<i class="icon-book-open "></i>
				<span class="title">Modules</span>
				</a>
			</li>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>