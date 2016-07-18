<h3 class="page-title">
{{ $page_title }}
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="{{ route('dashboard') }}">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		@if (isset($level1))
		<li>
			@if (isset($level2))
			<a href="{{ url($level1_link) }}">{{ $level1 }}</a>
			<i class="fa fa-angle-right"></i>
			@else
			<a href="{{ url($level1_link) }}">{{ $level1 }}</a>
			@endif
		</li>
		@endif
		@if (isset($level2))
		<li>
			@if (isset($level3))
			<a href="{{ url($level2_link) }}">{{ $level2 }}</a>
			<i class="fa fa-angle-right"></i>
			@else
			<a href="{{ url($level2_link) }}">{{ $level2 }}</a>
			@endif
		</li>
		@endif
		@if (isset($level3))
		<li>
			@if (isset($level4))
			<a href="{{ url($level3_link) }}">{{ $level3 }}</a>
			<i class="fa fa-angle-right"></i>
			@else
			<a href="{{ url($level3_link) }}">{{ $level3 }}</a>
			@endif
		</li>
		@endif
		@if (isset($level4))
		<li>
			<a href="{{ url($level4_link) }}">{{ $level4 }}</a>
		</li>
		@endif
	</ul>
</div>