@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <section class="resum-form opt-log">
        <div class="container">
            {!! session('displayMessage') !!}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        </div>
    </section>

    <!--RESUME FORM START-->

    <section class="resum-form padd-tb">

        <div class="container">

            <form role="form" method="POST" action="{{ url('/approve-process') }}">
                {{ csrf_field() }}

                <div class="row">

                    <div class="col-md-12 col-sm-12">

                        <label>Kode Transaksi</label>
                        <input type="text" name="code" value="{{old('code')}}" placeholder="Masukkan kode transaksi yang akan diapprove">

                    </div>



                    <div class="col-md-12">

                        <div class="btn-col">

                            <input type="hidden" name="role" value="worker">

                            <input type="submit" value="Approve Transaksi">

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </section>



@endsection