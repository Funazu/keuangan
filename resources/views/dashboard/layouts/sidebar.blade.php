<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <hr>
          <li class="nav-item">
              <a href="/logout" class="nav-link">
                <span data-feather="log-out"></span>
                Logout
            </a>
          </li>
        </ul>
      </div>
    </nav>