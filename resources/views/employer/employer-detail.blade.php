@extends('layouts.main')

@section('title', 'Home')

@section('content')

<section class="resumes-section padd-tb job-detail">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-8">

                {!! session('displayMessage') !!}

                <div class="resumes-content worker-detail">

                    <div class="box">

                        <div class="to-profile">
                            <a class="button-link link-blue" href="{{route('myaccount-index')}}">Ganti Profil</a>
                        </div>

                        <div class="frame"><a href="#"><img style="width: 200px" src="{{\App\Helpers\GlobalHelper::setEmployerImage($detail['photo_profile'])}}" alt="img"></a></div>

                        <div class="text-box">

                            <h2>{{$detail['name']}}</h2>

                            <ul class="company-small">

                                <li><strong>Bidang Usaha:</strong> {{$detail['ukm_category']}}</li>

                                <li><strong>Nama Pemilik:</strong> {{$detail['name_owner']}}</li>

                                <li><strong>Alamat:</strong> {{$detail['address']}}</li>

                                <li><strong>Kota:</strong> {{\App\Helpers\GlobalHelper::getCityName($detail['city'])}}</li>

                            </ul>

                        </div>

                    </div>

                    </div>


                    <div class="summary-box">

                        <h4>Deskripsi Usaha</h4>
                        <p>{{$detail['description']}}</p>
                    </div>
                </div>

        </div>

    </div>

</section>

@endsection