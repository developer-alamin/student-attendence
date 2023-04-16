<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{asset('admin/')}}">Attendence</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{asset('admin/')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="CategoryDiv">Crouse Category</div>
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseClass" aria-expanded="false" aria-controls="collapseClass">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Class
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                 <div class="collapse" id="collapseClass" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link beforeNav" href="{{asset('admin/addClass')}}">Add Class</a>
                        <a class="nav-link beforeNav" href="{{asset('admin/viewClass')}}">View Class</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Crouse
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link beforeNav" href="{{asset('admin/addCrouse')}}">Add Crouse</a>
                        <a class="nav-link beforeNav" href="{{asset('admin/viewCrouse')}}">View Crouse</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Department
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link beforeNav" href="{{asset('admin/addDepart')}}">Add Department</a>
                        <a class="nav-link beforeNav" href="{{asset('admin/viewDepart')}}">View Department</a>
                    </nav>
                </div>
                <div class="CategoryDiv">Student Managment</div>
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStudent" aria-expanded="false" aria-controls="collapseStudent">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Student
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseStudent" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link beforeNav" href="{{asset('admin/addStudent')}}">Add Student</a>
                        <a class="nav-link beforeNav" href="{{asset('admin/viewStudent')}}">View Student</a>
                    </nav>
                </div>
               
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#attendnce" aria-expanded="false" aria-controls="attendnce">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Attendance
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="attendnce" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link beforeNav" href="{{asset('admin/addAttenden')}}">Attendance</a>
                        <a class="nav-link beforeNav" href="{{asset('admin/recodeattenden')}}">Recode Attendence</a>
                        <a class="nav-link beforeNav" href="{{asset('admin/viewAttenden')}}">View Attendance</a>
                    </nav>
                </div>
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#logout" aria-expanded="false" aria-controls="logout">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    User
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="logout" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link beforeNav" href="{{asset('admin/logout')}}">Logout</a>
                    </nav>
                </div>
                
            </div>
        </div>
    </nav>
</div>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">