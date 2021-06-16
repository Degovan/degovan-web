<nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="user-avatar lg-avatar mr-4">
                    <img src="{{ asset('assets/img/team/profile-picture-3.jpg') }}"
                        class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                </div>
                <div class="d-block">
                    <h2 class="h6">Hi, {{ auth()->user()->name }}</h2>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="btn btn-secondary text-dark btn-xs"><span
                            class="mr-2"><span class="fas fa-sign-out-alt"></span></span>Sign Out</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" class="fas fa-times" data-toggle="collapse" data-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"></a>
            </div>
        </div>
        <ul class="nav flex-column">

            <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item ">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#user-app">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-user-circle"></span></span>
                        User
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse  {{ (request()->is('admin/user*')) ? 'show' : ''  }}" role="list"
                    id="user-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item  {{ (Request::route()->getName() == 'user.create' ? 'active' : '')  }}"><a
                                class="nav-link" href="{{ route('user.create') }}"><span>Tambah
                                    User</span></a></li>
                        <li class="nav-item  {{ (Request::route()->getName() == 'user.index' ? 'active' : '')}}
                                                {{ (Request::route()->getName() == 'user.show' ? 'active' : '') }}
                                                "><a class="nav-link" href="{{ route('user.index') }}"><span>Data
                                    User</span></a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#member-app">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-users"></span></span>
                        Member
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse  {{ (request()->is('admin/member*')) ? 'show' : ''  }}" role="list"
                    id="member-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item  {{ (Request::route()->getName() == 'member.create' ? 'active' : '')  }}"><a
                                class="nav-link" href="{{ route('member.create') }}"><span>Tambah
                                    Member</span></a></li>
                        <li class="nav-item  {{ (Request::route()->getName() == 'member.index' ? 'active' : '')}}
                                                {{ (Request::route()->getName() == 'member.show' ? 'active' : '') }}
                                                "><a class="nav-link" href="/admin/member"><span>Data
                                    Member</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#artikel-app">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-table"></span></span>
                        Artikel
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse " role="list" id="artikel-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item "><a class="nav-link" href="{{ route('admin.post.index') }}"><span>Data
                                    Artikel</span></a></li>
                        <li class="nav-item "><a class="nav-link"
                                href="{{ route('admin.post.category.index') }}"><span>Data Kategori Artikel</span></a>
                        </li>
                        <li class="nav-item "><a class="nav-link" href="{{ route('admin.post.tag.index') }}"><span>Data
                                    Tag Artikel</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#portfolio-app">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-image"></span></span>
                        Portfolio
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse " role="list" id="portfolio-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item "><a class="nav-link" href="{{ route('portofolios.index') }}"><span>Data
                                    Portfolio</span></a></li>
                        <li class="nav-item "><a class="nav-link"
                                href="{{ route('admin.categories.index') }}"><span>Data Kategori</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#testimonial-app">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-users"></span></span>
                        Testimonial
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse  {{ (request()->is('admin/testimonial*')) ? 'show' : ''  }}" role="list"
                    id="testimonial-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item  {{ (Request::route()->getName() == 'testimonial.create' ? 'active' : '')  }}"><a
                                class="nav-link" href="{{ route('testimonial.create') }}"><span>Tambah
                                    Testimonial</span></a></li>
                        <li class="nav-item  {{ (Request::route()->getName() == 'testimonial.index' ? 'active' : '')}}
                                                {{ (Request::route()->getName() == 'testimonial.show' ? 'active' : '') }}
                                                "><a class="nav-link" href="/admin/testimonial"><span>Data
                                    Testimonial</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ (request()->is('admin/contact')) ? 'active' : '' }}">
                <a href="{{ route('admin.contact.index') }}" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-envelope"></span></span>
                    <span>Kontak</span>
                </a>
            </li>


        </ul>
    </div>
</nav>
