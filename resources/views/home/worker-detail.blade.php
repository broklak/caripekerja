@extends('layouts.main')

@section('title', 'Home')

@section('content')

<section class="resumes-section padd-tb">

    <div class="container">

        <div class="row">

            <div class="col-md-9 col-sm-8">

                <div class="resumes-content worker-detail">

                    <div class="box">

                        <div class="frame"><a href="#"><img src="{{\App\Helpers\GlobalHelper::setUserImage($detail['photo_profile'])}}" alt="img"></a></div>

                        <div class="text-box">

                            <h2>{{$detail['name']}}</h2>

                            <h5>{{\App\Helpers\GlobalHelper::getAgeByBirthdate($detail['birthdate'])}} Tahun, {{\App\Helpers\GlobalHelper::maritalStatus($detail['marital'])}}</h5>

                            <div class="clearfix"> <strong><i class="fa fa-map-marker"></i>{{\App\Helpers\GlobalHelper::getCityName($detail['city'])}}</strong></div>

                            <div class="tags">Satpam, Supir</div>

                            <div class="btn-row"> <a href="" class="contact">Hubungi Pekerja</a> </div>

                        </div>

                    </div>

                    <div class="summary-box">

                        <h4>Tentang Saya</h4>

                        <p>{{empty($detail['description']) ? 'Belum ada deskripsi' : $detail['description']}}</p>


                    </div>

                    <div class="summary-box">

                        <h4>Pengalaman Kerja</h4>

                        <div class="outer"> <strong class="title">Supir Blue Bird</strong>

                            <div class="col"> <span>2010 - 2014</span>

                                <p>Selalu mendapat rating yang baik dari penumpang</p>

                            </div>

                        </div>

                        <div class="outer"> <strong class="title">Supir Grab</strong>

                            <div class="col"> <span>2015 - 2016</span>

                                <p>Tidak pernah bermasalah dengan penumpang</p>

                            </div>

                        </div>

                    </div>

                    <div class="skills-box">

                        <h4>Keahlian</h4>

                        <div class="progress-box"> <strong class="title">Menyetir</strong>

                            <div class="progress">

                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 100%;"> <span> 100%</span> </div>

                            </div>

                        </div>

                        <div class="progress-box"> <strong class="title">Bela Diri</strong>

                            <div class="progress">

                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 80%;"> <span> 80%</span> </div>

                            </div>

                        </div>

                        <div class="progress-box"> <strong class="title">Memasak</strong>

                            <div class="progress">

                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 70%;"> <span> 70%</span> </div>

                            </div>

                        </div>

                </div>

            </div>
                </div>

            <div class="col-md-3 col-sm-4">

                <h2>Pekerja Serupa</h2>

                <aside>

                    <div class="sidebar">

                        <div class="related-people">

                            <ul>

                                <li>

                                    <div class="frame"><a href="#"><img src="images/resumes/related-img-4.jpg" alt="img"></a></div>

                                    <div class="text-box"> <strong class="name"><a href="#">Ahmad Kadir</a></strong> <span><i class="fa fa-tags"></i>Supir</span> <span><i class="fa fa-map-marker"></i>Jakarta</span> </div>

                                </li>

                                <li>

                                    <div class="frame"><a href="#"><img src="images/resumes/related-img-5.jpg" alt="img"></a></div>

                                    <div class="text-box"> <strong class="name"><a href="#">Bayu Sakti</a></strong> <span><i class="fa fa-tags"></i>Supir</span> <span><i class="fa fa-map-marker"></i>Jakarta</span> </div>

                                </li>

                                <li>

                                    <div class="frame"><a href="#"><img src="images/resumes/related-img-6.jpg" alt="img"></a></div>

                                    <div class="text-box"> <strong class="name"><a href="#">Sulaeman</a></strong> <span><i class="fa fa-tags"></i>Supir</span> <span><i class="fa fa-map-marker"></i>Jakarta</span> </div>

                                </li>

                            </ul>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>

@endsection