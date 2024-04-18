<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget about-widget">
                        <a href="index.html">
                            <img src="{{ asset('app/fonts/logo-hk.png') }}" alt="Awesome Image" width="200">
                        </a>
                        <p>
                            Hasil Karya is a construction company that has been in the industry for over 20 years. We have a team of professionals who are experts in their field. We provide the best service for our customers.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget links-widget">
                        <div class="title">
                            <h3>Quick Links</h3>
                        </div>
                        <ul class="links-list">
                            <li><a href="{{ route('app.landing') }}"><i class="fas fa-angle-right"></i>Home</a></li>
                            <li><a href="{{ route('app.services') }}"><i class="fas fa-angle-right"></i>Layanan</a></li>
                            <li><a href="{{ route('app.projects') }}"><i class="fas fa-angle-right"></i>Proyek Kami</a></li>
                            <li><a href="{{ route('app.galleries') }}"><i class="fas fa-angle-right"></i>Galeri Kami</a></li>
                            <li><a href="{{ route('app.blogs') }}"><i class="fas fa-angle-right"></i>Blog</a></li>
                            <li><a href="{{ route('app.about') }}"><i class="fas fa-angle-right"></i>Tentang Kami</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget recent-post-widget">
                        <div class="title">
                            <h3>Berita Terbaru</h3>
                        </div>
                        @foreach (\App\Models\Blog::latest()->take(3)->get() as $blog)
                            <div class="single-recent-post">
                                <div class="img-box">
                                    <img src="{{ asset($blog->thumbnail_url) }}" alt="Awesome Image" width="100" max-height="100"/>
                                </div>
                                <div class="text-box">
                                    <a href="{{ route('app.blog', $blog->slug) }}"><h4>{{ $blog->title }}</h4></a>
                                    <p>{{ $blog->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="footer-bottom">
    <div class="container">
        <div class="copy-text pull-left">
            <p>
                &copy; {{ date('Y') }} Hasil Karya. All Rights Reserved.
            </p>
        </div>
    </div>
</div>
