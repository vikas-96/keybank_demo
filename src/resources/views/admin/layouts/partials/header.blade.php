<div class="user-area dropdown float-right">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user-circle" style="font-size: 2em;"></i>
       {{--  <img class="user-avatar rounded-circle" src="/admin/images/admin.jpg" alt="User Avatar"> --}}
    </a>

    <div class="user-menu dropdown-menu">
            {{-- <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a> --}}
            <a class="nav-link" href="{{ route('admin.logout') }}"><i class="fa fa-power-off"></i> Logout</a>
    </div>
</div>