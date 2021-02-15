@extends('layouts.app')

@section('content')
<form class="container" method="POST">
    @csrf
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

    <!-- Users -->
    <h1 class="full-underline {{(session('status') || session('error')) ? 'content-divider' : ''}}" id="participants">All Users</h1>
    @if (count($users) > 0)
        <table class="table margin-0 content-divider-short">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">University</th>
                    @if (Auth::user()->university_id == 2)
                        <th scope="col">Change University</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $list)
                    <tr>
                        <th scope="row">{{$list->id}}</th>
                        <td>
                            {{$list->name}}
                            @if ($list->verified == 1)
                                <span class="dark-blue-text">
                                    @component ('components.bootstrap-icons', ['icon' => 'patch-check-fll', 'size' => 18])
                                    @endcomponent
                                </span>
                            @endif
                        </td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->university_name}}</td>
                        @if (Auth::user()->university_id == 2)
                            <td>
                                <select name="status-{{$list->id}}" id="status-{{$list->id}}">
                                    <option></option>
                                    @foreach($universities as $university)
                                        <option value="{{$university->id}}">{{$university->name}}</option>
                                    @endforeach
                                </select><br><br>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (Auth::user()->university_id == 2)
            <div class="text-center">
                <p class="red-text h5">Make sure that all of the changes are correct!</p>
                <button class="btn button button-gradient" action="submit">Submit</button>
            </div>
        @endif
    @else
        <div class="placeholder-sponsors content-divider-short text-center">
            <h2 class="font-800">No one's registered yet.</h2>
        </div>
    @endif
</form>

<script src="/js/vendor/qrcode.min.js"></script>
{{-- @if (session('register'))
    <script>
        document.getElementById("event_id").value = {{session('register')}};
        $('document').ready(function (){
            $('#register').modal("show");
        })
    </script>
    <?php
        Session::forget("register");
    ?>
@endif --}}
@endsection
