<section class="project-style-two sec-pad">
    <div class="container">
        <div class="sec-title text-center">
            <h3>Featured Projects</h3>
            <p>Ad minim veniam, quis nostrudexe rc itation ullamco laboris nisi ut aliquip ex ea com modo consequat.</p>
        </div>

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

        <div class="more-btn-box text-center">
            <a href="{{ route('app.projects') }}" class="thm-btn text-white">
                View All Projects
            </a>
        </div>
    </div>
</section>
