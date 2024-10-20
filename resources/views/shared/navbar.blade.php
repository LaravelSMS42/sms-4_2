<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">School Management System</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Colleges
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('college.index') }}">College Management</a></li>
            <li><a class="dropdown-item" href="{{ route('college.create') }}">Add College</a></li>
            <li><a class="dropdown-item" href="{{ route('archived-colleges') }}">Archived Colleges</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Departments
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/all-departments">Department Management</a></li>
            <li><a class="dropdown-item" href="/add-program">Add Department</a></li>
            <li><a class="dropdown-item" href="/dept-archives">Archived Departments</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Programs
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/all-programs">Program Management</a></li>
            <li><a class="dropdown-item" href="/add-program">Add Program</a></li>
            <li><a class="dropdown-item" href="/program-archives">Archived Programs</a></li>
          </ul>
        </li>
      </ul>
      <div href="" class="d-flex">
        <ul class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Log out</a></li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</nav>