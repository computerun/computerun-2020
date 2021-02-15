@component('mail::message')
Hello **{{$data["name"]}}**,
Thank you for registering to our COMPUTERUN 2020 {{$data["event_name"]}}!

You are recently being added by **{{$data["team_leader_name"]}}** ({{$data["team_leader_email"]}}) as **{{$data["role"]}}** for **{{$data["event_name"]}}**.

@component('mail::panel')
+ **Team ID:** {{$data["team_id"]}}
+ **Team Name:** {{$data["team_name"]}}
@endcomponent

If you think this is a mistake or an abuse, please let us know by replying to this message. Thank you for your attention.

@component('mail::panel')
### Notice

If you are registering for **Business-IT Case** and/or **Mobile Application Development** competitions, you will be required to send a copy of **University Student ID Card (Kartu Tanda Mahasiswa / KTM)** and **Screenshot of Twibbon Upload on Instagram Feeds (all members)** for further verification. Please collect these documents to your team leaders for submission.

<img src="https://computerun.id/docs/Verifikasi KTM.jpg" alt="Instructions can be found on https://computerun.id/docs/Verifikasi%20KTM.jpg">
@endcomponent

Sincerely,
COMPUTERUN 2020.
@endcomponent
