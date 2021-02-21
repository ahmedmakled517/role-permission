<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

         <ul class="sidebar-menu" data-widget="tree">
         @if (auth()->user()->hasPermission('group-users'))
            <li><a href="{{route('dashboard.groups.index')}}"><i class="fa fa-th"></i><span>groups</span></a></li>
         @endif
         @if (auth()->user()->hasPermission('user-users'))

            <li><a href="{{route('dashboard.users.index')}}"><i class="fa fa-th"></i><span>users</span></a></li>
         @endif
         @if (auth()->user()->hasPermission('powers-users'))
          
            <li><a href="{{route('dashboard.powers.index')}}"><i class="fa fa-th"></i><span>powers</span></a></li>
         @endif
         @if (auth()->user()->hasPermission('first-users'))
          
            <li><a href="{{route('dashboard.first')}}"><i class="fa fa-th"></i><span>first</span></a></li>
         @endif
      
          
       
       
        </ul> 
    </section>

</aside>

