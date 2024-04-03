<x-layouts.app title="Proyek Kami">
    <section class="inner-banner">
        <div class="container text-center">
            <h3>Proyek Kami</h3>
            <div class="breadcumb">
                <a href="#">Home</a>
                <span class="sep">-</span>
                <span class="page-name">Proyek Kami</span>
            </div>
        </div>
    </section>

    <section class="project-style-two sec-pad">
        <div class="container">
            <div class="gallery-filter">
                <ul class="post-filter masonary text-center">
                    <li class="filter active" data-filter=".masonary-item"><span>All</span></li>
                    @foreach ($projectCategories as $category)
                        <li class="filter" data-filter=".{{ $category->slug }}"><span>{{ $category->name }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="row masonary-layout filter-layout" data-filter-class="filter">
                @foreach ($projects as $project)
                    <div class="col-md-3 col-sm-6 col-xs-12 masonary-item single-filter-item {{ $project->categories->pluck('slug')->implode(' ') }}">
                        <div class="single-project-style-two">
                            <div class="img-box">
                                <img src="{{ asset($project->thumbnail_url) }}" alt="Awesome Image"/>
                                <div class="overlay">
                                    <div class="box">
                                        <div class="content">
                                            <a href="{{ route('app.project', $project->slug) }}" class="more-btn fas fa-link"></a>
                                            <h3>{{ $project->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


</x-layouts.app>
