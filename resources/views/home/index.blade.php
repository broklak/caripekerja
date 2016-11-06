@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <!--POPULAR JOB CATEGORIES START-->

    <section class="popular-categories">

        <div class="container">

            <div class="clearfix">

                <h2>Popular Jobs Categories</h2>

                <a href="#" class="btn-style-1">Explore All Jobs</a> </div>

            <div class="row">

                <div class="col-md-3 col-sm-6">

                    <div class="box"> <img src="{{ asset("images") }}/categories-icon-1.png" alt="img">

                        <h4><a href="#">Art, Design &amp; Multimedia</a></h4>

                        <strong>6,213 Jobs</strong>

                        <p>Available in Design &amp; Multimedia</p>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="box"> <img src="{{ asset("images") }}/categories-icon-2.png" alt="img">

                        <h4><a href="#">Restaurant, Food, Hotels</a></h4>

                        <strong>3,750 Jobs</strong>

                        <p>Available in Restaurant &amp; Hotels</p>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="box"> <img src="{{ asset("images") }}/categories-icon-3.png" alt="img">

                        <h4><a href="#">Transporation</a></h4>

                        <strong>1,265 Jobs</strong>

                        <p>Available in Transportation</p>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="box"> <img src="{{ asset("images") }}/categories-icon-4.png" alt="img">

                        <h4><a href="#">Healthcare &amp; Medicine</a></h4>

                        <strong>5,913 Jobs</strong>

                        <p>Available in Medical</p>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="box"> <img src="{{ asset("images") }}/categories-icon-5.png" alt="img">

                        <h4><a href="#">Software &amp; Development</a></h4>

                        <strong>7,418 Jobs</strong>

                        <p>Available in IT</p>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="box"> <img src="{{ asset("images") }}/categories-icon-6.png" alt="img">

                        <h4><a href="#">Accounting &amp; Finance</a></h4>

                        <strong>8,045 Jobs</strong>

                        <p>Available in Accounts &amp; Finance</p>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="box"> <img src="{{ asset("images") }}/categories-icon-7.png" alt="img">

                        <h4><a href="#">Education &amp; Academia</a></h4>

                        <strong>3,891 Jobs</strong>

                        <p>Available in Education</p>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="box"> <img src="{{ asset("images") }}/categories-icon-8.png" alt="img">

                        <h4><a href="#">Construction, Engineering</a></h4>

                        <strong>9,942 Jobs</strong>

                        <p>Available in Architect</p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--POPULAR JOB CATEGORIES END-->



    <!--RECENT JOB SECTION START-->

    <section class="recent-row padd-tb">

        <div class="container">

            <div class="row">

                <div class="col-md-9 col-sm-8">

                    <div id="content-area">

                        <h2>Recent Hot Jobs</h2>

                        <ul id="myList">

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-1.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Marketing Graphic Design / 2D Artist</a></h4>

                                        <p>Design Communication Studio</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Moorgate, London</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$4000 - $5000</strong> <a href="#" class="btn-1 btn-color-1 ripple">Part Time</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-2.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Public Relation Executive Manager</a></h4>

                                        <p>Life Insurance LLC</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$7000 - $7500</strong> <a href="#" class="btn-1 btn-color-2 ripple">Full Time</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-3.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Instructor Classroom Head</a></h4>

                                        <p>School of Design and Multimedia</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$30/hr - $40/hr</strong> <a href="#" class="btn-1 btn-color-3 ripple">Freelance</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-4.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Technical Database Engineer</a></h4>

                                        <p>Datebase Management Company</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$2200 - $3000</strong> <a href="#" class="btn-1 btn-color-4 ripple">Contract</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-5.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Marketing Graphic Design / 2D Artist</a></h4>

                                        <p>Design Communication Studio</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$4000 - $5000</strong> <a href="#" class="btn-1 btn-color-1 ripple">Part Time</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-2.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Public Relation Executive Manager</a></h4>

                                        <p>Life Insurance LLC</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$7000 - $7500</strong> <a href="#" class="btn-1 btn-color-2 ripple">Full Time</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-3.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Instructor Classroom Head</a></h4>

                                        <p>School of Design and Multimedia</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$30/hr - $40/hr</strong> <a href="#" class="btn-1 btn-color-3 ripple">Freelance</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-4.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Technical Database Engineer</a></h4>

                                        <p>Datebase Management Company</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$2200 - $3000</strong> <a href="#" class="btn-1 btn-color-4 ripple">Contract</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-2.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Public Relation Executive Manager</a></h4>

                                        <p>Life Insurance LLC</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$7000 - $7500</strong> <a href="#" class="btn-1 btn-color-2 ripple">Full Time</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-3.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Instructor Classroom Head</a></h4>

                                        <p>School of Design and Multimedia</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$30/hr - $40/hr</strong> <a href="#" class="btn-1 btn-color-3 ripple">Freelance</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-4.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Technical Database Engineer</a></h4>

                                        <p>Datebase Management Company</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$2200 - $3000</strong> <a href="#" class="btn-1 btn-color-4 ripple">Contract</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-1.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Marketing Graphic Design / 2D Artist</a></h4>

                                        <p>Design Communication Studio</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Moorgate, London</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$4000 - $5000</strong> <a href="#" class="btn-1 btn-color-1 ripple">Part Time</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-2.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Public Relation Executive Manager</a></h4>

                                        <p>Life Insurance LLC</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$7000 - $7500</strong> <a href="#" class="btn-1 btn-color-2 ripple">Full Time</a> </div>

                            </li>

                            <li>

                                <div class="box">

                                    <div class="thumb"><a href="#"><img src="{{ asset("images") }}/recent-job-thumb-3.jpg" alt="img"></a></div>

                                    <div class="text-col">

                                        <h4><a href="#">Instructor Classroom Head</a></h4>

                                        <p>School of Design and Multimedia</p>

                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>Nationwide</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                    <strong class="price"><i class="fa fa-money"></i>$30/hr - $40/hr</strong> <a href="#" class="btn-1 btn-color-3 ripple">Freelance</a> </div>

                            </li>

                        </ul>

                        <div id="loadMore"> <a href="#" class="load-more"><i class="fa fa-user"></i>Load More Jobs</a></div>

                    </div>

                </div>

                <div class="col-md-3 col-sm-4">

                    <h2>Featured Jobs</h2>

                    <aside>

                        <div class="sidebar">

                            <div class="box">

                                <div class="thumb"> <a href="#"><img src="{{ asset("images") }}/features-img-1.jpg" alt="img"></a>

                                    <div class="caption"><img src="{{ asset("images") }}/envato-text.png" alt="envato"></div>

                                </div>

                                <div class="text-box"> <a href="#" class="btn-time">Part Time</a>

                                    <h4><a href="#">UI/UX Visual Designers</a></h4>

                                    <a href="#" class="text"><i class="fa fa-map-marker"></i>Moorgate, London</a> <a href="#" class="text"><i class="fa fa-calendar"></i>Dec 22, 2015 - Mar 17, 2016 </a> <strong class="price"><i class="fa fa-money"></i>$4000 - $5000</strong> <a href="#" class="btn-apply">Apply for this Job</a> </div>

                            </div>

                        </div>

                    </aside>

                </div>

            </div>

        </div>

    </section>

    <!--RECENT JOB SECTION END-->



    <!--CALL TO ACTION SECTION START-->

    <section class="call-action-section">

        <div class="container">

            <div class="text-box">

                <h2>Better Results with Standardized Hiring Process</h2>

                <p>Your quality of hire increases when you treat everyone fairly and equally. Having multiple recruiters

                    working on your hiring is beneficial.</p>

            </div>

            <a href="#" class="btn-get">Get Registered &amp; Try Now</a> </div>

    </section>

    <!--CALL TO ACTION SECTION END-->



    <!--PRICE TABLE STYLE 1 START-->

    <section class="price-table">

        <div class="container">

            <h2>Job Plans &amp; Pricing</h2>

            <div class="box">

                <h4>Free Package</h4>

                <strong class="amount"><span>$</span>29.00<sub>/mo</sub></strong>

                <ul>

                    <li>Jobs are posted for 30 days</li>

                    <li>One Time Fee</li>

                    <li>This Plan Includes 1 Job</li>

                    <li>Non-Highlighted Post</li>

                    <li>Posted For 30 Days</li>

                </ul>

                <a href="#" class="btn-choose btn-color-2">Choose Plan</a> </div>

            <div class="box box-colo-2">

                <div class="head">Most Popular</div>

                <h4>Starter Package</h4>

                <strong class="amount"><span>$</span>59.00<sub>/mo</sub></strong>

                <ul>

                    <li>Unlimited number of jobs</li>

                    <li>Jobs are posted for 90 days</li>

                    <li>One Time Fee</li>

                    <li>This Plan Includes 50 Jobs</li>

                    <li>Highlighted Job Post</li>

                    <li>Posted For 60 Days</li>

                </ul>

                <a href="#" class="btn-choose btn-color-2">Choose Plan</a> </div>

            <div class="box box-colo-3">

                <h4>Enterprise</h4>

                <strong class="amount"><span>$</span>79.00<sub>/mo</sub></strong>

                <ul>

                    <li>Jobs are posted for 150 day</li>

                    <li>One Time Fee</li>

                    <li>This Plan Includes Unlimited Jobs</li>

                    <li>Featured or Highlighted Post</li>

                    <li>Posted For 120 Days</li>

                </ul>

                <a href="#" class="btn-choose btn-color-2">Choose Plan</a> </div>

        </div>

    </section>

    <!--PRICE TABLE STYLE 1 END-->



    <!--PRICE TABLE STYLE 1 START-->

    <section class="price-table price-table-2">

        <div class="container">

            <h2>Resume Plans &amp; Pricing</h2>

            <div class="box">

                <h4>Free Package</h4>

                <strong class="amount"><span>$</span>29.00<sub>/mo</sub></strong>

                <ul>

                    <li>One Time Fee</li>

                    <li>Allows 1 Resume Posting</li>

                    <li>Non-Highlighted Post</li>

                    <li>Visible To All Employers</li>

                </ul>

                <a href="#" class="btn-choose btn-color-2">Choose Plan</a> </div>

            <div class="box box-colo-2">

                <div class="head">Most Popular</div>

                <h4>Starter Package</h4>

                <strong class="amount"><span>$</span>59.00<sub>/mo</sub></strong>

                <ul>

                    <li>One Time Fee</li>

                    <li>Posted For One Year</li>

                    <li>Allows 1 Resume Posting</li>

                    <li>Featured Highlighted Resume</li>

                    <li>Visible To All Employers</li>

                </ul>

                <a href="#" class="btn-choose btn-color-2">Choose Plan</a> </div>

            <div class="box box-colo-3">

                <h4>Enterprise</h4>

                <strong class="amount"><span>$</span>79.00<sub>/mo</sub></strong>

                <ul>

                    <li>One Time Fee</li>

                    <li>Shown For 190 Days</li>

                    <li>Allows 1 Resume Posting</li>

                    <li>Featured Highlighted Resume</li>

                </ul>

                <a href="#" class="btn-choose btn-color-2">Choose Plan</a> </div>

        </div>

    </section>

    <!--PRICE TABLE STYLE 1 END-->



    <!--TESTIOMONIALS SECTION START-->

    <section class="testimonials-section">

        <div class="container">

            <div id="testimonials-slider" class="owl-carousel owl-theme">

                <div class="item">

                    <div class="holder">

                        <div class="thumb"><img src="{{ asset("images") }}/testo-img.png" alt="img"></div>

                        <div class="text-box"> <em>One morning, when John Doe woke from troubled dreams, he found himself transformed in his Collaboratively administrate empowered markets via plug-and-play networks. Donec volutpat enim at interdum pretium. Vestibulum ante ipsum primis.</em>

                            <ul class="testimonials-rating">

                                <li><a href="#"><i class="fa fa-star"></i></a></li>

                                <li><a href="#"><i class="fa fa-star"></i></a></li>

                                <li><a href="#"><i class="fa fa-star"></i></a></li>

                                <li><a href="#"><i class="fa fa-star"></i></a></li>

                                <li><a href="#"><i class="fa fa-star-o"></i></a></li>

                            </ul>

                            <strong class="name">John Doe</strong> <span class="post">Database Manager</span> </div>

                    </div>

                </div>

                <div class="item">

                    <div class="holder">

                        <div class="thumb"><img src="{{ asset("images") }}/testo-img.png" alt="img"></div>

                        <div class="text-box"> <em>One morning, when John Doe woke from troubled dreams, he found himself transformed in his Collaboratively administrate empowered markets via plug-and-play networks. Donec volutpat enim at interdum pretium. Vestibulum ante ipsum primis.</em>

                            <ul class="testimonials-rating">

                                <li><a href="#"><i class="fa fa-star"></i></a></li>

                                <li><a href="#"><i class="fa fa-star"></i></a></li>

                                <li><a href="#"><i class="fa fa-star"></i></a></li>

                                <li><a href="#"><i class="fa fa-star"></i></a></li>

                                <li><a href="#"><i class="fa fa-star-o"></i></a></li>

                            </ul>

                            <strong class="name">John Doe</strong> <span class="post">Database Manager</span> </div>

                    </div>

                </div>

            </div>

        </div>

        <!--CLIENTS SECTION START-->

        <section class="client-logo-row">

            <div class="holder">

                <ul>

                    <li><img src="{{ asset("images") }}/logo/logo-1.png" alt="img"></li>

                    <li><img src="{{ asset("images") }}/logo/logo-2.png" alt="img"></li>

                    <li><img src="{{ asset("images") }}/logo/logo-3.png" alt="img"></li>

                    <li><img src="{{ asset("images") }}/logo/logo-4.png" alt="img"></li>

                    <li><img src="{{ asset("images") }}/logo/logo-5.png" alt="img"></li>

                    <li><img src="{{ asset("images") }}/logo/logo-6.png" alt="img"></li>

                </ul>

            </div>

        </section>

        <!--CLIENTS SECTION END-->

    </section>

    <!--TESTIOMONIALS SECTION END-->



    <!--POST AREA START-->

    <section class="post-section padd-tb">

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-sm-4">

                    <div class="post-box">

                        <div class="frame"><a href="#"><img src="{{ asset("images") }}/blog/post-img-1.jpg" alt="img"></a></div>

                        <div class="text-box"> <strong class="date"><i class="fa fa-calendar"></i>Mar 17, 2016</strong>

                            <h4><a href="#">Middle Class jobs are being replaced

                                    by burger-flipping, retail sales.</a></h4>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusant doloremque laudantium, totam rem aperiam eaque ipsa quae.</p>

                            <div class="thumb"><a href="#"><img src="{{ asset("images") }}/admin-img.jpg" alt="img"></a></div>

                            <strong class="name"><span>By</span> Anna Smith</strong> </div>

                    </div>

                </div>

                <div class="col-md-4 col-sm-4">

                    <div class="post-box">

                        <div class="frame"><a href="#"><img src="{{ asset("images") }}/blog/post-img-2.jpg" alt="img"></a></div>

                        <div class="text-box"> <strong class="date"><i class="fa fa-calendar"></i>Feb 20, 2016 </strong>

                            <h4><a href="#">There are many variations of passage

                                    of Lorem Ipsum available.</a></h4>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusant doloremque laudantium, totam rem aperiam eaque ipsa quae.</p>

                            <div class="thumb"><a href="#"><img src="{{ asset("images") }}/admin-img.jpg" alt="img"></a></div>

                            <strong class="name"><span>By</span> Anna Smith</strong> </div>

                    </div>

                </div>

                <div class="col-md-4 col-sm-4">

                    <div class="post-box">

                        <div class="frame"><a href="#"><img src="{{ asset("images") }}/blog/post-img-3.jpg" alt="img"></a></div>

                        <div class="text-box"> <strong class="date"><i class="fa fa-calendar"></i>Feb 09, 2016</strong>

                            <h4><a href="#">But I must explain to you how all this

                                    mistaken idea of denouncing pleasure.</a></h4>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusant doloremque laudantium, totam rem aperiam eaque ipsa quae.</p>

                            <div class="thumb"><a href="#"><img src="{{ asset("images") }}/admin-img.jpg" alt="img"></a></div>

                            <strong class="name"><span>By</span> Anna Smith</strong> </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--POST AREA END-->
@endsection