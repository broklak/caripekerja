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

                <!-- Email -->
        <div class="form">
            <h5>Nama Usaha</h5>
            <input class="search-field" name="name" value="{{$authData['name']}}" type="text" placeholder="Nama Usaha" />
        </div>

        <div class="form">
            <h5>Email</h5>
            <input class="search-field" name="email" readonly value="{{$authData['email']}}" type="text" placeholder="Email" />
        </div>

        <div class="form">
            <h5>Nomor Handphone</h5>
            <input class="search-field" name="phone" value="{{$authData['phone']}}" type="text" placeholder="Nomor HP" />
        </div>

        <div class="form">
            <h5>Nama Pemilik</h5>
            <input class="search-field" name="name_owner" value="{{$authData['name_owner']}}" type="text" placeholder="Nama Pemilik" />
        </div>

        <div class="form">
            <h5>Website</h5>
            <input class="search-field" name="website" value="{{$authData['website']}}" type="text" placeholder="Website" />
        </div>

        <div class="form">
            <h5>Bidang Usaha</h5>
            <input class="search-field" name="category" value="{{$authData['ukm_category']}}" type="text" placeholder="Bidang Usaha" />
        </div>

        <div class="form">
            <h5>Deskripsi Usaha</h5>
            <textarea rows="10" name="description">{{$authData['description']}}</textarea>
        </div>

        <div class="form">
            <h5>Alamat Lengkap Usaha</h5>
            <textarea name="address">{{$authData['address']}}</textarea>
        </div>

        <div class="form">
            <h5>Kota tempat Usaha</h5>
            <select name="city" class="chosen-select-no-single">
                <option disabled selected>Pilih Kota</option>
                @foreach ($province as $rowProvince)
                    <option @if($authData['city'] == $rowProvince['id']) selected="selected" @endif value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                @endforeach

            </select>
        </div>

        <div class="form">
            <h5>Foto Profil</h5>
            <div class="frame"><img style="width: 200px;height: 200px" src="{{$image}}" alt="img"></div>

            <input type="file" name="photo" accept="image/*">
        </div>
        <input type="hidden" name="role" value="employer">
        <input type="submit" class="button big margin-top-5" value="Ubah Profil">

    </form>

</div>