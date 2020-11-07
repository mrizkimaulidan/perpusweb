<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    @if(auth()->user()->id === 1 || auth()->user()->id === 2)
    <div class="sidebar-brand">
      <a href="{{ route('admin.dashboard.index') }}">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('admin.dashboard.index') }}">{{ Str::limit(config('app.name'), 2, '') }}</a>
    </div>
    <ul class="sidebar-menu">
      <li class="{{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}"><i class="fas fa-fire"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="menu-header">Data Master</li>
      <li class="{{ Request::segment(2) === 'users' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="far fa-user"></i>
          <span>Pengguna</span></a>
      </li>
      <li class="{{ Request::segment(2) === 'book-types' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.book-types.index') }}"><i class="far fa-bookmark"></i> <span>Kategori
            Buku</span></a>
      </li>
      <li class="{{ Request::segment(2) === 'books' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.books.index') }}"><i class="fas fa-book"></i> <span>Buku</span></a>
      </li>
      <li
        class="nav-item dropdown {{ (Request::segment(2) === 'book-borrowers' ? 'active' : '') || Request::segment(2) === 'book-borrowers-history' ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-book-reader"></i> <span>Peminjaman</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::segment(2) === 'book-borrowers' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.book-borrowers.index') }}">Peminjam Buku</a>
          </li>
          <li class="{{ Request::segment(2) === 'book-borrowers-history' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.book-borrowers-history.index') }}">Histori Peminjam Buku</a>
          </li>
        </ul>
      </li>
      @else
      <div class="sidebar-brand">
        <a href="{{ route('anggota.dashboard.index') }}">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('anggota.dashboard.index') }}">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="{{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('anggota.dashboard.index') }}"><i class="fas fa-fire"></i>
            <span>Dashboard</span></a>
        </li>

        <li class="menu-header">Menu</li>
        <li
          class="nav-item dropdown {{ (Request::segment(2) === 'book-borrowers' ? 'active' : '') || Request::segment(2) === 'book-borrowers-history' ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-book-reader"></i> <span>Peminjaman</span></a>
          <ul class="dropdown-menu">
            <li class="{{ Request::segment(2) === 'book-borrowers-history' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('anggota.book-borrowers-history.index') }}">Histori Peminjaman Buku</a>
            </li>
          </ul>
        </li>
      </ul>
      @endif
    </ul>

  </aside>
</div>