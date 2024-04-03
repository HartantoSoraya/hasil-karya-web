<x-layouts.app title="{{ $project->name }}">
    <section class="inner-banner">
        <div class="container text-center">
            <h3>
                {{ $project->name }}
            </h3>
            <div class="breadcumb">
                <a href="#">Home</a>
                <span class="sep">-</span>
                <span class="page-name">
                    {{ $project->name }}
                </span>
            </div>
        </div>
    </section>

    <section class="project-single-page sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                        <img src="{{ asset($project->thumbnail_url) }}" alt="Awesome Image" class="img-fluid">
                </div><!-- /.col-md-7 -->
                <div class="col-md-7">
                    <div class="single-project-content">
                        <h3>
                            {{ $project->name }}
                        </h3>
                        <p>
                            {{ $project->description }}
                        </p>
                        <ul class="list-items">
                            <li>
                                <i class="fas fa-tag"></i><span>Kategori:</span>
                                @foreach ($project->categories as $category)
                                    <a href="#" class="tag">{{ $category->name }},</a>
                                @endforeach
                            </li>

                            <li>
                                <i class="fas fa-user"></i><span>Client:</span>
                                {{ $project->client }}
                            </li>
                            <li>
                                <i class="fas fa-calendar"></i><span>Tanggal Mulai:</span>
                                {{ $project->start_date->format('d F Y') }}
                            </li>
                            <li>
                                <i class="fas fa-calendar"></i><span>Tanggal Selesai:</span>
                                {{ $project->end_date->format('d F Y') }}
                            </li>
                        </ul><!-- /.list-items -->
                    </div><!-- /.single-project-content -->
                </div><!-- /.col-md-5 -->
            </div><!-- /.row -->
            <div class="single-service-carousel owl-theme owl-carousel" style="margin-top: 30px;">
                @foreach ($project->images as $image)
                    <div class="item">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="Awesome Image"/>
                    </div><!-- /.item -->
                @endforeach
            </div><!-- /.single-service-carousel -->
        </div><!-- /.container -->
    </section><!-- /.project-single-page sec-pad -->
</x-layouts.app>
