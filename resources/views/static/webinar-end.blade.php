<!DOCTYPE html>
<html>
    <head>
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
                <h1 class="gradient-text display-2 font-800">THANK YOU!</h1>
                <h3>for attending {{$event_name ?? ''}}</h3>
            </div>
            <div class="margin-2 content-divider">
                <div class="notice">
                    <p class="h4 font-800">Your attendance has been recorded.</p>
                    <p>
                        <span class="h5"><b>IMPORTANT: Please take a screenshot of this card</b> as an evidence of your attendance.</span><br>
                        <ul>
                            <li><b>Attendance ID:</b> {{$attendance_id ?? ''}}</li>
                            <li><b>Registration ID:</b> {{$registration_id ?? ''}}</li>
                            <li><b>Event ID:</b> {{$event_id ?? ''}}</li>
                            <li><b>Account ID:</b> {{$account_id ?? ''}}</li>
                            <li><b>Account Name:</b> {{$account_name ?? ''}}</li>
                            <li><b>Attendance Type:</b> {{$attendance_type ?? ''}}</li>
                            <li><b>Attended at:</b> {{$attendance_timestamp ?? ''}} (WIB/ICT, UTC+7)</li>
                        </ul>
                        Your <b>e-certificate</b> and <b>SAT points</b> may be delivered <b>after</b> the end of COMPUTERUN. Please make sure that your <b>Contact Details</b> are active to allow us to distribute the certificates.
                    </p>
                </div>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="/img/backgrounds/2.png">
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
    <script>
        var payload = "{{$url_link ?? ''}}";
        var qrcode = new QRCode(document.getElementById("qrcode", payload));
        qrcode.makeCode(payload);
    </script>
</html>
