<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">TECHZENTO SOLUTIONS</a>
    </div>

    <div class="header-right">

        <a href="" class="btn btn-info" title="New Message"><b>{{getEnquery()}} </b><i class="fa fa-envelope-o fa-2x"></i></a> 
        {{-- helper file se getEnquery --}}
        <a href="" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
        <a href="{{route('logout')}}" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

    </div>
</nav>