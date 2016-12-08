<div class="row">
    <div @if($authRole == 'worker') class="col-md-3 col-sm-6" @else class="col-md-2 col-sm-6" @endif>

        <div class="option-box">

            <a href="{{route('myaccount-index')}}"><div class="icon-box icon-colo-1"><i class="fa fa-files-o"></i></div>

                <h4>Lengkapi Profil</h4>
            </a>

        </div>

    </div>

    @if($authRole == 'employer')
        <div class="col-md-2 col-sm-6">

            <div class="option-box">

                <a href="{{route('owned-worker')}}"><div class="icon-box icon-colo-2"><i class="fa fa-book"></i></div>

                    <h4>Lihat Pekerja Saya</h4>

                </a>

            </div>

        </div>

        <div class="col-md-2 col-sm-6">

            <div class="option-box">

                <a href="{{route('job-create')}}"><div class="icon-box icon-colo-3"><i class="fa fa-file"></i></div>

                    <h4>Buat Lowongan</h4>

                </a>

            </div>

        </div>

        <div class="col-md-2 col-sm-6">

            <div class="option-box">

                <a href="{{route('worker-list')}}"><div class="icon-box icon-colo-4"><i class="fa fa-search"></i></div>

                    <h4>Cari Pekerja</h4>

                </a>

            </div>

        </div>

        <div class="col-md-2 col-sm-6">

            <div class="option-box">

                <a href="{{route('employer-job')}}"><div class="icon-box icon-colo-2"><i class="fa fa-file-archive-o"></i></div>

                    <h4>Lowongan Saya</h4>

                </a>

            </div>

        </div>

    @else
    <div class="col-md-3 col-sm-6">

        <div class="option-box">

            <a href="{{route('job-list')}}"><div class="icon-box icon-colo-3"><i class="fa fa-search"></i></div>

                <h4>Cari Lowongan</h4>

            </a>

        </div>

    </div>

        <div class="col-md-3 col-sm-6">

            <div class="option-box">

                <a href="{{route('worker-job')}}"><div class="icon-box icon-colo-2"><i class="fa fa-paper-plane-o"></i></div>

                    <h4>Lamaran Saya</h4>

                </a>

            </div>

        </div>

    @endif

    <div @if($authRole == 'worker') class="col-md-3 col-sm-6" @else class="col-md-2 col-sm-6" @endif>

        <div class="option-box">

            <a href="{{route('change-password')}}"><div class="icon-box icon-colo-1"><i class="fa fa-lock"></i></div>

                <h4>Ganti Kata Sandi</h4>

            </a>

        </div>

    </div>

</div>