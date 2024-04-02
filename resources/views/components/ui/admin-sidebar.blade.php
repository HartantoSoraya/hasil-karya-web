<nav class="sidebar">
    <div class="sidebar-header">
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
            <li class="nav-item {{ request()->is('admin/contact') ? ' active' : '' }}">
                <a href="{{ route('admin.contact.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="phone"></i>
                    <span class="link-title">Contact</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/banner') ? ' active' : '' }}">
                <a href="{{ route('admin.banner.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Banner</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/frequently-asked-question') ? ' active' : '' }}">
                <a href="{{ route('admin.frequently-asked-question.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="help-circle"></i>
                    <span class="link-title">Frequently Asked Question</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/service') ? ' active' : '' }}">
                <a href="{{ route('admin.service.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="server"></i>
                    <span class="link-title">Layanan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/testimonial') ? ' active' : '' }}">
                <a href="{{ route('admin.testimonial.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="check-square"></i>
                    <span class="link-title">Testimonial</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/project-category', 'admin/project') ? ' active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#project-management" role="button" aria-expanded="{{ request()->is('admin/project-category', 'admin/project') ? 'true' : 'false' }}" aria-controls="project-management">
                    <i class="link-icon" data-feather="package"></i>
                    <span class="link-title">Manajemen Project</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('admin/project-category', 'admin/project') ? ' show' : '' }}" id="project-management">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.project-category.index') }}" class="nav-link {{ request()->is('admin/project-category') ? ' active' : '' }}">
                                Kategori Project
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.project.index') }}" class="nav-link {{ request()->is('admin/project') ? ' active' : '' }}">
                                Project
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ request()->is('admin/blog-category*', 'admin/blog', 'admin/blog-tag*') ? ' active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#news-management" role="button" aria-expanded="{{ request()->is('admin/blog-category*', 'admin/blog', 'admin/blog-tag*') ? 'true' : 'false' }}" aria-controls="news-management">
                    <i class="link-icon" data-feather="book-open"></i>
                    <span class="link-title">Manajemen Berita</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('admin/blog-category*', 'admin/blog', 'admin/blog-tag*') ? ' show' : '' }}" id="news-management">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.blog-category.index') }}" class="nav-link {{ request()->is('admin/blog-category*') ? ' active' : '' }}">
                                Kategori Blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blog-tag.index') }}" class="nav-link {{ request()->is('admin/blog-tag') ? ' active' : '' }}">
                                Tag Blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.index') }}" class="nav-link {{ request()->is('admin/blog') ? ' active' : '' }}">
                                Blog
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ request()->is('admin/client') ? ' active' : '' }}">
                <a href="{{ route('admin.client.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Client</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('admin/customer-service') ? ' active' : '' }}">
                <a href="{{ route('admin.customer-service.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="headphones"></i>
                    <span class="link-title">Customer Service</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
