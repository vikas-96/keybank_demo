<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
  <ul class="navbar-nav">
    
    
    <li class="nav-item dropdown dmenu">
      <a class="nav-link" href="{{route('asset.list')}}">Asset List</a>
    </li>
    <li class="nav-item dropdown dmenu">
      <a class="nav-link" href="/assets">Assets </a>
    </li>
    <li class="nav-item dropdown dmenu">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Master
      </a>
      <div class="dropdown-menu sm-menu">
        <a href="/borrower"> <i class="menu-icon fa fa-money"></i>Borrowers </a>
        <a href="/caseleadofficer"> <i class="menu-icon fa fa-shield"></i>Case Lead Officers </a>
        <a href="/caseofficer"> <i class="menu-icon fa fa-shield"></i>Case Officers </a>
        <a href="/advocate"> <i class="menu-icon fa fa-gavel"></i>Advocates </a>
        <a href="/valuer"> <i class="menu-icon fa fa-rupee"></i>Valuers </a>
        <a href="/resolutionagent"> <i class="menu-icon fa fa-user-secret"></i>Resolution Agent </a>
        <a href="/loan"> <i class="menu-icon fa fa-file"></i>Loans </a>
      </div>
    </li>
    <li class="nav-item dropdown dmenu">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Dashboard
      </a>
      <div class="dropdown-menu sm-menu">
        <a href="/reports-search?type=property_type"> <i class="menu-icon fa fa-home"></i>Property Type</a>
        <a href="/reports-search?type=property_sub_type"> <i class="menu-icon fa fa-home"></i>Property Subtype</a>
        <!-- <a href="/reports-search?type=area_pincode"> <i class="menu-icon fa fa-area-chart"></i>Area (Pincode)</a> -->
        <a href="/reports-search?type=reserve_price"> <i class="menu-icon fa fa-rupee"></i>Reserve Price</a>
        <a href="/reports-search?type=kap_price"> <i class="menu-icon fa fa-rupee"></i>Kap Price</a>
        <a href="/reports-search?type=area_spread"> <i class="menu-icon fa fa-area-chart"></i>Area Spread (sq ft)</a>
        <a href="/reports-search?type=marketability"> <i class="menu-icon fa fa-file"></i>Marketability</a>
        <a href="/reports-search?type=possession_type"> <i class="menu-icon fa fa-file"></i>Possession Type</a>
        <a href="/reports-search?type=auction"> <i class="menu-icon fa fa-file"></i>Auction</a>
      </div>
    </li>

    <li class="nav-item dmenu">
      <a class="nav-link" href="/users">User Management</a>
    </li>

    @if(request()->user)
    {{-- <h3 class="menu-title">Financial Information</h3>
            <li class=""><a href="{{ route('users.show', request()->user->id) }}"> <i
      class="menu-icon fa fa-user"></i>User Dashboard </a></li>
    <li class=""><a href="{{ route('bank-accounts.index', request()->user->id) }}"> <i
          class="menu-icon fa fa-money"></i>Bank Account </a></li>
    <li class=""><a href="{{ route('deposit-accounts.index', request()->user->id) }}"> <i
          class="menu-icon fa fa-suitcase"></i>Deposit Account </a></li>
    <li class=""><a href="{{ route('insurance-accounts.index', request()->user->id) }}"> <i
          class="menu-icon fa fa-keyboard-o"></i>Insurance Account </a></li>
    <li class=""><a href="{{ route('demat-accounts.index', request()->user->id) }}"> <i
          class="menu-icon fa fa-envelope"></i>Demant Account </a></li>
    <li class=""><a href="{{ route('properties.index', request()->user->id) }}"> <i
          class="menu-icon fa fa-home"></i>Property </a></li>
    <li class=""><a href="{{ route('investment-firms.index', request()->user->id) }}"> <i
          class="menu-icon fa fa-building-o"></i>Investement Firm </a></li>
    <li class=""><a href="{{ route('cards.index', request()->user->id) }}"> <i
          class="menu-icon fa fa-credit-card"></i>Card </a></li>
    <li class=""><a href="{{ route('loan-givens.index', request()->user->id) }}"> <i
          class="menu-icon fa fa-mail-forward"></i>Loan Given </a></li>
    <li class=""><a href="{{ route('borrowings.index', request()->user->id) }}"> <i
          class="menu-icon fa fa-tags"></i>Borrowing </a></li>
    <li class=""><a href="{{ route('loan-takens.index', request()->user->id) }}"> <i
          class="menu-icon fa fa-mail-reply"></i>Loan Taken </a></li>

    <h3 class="menu-title">Financial Reports</h3>
    <li class=""><a href="{{ route('users.summary', request()->user->id) }}"> <i
          class="menu-icon fa fa-file-text"></i>Summary </a></li> --}}

    @else
    {{-- <h3 class="menu-title">elements</h3><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                    <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                    <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                    <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                    <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                    <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                    <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                    <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                    <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                    <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                    <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                </ul>
            </li> --}}
    @endif

  </ul>
  @include('admin.layouts.partials.header')
</div>