<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 ml-auto">
          <form class="input-icon my-3 my-lg-0">
            <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
            <div class="input-icon-addon">
              <i class="fe fe-search"></i>
            </div>
          </form>
        </div>
        <div class="col-lg order-lg-first">
          <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
            <li class="nav-item">
              <a href="{{ route('web.index') }}" class="nav-link {{ Request::segment(1) == 'home' ? 'active' : null }}"><i class="fe fe-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('transaction.create') }}" class="nav-link {{ Request::segment(1) == 'transaction/create' ? 'active' : null }}"><i class="fe fe-plus"></i>Buat Transaksi</a>
              </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link {{ Request::segment(1) == 'transaction' ? 'active' : null }}" data-toggle="dropdown"><i class="fe fe-airplay"></i>Transaksi</a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ route('transaction.create') }}" class="dropdown-item ">Buat Transaksi</a>
                <a href="{{ route('transaction.index') }}" class="dropdown-item ">Data Transaksi</a>
              </div>
            </li>
            @if (auth()->user()->role == 'admin')
            <li class="nav-item">
                <a href="{{ route('outlet.index') }}" class="nav-link {{ Request::segment(1) == 'outlet' ? 'active' : null }}"><i class="fe fe-home"></i> Outlet</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link {{ Request::segment(1) == 'product' ? 'active' : null }}"><i class="fe fe-package"></i> Product</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ Request::segment(1) == 'user' ? 'active' : null }}"><i class="fe fe-user"></i> User</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customer.index') }}" class="nav-link {{ Request::segment(1) == 'customer' ? 'active' : null }}"><i class="fe fe-users"></i> Customer</a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
