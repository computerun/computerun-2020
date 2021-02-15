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

    <!-- Your Tickets -->
    <h1 class="full-underline {{session('status') ? 'content-divider' : ''}}">Select Events</h1>
    <?php
        $events = DB::table('events')->orderBy('name', 'asc')->get();
    ?>
    @if (count($events) > 0)
        <table class="table margin-0 content-divider-short">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $list)
                    <tr>
                        <th scope="row">{{$list->id}}</th>
                        <td>
                            <b>{{$list->name}}</b><br>
                            @if ($list->opened == 1)
                                @component ('components.bootstrap-icons', ['icon' => 'unlock', 'size' => 24])
                                @endcomponent
                            @else
                                @component ('components.bootstrap-icons', ['icon' => 'lock-fill', 'size' => 24])
                                @endcomponent
                            @endif
                            @if ($list->attendance_opened == 1)
                                @if ($list->attendance_is_exit == 1)
                                    @component ('components.bootstrap-icons', ['icon' => 'box-arrow-left', 'size' => 24])
                                    @endcomponent
                                @else
                                    @component ('components.bootstrap-icons', ['icon' => 'box-arrow-in-right', 'size' => 24])
                                    @endcomponent
                                @endif
                            @endif
                        </td>
                        <td>
                            <a href="/admin/event/{{$list->id}}" class="btn button button-small button-gradient">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="placeholder-sponsors content-divider-short text-center">
            <h2 class="font-800">No Events Found.</h2>
        </div>
    @endif
    <!--div class="text-center">
        <a class="btn button button-gradient" data-toggle="modal" href="#" data-target="#register" role="button">Register</a>
    </div-->
</div>

<script src="/js/registration.js"></script>
<script src="/js/vendor/qrcode.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
@if (session('register'))
    <script>
        document.getElementById("event_id").value = {{session('register')}};
        $('document').ready(function (){
            $('#register').modal("show");
        })
    </script>
    <?php
        Session::forget("register");
    ?>
@endif
<script>
    function setEventModalData(id, eventLink) {
        document.getElementById("qrCanvas").innerHTML = "";
        document.getElementById("joinEvent").action = "/attendance/" + id;
        var link = document.getElementById("eventLink");
        link.href = link.innerHTML = eventLink;
        new QRCode(document.getElementById("qrCanvas"), eventLink);
    }
    var eventDetails = {!! $events !!};
    var isMemberValid = [];
    var isReserveMemberValid = [];
    var requiresAccount = null;
    loadEventDetails();
    function loadEventDetails(){
        var selected = document.getElementById("event_id").value;
        var response = "";

        isMemberValid = [];
        isReserveMemberValid = [];

        var j;
        for (j = 0; j < eventDetails.length; j++){
            if (eventDetails[j].id == selected){
                selected = eventDetails[j];
                break;
            }
        }

        if (j < eventDetails.length && selected.opened == 1){
            // console.log(selected);
            if (selected.name.match(/Mobile Legends/gi)){
                requiresAccount = {
                    namespace: "mobile_legends",
                    name: "Mobile Legends"
                }
            } else if (selected.name.match(/PUBG Mobile/gi)){
                requiresAccount = {
                    namespace: "pubg_mobile",
                    name: "PUBG Mobile"
                }
            } else if (selected.name.match(/Valorant/gi)){
                requiresAccount = {
                    namespace: "valorant",
                    name: "Valorant"
                }
            } else requiresAccount = null;
            if (requiresAccount != null && {!!Auth::user()!!}["id_" + requiresAccount.namespace] == null){
                response = '<div class="alert alert-danger content-divider-short">Your ' + requiresAccount.name + ' Account ID has not been set up on your <a  data-dismiss="modal" data-toggle="modal" href="" data-target="#accountSettings">Profile Settings</a></div>';
            } else {
                // If the event has team members
                if (selected.team_members + selected.team_members_reserve > 0){
                    // Show that the event requires team forming
                    response += '<input type="hidden" name="create_team" value="true">';
                    // Create the "Team Details" heading
                    response += '<h3 class="content-divider-short full-underline">Team Details</h3><div class="card content-divider-short"><div class="card-body">';
                    // Show "Team Name" field
                    response += '<div class="form-group"><label for="team_name">Team Name<b class="red-text">*</b></label><input type="text" class="form-control" name="team_name" id="team_name" required></div>'
                    // Create dummy "Team Leader"
                    response += '<div class="form-group"><label for="team_leader">Team Leader<b class="red-text">*</b></label><input type="text" class="form-control" id="team_leader" disabled value="{{Auth::user()->email}}"></div>'
                    // Show respective "Team Members" field
                    var i;
                    for (i = 0; i < selected.team_members; i++){
                        isMemberValid[i] = false;
                        response += '<div class="form-group"><label for="team_member_' + (i + 1) + '">Team Member ' + (i + 1) + '\'s registered Email Address<b class="red-text">*</b></label><input type="email" class="form-control" name="team_member_' + (i + 1) + '" id="team_member_' + (i + 1) + '" required onChange=\'validateUser("team_member_' + (i + 1) + '")\'><span role="alert" id="team_member_' + (i + 1) + '_validation" style="display: none"></span></div>'
                    }
                    for (i = 0; i < selected.team_members_reserve; i++){
                        isReserveMemberValid[i] = null; // Will be changed to true/valse after validation
                        response += '<div class="form-group"><label for="team_member_reserve_' + (i + 1) + '">Team Member ' + (selected.team_members + i + 1) + '\'s  registered Email Address (Optional, Cadangan)</label><input type="email" class="form-control" name="team_member_reserve_' + (i + 1) + '" id="team_member_reserve_' + (i + 1) + '" onChange=\'validateUser("team_member_reserve_' + (i + 1) + '")\'><span role="alert" id="team_member_reserve_' + (i + 1) + '_validation" style="display: none"></span></div>'
                    }
                    // Show where is their Account ID
                    // response += '<div class="alert alert-info">The <b>Account ID</b> can be found on each team members\' <b><a href="/login">Dashboard</a></b> ➡️ <b>Account Settings</b>.</div>';
                    // Show warning about E-Sport competitions
                    if (requiresAccount != null) response += '<div class="alert alert-warning">Please ensure that your team members\' current <b>' + requiresAccount.name + ' Account ID</b> are correct. You will not be able to change this later.</div>';
                    // Close the card
                    response += '</div></div>';
                }
                // Show the price of the event
                // Create the "Confirmation" heading
                response += '<h3 class="content-divider-short full-underline">Confirmation</h3><div class="card content-divider-short"><div class="card-body">';
                // If the event allows multiple slots
                if (selected.slots > 1){
                    response += '<h5 class="font-800">TOTAL PRICE</h5><h2>IDR ' + selected.price + '<sub>/slot</sub></h2>';
                    // Show "Number of Slots" field
                    response += '<div class="form-group"><label for="slots">Number of Slots</label><select class="form-control" name="slots" id="slots" required>';
                    for (i = 0; i < selected.slots; i++) {
                        response += '<option value="' + (i + 1) + '">' + (i + 1) + '</option>';
                    }
                    // Close the selection
                    response += '</select></div>';
                } else {
                    response += '<h5 class="font-800">TOTAL PRICE</h5><h2>IDR ' + selected.price + '</h2>';
                }
                // Close the card
                response += '</div></div>';
                // Add the Submit Button Area
                response += '<div id="submit-validation" class="content-divider-short"></div>';
            }
        } else {
            response = '<div class="alert alert-info content-divider-short">Please select the event before continuing.</div>'
        }

        document.getElementById("registration-details").innerHTML = response;
        validateRegistration();
    }
    function validateUser(input){
        var selected = document.getElementById(input).value;
        var xhr = new XMLHttpRequest();
        var params = JSON.stringify({ email: selected, allowSelf: false });
        xhr.open("POST", "/getuserdetails");
        xhr.setRequestHeader("X-CSRF-TOKEN", "{!! csrf_token() !!}");
        xhr.setRequestHeader("Content-type", "application/json; charset=utf-8");
        // xhr.setRequestHeader("Content-length", params.length);
        // xhr.setRequestHeader("Connection", "close");
        xhr.onload = function() {
            if (xhr.status != 200) {
                setErrorMessage(input, 'Error ' + xhr.status + ': ' + xhr.statusText);
            } else {
                // Check whether the output is JSON
                try {
                    var json = JSON.parse(xhr.responseText);
                    // Check if the JSON data displays an error
                    if (json.error) throw json.error;
                    // Check whether game account is required
                    if (requiresAccount != null){
                        if (json["id_" + requiresAccount.namespace] == "" || json["id_" + requiresAccount.namespace] == null){
                            throw "The participant you are looking currently has not set his/her " + requiresAccount.name + " Account ID on their Dashboard. Please set the Account ID on the member's Profile Settings.";
                        } else {
                            setSuccessMessage(input, "User Found: " + json.name + " (" + requiresAccount.name + " ID: " + json["id_" + requiresAccount.namespace] + ")", selected);
                        }
                    } else {
                        // Send to UI
                        setSuccessMessage(input, "User Found: " + json.name, selected);
                    }
                } catch (e) {
                    setErrorMessage(input, 'Error: ' + e);
                }
            }
        };
        xhr.send(params);
    }
    function setErrorMessage(input, message){
        var match = input.match(/team_member_([1-9][0-9]*)/);
        if (match && match[1]){
            isMemberValid[match[1] - 1] = false;
        }
        match = input.match(/team_member_reserve_([1-9][0-9]*)/)
        if (match && match[1]){
            isReserveMemberValid[match[1] - 1] = false;
        }
        var element = document.getElementById(input + "_validation");
        element.style.display = "block";
        element.style.color = "#ff0000";
        element.innerHTML = "<strong>" + message + "</strong>";
        validateRegistration();
    }
    function setSuccessMessage(input, message, selected){
        var match = input.match(/team_member_([1-9][0-9]*)/);
        if (match && match[1]){
            isMemberValid[match[1] - 1] = selected;
        }
        match = input.match(/team_member_reserve_([1-9][0-9]*)/)
        if (match && match[1]){
            isReserveMemberValid[match[1] - 1] = selected;
        }
        var element = document.getElementById(input + "_validation");
        element.style.display = "block";
        element.style.color = "#249ef2";
        element.innerHTML = "<strong>" + message + "</strong>";
        validateRegistration();
    }
    function validateRegistration(){
        var emails = isMemberValid.concat(isReserveMemberValid);
        var i, invalidMembers = 0;
        for (i = 0; i < emails.length; i++){
            if (emails[i] == null) emails.splice(i, 1);
            if (isMemberValid[i] == false) invalidMembers++;
        }
        var emailSet = new Set(emails);
        if (invalidMembers > 0){
            document.getElementById("submit-validation").innerHTML = '<div class="alert alert-danger">All member details should be added.</div>';
        } else if (emails.length > emailSet.size){
            document.getElementById("submit-validation").innerHTML = '<div class="alert alert-danger">Error: No duplicate emails allowed.</div>';
        } else {
            document.getElementById("submit-validation").innerHTML = '<div class="text-center"><button type="submit" class="button button-gradient">Submit</button></div>';
        }
    }
</script>
@endsection
