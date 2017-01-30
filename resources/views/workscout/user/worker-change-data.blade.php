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
                @php $myCategory = explode(',',$authData['category']) @endphp
                @foreach($category as $key => $row)
                    <option @if(in_array($row['id'], $myCategory)) selected="selected" @endif value="{{$row['id']}}">{{$row['name']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form">
            <h5>Gaji yang diharapkan</h5>
            <label>Minimal</label>
            <input class="search-field" name="salary_min" style="width: 48%;margin-right: 15px;float: left" value="{{$authData['salary_min']}}" type="text" placeholder="Gaji minimal. Isi dengan angka">
            <label>Maksimal</label>
            <input class="search-field" name="salary_max" style="width: 48%" value="{{$authData['salary_max']}}" type="text" placeholder="Gaji maksimal. Isi dengan angka">
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
            <div class="form-inside" id="form-edu">
                @php $edu = (empty($authData['education'])) ? array() : json_decode($authData['education'], true); @endphp
                <!-- Add Education -->
                @if(count($edu) == 0)
                    <div class="form boxed box-to-clone educations-box">
                        <a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
                        <input class="search-field" value="" type="text" name="edu_name[]" placeholder="Nama Sekolah / Universitas"/>
                        <select name="edu_level[]" class="margin-bottom-15" style="height: 45px">
                            <option value="0" selected disabled>&nbsp;&nbsp;Tingkat Pendidikan</option>
                            @foreach ($degree as $key => $row)
                                <option value="{{$row}}" >&nbsp;&nbsp;{{$row}}</option>
                            @endforeach
                        </select>
                        <input class="search-field" value="" type="number" name="edu_start_year[]" placeholder="Tahun Masuk"/>
                        <input class="search-field" value="" type="number" name="edu_end_year[]" placeholder="Tahun Keluar" />
                        <textarea name="edu_desc[]" id="desc" cols="30" rows="10" placeholder="Keterangan (Bila ada)"></textarea>
                    </div>
                @else
                    @foreach($edu as $key => $val)
                        <div class="form boxed box-to-clone educations-box">
                            <a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
                            <input class="search-field" value="{{isset($val['name']) ? $val['name'] : ''}}" type="text" name="edu_name[]" placeholder="Nama Sekolah / Universitas"/>
                            <select name="edu_level[]" class="margin-bottom-15" style="height: 45px">
                                <option value="0" selected disabled>&nbsp;&nbsp;Tingkat Pendidikan</option>
                                @foreach ($degree as $key => $row)
                                    <option @if(isset($val['level']) && $val['level'] == $row) selected @endif value="{{$row}}" >&nbsp;&nbsp;{{$row}}</option>
                                @endforeach
                            </select>
                            <input class="search-field" value="{{isset($val['start']) ? $val['start'] : ''}}" type="number" name="edu_start_year[]" placeholder="Tahun Masuk"/>
                            <input class="search-field" value="{{isset($val['end']) ? $val['end'] : ''}}" type="number" name="edu_end_year[]" placeholder="Tahun Keluar" />
                            <textarea name="edu_desc[]" id="desc" cols="30" rows="10" placeholder="Keterangan (Bila ada)">{{isset($val['desc']) ? $val['desc'] : ''}}</textarea>
                        </div>
                    @endforeach
                @endif
            </div>
            <a href="#" id="add-edu" class="button gray add-educations add-box"><i class="fa fa-plus-circle"></i> Tambah Pendidikan</a>
        </div>

        <!-- Experience  -->
        <div class="form with-line">
            <h5>Pengalaman Kerja</h5>
            <div class="form-inside" id="form-exp">
                @php $exp = (empty($authData['experiences'])) ? array() : json_decode($authData['experiences'], true); @endphp

                @if(count($exp) == 0)
                    <div class="form boxed box-to-clone experience-box">
                        <a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
                        <input class="search-field" type="text" value="" name="exp_place[]" placeholder="Nama Perusahaan" />
                        <input class="search-field" type="text" name="exp_role[]" value="" placeholder="Kerja Sebagai" />
                        <input class="search-field" type="number" name="exp_start_year[]" value="" placeholder="Tahun Masuk"/>
                        <input class="search-field" type="number" name="exp_end_year[]" value="" placeholder="Tahun Keluar" />
                        <textarea name="exp_desc[]" id="desc1" cols="30" rows="10" placeholder="Deskripsi Pekerjaan"></textarea>
                    </div>
                @else
                    <!-- Add Experience -->
                    @foreach($exp as $key => $val)
                        <div class="form boxed box-to-clone experience-box">
                            <a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
                            <input class="search-field" type="text" value="{{isset($val['place']) ? $val['place'] : ''}}" name="exp_place[]" placeholder="Nama Perusahaan"/>
                            <input class="search-field" type="text" name="exp_role[]" value="{{isset($val['role']) ? $val['role'] : ''}}" placeholder="Kerja Sebagai"/>
                            <input class="search-field" type="number" name="exp_start_year[]" value="{{isset($val['start']) ? $val['start'] : ''}}" placeholder="Tahun Masuk"/>
                            <input class="search-field" type="number" name="exp_end_year[]" value="{{isset($val['end']) ? $val['end'] : ''}}" placeholder="Tahun Keluar" />
                            <textarea name="exp_desc[]" id="desc1" cols="30" rows="10" placeholder="Deskripsi Pekerjaan">{{isset($val['desc']) ? $val['desc'] : ''}}</textarea>
                        </div>
                    @endforeach
                @endif
            </div>
            <a href="#" id="add-exp" class="button gray add-experience add-box"><i class="fa fa-plus-circle"></i> Tambah Pengalaman</a>
        </div>

        <!-- Skills -->
        <div class="form with-line">
            <h5>Keahlian</h5>
            <div class="form-inside" id="form-skill">
                @php $skill = (empty($authData['skills'])) ? array() : json_decode($authData['skills'], true); @endphp

                @if(count($skill) == 0)
                    <div class="form boxed box-to-clone education-box">
                        <a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
                        <input class="search-field" type="text" name="skill_name[]" value="" placeholder="Nama Keahlian (Contoh : Memasak, Menyetir, Menjahit)"/>
                        <select name="skill_level[]" class="margin-bottom-15" style="height: 45px">
                            <option value="0" selected disabled>&nbsp;&nbsp;Tingkat Keahlian</option>
                            <option value="25">&nbsp;&nbsp;Pemula</option>
                            <option value="50">&nbsp;&nbsp;Terbiasa</option>
                            <option value="75">&nbsp;&nbsp;Mahir</option>
                            <option value="100">&nbsp;&nbsp;Ahli</option>
                        </select>
                    </div>
                @else
                    @foreach($skill as $key => $val)
                    <!-- Add Skill -->
                    <div class="form boxed box-to-clone education-box">
                        <a href="#" class="close-form remove-box button"><i class="fa fa-close"></i></a>
                        <input class="search-field" type="text" name="skill_name[]" value="{{isset($val['name']) ? $val['name'] : ''}}" placeholder="Nama Keahlian (Contoh : Memasak, Menyetir, Menjahit)"/>
                        <select name="skill_level[]" class="margin-bottom-15" style="height: 45px">
                            <option value="0" selected disabled>&nbsp;&nbsp;Tingkat Keterampilan</option>
                            <option @if(isset($val['level']) && $val['level'] == '25') selected @endif value="25">&nbsp;&nbsp;Pemula</option>
                            <option @if(isset($val['level']) && $val['level'] == '50') selected @endif value="50">&nbsp;&nbsp;Terbiasa</option>
                            <option @if(isset($val['level']) && $val['level'] == '75') selected @endif value="75">&nbsp;&nbsp;Mahir</option>
                            <option @if(isset($val['level']) && $val['level'] == '100') selected @endif value="100">&nbsp;&nbsp;Ahli</option>
                        </select>
                    </div>
                    @endforeach
                @endif
            </div>
            <a href="#" id="add-skills" class="button gray add-education add-box"><i class="fa fa-plus-circle"></i> Tambah Keahlian</a>
        </div>

        <input type="hidden" name="role" value="worker">
        <input type="submit" class="button big margin-top-5" value="Ubah Profil">

    </form>

</div>