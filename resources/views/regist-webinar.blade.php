<!DOCTYPE html>
<html>

<head>
    @component("components.meta", ["title" => "Webinar Registration"])
    @endcomponent
    <style>
        <?php include 'css/registration.css'; ?>
    </style>
</head>

<body>
    <div class="container-2 content-top bg-event">
        <div class="margin-2 text-center content-divider">
            <p class="h1 font-800 gradient-text">WEBINAR REGISTRATION</p>
            <span class="h4 font-400">Quickly register by filling up this form below</span>
        </div>
    </div>
    <div class="container-0">
        <img class="container-clip" src="/img/backgrounds/2.png">
        <div class="margin-2 content-top text-center h5">
            <div class="registration-form">
                <form action="postcontroller" method="POST">
                    @csrf
                    <h4> Name </h4>
                    <input name="Name" class=inputField id=name type="text" placeholder="Name" value="{{ old('Name') }}" />
                    <span>
                        @error('Name')
                        <div class=errorMessage>{{$message}}</div>
                        @enderror
                    </span>

                    <h4> University </h4>
                    <input name="University" class=inputField id=university type="text" placeholder="University" value="{{ old('University') }}" />
                    <span>
                        @error('University')
                        <div class=errorMessage>{{$message}}</div>
                        @enderror
                    </span>

                    <h4> NIM (Binusian only)</h4>
                    <input name="NIM" class=inputField id=nim type="text" placeholder="If you aren't Binusian fill -" value="{{ old('NIM') }}" />
                    <span>
                        @error('NIM')
                        <div class=errorMessage>{{$message}}</div>
                        @enderror
                    </span>

                    <h4> Line ID </h4>
                    <input name="LineID" class=inputField id=lineID type="text" placeholder="Line ID" value="{{ old('LineID') }}" />
                    <span>
                        @error('LineID')
                        <div class=errorMessage>{{$message}}</div>
                        @enderror
                    </span>

                    <h4> Phone Number </h4>
                    <input name="PhoneNumber" class=inputField id=hp type="text" placeholder="Phone Number" value="{{ old('PhoneNumber') }}" />
                    <span>
                        @error('PhoneNumber')
                        <div class=errorMessage>{{$message}}</div>
                        @enderror
                    </span>

                    <h4> Email </h4>
                    <input name="Email" class=inputField id=email type="email" placeholder="Email" value="{{ old('Email') }}" />
                    <span>
                        @error('Email')
                        <div class=errorMessage>{{$message}}</div>
                        @enderror
                    </span>

                    <h4>Event</h4>
                    <select name=Event class=inputField id=event value="{{ old ('Event') }}">
                        <option hidden disable selected value>Select Event</option>
                        <option required value="Webinar 1">
                            Webinar 1: How to Solve Business Problem</option>
                        <option required value="Webinar 2">
                            Webinar 2: How to Create a Startup </option>
                        <option required value="Webinar 3">
                            Webinar 3: How to Create Apps that Meets Customer’s Expectations </option>
                    </select>
                    <span>
                        @error('Event')
                        <div class=errorMessage>{{$message}}</div>
                        @enderror
                    </span>

                    <p>
                        <input type="checkbox" name="Confirm" id=checkBox value="1">
                        <label>I have entered all the data correctly</label>
                        <span>
                            @error('Confirm')
                            <div class="errorMessageConfirm">{{$message}}</div>
                            @enderror
                        </span>
                    </p>

                    <input name="Register" type="Submit" class="button button-gradient-2" value="Submit">
                </form>
            </div>
        </div>
        <img class="container-clip for-footer" src="/img/backgrounds/7.png">
    </div>
    @component('components.footer')
    @endcomponent
</body>

</html>
