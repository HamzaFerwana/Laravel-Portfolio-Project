   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.index') }}">
           <div class="sidebar-brand-icon">
               <i class="fas fa-user-tie"></i>
           </div>
           <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item">
           <a class="nav-link" href="{{ route('admin.index') }}">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIntroSkew"
               aria-expanded="true" aria-controls="collapseIntroSkew">
               <i class="fas fa-user"></i>
               <span>Intro Skew</span>
           </a>
           <div id="collapseIntroSkew" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="{{ route('admin.intro-skew') }}">Change Content</a>
               </div>
           </div>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAboutMe"
               aria-expanded="true" aria-controls="collapseAboutMe">
               <i class="fas fa-info-circle"></i>
               <span>About Me</span>
           </a>
           <div id="collapseAboutMe" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="{{ route('admin.about-me') }}">Change Content</a>
                   <a class="collapse-item" href="{{ route('admin.ed-skills') }}">Edit Or Delete Skills</a>
               </div>
           </div>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServices"
               aria-expanded="true" aria-controls="collapseServices">
               <i class="fas fa-tags"></i>
               <span>Services</span>
           </a>
           <div id="collapseServices" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="{{ route('admin.services.index') }}">Show All</a>
                   <a class="collapse-item" href="{{ route('admin.services.create') }}">Add New</a>
                   <a class="collapse-item" href="{{ route('admin.accomplishments') }}">Accomplishments</a>
               </div>
           </div>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWorks"
               aria-expanded="true" aria-controls="collapseWorks">
               <i class="fas fa-briefcase"></i>
               <span>Works</span>
           </a>
           <div id="collapseWorks" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="{{ route('admin.works.index') }}">Show All
                   </a>
                   <a class="collapse-item" href="{{ route('admin.works.create') }}">Add New
                   </a>
               </div>
           </div>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlogs"
               aria-expanded="true" aria-controls="collapseBlogs">
               <i class="fab fa-blogger-b"></i>
               <span>Blogs</span>
           </a>
           <div id="collapseBlogs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="{{ route('admin.blogs.index') }}">Show All
                   </a>
                   <a class="collapse-item" href="{{ route('admin.blogs.create') }}">Add New
                   </a>
               </div>
           </div>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>



   </ul>
   <!-- End of Sidebar -->
