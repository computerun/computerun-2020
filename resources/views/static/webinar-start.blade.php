<!DOCTYPE html>
<html>
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @component("components.meta")
        @endcomponent
    </head>
    <body>
        <div class="container-2 content-top bg-event">
            @component("components.navbar")
            @endcomponent
            @component("components.navbar-mobile", ['template' => 'event-details'])
            @endcomponent
            <div class="margin-2 text-center content-divider">
                <h3>WELCOME TO</h3>
                <h1 class="gradient-text display-2 font-800">Webinar</h1>
                <h3>{{ $data->name }}</h3>
            </div>
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
            <div class="margin-2 content-divider">
                <div class="notice">
                    <p class="h4 font-800">Your Personal Information</p>
                    <div>
                        <span class="h5"><b>IMPORTANT: Please ensure your data below is correct and filled</b></span>
                        <ul>
                            <li><b>Your Name:</b> {{ Auth::user()->name ?? '' }}</li>
                            <li><b>Your University:</b> {{ DB::table('universities')->where('id', Auth::user()->university_id)->first()->name ?? '' }}</li>
                            @if (Auth::user()->university_id > 1 && Auth::user()->university_id < 5)
                                <li><b>Your NIM (For Binusian):</b> {{ Auth::user()->nim ?? '' }}</li>
                            @endif
                            <li><b>Your Major (e.g. Computer Science / Information Systems):</b> {{ Auth::user()->major ?? '' }}</li>
                        </ul>
                        <button type="button" class="btn button button-gradient" data-bs-toggle="modal" data-bs-target="#editProfile">
                            Edit Profile
                        </button>
                        <a href="{{$data->url_link ?? ''}}" target="_blank" class="button button-gradient">Continue to Zoom &gt;</a>
                        <br><br>
                        <div class="alert alert-warning" role="alert">
                            <b>Server Time: </b>{{ \Carbon\Carbon::now() }} WIB<br>
                            <b>Event Time: </b>{{ $data->date }} WIB
                            <br>
                            <b>You can submit your attendance when the event is started.</b>
                        </div>
                        @if($attendance != null)
                            <div class="alert alert-warning" role="alert">
                                <span class="h5"> <b>Status</b> </span>
                                <ul>
                                    <li>
                                        <b>Entry Attendance Time:</b> {{ $attendance->entry_timestamp }}
                                    </li>
                                    <li>
                                        <b>Exit Attendance Time:</b> {{ $attendance->exit_timestamp }}
                                    </li>
                                    <li>
                                        <b>Req ID:</b> {{ $attendance->registration_id }}
                                    </li>
                                </ul>
                                <b>IMPORTANT: Please take a screenshot of this card</b> as an evidence of your attendance.
                            </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="type" value="2">
                            <input type="hidden" name="registration_id" value="{{ $data->id }}">
                            <button id="entrance-absen-btn" type="submit" class="btn button button-gradient" onclick="this.form.submit(); this.setAttribute('disabled','disabled')" disabled>
                                Entry Attendance
                            </button>
                        </form>
                        <button id="exit-absen-btn" type="button" class="btn button button-gradient" data-bs-toggle="modal" data-bs-target="#exitAttendance" disabled>
                            Exit Attendance
                        </button>
                        <form class="modal fade" tabindex="-1" role="dialog" id="exitAttendance" action="" method="post">
                            @csrf
                            <input type="hidden" name="type" value="3">
                            <input type="hidden" name="registration_id" value="{{ $data->id }}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="color: black">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Exit Attendance</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <p>Please enter the <b>Attendance Token</b> to record your attendance, as given during the event.</p>
                                                <p>Masukkan <b>Attendance Token</b> yang telah dibagikan panitia untuk mencatat kehadiran Anda.</p>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="event_token" id="event_token" placeholder="Attendance Token (e.g. 123456)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="button button-small button-gradient-2">Submit</button>
                                        <button type="button" class="btn button button-small" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form class="modal fade" tabindex="-1" role="dialog" id="editProfile" action="" method="POST">
                            @csrf
                            <input type="hidden" name="type" id="type" value="1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="color: black">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Profile Settings</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h3 class="full-underline">Account Details</h3>
                                        <div class="card content-divider-short">
                                            <div class="card-body">
                                                <h3><b>{{Auth::user()->name}}</b></h3>
                                                <h6>{{DB::table('universities')->where('id', Auth::user()->university_id)->first()->name}}</h6>
                                                <b>Participant Type:</b>
                                                @if (Auth::user()->university_id < 2 || Auth::user()->university_id > 4)
                                                    Non
                                                @endif
                                                Binusian
                                                @if (Auth::user()->university_id > 1 && Auth::user()->university_id < 5)
                                                    <br>
                                                    <label for="action-change-phone"><b>NIM:</b></label>
                                                    <input type="text" class="form-control" name="nim" id="nim" placeholder="{{Auth::user()->nim}}" value="{{Auth::user()->nim}}">
                                                @endif
                                                <br>
                                                <label for="action-change-phone"><b>Major:</b></label>
                                                <input type="text" class="form-control" name="major" id="major" placeholder="{{Auth::user()->major}}" value="{{Auth::user()->major}}">
                                                <br>
                                                <div class="alert alert-warning" role="alert">
                                                    Please reach our <a href="/contact">Contact Person</a> if your name
                                                    @if (Auth::user()->university_id > 1 && Auth::user()->university_id < 5)
                                                        and NIM
                                                    @endif
                                                    has been mistakenly inputted
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="button button-small button-gradient-2">Save Changes</button>
                                        <button type="button" class="btn button button-small" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
{{--                    <p class="h4 font-800">Your attendance has been recorded.</p>--}}
{{--                    <p>--}}
{{--                        <span class="h5"><b>IMPORTANT: Please take a screenshot of this card</b> as an evidence of your attendance.</span><br>--}}
{{--                        <ul>--}}
{{--                            <li><b>Attendance ID:</b> {{$attendance_id ?? ''}}</li>--}}
{{--                            <li><b>Registration ID:</b> {{$registration_id ?? ''}}</li>--}}
{{--                            <li><b>Event ID:</b> {{$event_id ?? ''}}</li>--}}
{{--                            <li><b>Account ID:</b> {{$account_id ?? ''}}</li>--}}
{{--                            <li><b>Account Name:</b> {{$account_name ?? ''}}</li>--}}
{{--                            <li><b>Attendance Type:</b> {{$attendance_type ?? ''}}</li>--}}
{{--                            <li><b>Attended at:</b> {{$attendance_timestamp ?? ''}} (WIB, UTC+7)</li>--}}
{{--                        </ul>--}}
{{--                    </p>--}}
{{--                    <a href="{{$url_link ?? ''}}" target="_blank" class="button button-gradient">Continue to Zoom &gt;</a>--}}
                </div>
            </div>
        </div>
        <div class="container-1">
            <img class="container-clip" src="/img/backgrounds/2.png">
            <div class="margin-2 after-container-clip">
                <h1 class="full-underline">how to join</h1>
                <div class="card-container content-divider-short">
                    <div class="card image-card">
                        <div>
                            <img src="/img/icons/Zoom Logo.jpg">
                        </div>
                        <div>
                            <span class="h4 font-800">1. Download and Install Zoom</span>
                            <p>Please download <b>Zoom Client for Meetings</b> on your device.<br><br>Other Zoom software (such as Plugins and Extensions) are not required.</p>
                            <a href="https://zoom.us/download" class="button button-gradient">DOWNLOAD</a>
                        </div>
                    </div>
                    <div class="card image-card">
                        <div id="qrcode" style="margin-left: auto; margin-right:auto;"></div>
                        <div class="m-2">
                            <p class="h4 font-800">2. Join the meeting room</p>
                            <p>
                                Scan the QR code above or click below to join at <b>{{$url_link ?? ''}}</b>
                            </p>
                            <a href="{{$data->url_link ?? ''}}" class="button button-gradient" target="_blank">JOIN</a>
                        </div>
                    </div>
                    <div class="card image-card">
                        <div>
                            <img src="/img/icons/Events - Webinar.png">
                        </div>
                        <div>
                            <span class="h4 font-800">3. Enjoy!</span>
                            <p>Please respect to our <b>Rules and Regulations</b> throughout the webinar session.</p>
                        </div>
                    </div>
                </div>
                <div class="content-divider-short" style="visibility: hidden">Lorem Ipsum Dolor Sit Amet</div>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="/img/backgrounds/5.png">
            <h1 class="full-underline after-container-clip">for questions and issues</h1>
            <div class="margin-1 content-divider h5 text-center">
                Please contact us via our LINE Official Account: <a class="font-800" href="https://line.me/R/ti/p/@995bowex" target="_blank">@995bowex</a>
            </div>
            @component ('components.sponsors')
            @endcomponent
            <img class="container-clip for-footer" src="/img/backgrounds/7.png">
        </div>
        @component('components.footer')
        @endcomponent
    </body>
    <script src="/js/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script>
        var payload = "{{$data->url_link}}";
        var qrcode = new QRCode(document.getElementById("qrcode", payload));
        qrcode.makeCode(payload);
    </script>
    <script>
        var isOpen = "{{ \Carbon\Carbon::now() >= $data->date }}"
        var isAttendanceExit = "{{ $data->attendance_is_exit }}"
        if(isAttendanceExit === "1"){
            document.getElementById('exit-absen-btn').removeAttribute('disabled');
        } else {
            document.getElementById('exit-absen-btn').setAttribute('disabled','disabled');
        }

        if(isOpen) document.getElementById('entrance-absen-btn').removeAttribute('disabled');
        else document.getElementById('entrance-absen-btn').setAttribute('disabled','disabled');
    </script>
</html>
