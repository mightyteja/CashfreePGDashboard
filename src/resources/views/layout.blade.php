<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"
        rel="stylesheet" />

    <style>
        /*
4px:  $spacer * 0.25
8px:  $spacer * 0.5
16px: $spacer
20px: $spacer * 1.25
24px: $spacer * 1.5
*/

        .sidebar-toggler {
            padding: 0.25rem 0.75rem;
            font-size: 1.25rem;
            line-height: 1;
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            color: rgba(0, 0, 0, 0.5);
            border-color: rgba(0, 0, 0, 0.1);
        }

        .sidebar-toggler .sidebar-toggler-icon {
            display: inline-block;
            width: 1.5em;
            height: 1.5em;
            vertical-align: middle;
            content: "";
            background: no-repeat center center;
            background-size: 100% 100%;
            cursor: pointer;
        }

        .sidebar {
            position: relative;
            z-index: 99;
        }

        .sidebar .sidebar-user .category-content {
            padding: 1rem;
            text-align: center;
            color: #fff;
            background: url(https://picsum.photos/260/80?image=652&blur) center center no-repeat;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }

        .sidebar .sidebar-user .category-content:first-child {
            border-bottom-right-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .sidebar .sidebar-user .category-content:last-child {
            border-top-right-radius: 0.25rem;
            border-top-left-radius: 0.25rem;
        }

        .sidebar .sidebar-content {
            position: relative;
            border-radius: 0.25rem;
            margin-bottom: 1.25rem;
        }

        .sidebar .category-title {
            position: relative;
            margin: 0;
            padding: 12px 20px;
            padding-right: 46px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar.sidebar-default .category-title {
            border-bottom-color: #dee2e6;
        }

        .sidebar.sidebar-default .category-title>span {
            display: block;
            text-transform: uppercase;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .sidebar.sidebar-default .category-content .nav li>a {
            color: #333;
        }

        .sidebar.sidebar-default .category-content .nav li>a.active,
        .sidebar.sidebar-default .category-content .nav li>a[aria-expanded="true"],
        .sidebar.sidebar-default .category-content .nav li>a:hover,
        .sidebar.sidebar-default .category-content .nav li>a:focus {
            background-color: #f4f4f4;
        }

        .sidebar .category-content {
            position: relative;
        }

        .sidebar .category-content .nav {
            position: relative;
            margin: 0;
            padding: 0.5rem 0;
        }

        .sidebar .category-content .nav li {
            position: relative;
            list-style: none;
        }

        .sidebar .category-content .nav li>a {
            font-size: 0.875rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            transition: background 0.15s linear, color 0.15s linear;
        }

        .sidebar .category-content .nav li>a[data-toggle="collapse"] {
            padding-right: 2rem;
        }

        .sidebar .category-content .nav li>a[data-toggle="collapse"]:after {
            position: absolute;
            top: 0.5rem;
            right: 1rem;
            height: 1.5rem;
            line-height: 1.5rem;
            display: block;
            content: "\f105";
            font-family: FontAwesome;
            font-size: 1.5rem;
            font-weight: normal;
            transform: rotate(0deg);
            transition: -webkit-transform 0.2s ease-in-out;
        }

        .sidebar .category-content .nav li>a[data-toggle="collapse"][aria-expanded="true"]:after {
            transform: rotate(90deg);
        }

        .sidebar .category-content .nav li>a>i {
            float: left;
            top: 0;
            margin-top: 2px;
            margin-right: 15px;
            transition: opacity 0.2s ease-in-out;
        }

        .sidebar .category-content .nav li ul {
            padding: 0;
        }

        .sidebar .category-content .nav li ul>li a {
            padding-left: 2.75rem;
        }

        .sidebar .category-content .nav>li>a {
            font-weight: 500;
        }

        @media (min-width: 768px) {
            .sidebar {
                padding-top: 2rem !important;
                display: table-cell;
                vertical-align: top;
                width: 10%;
                padding: 0 1.25rem;
            }

            .sidebar.sidebar-fixed {
                position: sticky;
                top: 5.5rem;
            }

            .sidebar.sidebar-default .sidebar-category {
                background-color: #fff;
            }

            .sidebar.sidebar-separate .sidebar-content {
                box-shadow: none;
            }

            .sidebar.sidebar-separate .sidebar-category {
                margin-bottom: 1.25rem;
                border-radius: 0.25rem;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            }

            .content-wrapper {
                display: table-cell;
                width: 90%;
            }
        }
    </style>
</head>

<body>

    <!-- Main sidebar -->
    <div id="sidebar-main" class="sidebar sidebar-default sidebar-separate sidebar-fixed">
        <div class="sidebar-content">
            <div class="sidebar-category sidebar-default">
                <div class="sidebar-user">
                    <div class="category-content">
                        <h6>SayCure</h6>
                        <small>Admin</small>
                    </div>
                </div>
            </div>
            <!-- /Sidebar Category -->
            <div class="sidebar-category sidebar-default">
                <div class="category-title">
                    <span>Orders</span>
                </div>
                <div class="category-content">
                    <ul id="fruits-nav" class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{route('paymentorderdetails')}}" class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Order Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('paymentorderstatus')}} " class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Order Info
                            </a>
                        </li>
                    </ul>
                    <!-- /Nav -->
                </div>
                <!-- /Category Content -->

            </div>

            <div class="sidebar-category sidebar-default">
                <div class="category-title">
                    <span>Refund</span>
                </div>
                <div class="category-content">
                    <ul id="fruits-nav" class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{route('refund')}} " class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Fetch Refund
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('refund-single')}} " class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Refund Details
                            </a>
                        </li>
                    </ul>
                    <!-- /Nav -->
                </div>
                <!-- /Category Content -->
            </div>

            <div class="sidebar-category sidebar-default">
                <div class="category-title">
                    <span>Settlement</span>
                </div>
                <div class="category-content">
                    <ul id="fruits-nav" class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{route('settlement')}} " class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Settlement History
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('settlement-single')}} " class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Settlement Details
                            </a>
                        </li>
                    </ul>
                    <!-- /Nav -->
                </div>
                <!-- /Category Content -->
            </div>


            <div class="sidebar-category sidebar-default">
                <div class="category-title">
                    <span>Transaction</span>
                </div>
                <div class="category-content">
                    <ul id="fruits-nav" class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{route('getpaymentstatus')}} " class="nav-link">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Transaction History
                            </a>
                        </li>

                    </ul>
                    <!-- /Nav -->
                </div>
                <!-- /Category Content -->
            </div>
        </div>
    </div>
    <!-- /main sidebar -->
    <div class="content-wrapper">

        @yield('content')
    </div> <!-- end content-wrapper -->



    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/js/mdb.min.js">
    </script>
    @yield('scripts')
</body>


</html>