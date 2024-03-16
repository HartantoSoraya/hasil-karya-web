<section class="faq-feature-wrapper testimonials-style-one faq-style-one sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="sec-title">
                    <h3>Frequemtly Asked Question</h3>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, aperiam consequuntur dolore
                        mollitia laborum officia</p>
                </div>
                <div class="testimonials-carousel-style-two owl-theme owl-carousel">
                    <div class="item">
                        <div class="single-testimonial-style-one">
                            <div class="top-box">
                                <i class="qoute-icon zxp-icon-right-quote"></i>

                                <h3>Outstanding Quality</h3>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div><!-- /.stars -->
                            </div><!-- /.top-box -->
                            <div class="content-box">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, <br /> con sectetur,
                                    adipisci velit, sed quia non num quam eius modi tem <br /> pora incid unt ut labore
                                    et dolore magnam.</p>
                                <h4>- Ida Leopard, Google</h4>
                            </div><!-- /.content-box -->
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-testimonial-style-one">
                            <div class="top-box">
                                <i class="qoute-icon zxp-icon-right-quote"></i>
                                <h3>Outstanding Quality</h3>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div><!-- /.stars -->
                            </div><!-- /.top-box -->
                            <div class="content-box">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, <br /> con sectetur,
                                    adipisci velit, sed quia non num quam eius modi tem <br /> pora incid unt ut labore
                                    et dolore magnam.</p>
                                <h4>- Ida Leopard, Google</h4>
                            </div><!-- /.content-box -->
                        </div>
                    </div>
                </div><!-- /.testimonials-carousel-style-one -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>>
