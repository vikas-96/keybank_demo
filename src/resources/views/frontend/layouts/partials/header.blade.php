<header id="left-panel" class="left-panel">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 main-logo">
				@php
				$roleName = getRoleName();
				@endphp
				<a
					href="{{ isset($roleName) ? ($roleName =='banker') ? route('asset.list') : route('assets.index') : '/login' }}">
					<img src="{{ URL::asset('admin/images/login-page-logo.png') }}">
				</a>
			</div>
			<div class="col-lg-8 search-box">
				{{-- <div class="input-group">        
	                <input type="text" class="form-control" name="x" placeholder="Search">
	                <span class="input-group-btn">
	                    <button class="btn btn-default" type="button">
	                    	<i class="fa fa-search" aria-hidden="true"></i>
	                    </button>
	                </span>
	            </div> --}}
			</div>
			<div class="col-lg-13">
				<nav class="navbar navbar-expand-sm navbar-default pull-right">
					<div class="collapse navbar-collapse">
						<ul class="navbar-nav">
							<li class="nav-item dmenu"><a class="nav-link" href="{{ route('asset-compare') }}">Compare</a>
							</li>
							{{-- <li class="nav-item dmenu"><a class="nav-link" href="#">Advanced Search</a></li> --}}
							<li class="nav-item dmenu">
								<a class="nav-link" href="{{route('asset.list')}}">Asset List</a>
							</li>
							<li class="nav-item dropdown dmenu">
								<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
									Dashboard
								</a>
								<div class="dropdown-menu sm-menu">
									<a href="/reports-search?type=property_type"> <i
											class="menu-icon fa fa-home"></i>Property Type</a>
									<a href="/reports-search?type=property_sub_type"> <i
											class="menu-icon fa fa-home"></i>Property Subtype</a>
									<a href="/reports-search?type=reserve_price"> <i
											class="menu-icon fa fa-rupee"></i>Reserve Price</a>
									{{-- <a href="/reports-search?type=area_pincode"> <i class="menu-icon fa fa-area-chart"></i>Area (Pincode)</a> --}}
									<a href="/reports-search?type=kap_price"> <i class="menu-icon fa fa-rupee"></i>KAP
										Price</a>
									<a href="/reports-search?type=area_spread"> <i class="menu-icon fa fa-area-chart"></i>Area Spread (sq ft)</a>
									<a href="/reports-search?type=marketability"> <i
											class="menu-icon fa fa-file"></i>Marketability</a>
									<a href="/reports-search?type=possession_type"> <i
											class="menu-icon fa fa-file"></i>Possession Type</a>
									<a href="/reports-search?type=auction"> <i
											class="menu-icon fa fa-file"></i>Auction</a>
								</div>
							</li>
						</ul>
						<div class="user-area dropdown float-right">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class="fa fa-user-circle" style="font-size: 2em;"></i>
							</a>
							<div class="user-menu dropdown-menu">
								{{--<a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>--}}
								<a class="nav-link" href="{{route('frontend.logout')}}"><i class="fa fa-power-off"></i>
									Logout</a>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>