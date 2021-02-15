<!DOCTYPE html>
<html>

<head>
    @component("components.meta", ["title" => "Competition Registration"])
    @endcomponent
    <style>
        <?php include 'css/registration.css'; ?>
    </style>
</head>

<body>
    <div class="container-2 content-top bg-event">
        <div class="margin-2 text-center content-divider">
            <p class="h1 font-800 gradient-text">Competition Registration</p>
            <span class="h4 font-400">Quickly register by filling up this form below</span>
        </div>
    </div>
    <div class="container-0">
        <img class="container-clip" src="/img/backgrounds/2.png">
        <div class="margin-2 content-top text-center h5">
            <div class="registration-form">
                <form action="postcontroller" method="POST">
                    @csrf
                    <!-- Team Leader Data -->
                    <p>
                        <h2 class="full-underline"> Team Leader </h2>
                    </p>
                    @component("components.registration-form")
                    @endcomponent

                    <!-- Team Member 1 -->
                    <p>&nbsp;
                        <h2 class="full-underline"> Team Member 1 </h2>
                    </p>
                    @component("components.registration-form")
                    @endcomponent

                    <!-- Team Member 2 -->
                    <p>&nbsp;
                        <h2 class="full-underline"> Team Member 2 </h2>
                    </p>
                    @component("components.registration-form")
                    @endcomponent

                    <p>&nbsp;
                        <h3 class="full-underline">EVENT</h3>
                    </p>
                    <select name=Event class=inputField id=event value="{{ old ('Event') }}">
                        <option hidden disable selected value>Select Event</option>
                        <option required value="Mobile Apps Competition"> Mobile Application Competition </option>
                        <option required value="Bussiness-IT Case Competition"> Business-IT Case Competition </option>
                        <option required value="E-Sport Competition"> E-Sport Competition </option>
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