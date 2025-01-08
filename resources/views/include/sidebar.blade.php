<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('index') }}">
                        <i class="fi-air-play"></i>
                        <span>
                            Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fa fa-home"></i> <span> Product Management </span> <span
                            class="menu-arrow"></span></a>
                    <ul class="nav-second-level " aria-expanded="false">
                            <li><a href="{{ route('category.index') }}">Category List</a></li>
                            <li><a href="{{ route('product.index') }}">Product List</a></li>
                            <li><a href="{{ route('cart.index') }}">Cart List</a></li>

                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
