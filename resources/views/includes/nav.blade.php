<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="{{ asset('assets/img/jp.jpg') }}" class="img-thumbnail" />

                    <div class="inner-text">
                        {{ auth()->user()->name }}
                        {{ auth()->user()->email }}
                        <br />
                        <small>Last Login : 2 Weeks Ago </small>

                    </div>
                </div>

            </li>

            
            <li>
                <a class="active-menu" href="{{ route('dashboard') }}"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>


            @can('user_index')
                <li>
                    <a href="#"><i class="fa fa-user "></i> Manage User<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            @can('user_create')
                                <a href="{{ route('user.create') }}"><i class="fa fa-user"></i>Add User</a>
                            @endcan

                        </li>
                        <li>
                            <a href="{{ route('user.index') }}"><i class="fa fa-users "></i>User List</a>
                        </li>


                    </ul>
                </li>
            @endcan

            @can('slider_index')
                <li>
                    <a href="#"><i class="fa fa-desktop "></i> Manage Slider<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            @can('slider_create')
                                <a href="{{ route('slider.create') }}"><i class="fa fa-sliders"></i>Add Slider</a>
                            @endcan
                        </li>
                        <li>

                            <a href="{{ route('slider.index') }}"><i class="fa fa-sliders"></i>Slider List</a>
                        </li>


                    </ul>
                </li>
            @endcan
            @can('page_index')
                <li>
                    <a href="#"><i class="fa fa-desktop "></i> Manage Page<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            @can('page_create')
                                <a href="{{ route('page.create') }}"><i class="fa fa-sliders"></i>Add Page</a>
                            @endcan
                        </li>
                        <li>
                            <a href="{{ route('page.index') }}"><i class="fa fa-sliders"></i>page List</a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('blog_index')
                <li>
                    <a href="#"><i class="fa fa-desktop "></i> Manage Blog<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            @can('blog_create')
                                <a href="{{ route('blog.create') }}"><i class="fa fa-sliders"></i>Add Blog</a>
                            @endcan
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}"><i class="fa fa-sliders"></i>Blog List</a>
                        </li>


                    </ul>
                </li>
            @endcan
            @can('permission')
                <li>
                    <a href="#"><i class="fa fa-bicycle "></i> Manage Permission<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>

                            <a href="{{ route('permission.create') }}"><i class="fa fa-toggle-on"></i>Add Permission</a>

                        </li>
                        <li>
                            <a href="{{ route('permission.index') }}"><i class="fa fa-toggle-on"></i>Permission List</a>
                        </li>


                    </ul>
                </li>
            @endcan

            @can('role')
                <li>
                    <a href="#"><i class="fa fa-bicycle"></i> Manage Role<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>

                            <a href="{{ route('role.create') }}"><i class="fa fa-toggle-on"></i>Add Role</a>

                        </li>
                        <li>
                            <a href="{{ route('role.index') }}"><i class="fa fa-toggle-on"></i>Role List</a>
                        </li>


                    </ul>
                </li>
            @endcan

            @can('enquiry')
                <li>
                    <a href="{{ route('enquery') }}"><i class="fa fa-bell "></i>Enquiry </a>
                </li>
            @endcan

        </ul>

    </div>

</nav>
