<div class="widget">

    <div class="job-overview">
        <h2>Akun Saya</h2>
        <ul>
            <li><a href="{{route('myaccount-index')}}"><i class="fa fa-user"></i>&nbsp; Update Profil</a></li>
            @if($authRole == 'worker')
                <li><a href="{{route('worker-job')}}"><i class="fa fa-file"></i>&nbsp; Lamaran Saya</a></li>
                <li><a href="{{route('myaccount-profile')}}"><i class="fa fa-user-md"></i>&nbsp; Profil Saya</a></li>
                <li><a href="{{route('verify-identity')}}"><i class="fa fa-user-secret"></i>&nbsp;Verifikasi Pekerja</a></li>
            @else
                <li><a href="{{route('owned-worker')}}"><i class="fa fa-file-photo-o"></i>&nbsp; Pekerja Saya</a></li>
                <li><a href="{{route('employer-job')}}"><i class="fa fa-file"></i>&nbsp; Lowongan Saya</a></li>
                <li><a href="{{route('employer-notification')}}"><i class="fa fa-envelope"></i>&nbsp; Lihat Pelamar</a></li>
            @endif
            <li><a href="{{route('change-password')}}"><i class="fa fa-lock"></i>&nbsp;&nbsp; Ganti Password</a></li>

        </ul>

    </div>

</div>