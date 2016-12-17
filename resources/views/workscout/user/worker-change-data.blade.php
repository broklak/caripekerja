<div class="submit-page">

    @if (count($errors) > 0)
        <div class="form">

                <div class="notification error closeable">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>

        </div>
    @endif

    <form role="form" method="POST" id="form-job-create" action="{{ url('update-profile') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form">
            <h5>Foto Profil</h5>
            <div class="frame"><img style="width: 200px;height: 200px" src="{{$image}}" alt="img"></div>

            <input type="file" name="photo" accept="image/*">
        </div>

        <div class="form">
            <h5>Nama Lengkap (Sesuai KTP) *</h5>
            <input class="search-field" name="name" value="{{$authData['name']}}" type="text" placeholder="Nama Lengkap" />
        </div>

        <div class="form">
            <h5>Nomor Handphone</h5>
            <input class="search-field" name="phone" value="{{$authData['phone']}}" readonly type="text" placeholder="Nomor HP" />
        </div>

        <div class="form">
            <h5>Email</h5>
            <input class="search-field" name="email" value="{{$authData['email']}}" type="text" placeholder="Email" />
        </div>

        <div class="form">
            <div class="select">
                <h5>Pengalaman Kerja Minimal</h5>
                <select data-placeholder="Pilih Pengalaman Kerja" name="exp" class="chosen-select">
                    @for($i=1; $i<= $max_exp;$i++)
                        <option @if($authData['years_experience'] == $i) selected="selected" @endif value="{{$i}}">{{$i}} Tahun</option>
                    @endfor

                    <option @if($authData['years_experience'] > $max_exp) selected="selected" @endif value="100">Lebih dari 10 Tahun</option>
                </select>
            </div>
        </div>

        <div class="form">
            <h5>Jenis Kelamin</h5>
            <select data-placeholder="Full-Time" name="gender" class="chosen-select-no-single">
                <option @if($authData['gender'] == 0) selected="selected" @endif disabled value="0">Tidak ada batasan gender</option>
                <option @if($authData['gender'] == 2) selected="selected" @endif value="2">Perempuan</option>
                <option @if($authData['gender'] == 1) selected="selected" @endif value="1">Laki - Laki</option>
            </select>
        </div>

        <div class="form">
            <h5>Status Perkawinan</h5>
            <select data-placeholder="Full-Time" name="marital" class="chosen-select-no-single">
                <option @if($authData['marital'] == 2) selected="selected" @endif value="2">Belum Menikah</option>
                <option @if($authData['marital'] == 1) selected="selected" @endif value="1">Menikah</option>
            </select>
        </div>

        <div class="form">
            <h5>Lokasi</h5>
            <select name="city" class="chosen-select-no-single">
                <option disabled selected>Pilih Lokasi Kerja</option>
                @foreach ($province as $rowProvince)
                    <option @if($authData['city'] == $rowProvince['id']) selected="selected" @endif value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                @endforeach

            </select>
        </div>

        <div class="form">
            <h5>Profesi Pekerja</h5>
            <select name="category[]" data-placeholder="Pilih Profesi (Bisa Lebih Dari Satu)" class="chosen-select-no-single" multiple>
                @foreach($category as $key => $row)
                    <option @if($authData['category'] == $row['id']) selected="selected" @endif value="{{$row['id']}}">{{$row['name']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form">
            <h5>Tanggal Lahir</h5>
            <input class="search-field" name="birthdate" id="datepicker" value="{{empty($authData['birthdate']) ? '' : date('m/d/Y', strtotime($authData['birthdate']))}}" type="text" placeholder="Tanggal Lahir" />
        </div>

        <div class="form">
            <h5>Pendidikan Terakhir</h5>
            <select name="degree" class="chosen-select-no-single">
                <option disabled selected>Pilih Pendidikan Terakhir</option>
                @foreach ($degree as $key => $row)
                <option @if($authData['degree'] == $row) selected="selected" @endif>{{$row}}</option>
                @endforeach
            </select>
        </div>

        <!-- Education -->
        <div class="form with-line">
            <h5>Riwayat Pendidikan</h5>
            <div class="form-inside">

                <!-- Add Education -->
                <div class="form boxed box-to-clone education-box">
                        <a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
                        <input class="search-field" type="text" name="edu_name[]" placeholder="Nama Sekolah / Universitas"/>
                        <select name="edu_level[]" class="margin-bottom-15" style="height: 45px">
                            <option selected disabled>&nbsp;&nbsp;Tingkat Pendidikan</option>
                            @foreach ($degree as $key => $row)
                                <option>&nbsp;&nbsp;{{$row}}</option>
                            @endforeach
                        </select>
                        <input class="search-field" style="" type="number" name="edu_start_year[]" placeholder="Tahun Masuk"/>
                        <input class="search-field" style="" type="number" name="edu_end_year[]" placeholder="Tahun Keluar" />
                        <textarea name="edu_desc" id="desc" cols="30" rows="10" placeholder="Deskripsi (optional)"></textarea>
                </div>

                <a href="#" class="button gray add-education add-box"><i class="fa fa-plus-circle"></i> Tambah Pendidikan</a>
            </div>
        </div>

        <!-- Experience  -->
        <div class="form with-line">
            <h5>Pengalaman Kerja</h5>
            <div class="form-inside">

                <!-- Add Experience -->
                <div class="form boxed box-to-clone experience-box">
                    <a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
                    <input class="search-field" type="text" name="exp_place[]" placeholder="Nama Perusahaan" value=""/>
                    <input class="search-field" type="text" name="exp_role" placeholder="Kerja Sebagai" value=""/>
                    <input class="search-field" style="" type="number" name="exp_start_year[]" placeholder="Tahun Masuk"/>
                    <input class="search-field" style="" type="number" name="exp_end_year[]" placeholder="Tahun Keluar" />
                    <textarea name="exp_desc" id="desc1" cols="30" rows="10" placeholder="Notes (optional)"></textarea>
                </div>

                <a href="#" class="button gray add-experience add-box"><i class="fa fa-plus-circle"></i> Tambah Pengalaman</a>
            </div>
        </div>

        <input type="hidden" name="role" value="worker">
        <input type="submit" class="button big margin-top-5" value="Ubah Profil">

    </form>

</div>