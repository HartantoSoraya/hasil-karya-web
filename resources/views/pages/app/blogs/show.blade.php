<x-layouts.app title="{{ $blog->title }}" thumbnail="{{ asset($blog->thumbnail_url) }}" description="{{ $blog->excerpt }}">
    <section class="inner-banner" style="background: url({{ $blog->thumbnail_url }}); background-size: cover; background-position: center center;">
        <div class="overlay"></div>
        <div class="container text-center">
            <h3>
                {{ $blog->title }}
            </h3>
            <div class="breadcumb">
                <a href="#">Home</a><span class="sep">-</span><span class="page-name">
                    {{ $blog->title }}
                </span>
            </div><
        </div>
    </section>
    <section class="blog-page sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-blog-page-content">
                        <h3>
                            {{ $blog->title }}
                        </h3>
                        <div class="meta-info">
                            <a href="#"><i class="far fa-calendar"></i>
                                {{ $blog->created_at->format('M d') }}
                            </a>
                        </div>
                        <p>
                            {!! $blog->content !!}
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
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    @push('styles')
        <style>
            .inner-banner {
                background: url({{ $blog->thumbnail_url }});
                background-size: cover;
                background-position: center center;
                position: relative;
            }

            .overlay {
                background: rgba(0, 0, 0, 0.5);
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .inner-banner .container {
                position: relative;
                z-index: 1;
            }
        </style>
    @endpush
</x-layouts.app>
