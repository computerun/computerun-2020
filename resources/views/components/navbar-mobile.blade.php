@if (preg_match('/Mac OS/', app('request')->header('User-Agent')) == 1)
<nav class="navbar-mobile allow-blur {{$is_bootstrap ?? ''}}">
@else
<nav class="navbar-mobile {{$is_bootstrap ?? ''}}">
@endif
    @if (isset($template))
    {{-- For "Event Details" template --}}
        @if (parse_url(app('request')->headers->get('referer'), PHP_URL_HOST) == parse_url(app('request')->url(), PHP_URL_HOST))
            <div class="action-global">
                <a class="navbar-link" onClick="window.history.back()">
                    @component ('components.bootstrap-icons', ['icon' => 'arrow-left-circle', 'size' => 32])
                    @endcomponent
                    {{-- <br>Back --}}
                </a>
            </div>
        @else
            <div class="action-global">
                <a href="/" class="navbar-link">
                    @component ('components.computerun-icon', ['size' => 32])
                    @endcomponent
                    {{-- <br>Home --}}
                </a>
            </div>
        @endif
        @switch ($template)
            @case ("admin-event-details")
                <div>
                    @if (Auth::user()->university_id == 2)
                        <a href="#eventsettings" class="navbar-link">
                            @component ('components.bootstrap-icons', ['icon' => 'gear-wide-connected', 'size' => 32])
                            @endcomponent
                            <br>Settings
                        </a>
                    @endif
                </div>
                <div>
                    <a href="#participants" class="navbar-link">
                        <div class="action-primary">
                            @component ('components.bootstrap-icons', ['icon' => 'person-fill', 'size' => 36])
                            @endcomponent
                            Participants
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#teams" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'people-fill', 'size' => 32])
                        @endcomponent
                        <br>Teams
                    </a>
                </div>
                <div>
                    <a href="#committees" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'person-badge', 'size' => 32])
                        @endcomponent
                        <br>Committees
                    </a>
                </div>
                @break
            @case ("event-details")
                <div>
                    <a href="#rules" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'patch-exclamation', 'size' => 32])
                        @endcomponent
                        {{-- <br>FAQ --}}
                    </a>
                </div>
                <div>
                    @if (isset($event['register']))
                        <a href="{{$event['register']}}" class="navbar-link">
                            <div class="action-primary">
                                @component ('components.bootstrap-icons', ['icon' => 'person-plus-fill', 'size' => 30, 'optical' => 'top'])
                                @endcomponent
                                Register
                            </div>
                        </a>
                    @endif
                </div>
                <div>
                    <a href="/faq" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'patch-question', 'size' => 32])
                        @endcomponent
                        {{-- <br>Rules --}}
                    </a>
                </div>
                <div>
                    <a href="/contact" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'envelope', 'size' => 32])
                        @endcomponent
                        {{-- <br>Contact --}}
                    </a>
                </div>
                @break
            @case ("sponsor-us")
                <div>
                </div>
                <div>
                    <a href="/docs/COMPUTERUN Sponsorship Proposal.pdf" target="_blank" class="navbar-link">
                        <div class="action-primary">
                            @component ('components.bootstrap-icons', ['icon' => 'cloud-download-fill', 'size' => 30])
                            @endcomponent
                            PDF
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#pricing" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'box-seam', 'size' => 32])
                        @endcomponent
                        {{-- <br>Paket --}}
                    </a>
                </div>
                <div>
                    <a href="#contact" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'patch-exclamation', 'size' => 32])
                        @endcomponent
                        {{-- <br>Kontak --}}
                    </a>
                </div>
                @break
            @case ("login-page")
                
                <div>
                    <a onclick="location.reload()" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'arrow-clockwise', 'size' => 32])
                        @endcomponent
                        {{-- <br>Refresh --}}
                    </a>
                </div>
                @break
            @case ("contact-us")
                <div>
                    <a href="/#events" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'calendar-date', 'size' => 30])
                        @endcomponent
                        {{-- <br>Events --}}
                    </a>
                </div>
                <div>
                    <a href="/faq" class="navbar-link">
                        <div class="action-primary">
                            @component ('components.bootstrap-icons', ['icon' => 'patch-question', 'size' => 30, 'optical' => 'top'])
                            @endcomponent
                            FAQ
                        </div>
                    </a>
                </div>
                <div>
                    @if (app('request')->path() == 'contact')
                        <a class="navbar-link selected">
                            @component ('components.bootstrap-icons', ['icon' => 'envelope-fill', 'size' => 32])
                            @endcomponent
                            {{-- <br>Contact --}}
                        </a>
                    @else
                        <a href="/contact" class="navbar-link">
                            @component ('components.bootstrap-icons', ['icon' => 'envelope', 'size' => 32])
                            @endcomponent
                            {{-- <br>Contact --}}
                        </a>
                    @endif
                </div>
                <div>
                    @guest
                        <a href="/home" class="navbar-link">
                            @component ('components.bootstrap-icons', ['icon' => 'box-arrow-in-right', 'size' => 32, 'optical' => 'left'])
                            @endcomponent
                            {{-- <br>Login --}}
                        </a>
                    @else
                        @if (app('request')->path() == 'home')
                            <a class="navbar-link selected">
                                @component ('components.bootstrap-icons', ['icon' => 'person-badge-fill', 'size' => 30])
                                @endcomponent
                                {{-- <br>Profile --}}
                            </a>
                        @else
                            <a href="/login" class="navbar-link">
                                @component ('components.bootstrap-icons', ['icon' => 'person-badge', 'size' => 30])
                                @endcomponent
                                {{-- <br>Profile --}}
                            </a>
                        @endif
                    @endguest
                </div>
                @break
            @case ("faq")
                <div>
                    <a href="/#events" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'calendar-date', 'size' => 30])
                        @endcomponent
                        {{-- <br>Events --}}
                    </a>
                </div>
                <div>
                    <a href="/contact" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'envelope', 'size' => 32])
                        @endcomponent
                        {{-- <br>Contact --}}
                    </a>
                </div>
                <div>
                    @guest
                        <a href="/home" class="navbar-link">
                            @component ('components.bootstrap-icons', ['icon' => 'box-arrow-in-right', 'size' => 32, 'optical' => 'left'])
                            @endcomponent
                            {{-- <br>Login --}}
                        </a>
                    @else
                        @if (app('request')->path() == 'home')
                            <a class="navbar-link selected">
                                @component ('components.bootstrap-icons', ['icon' => 'person-badge-fill', 'size' => 30])
                                @endcomponent
                                {{-- <br>Profile --}}
                            </a>
                        @else
                            <a href="/login" class="navbar-link">
                                @component ('components.bootstrap-icons', ['icon' => 'person-badge', 'size' => 30])
                                @endcomponent
                                {{-- <br>Profile --}}
                            </a>
                        @endif
                    @endguest
                </div>
                @break
            @endswitch
    {{-- For others --}}
    @else
        <div>
            @if (app('request')->path() == '/')
                <a class="navbar-link selected">
                    @component ('components.bootstrap-icons', ['icon' => 'house-fill', 'size' => 30])
                    @endcomponent
                    {{-- <br>Home --}}
                </a>
            @else
                <a href="/" class="navbar-link">
                    @component ('components.bootstrap-icons', ['icon' => 'house', 'size' => 30])
                    @endcomponent
                    {{-- <br>Home --}}
                </a>
            @endif
        </div>
        <div>
            @if (app('request')->path() == '/#events')
                <a class="navbar-link selected">
                    @component ('components.bootstrap-icons', ['icon' => 'calendar-date-fill', 'size' => 30])
                    @endcomponent
                    {{-- <br>Events --}}
                </a>
            @else
                <a href="/#events" class="navbar-link">
                    @component ('components.bootstrap-icons', ['icon' => 'calendar-date', 'size' => 30])
                    @endcomponent
                    {{-- <br>Events --}}
                </a>
            @endif
        </div>
        <div>
            @if (Auth::check() && app('request')->path() == 'home')
            <a class="navbar-link" data-toggle="modal" href="#" data-target="#register" role="button">
            @else
            <a href="/register/0" class="navbar-link">
            @endif
                <div class="action-primary">
                    @component ('components.bootstrap-icons', ['icon' => 'person-plus-fill', 'size' => 30, 'optical' => 'top'])
                    @endcomponent
                    Register
                </div>
            </a>
        </div>
        <div>
            @if (app('request')->path() == 'contact')
                <a class="navbar-link selected">
                    @component ('components.bootstrap-icons', ['icon' => 'envelope-fill', 'size' => 32])
                    @endcomponent
                    {{-- <br>Contact --}}
                </a>
            @else
                <a href="/contact" class="navbar-link">
                    @component ('components.bootstrap-icons', ['icon' => 'envelope', 'size' => 32])
                    @endcomponent
                    {{-- <br>Contact --}}
                </a>
            @endif
        </div>
        <div>
            @guest
                <a href="/home" class="navbar-link">
                    @component ('components.bootstrap-icons', ['icon' => 'box-arrow-in-right', 'size' => 32, 'optical' => 'left'])
                    @endcomponent
                    {{-- <br>Login --}}
                </a>
            @else
                @if (app('request')->path() == 'home')
                    <a class="navbar-link selected">
                        @component ('components.bootstrap-icons', ['icon' => 'person-badge-fill', 'size' => 30])
                        @endcomponent
                        {{-- <br>Profile --}}
                    </a>
                @else
                    <a href="/login" class="navbar-link">
                        @component ('components.bootstrap-icons', ['icon' => 'person-badge', 'size' => 30])
                        @endcomponent
                        {{-- <br>Profile --}}
                    </a>
                @endif
            @endguest
        </div>
    @endif
</nav>
