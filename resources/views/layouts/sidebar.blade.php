<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- User menu -->
                
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="active"><a href="#"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li class="active"><a href="#"><i class="icon-coins"></i> <span>Payment</span></a></li>
                    <li class="active"><a href="#"><i class="icon-cog5"></i> <span>Settings</span></a></li>
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i>Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                            style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                   

                    

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>