<section class="faq-feature-wrapper testimonials-style-one faq-style-one sec-pad" style="background-color: #dddd">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="sec-title">
                    <h3>Frequently Asked Question</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, aperiam consequuntur dolore
                        mollitia laborum officia</p>
                </div>
                <div class="accrodion-grp" data-grp-name="faq-accrodion">
                    @foreach ($faqs as $faq)
                        <div class="accrodion">
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
                    <p>
                        Beberapa review dari klien yang puas dengan layanan kami.
                    </p>
                </div>
                <div class="testimonials-carousel-style-two owl-theme owl-carousel">
                    @foreach ($testimonials as $testimonial)
                        <div class="item">
                            <div class="single-testimonial-style-one">
                                <div class="top-box">
                                    <i class="qoute-icon zxp-icon-right-quote"></i>
                                    <h3>{{ $testimonial->title }}</h3>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
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
</section>
