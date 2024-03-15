<x-layouts.app title="Home">
    <div id="minimal-bootstrap-carousel" class="carousel slide carousel-fade slider-home-two" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            @foreach ($banners as $banner)
            <div class="item {{ $loop->first ? 'active' : '' }} slide-1" style="background-image: url({{ asset('storage/' . $banner->image) }});background-position: right center;">

                <div class="carousel-caption">
                    <div class="container">
                        <div class="box valign-middle">
                            <div class="content text-left">
                                <h2 data-animation="animated fadeInUp">{{ $banner->title }}</h2>
                                <p data-animation="animated fadeInDown">{{ $banner->subtitle }}</p>
                                <a href="{{ $banner->url }}" class="banner-btn large" data-animation="animated fadeInDown">{{ $banner->text_url }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#minimal-bootstrap-carousel" role="button" data-slide="prev">
            <i class="fas fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#minimal-bootstrap-carousel" role="button" data-slide="next">
            <i class="fas fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>

        <ul class="carousel-indicators list-inline custom-navigation">
            <!-- <li data-target="#minimal-bootstrap-carousel" data-slide-to="0" class="active"></li>
        
            <li data-target="#minimal-bootstrap-carousel" data-slide-to="1"></li>
        
            <li data-target="#minimal-bootstrap-carousel" data-slide-to="2"></li> -->

            @foreach ($banners as $banner)
            <li data-target="#minimal-bootstrap-carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ul>
    </div>

    <section class="about-us-style-one sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-content">
                        <span>Tentang CV. Hasil Karya</span>
                        <h3>Kami membuat rencana <br /> dan menawarkan solusi optimal</h3>
                        <h4>Di sini kami berusaha untuk menghadirkan karya-karya yang menginspirasi dan berkualitas tinggi, demi menciptakan pengalaman yang berkesan bagi setiap pelanggan.</h4>
                        <p>Kami percaya bahwa setiap detail penting dan kami berkomitmen untuk memberikan hasil yang memenuhi standar kualitas tertinggi. Kami memahami bahwa setiap rencana memiliki keunikannya sendiri. Oleh karena itu, kami melakukan penilaian yang teliti untuk menawarkan solusi yang paling sesuai dengan kebutuhan Anda. Kami percaya bahwa detail-detail kecil dapat membuat perbedaan yang besar.</p>
                        <a href="#" class="about-btn">Layanan Kami</a>
                    </div><!-- /.about-content -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 text-right">
                    <img src="img/about-1-1.png" alt="Awesome Image" />
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.about-us-style-one -->

    <section class="cta-style-two">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="cta-style-two-1">
                        <span>Konstruksi</span>
                        <h3>Kami hanya melakukan apa yang kami lakukan dengan baik</h3>
                        <a href="#" class="cta-btn">Lihat Studi Kasus</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cta-style-two-2">
                        <h3>Kualitas Utama</h3>
                        <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lau <br /> dantium, totam rem aperiam, eaque ipsa quae ab.</p>
                        <a href="#" class="cta-btn">Proses Kerja Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service-style-one sec-pad">
        <div class="container">
            <div class="sec-title">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Apa yang Kami Lakukan</h3>
                    </div>
                    <div class="col-md-6">
                        <p>Kami melakukan hanya apa yang kami lakukan dengan baik. Kami memastikan bahwa kualitas selalu menjadi prioritas utama kami dalam setiap langkah yang kami ambil.</p>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="#" class="thm-btn bordered">Layanan Kami</a>
                    </div>
                </div>
            </div>

            <div class="service-carousel-one owl-theme owl-carousel">
                @foreach ($services as $service)
                <div class="item">
                    <div class="single-service-style-one">
                        <div class="img-box">
                            <img src="{{ asset($service->thumbnail_url) }}" alt="Awesome Image" style="height: 150px; object-fit: cover" />
                            <a href="#" class="read-more fas fa-link"></a>
                        </div>
                        <div class="content-box">
                            <div class="icon-box">
                                <i class="zxp-icon-insurance"></i>
                            </div>
                            <div class="text-box">
                                <a href="#">
                                    <h3>{{ $service->name }}</h3>
                                </a>
                                <p>{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="project-style-two sec-pad">
        <div class="container">
            <div class="sec-title text-center">
                <h3>Proyek</h3>
                <p>Kami melakukan hanya apa yang kami lakukan dengan baik. Kami memastikan bahwa kualitas selalu menjadi prioritas utama kami dalam setiap langkah yang kami ambil.</p>
            </div>
            <div class="gallery-filter">
                <ul class="post-filter masonary text-center">
                    <li class="filter active" data-filter=".masonary-item"><span>All</span></li>
                    @foreach ($projectCategories as $categories)
                    <li class="filter" data-filter=".{{ $categories->slug }}"><span>{{ $categories->name }}</span></li>
                    @endforeach
                </ul>
            </div>
            <div class="row masonary-layout filter-layout" data-filter-class="filter">
                @foreach ($projects as $project)
                @if ($project->categories->isNotEmpty())
                <div class="col-md-3 col-sm-6 col-xs-12 masonary-item single-filter-item {{ $project->categories->pluck('slug')->implode(' ') }}">
                    @else
                    <div class="col-md-3 col-sm-6 col-xs-12 masonary-item single-filter-item">
                        @endif
                        <div class="single-project-style-two">
                            <div class="img-box">
                                <img src="{{ $project->thumbnail_url }}" alt="Awesome Image" style="height: 296px; width: 245px;" />
                                <div class="overlay">
                                    <div class="box">
                                        <div class="content">
                                            <a class="more-btn fas fa-link"></a>
                                            <h3>{{ $project->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="more-btn-box text-center">
                    <a href="projects.html" class="thm-btn">Seluruh Proyek</a>
                </div>
            </div>
    </section>

    <section class="faq-feature-wrapper testimonials-style-one faq-style-one sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sec-title">
                        <h3>Frequently Asked Question</h3>
                        <p>Kami memahami bahwa Anda mungkin memiliki beberapa pertanyaan terkait layanan kami. Berikut adalah beberapa pertanyaan yang sering diajukan oleh pelanggan kami beserta jawabannya. Jika Anda memiliki pertanyaan lain, jangan ragu untuk menghubungi kami.</p>
                    </div>
                    <div class="accrodion-grp" data-grp-name="faq-accrodion">
                        @foreach ($faqs as $faq)
                        <div class="accrodion {{ $loop->first ? 'active' : '' }}">
                            <div class="accrodion-title">
                                <h4>{{ $faq->question }}</h4>
                            </div>
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sec-title">
                        <h3>Clients’ Review</h3>
                        <p>Kami bangga dapat berbagi ulasan dari beberapa klien kami yang telah menggunakan layanan kami. Pendapat mereka sangat berarti bagi kami dan menjadi inspirasi untuk terus meningkatkan kualitas layanan kami.</p>
                    </div>
                    <div class="testimonials-carousel-style-two owl-theme owl-carousel">
                        @foreach ($testimonials as $testimonial)
                        <div class="item">
                            <div class="single-testimonial-style-one">
                                <div class="top-box">
                                    <i class="qoute-icon zxp-icon-right-quote"></i>
                                    <div class="icon-box">
                                        <img src="{{ $testimonial->thumbnail_url }}" alt="Awesome Image" />
                                    </div>
                                    <div class="text-box">
                                        <h3>{{ $testimonial->title }}</h3>
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-box">
                                    <p>{{ $testimonial->subtitle }}</p>
                                    <h4>- {{ $testimonial->name }}</h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="brand-carousel-wrapper">
        <div class="container">
            <div class="brand-carousel owl-carousel owl-theme">
                <div class="item">
                    <i class="brands-icon-audiojungle"></i>
                </div>
                <div class="item">
                    <i class="brands-icon-codecanyon"></i>
                </div>
                <div class="item">
                    <i class="brands-icon-envato"></i>
                </div>
                <div class="item">
                    <i class="brands-icon-graphicriver"></i>
                </div>
                <div class="item">
                    <i class="brands-icon-photodune"></i>
                </div>
                <div class="item">
                    <i class="brands-icon-themeforest"></i>
                </div>
                <div class="item">
                    <i class="brands-icon-videohive"></i>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-style-two sec-pad">
        <div class="container">
            <div class="sec-title">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Berita Terbaru</h3>
                    </div>
                    <div class="col-md-6">
                        <p>Dapatkan pembaruan terbaru seputar industri kontraktor, teknologi konstruksi, manajemen proyek, dan banyak lagi. Kami memberikan wawasan terbaru untuk membantu Anda tetap terhubung dengan tren dan inovasi terkini di dunia konstruksi.</p>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="#" class="thm-btn">Berita Lainnya</a>
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.sec-title -->
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-blog-style-two">
                        <div class="img-box">
                            <img src="{{ $blog->thumbnail_url }}" alt="Awesome Image" />
                            <a href="{{ $blog->slug }}" class="read-more">Read Post</a>
                        </div>
                        <div class="text-box">
                            <div class="meta-info">
                                <a href="#"><i class="fas fa-clock"></i> {{ $blog->created_at->format('M d') }}</a>
                            </div>
                            <a href="{{ $blog->slug }}">
                                <h3>{{ $blog->title }}</h3>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section
</x-layouts.app>