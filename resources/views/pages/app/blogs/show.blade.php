<x-layouts.app title="{{ $blog->title }}">
    <section class="inner-banner">
        <div class="container text-center">
            <h3>
                {{ $blog->title }}
            </h3>
            <div class="breadcumb">
                <a href="#">Home</a><!--
                --><span class="sep">-</span><!--
                --><span class="page-name">
                    {{ $blog->title }}
                </span>
            </div><!-- /.breadcumb -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->

    <section class="blog-page sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-blog-page-content">
                        <img src="{{ asset($blog->thumbnail_url) }}" alt="Awesome Image" class="img-blog" />
                        <h3>
                            {{ $blog->title }}
                        </h3>
                        <div class="meta-info">
                            <a href="#"><i class="far fa-calendar"></i>
                                {{ $blog->created_at->format('M d') }}
                            </a>
                        </div><!-- /.meta-info -->
                        <p>
                            {{ $blog->content }}
                        </p>
                        <br />

                        <div class="share-tag-box clearfix">


                            @if ($blog->tags->count() > 0)
                                <div class="tags-box pull-right">
                                    @foreach ($blog->tags as $tag)
                                        <a href="{{ route('app.blog.tag', $tag->slug) }}">
                                            {{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div><!-- /.tags-box -->
                            @endif
                        </div><!-- /.share-tag-box -->

                    </div><!-- /.single-blog-page-content -->
                </div><!-- /.col-md-8 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog-page sec-pad -->
</x-layouts.app>
