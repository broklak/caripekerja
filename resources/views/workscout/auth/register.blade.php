@extends('layouts.main')

@section('title', 'Home')

@section('content')

    @if (count($errors) > 0)
        <div class="row" style="margin-bottom: 0">

                <div class="alert alert-danger" style="margin-bottom: 0;">
                    <ul style="padding: 20px">
                        @foreach ($errors->all() as $error)
                            <li style="text-align: center">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        </div>
    @endif
    <div class="mj_transprentbg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="mj_signup_section mj_blue_bg">
                        <div class="mj_mainheading mj_toppadder80 mj_bottompadder30">
                            <h1>SAYA<br />PEMILIK USAHA</h1>
                        </div>
                        <div class="mj_blog_btn">
                            <a href="#" class="mj_mainbtn mj_btnblack" data-text="Masuk" data-toggle="modal" data-target="#usaha"><span>Masuk</span></a>
                        </div>
                        <div class="mj_signup_section_img">
                            <img src="images/signup_bg2.png" class="img-responsive" alt="hire">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="mj_signup_section mj_green_bg">
                        <div class="mj_mainheading mj_toppadder80 mj_bottompadder30">
                            <h1>SAYA<br />PENCARI KERJA</h1>
                        </div>
                        <div class="mj_blog_btn">
                            <a href="#" class="mj_mainbtn mj_btnblack" data-text="Masuk" data-toggle="modal" data-target="#pekerja"><span>Masuk</span></a>
                        </div>
                        <div class="mj_signup_section_img">
                            <img src="images/signup_bg1.png" class="img-responsive" alt="job">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade mj_popupdesign" id="usaha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Masuk Sebagai Pemilik Usaha</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                        <div class="row">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="mj_pricingtable mj_bluetable mj_createaccount_form_wrapper">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#masukUsaha" aria-controls="company" role="tab" data-toggle="tab">Masuk</a>
                                    </li>
                                    <li role="presentation"><a href="#daftarUsaha" aria-controls="individual" role="tab" data-toggle="tab">Buat Akun</a>
                                    </li>
                                </ul>
                                <p class="mj_toppadder40 hide">You can also sign up with <a href="#">Facebook</a>, <a href="#">Linkedin</a>, or <a href="#">Google</a>.</p>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="masukUsaha">
                                        <form method="POST" action="{{ url('/employer/login') }}">
                                            {{ csrf_field() }}
                                            <div class="mj_createaccount_form">
                                                <div class="form-group">
                                                    <input type="email" required placeholder="Email" id="ur_email" name="email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" required placeholder="Password" id="ur_password" name="password" class="form-control">
                                                </div>
                                            </div>
                                            <a class="forget-password" href="{{route('employer-forget-password')}}">Lupa Password</a>
                                            <div class="mj_pricing_footer">
                                                <input type="submit" style="display: none">
                                                <a href="#" onclick="parentNode.parentNode.submit()">Masuk</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="daftarUsaha">
                                        <form method="POST" action="{{ url('/employer/register') }}">
                                            {{ csrf_field() }}
                                            <div class="mj_freelancer_form">
                                                <div class="form-group">
                                                    <input name="name" required value="{{old('name')}}" type="text" placeholder="Nama Lengkap" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input name="email" required value="{{old('email')}}" type="text" placeholder="Email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input name="password" required type="password" placeholder="Kata Sandi" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input name="password_confirmation" required type="password" placeholder="Ketik Ulang Kata Sandi" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input name="referral_code" type="text" value="{{old('referral_code')}}" placeholder="Kode referral (bila ada)" class="form-control">
                                                </div>
                                                <div class="form-group mj_toppadder20 hide">
                                                    <div class="mj_checkbox">
                                                        <input type="checkbox" value="1" id="check3" name="checkbox">
                                                        <label for="check3"></label>
                                                    </div>
                                                    <span> I have read, understand and agree to the meshjobs Terms of Service, including the <a href="#">User Agreement</a> and <a href="#">Privacy Policy</a>.</span>
                                                </div>
                                            </div>
                                            <div class="mj_pricing_footer">
                                                <input type="submit" style="display: none">
                                                <a onclick="parentNode.parentNode.submit()" href="#">Daftar Sekarang!</a>
                                            </div>
                                            <input type="hidden" name="role" value="employer">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade mj_popupdesign" id="pekerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Masuk Sebagai Pekerja</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                        <div class="row">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="mj_pricingtable mj_bluetable mj_createaccount_form_wrapper">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#masukPekerja" aria-controls="company" role="tab" data-toggle="tab">Masuk</a>
                                    </li>
                                    <li role="presentation"><a href="#daftarPekerja" aria-controls="individual" role="tab" data-toggle="tab">Buat Akun</a>
                                    </li>
                                </ul>
                                <p class="mj_toppadder40 hide">You can also sign up with <a href="#">Facebook</a>, <a href="#">Linkedin</a>, or <a href="#">Google</a>.</p>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="masukPekerja">
                                        <form method="POST" action="{{ url('/login') }}">
                                            {{ csrf_field() }}
                                            <div class="mj_createaccount_form">
                                                <div class="form-group">
                                                    <input type="text" required placeholder="Nomor Handphone" id="ur_email" name="phone" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" required placeholder="Kata Sandi" id="ur_password" name="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mj_pricing_footer">
                                                <input type="submit" style="display: none">
                                                <a href="#" onclick="parentNode.parentNode.submit()">Masuk</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="daftarPekerja">
                                        <form method="POST" action="{{ url('/register') }}">
                                            {{ csrf_field() }}
                                            <div class="mj_freelancer_form">
                                                <div class="alert alert-info" style="margin-bottom: 10px;">
                                                    Harap masukkan nomor handphone yang valid. Kami akan mengirimkan sms ke nomor anda untuk aktifasi akun pekerja.
                                                </div>
                                                <div class="form-group">
                                                    <input name="name" required value="{{old('name')}}" type="text" placeholder="Nama Lengkap" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input name="phone" required value="{{old('phone')}}" type="text" placeholder="Nomor HP" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input name="password" required type="password" placeholder="Kata Sandi" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input name="password_confirmation" required type="password" placeholder="Ketik Ulang Kata Sandi" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input name="referral_code" type="text" value="{{old('referral_code')}}" placeholder="Kode referral (bila ada)" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mj_pricing_footer">
                                                <input type="submit" style="display: none">
                                                <a onclick="parentNode.parentNode.submit()" href="javascript:void(0)">Daftar Sekarang!</a>
                                            </div>
                                            <input type="hidden" name="role" value="worker">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection