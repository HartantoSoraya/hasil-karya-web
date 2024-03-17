<nav class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('') }}" class="sidebar-brand" width="40">
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item {{ request()->is('admin/dashboard') ? ' active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Kategori</li>
            <li class="nav-item {{ request()->is('admin/blog-category') ? ' active' : '' }}">
                <a href="{{ route('admin.blog-category.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Blog Category</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/blog-tag') ? ' active' : '' }}">
                <a href="{{ route('admin.blog-tag.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Blog Tag</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/project-category') ? ' active' : '' }}">
                <a href="{{ route('admin.project-category.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Project Category</span>
                </a>
            </li>
            <li class="nav-item nav-category">Konten</li>
            <li class="nav-item {{ request()->is('admin/contact') ? ' active' : '' }}">
                <a href="{{ route('admin.contact.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Contact</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/banner') ? ' active' : '' }}">
                <a href="{{ route('admin.banner.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Banner</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/frequently-asked-question') ? ' active' : '' }}">
                <a href="{{ route('admin.frequently-asked-question.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Frequently Asked Question</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/blog') ? ' active' : '' }}">
                <a href="{{ route('admin.blog.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Blog</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/service') ? ' active' : '' }}">
                <a href="{{ route('admin.service.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Service</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/testimonial') ? ' active' : '' }}">
                <a href="{{ route('admin.testimonial.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Testimonial</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/project') ? ' active' : '' }}">
                <a href="{{ route('admin.project.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Project</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/client') ? ' active' : '' }}">
                <a href="{{ route('admin.client.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Client</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/web-configuration') ? ' active' : '' }}">
                <a href="{{ route('admin.web-configuration.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Web Configuration</span>
                </a>
            </li>
        </ul>
    </div>
</nav>