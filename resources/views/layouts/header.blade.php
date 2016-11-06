<header id="header">

    <div class="container">

        <!--NAVIGATION START-->

        <div class="navigation-col">

            <nav class="navbar navbar-inverse">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

                    <strong class="logo"><a href="index.html"><img style="width: 200px" src="{{ asset("images") }}/logocp.png" alt="logo"></a></strong> </div>

                <div id="navbar" style="margin-top: 40px" class="collapse navbar-collapse">

                    <ul class="nav navbar-nav" id="nav">

                        <li><a href="#">Home</a>

                            <ul>

                                <li><a href="index.html">Home 1</a></li>

                                <li><a href="index-2.html">Home 2</a></li>

                                <li><a href="index-3.html">Home 3</a></li>

                                <li><a href="index-4.html">Home 4</a></li>

                            </ul>

                        </li>

                        <li><a href="candidates-listings.html">Jobseekers</a>

                            <ul>

                                <li><a href="candidates-listings.html">Jobseeker Listing</a></li>

                                <li><a href="candidate-details.html">Jobseeker Details</a></li>

                                <li><a href="job-seekers.html">Jobseeker From</a></li>

                            </ul>

                        </li>

                        <li><a href="employers.html">Employers</a></li>

                        <li><a href="jobs.html">Jobs</a>

                            <ul>

                                <li><a href="jobs.html">Latest Jobs</a></li>

                                <li><a href="jobs-detail.html">Jobs Details</a></li>

                                <li><a href="job-seekers.html">Jobs Form</a></li>

                            </ul>

                        </li>

                        <li><a href="companies.html">Companies</a>

                            <ul>

                                <li><a href="companies.html">Companies</a></li>

                                <li><a href="company-detail.html">Company Details</a></li>

                            </ul>

                        </li>

                        <li><a href="#">Features</a>

                            <ul>

                                <li><a href="blog-full.html">Blogs<i class="fa fa-caret-right"></i></a>

                                    <ul>

                                        <li><a href="blog-medium.html">Blog Medium</a></li>

                                        <li><a href="blog-post.html">Blog Post</a></li>

                                        <li><a href="blog-detail.html">Blog Detail</a></li>

                                        <li><a href="#">Post a Job</a></li>

                                    </ul>

                                </li>

                                <li><a href="companies.html">Companies</a></li>

                                <li><a href="#">Resumes</a></li>

                                <li><a href="price.html">Job Plans &amp; Pricing</a></li>

                                <li><a href="testimonials.html">Testimonials</a></li>

                                <li><a href="privacy-policy.html">Privacy Policy</a></li>

                                <li><a href="our-terms.html">Our Terms</a></li>

                                <li><a href="login.html">Login</a></li>

                                <li><a href="signup.html">Register</a></li>

                                <li><a href="privacy-policy.html">Privacy Policy</a></li>

                            </ul>

                        </li>

                        <li><a href="contact.html">Contact</a></li>

                    </ul>

                </div>

            </nav>

        </div>

        <!--NAVIGATION END-->

    </div>



    <!--USER OPTION COLUMN START-->

    <div class="user-option-col">

        <div class="thumb">

            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <img src="{{ asset("images") }}/user-img.png" alt="img"></button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                    <li><a href="#">Manage Account</a></li>

                    <li><a href="#">Change Password</a></li>

                    <li><a href="#">Edit Profile</a></li>

                    <li><a href="#">Log off</a></li>

                </ul>

            </div>

        </div>

        <div class="dropdown-box">

            <div class="dropdown">

                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <img src="{{ asset("images") }}/option-icon.png" alt="img"> </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

                    <li> <a href="#" class="login-round"><i class="fa fa-sign-in"></i></a> <a href="#" class="btn-login">Log in with Jobinn</a> </li>

                    <li> <a href="#" class="login-round"><i class="fa fa-user-plus"></i></a> <a href="#" class="btn-login">Log in with Jobinn</a> </li>

                </ul>

            </div>

        </div>

    </div>

    <!--USER OPTION COLUMN END-->

</header>

@stack("header");