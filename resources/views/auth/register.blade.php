@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        </div>
        <?php
            Session::forget('status');
        ?>
    @endif
    @if (session('error'))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            </div>
        </div>
        <?php
            Session::forget('error');
        ?>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3 class="full-underline">Account Details</h3>
                <div class="card content-divider-short">
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<b class="red-text">*</b></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <?php
                        $universities = DB::table("universities")->where('id', '>', '3')->orderBy('name', 'asc')->get();
                        ?>

                        <div class="form-group row">
                            <label for="university_id" class="col-md-4 col-form-label text-md-right">University<b class="red-text">*</b></label>
                            <div class="col-md-6">
                                <select class="form-control" id="university_id" name="university_id" onChange="checkBinusian()">
                                    <option value="1" {{ old('university_id') == '1' ? 'selected' : '' }}>None/Uncategorized</option>
                                    @foreach($universities as $university)
                                        <option value="{{$university->id}}" {{ old('university_id') == $university->id ? 'selected' : '' }}>{{$university->name}}</option>
                                    @endforeach
                                    <option value="0" {{ old('university_id') == '0' ? 'selected' : '' }}>Others (Add a new one)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="nim-container">
                            <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}<b class="red-text">*</b></label>
                            <div class="col-md-6">
                                <input id="nim" type="number" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}">

                                @error('nim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" id="new_university-container">
                            <label for="new_university" class="col-md-4 col-form-label text-md-right">{{ __('University Name') }}<b class="red-text">*</b></label>
                            <div class="col-md-6">
                                <input id="new_university" type="text" class="form-control @error('new_university') is-invalid @enderror" name="new_university" value="{{ old('new_university') }}">

                                @error('new_university')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            <b>For BINUSIAN Participants:</b> Make sure to select <b>BINUS University</b> to enter your NIM for SAT distribution. <a href="https://student.binus.ac.id/sat/" target="_blank">About SAT Points</a>
                        </div>
                    </div>
                </div>
                <h3 class="full-underline content-divider-short">Contact Details</h3>
                <div class="card content-divider-short">
                    <div class="card-body">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<b class="red-text">*</b></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}<b class="red-text">*</b></label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="tel">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="line" class="col-md-4 col-form-label text-md-right">{{ __('LINE Registered Number or LINE ID') }}</label>

                                <div class="col-md-6">
                                    <input id="line" type="text" class="form-control @error('line') is-invalid @enderror" name="line" value="{{ old('line') }}" autocomplete="tel">

                                    @error('line')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="whatsapp" class="col-md-4 col-form-label text-md-right">{{ __('WhatsApp Registered Number') }}</label>

                                <div class="col-md-6">
                                    <input id="whatsapp" type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ old('whatsapp') }}" autocomplete="tel">

                                    @error('whatsapp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    </div>
                </div>
                <h3 class="full-underline content-divider-short">Game Account Details</h3>
                <p class="h5 text-center content-divider-short">for Mini E-Sport Competitions</p>
                <div class="card content-divider-short">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id_mobile_legends" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Legends Account ID') }}</label>

                            <div class="col-md-6">
                                <input id="id_mobile_legends" type="text" class="form-control @error('id_mobile_legends') is-invalid @enderror" name="id_mobile_legends" value="{{ old('id_mobile_legends') }}">

                                @error('id_mobile_legends')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_pubg_mobile" class="col-md-4 col-form-label text-md-right">{{ __('PUBG Mobile Account ID') }}</label>

                            <div class="col-md-6">
                                <input id="id_pubg_mobile" type="text" class="form-control @error('id_pubg_mobile') is-invalid @enderror" name="id_pubg_mobile" value="{{ old('id_pubg_mobile') }}">

                                @error('id_pubg_mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_valorant" class="col-md-4 col-form-label text-md-right">{{ __('Valorant Account ID') }}</label>

                            <div class="col-md-6">
                                <input id="id_valorant" type="text" class="form-control @error('id_valorant') is-invalid @enderror" name="id_valorant" value="{{ old('id_valorant') }}">

                                @error('id_valorant')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="full-underline content-divider-short">Password</h3>
                <div class="card content-divider-short">
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<b class="red-text">*</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}<b class="red-text">*</b></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center content-divider-short">
                    <button type="submit" class="button button-gradient">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    checkBinusian();
    function checkBinusian(){
        if (document.getElementById("university_id").value == 4){
            document.getElementById("nim-container").style.display = "flex";
            document.getElementById("nim").setAttribute("required","true");
        } else {
            document.getElementById("nim-container").style.display = "none";
            document.getElementById("nim").removeAttribute("required");
        }
        if (document.getElementById("university_id").value == 0){
            document.getElementById("new_university-container").style.display = "flex";
            document.getElementById("new_university").setAttribute("required","true");
        } else {
            document.getElementById("new_university-container").style.display = "none";
            document.getElementById("new_university").removeAttribute("required");
        }
    }
</script>
@endsection
