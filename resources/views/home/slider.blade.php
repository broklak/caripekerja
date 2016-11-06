<!--BANNER START-->

<div class="banner-outer">

    <div id="banner" class="element"> <img src="{{ asset("images") }}/banner-img-1.png" alt="banner"> </div>

    <div class="caption">

        <div class="holder">

            <h1>Search Online Jobs or Hire Employees!</h1>

            <form action="#">

                <div class="container">

                    <div class="row">

                        <div class="col-md-4 col-sm-4">

                            <input type="text" placeholder="Enter Job Title, Skills or Company">

                        </div>

                        <div class="col-md-4 col-sm-4">

                            <input type="text" placeholder="Enter City, State, Province or Country">

                        </div>

                        <div class="col-md-3 col-sm-3">

                            <input type="text" placeholder="Category">

                        </div>

                        <div class="col-md-1 col-sm-1">

                            <button type="submit"><i class="fa fa-search"></i></button>

                        </div>

                    </div>

                </div>

            </form>

            <div class="banner-menu">

                <ul>

                    <li><a href="#">San Francisco</a></li>

                    <li><a href="#">Palo Alto</a></li>

                    <li><a href="#">Mountain View</a></li>

                    <li><a href="#">Sacramento</a></li>

                    <li><a href="#">New York</a></li>

                    <li><a href="#">United Kindom</a></li>

                    <li><a href="#">Asia Pacific</a></li>

                </ul>

            </div>

            <div class="btn-row"> <a href="job-seekers.html"><i class="fa fa-user"></i>I’m a Jobseeker</a> <a href="employers.html"><i class="fa fa-building-o"></i>I’m an Employer</a> </div>

        </div>

    </div>

    <div class="browse-job-section">

        <div class="container">

            <div class="holder"> <a href="jobs.html" class="btn-brows">Browse Jobs</a> <strong class="title">Finds Jobs in San Francisco, Palo Alto, Mountain View, Sacramento, New York, United Kindom, Asia Pacific</strong> </div>

        </div>

    </div>

</div>

<!--BANNER END-->
@stack("slider")