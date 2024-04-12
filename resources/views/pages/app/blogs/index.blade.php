<x-layouts.app title="Blog">
    <section class="inner-banner">
        <div class="container text-center">
            <h3>Blog </h3>
            <div class="breadcumb">
                <a href="#">Home</a><!--
                --><span class="sep">-</span><!--
                --><span class="page-name">Blog </span>
            </div><!-- /.breadcumb -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->

    <section class="blog-page blog-style-one sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-md-6">
                                <div class="single-blog-style-one" style="min-height: 600px !important;">
                                    <div class="img-box">
                                        <img src="{{ asset($blog->thumbnail_url) }}" alt="Awesome Image"/>
                                        <a href="{{ route('app.blog', $blog->slug) }}" class="read-more">Baca Berita</a>
                                    </div><!-- /.img-box -->
                                    <div class="text-box">
                                        <a href="{{ route('app.blog', $blog->slug) }}"><h3>{{ $blog->title }}</h3></a>
                                        <p>{{ $blog->excerpt }}</p>
                                        <div class="meta-info">
                                            <a href="{{ route('app.blog', $blog->slug) }}"><i class="far fa-calendar"></i> {{ $blog->created_at->format('M d') }}</a>
                                            <a href="#"><i class="far fa-user"></i> Admin</a>
                                        </div><!-- /.meta-info -->
                                    </div><!-- /.text-box -->
                                </div><!-- /.single-blog-style-one -->
                            </div><!-- /.col-md-6 -->
                        @endforeach
                    </div>
                    {{ $blogs->links() }}

                </div><!-- /.col-md-8 -->
                <div class="col-md-4">
                    <div class="sidebar sidebar-right">

                        <div class="single-sidebar category-widget">
                            <div class="title">
                                <h3>Categories</h3>
                            </div><!-- /.title -->
                            <ul class="category-lists">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('app.blog.category', $category->slug) }}"><i class="fa fa-angle-right"></i> {{ $category->name }} <span class="count">({{ $category->blogs_count }})</span></a></li>
                                @endforeach
                            </ul><!-- /.category-lists -->
                        </div><!-- /.single-sidebar -->

                        <div class="single-sidebar tags-widget">
                            <div class="title">
                                <h3>Tag</h3>
                            </div><!-- /.title -->
                            <ul class="tag-lists">
                                @foreach ($tags as $tag)
                                    <li><a href="{{ route('app.blog.tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul><!-- /.tag-lists -->
                        </div><!-- /.single-sidebar -->

                    </div><!-- /.sidebar sidebar-right -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog-page sec-pad -->
</x-layouts.app>
