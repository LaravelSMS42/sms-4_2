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
            College
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Create College</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Payroll
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('payroll.create') }}">Create Payroll</a></li> <!-- Link to payroll create -->
            <li><a class="dropdown-item" href="{{ route('payroll.approval') }}">Payroll Approval</a></li> <!-- Link to payroll approval -->
            <li><a class="dropdown-item" href="{{ route('payroll.history') }}">Payroll History</a></li> <!-- Link to payroll history -->
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Employee
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('employee.create') }}">Create Employee</a></li> <!-- Link to create employee -->
            <li><a class="dropdown-item" href="{{ route('employee.index') }}">Show Employees</a></li> <!-- Link to show employees -->
          </ul>
        </li>
      </ul>
      <div class="d-flex">
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
