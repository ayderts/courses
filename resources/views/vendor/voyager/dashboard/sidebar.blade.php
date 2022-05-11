<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header" style="background-color: #22A7F0">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <img src="/voyager-assets/images/logo-icon-light.png" alt="Logo Icon">
                    </div>
{{--                    <img src="/voyager-assets/images/Rocket_Drive.png" alt="Logo Icon">--}}
                    <div class="title">{{ Voyager::setting('admin.title', 'BI UNIVERSITY') }}</div>
                </a>
            </div>
        </div>
        <div id="adminmenu">
            <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
        </div>
    </nav>
</div>
