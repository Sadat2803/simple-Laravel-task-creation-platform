@inject('request', 'Illuminate\Http\Request')
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            @if(!Auth::user()->isAdmin())
                @if(Auth::user()->department->location =="local")
                    <li class="{{ $request->segment(1) == 'requests' ? 'active' : '' }}">
                        <a href="{{route('requests')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                 height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M16 17l5-5-5-5M19.8 12H9M10 3H4v18h6"
                                        fill="#373870"/>
                                </g>
                            </svg>
                            <span class="title">Demandes de travail</span>
                        </a>
                    </li>
                @else
                    <li class="{{ $request->segment(1) == 'user_request' ? 'active' : '' }}">
                        <a href="{{route('userRequests')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                 height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M16 17l5-5-5-5M19.8 12H9M10 3H4v18h6"
                                        fill="#373870"/>
                                </g>
                            </svg>
                            <span class="title">Mes demandes envoyées</span>
                        </a>
                    </li>
                @endif
                    @if(Auth::user()->department->location =="local")
                        <li class="{{ $request->segment(1) == 'userProcessingRequests' ? 'active' : '' }}">
                            <a href="{{route('userProcessingRequests')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                     height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path
                                            d="M16 17l5-5-5-5M19.8 12H9M10 3H4v18h6"
                                            fill="#373870"/>
                                    </g>
                                </svg>
                                <span class="title">Mes travaux en cours</span>
                            </a>
                        </li>
                    @endif
                    <li class="{{ $request->segment(1) == 'chat' ? 'active' : '' }}">
                        <a target="_blank" href="{{route('chat')}}" >
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                 height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path
                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                        fill="#373870" fill-rule="nonzero" opacity="0.3"/>
                                    <path
                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                        fill="#373870" fill-rule="nonzero"/>
                                </g>
                            </svg>
                            <span class="title">Discussions demandes</span>
                        </a>
                    </li>
            @else
                <li class="{{ $request->segment(1) == 'users' ? 'active' : '' }}">
                    <a href="{{route('users')}}" onclick="$('#logout').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path
                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                    fill="#373870" fill-rule="nonzero" opacity="0.3"/>
                                <path
                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                    fill="#373870" fill-rule="nonzero"/>
                            </g>
                        </svg>
                        <span class="title">Utilisateurs</span>
                    </a>
                </li>
            @endif



            <li>
                <a href="#" onclick="$('#logoutForm').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                         height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path
                                d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z"
                                fill="#373870" fill-rule="nonzero"/>
                            <rect fill="#373870" opacity="0.3" x="11" y="3" width="2" height="10" rx="1"/>
                        </g>
                    </svg>
                    <span class="title">Déconnexion</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
<script>
    function logout()
    {

    }
</script>
