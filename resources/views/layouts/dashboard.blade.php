<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom dark mode sidebar with enhanced visibility */
        .sidebar {
            background-color: #212529;  /* Dark background */
            min-height: 100vh;
            padding: 1rem;
            color: #adb5bd;
        }

        /* Styling the sidebar links */
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 0.75rem 1rem;
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Active and hover link styling */
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        /* Accordion button styling */
        .accordion-button {
            background-color: #343a40;
            color: #adb5bd;
            border: 1px solid #495057;
            padding: 0.75rem 1rem;
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        .accordion-button:hover,
        .accordion-button:not(.collapsed) {
            background-color: #495057;
            color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        /* Accordion body styling */
        .accordion-body {
            background-color: #3c434a;
        }

        /* Sidebar section titles */
        .sidebar .sidebar-heading {
            font-size: 1.1rem;
            text-transform: uppercase;
            padding-top: 1rem;
            padding-bottom: 0.5rem;
            color: #f8f9fa;
        }

        /* Divider between sections */
        .sidebar .divider {
            border-bottom: 1px solid #6c757d;
            margin: 1rem 0;
        }

        /* Navbar customization */
        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            font-size: 1.25rem;
            color: #ffffff !important;
        }

        .navbar-nav .nav-link {
            color: #cfd2da !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ffffff !important;
        }

    </style>
</head>
<body class="bg-dark text-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="nav-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Accordion Sidebar with Dark Mode and Enhanced Visibility -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar">
                <h5 class="sidebar-heading">Content Management </h5>
                <div class="accordion" id="sidebarAccordion">

                    <!-- Posts Management Accordion -->
                    <div class="accordion-item bg-dark border-0">
                        <h2 class="accordion-header" id="headingPosts">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                                Posts Management
                            </button>
                        </h2>
                        <div id="collapsePosts" class="accordion-collapse collapse" aria-labelledby="headingPosts">
                            <div class="accordion-body">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('showpostbyuser')}}">Show Posts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('newpost')}}">New Post</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Pages Management Accordion -->
                    <div class="accordion-item bg-dark border-0">
                        <h2 class="accordion-header" id="headingPages">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                Pages Management
                            </button>
                        </h2>
                        <div id="collapsePages" class="accordion-collapse collapse" aria-labelledby="headingPages">
                            <div class="accordion-body">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('showpagesbyuser')}}">Show Pages</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('newpage')}}">New Page</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @can('admin')
                    <div class="accordion-item bg-dark border-0">
                        <h2 class="accordion-header" id="headingCategories">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                                Manage Categories
                            </button>
                        </h2>
                        <div id="collapseCategories" class="accordion-collapse collapse" aria-labelledby="headingCategories">
                            <div class="accordion-body">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('dashboard.newcategory')}}">New Category</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('categories')}}">Show Categories</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('admin')
                        
                    
                    <div class="accordion-item bg-dark border-0">
                        <h2 class="accordion-header" id="headingProducts">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                                Manage Comments
                            </button>
                        </h2>
                        <div id="collapseProducts" class="accordion-collapse collapse" aria-labelledby="headingProducts">
                            <div class="accordion-body">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('managecomments')}}">Confirm Comments</a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endcan
                    <div class="divider"></div>
                    @can('admin')
                        
                    
                    <h5 class="sidebar-heading">Core</h5>
                    <div class="accordion-item bg-dark border-0">
                        <h2 class="accordion-header" id="headingReports">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReports" aria-expanded="false" aria-controls="collapseReports">
                                Users Management
                            </button>
                        </h2>
                        <div id="collapseReports" class="accordion-collapse collapse" aria-labelledby="headingReports">
                            <div class="accordion-body">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('createuser')}}">Create User</a>
                                    </li>
                           
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endcan

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
