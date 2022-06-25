<div id="sidebar">
    <nav>
        <div class="title-cell">NAVIGATION</div>

        <div class="link-cell home">
            <a class="selected">
                <i class='bx bx-home-alt'><span>Dashboard</span></i>

                <div class="notify-box"><span>{{\App\Models\Assignment::getCountExpired()}}</span></div>
            </a>
            <a class="item-dropdown" href="{{route('home')}}">
                <span>Analytics</span>
            </a>
            <a class="item-dropdown" href="#">
                <span>Assignments</span>
            </a>
            <a class="item-dropdown" href="#">
                <span>Analytics</span>
            </a>
        </div>
        <hr>
        <div class="title-cell">APPS</div>

        <div class="link-cell">
            <a href="#">
                <i class='bx bx-calendar-alt'><span>Calendar</span></i>
                <i class='bx bx-chevron-right'></i>
            </a>
        </div>
        <div class="link-cell">
            <a href="#">
                <i class='bx bx-conversation'><span>Chat</span></i>
                <i class='bx bx-chevron-right'></i>
            </a>
        </div>
        <div class="link-cell">
            <a href="#">
                <i class='bx bx-envelope'><span>Email</span></i>
                <i class='bx bx-chevron-right'></i>
            </a>
        </div>
        <div class="link-cell">
            <a href="#">
                <i class='bx bxs-briefcase'><span>Projects</span></i>
                <i class='bx bx-chevron-right'></i>
            </a>
        </div>
        <div class="link-cell">
            <a href="#">
                <i class='bx bx-rss'><span>Social Feed</span></i>
                <i class='bx bx-chevron-right'></i>
            </a>
        </div>
        <hr>
        <div class="title-cell">CUSTOM</div>
        <form method="GET" action="{{route('assignment.index')}}">
            <div class="link-cell">
                <a href="{{route('assignment.index')}}">
                    <i class='bx bx-check-square'><span>Assignments</span></i>
                    <i class='bx bx-chevron-right'></i>
                </a>
                <div class="circle assignment-color">
                    <i class='bx bxs-circle'><span>Finished</span></i>
                    <input id="finished" name="finished" type="checkbox" class="form-check-input">
                </div>
                <div class="circle assignment-color">
                    <i class='bx bxs-circle'><span>In Progress</span></i>
                    <input id="progress" name="progress" type="checkbox" class="form-check-input">
                </div>
                <div class="circle assignment-color">
                    <i class='bx bxs-circle'><span>Created</span></i>
                    <input id="created" name="created" type="checkbox" class="form-check-input">
                </div>
                <div class="circle assignment-color">
                    <i class='bx bxs-circle'><span>Expired</span></i>
                    <input id="expired" name="expired" type="checkbox" class="form-check-input">
                </div>
                <div class="circle search">
                    <i class='bx bx-search'><span>Search</span></i>
                    <button type="submit"><i class='bx bx-chevrons-right search-assignment'></i></button>
                </div>
                <hr>
            </div>
        </form>
        <div class="link-cell">
            <a href="#">
                <i class='bx bx-windows'><span>Last Posts</span></i>
                <i class='bx bx-chevron-right'></i>
            </a>
            <a class="circle">
                <i class='bx bxs-circle'><span>Post Name 1</span></i>
            </a>
            <a class="circle">
                <i class='bx bxs-circle'><span>Post Name 2</span></i>
            </a>
            <a class="circle">
                <i class='bx bxs-circle'><span>Post Name 3</span></i>
            </a>
        </div>
        <hr>
        <div class="title-cell">CONFIG</div>
        <div class="link-cell">
            <a href="{{route('user.show',['user'=>\Illuminate\Support\Facades\Auth::user()->id])}}">
                <i class='bx bx-user'><span>Profile</span></i>
                <i class='bx bx-chevron-right'></i>
            </a>
        </div>
        <div class="link-cell">
            <div id="dark-mode" class="dark-mode">
                <i class='bx bxs-moon'><span>Dark Mode</span></i>
                <div class="form-check form-switch">
                    <input onclick="darkMode()" type="checkbox" class="form-check-input" role="switch"
                           id="flexSwitchCheckDefault">
                </div>
            </div>
        </div>
        <hr>
        <div class="title-cell">ADMIN</div>
        <div class="link-cell">
            <a href="#">
                <i class='bx bx-captions'><span>Change Title Page</span></i>
            </a>
            <a class="circle search">
                <i class='bx bx-search'><span>Set...</span></i>
            </a>
        </div>
    </nav>
</div>
