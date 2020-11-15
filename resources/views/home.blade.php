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

    <?php
        $tickets = DB::table('registration')->where('ticket_id', Auth::user()->id)->get();
        $events = DB::table('events')->orderBy('name', 'asc')->get();
        $events_original = DB::table('events')->orderBy('id', 'asc')->get();
        for ($i = 0; $i < count($tickets); $i++){
            $tickets[$i]->event_name = $events_original[$tickets[$i]->event_id - 1]->name;
            $tickets[$i]->totp_key = $events_original[$tickets[$i]->event_id - 1]->totp_key;
            $tickets[$i]->attendance_opened = $events_original[$tickets[$i]->event_id - 1]->attendance_opened;
            $tickets[$i]->attendance_is_exit = $events_original[$tickets[$i]->event_id - 1]->attendance_is_exit;
            $tickets[$i]->url_link = $events_original[$tickets[$i]->event_id - 1]->url_link;
        }
    ?>
    <!-- Your Tickets -->
    <h1 class="full-underline {{session('status') ? 'content-divider' : ''}}">Your Tickets</h1>
    @if (count($tickets) > 0)
        <table class="table margin-0 content-divider-short">
            <thead>
                <tr>
                    <th scope="col">Req. ID</th>
                    <th scope="col">Event</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $list)
                    <tr>
                        <th scope="row">{{$list->id}}</th>
                        <td>
                            <b>{{$list->event_name}}</b>
                            @if ($list->team_id != null && $list->team_id > 0)
                            <br>
                            <b>Team:</b> {{DB::table("teams")->where("id", $list->team_id)->first()->name}} ({{$list->team_id}})
                            @endif
                            @if ($list->remarks != null && $list->remarks != "")
                            <br>
                            {{$list->remarks}}
                            @endif
                        </td>
                        <td>
                            @switch ($list->status)
                                @case (0)
                                    Pending
                                    @break
                                @case (1)
                                    Rejected
                                    @break
                                @case (2)
                                    Approved
                                    @break
                                @case (3)
                                    Cancelled
                                    @break
                                @case (4)
                                    Attending
                                    @break
                                @case (5)
                                    Attended
                                    @break
                                @default
                                    Unknown
                            @endswitch
                             {{-- ({{$list->status}}) --}}
                             <br>
                             <b>Payment Code:</b><br>
                             {{$list->payment_code}}
                        </td>
                        <td>
                            @foreach ($events as $item)
                                @if ($item->attendance_opened == 1 && $list->event_id == $item->id)
                                    <a class="btn no-minimum-width margin-0" href="/cp/{{$list->team_id}}">
                                        @component('components.bootstrap-icons', ['icon' => 'journal-text', 'size' => 30])
                                        @endcomponent
                                    </a>
                                @endif
                            @endforeach
                            <a class="btn no-minimum-width margin-0" href="/pay/{{$list->payment_code}}">
                                @component('components.bootstrap-icons', ['icon' => 'cloud-arrow-up', 'size' => 30])
                                @endcomponent
                            </a>
                            {{-- @if ($list->attendance_opened && $list->status >= 2)
                                @if ($list->attendance_is_exit)
                                    <a class="btn button no-minimum-width button-gradient button-small margin-0" data-toggle="modal" href="" data-target="#joinEvent" role="button" onClick="setEventModalData({{$list->event_id}},'{{$list->url_link}}')">Join Event</a>
                                @else
                                    <form action="/attendance/{{$list->event_id}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ticketnumber" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="nim" value="{{Auth::user()->nim}}">
                                        <input type="hidden" name="event-token" value="{{$list->totp_key}}">
                                        <button class="btn button no-minimum-width button-gradient button-small margin-0" action="submit">Join Event</button>
                                    </form>
                                @endif
                            @endif --}}
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="placeholder-sponsors content-divider-short text-center">
            <h2 class="font-800">No Tickets Found.</h2>
            <p class="h5">You can register to events via the <b>Register</b> button.</p>
        </div>
    @endif
    <div class="text-center">
        <a class="btn button button-gradient" data-toggle="modal" href="#" data-target="#register" role="button">Register</a>
    </div>

    <!-- Your Teams -->
    {{-- <h1 class="full-underline content-divider">Your Teams</h1>
    @if (count($tickets) > 0))
        <table class="table margin-0 content-divider-short">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Event</th>
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $list)
                    <tr>
                        <th scope="row">{{$list->id}}</th>
                        <td>{{$list->event_name}}</td>
                        <td>{{$list->status}}</td>
                        <td>
                            @if ($list->attendance_opened && $list->status_code >= 2)
                                @if ($list->attendance_is_exit)
                                    <a class="btn button no-minimum-width button-gradient button-small margin-0" data-toggle="modal" href="" data-target="#joinEvent" role="button" onClick="setEventModalData({{$list->event_id}},'{{$list->url_link}}')">Join Event</a>
                                @else
                                    <form action="/attendance/{{$list->event_id}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ticketnumber" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="nim" value="{{Auth::user()->nim}}">
                                        <input type="hidden" name="event-token" value="{{$list->totp_key}}">
                                        <button class="btn button no-minimum-width button-gradient button-small margin-0" action="submit">Join Event</button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="placeholder-sponsors content-divider-short text-center">
            <h2 class="font-800">No Teams Found.</h2>
            <p class="h5"><b>Teams are currently available for Business-IT and Mini E-Sport Competitions.</b> If you have registered for one or more, please wait until we approve your registration.</p>
        </div>
    @endif --}}
</div>

<!-- Profile Settings Form -->
<form class="modal" tabindex="-1" role="dialog" id="accountSettings" action="/changeaccountdetails" method="POST">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Profile Settings</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h3 class="full-underline">Account Details</h3>
            <div class="card content-divider-short">
                <div class="card-body">
                    <h3><b>{{Auth::user()->name}}</b></h3>
                    <h6>{{DB::table('universities')->where('id', Auth::user()->university_id)->first()->name}}</h6>
                    <ul>
                        <li><b>Participant Type:</b>
                            @if (Auth::user()->university_id < 2 || Auth::user()->university_id > 4)
                                Non
                            @endif
                            Binusian</li>
                        <li><b>User ID:</b> {{Auth::user()->id}}</li>
                        @if (Auth::user()->university_id > 1 && Auth::user()->university_id < 5)
                            <li><b>NIM:</b> {{Auth::user()->nim}}</li>
                        @endif
                    </ul>
                    <div class="alert alert-warning" role="alert">
                        Please reach our <a href="/contact">Contact Person</a> if your name
                        @if (Auth::user()->university_id > 1 && Auth::user()->university_id < 5)
                            and NIM
                        @endif
                        has been mistakenly inputted
                    </div>
                </div>
            </div>
            <h3 class="full-underline content-divider-short">Contact Settings</h3>
            <div class="card content-divider-short">
                <div class="card-body">
                    <div class="form-group">
                        <label for="action-change-phone">Change Phone Number</label>
                        <input type="tel" class="form-control" name="action-change-phone" id="action-change-phone" autocomplete="tel" placeholder="{{Auth::user()->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="action-change-line">Change LINE contact (ID or Phone Number, Optional)</label>
                        <div class="input-group mb-3">
                        <input type="number" class="form-control" name="action-change-line" id="action-change-line" autocomplete="tel" placeholder="{{Auth::user()->line}}">
                            <div class="input-group-append">
                                <a onClick="phoneNumberAutofill('action-change-line')" class="btn btn-success text-white">Copy from Phone</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="action-change-whatsapp">Change WhatsApp phone number (Optional)</label>
                        <div class="input-group mb-3">
                        <input type="number" class="form-control" name="action-change-whatsapp" id="action-change-whatsapp" autocomplete="tel" placeholder="{{Auth::user()->whatsapp}}">
                            <div class="input-group-append">
                                <a onClick="phoneNumberAutofill('action-change-whatsapp')" class="btn btn-success text-white">Copy from Phone</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="full-underline content-divider-short">Game Account Details</h3>
            <div class="card content-divider-short">
                <div class="card-body">
                    <div class="form-group">
                        <label for="action-change-id_mobile_legends">Mobile Legends Account ID</label>
                        <input type="text" class="form-control" name="action-change-id_mobile_legends" id="action-change-id_mobile_legends" placeholder="{{Auth::user()->id_mobile_legends}}">
                    </div>
                    <div class="form-group">
                        <label for="action-change-id_pubg_mobile">PUBG Mobile Account ID</label>
                        <input type="text" class="form-control" name="action-change-id_pubg_mobile" id="action-change-id_pubg_mobile" placeholder="{{Auth::user()->id_pubg_mobile}}">
                    </div>
                    <div class="form-group">
                        <label for="action-change-id_valorant">Valorant Account ID</label>
                        <input type="text" class="form-control" name="action-change-id_valorant" id="action-change-id_valorant" placeholder="{{Auth::user()->id_valorant}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="button button-small button-gradient-2">Save Changes</button>
          <button type="button" class="btn button button-small" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</form>

<!-- Registration Form -->
<form class="modal" tabindex="-1" role="dialog" id="register" action="/registerevent" method="POST">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h3 class="full-underline">Select Event</h3>
            <div class="card content-divider-short">
                <div class="card-body">
                    <div class="form-group">
                        <label for="event_id">Event Name</label>
                        <select class="form-control" name="event_id" id="event_id" onChange="loadEventDetails()">
                            @foreach ($events as $event)
                                @if ($event->opened == true)
                                    <option value="{{$event->id}}" {{ old('event_id') == $event->id ? 'selected' : '' }}>{{$event->name}}</option>
                                @else
                                    <option>[CLOSED] {{$event->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div id="registration-details"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</form>

<form class="modal" tabindex="-1" role="dialog" id="joinEvent" action="" method="POST">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Join Event</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card mb-3">
                  <h5 class="card-header"><span class="badge badge-info">1</span> Enter the Event Token</h5>
                  <div class="card-body">
                      <p>
                          You will be given an <b>Event Token</b> during the event to record your attendance. Please enter the token below.
                      </p>
                      <div class="form-group">
                          <label for="event-token">Event Token</label>
                          <input type="tel" class="form-control" name="event-token" id="event-token">
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
</form>

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
            document.getElementById("submit-validation").innerHTML = '<div class="text-center"><b class="red-text">By registering to this competition, you agree to our rules and regulations.<br></b><button type="submit" class="button button-gradient content-divider-short">Submit</button></div>';
        }
    }
</script>
@endsection
