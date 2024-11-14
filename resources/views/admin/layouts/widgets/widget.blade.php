<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#students" id="btn-students" class="btn custom-widget-btn" onclick="showSidebar('sidebar-students')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/audience.png') }}" alt="students" />
            </div>
            <span>students</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#classes" id="btn-classes" class="btn custom-widget-btn" onclick="showSidebar('sidebar-classes')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/class.png') }}" alt="classes" />
            </div>
            <span>classes</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#teachers" id="btn-teachers" class="btn custom-widget-btn" onclick="showSidebar('sidebar-teachers')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/teacher.png') }}" alt="teachers" />
            </div>
            <span>teachers</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#classteachers" id="btn-class-teachers" class="btn custom-widget-btn" onclick="showSidebar('sidebar-class-teachers')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/teacher.png') }}" alt="teachers" />
            </div>
            <span>Class Teachers</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#timetable" id="btn-timetable" class="btn custom-widget-btn" onclick="showSidebar('sidebar-timetable')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/timetable.png') }}" alt="timetable" />
            </div>
            <span>timetable</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#games" id="btn-games" class="btn custom-widget-btn" onclick="showSidebar('sidebar-games')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/timetable.png') }}" alt="games" />
            </div>
            <span>School Games</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#user-results" id="btn-user-results" class="btn custom-widget-btn" onclick="showSidebar('sidebar-results')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/stadistics.png') }}" alt="results" />
            </div>
            <span>Marks & Results</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#communication" id="btn-communication" class="btn custom-widget-btn" onclick="showSidebar('sidebar-communication')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/chat-bubble.png') }}" alt="Communication" />
            </div>
            <span>Parent Communication</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#system-settings" id="btn-system-settings" class="btn custom-widget-btn" onclick="showSidebar('sidebar-system-settings')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/gear.png') }}" alt="System Settings" />
            </div>
            <span>System Settings</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#reports" id="btn-reports" class="btn custom-widget-btn" onclick="showSidebar('sidebar-reports')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/report.png') }}" alt="Reports" />
            </div>
            <span>Reports</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#my-profile" id="btn-my-profile" class="btn custom-widget-btn" onclick="showSidebar('sidebar-profile')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/user.png') }}" alt="My Profile" />
            </div>
            <span>My Profile</span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#my-attendance" id="btn-my-attendance" class="btn custom-widget-btn" onclick="showSidebar('sidebar-attendance')">
            <div class="icon-container">
                <img src="{{ asset('images/widgets/check.png') }}" alt="attendance" />
            </div>
            <span>Attendance Tracking</span>
        </a>
    </div>
</div>

<style>
    .custom-widget-btn {
        background-color: #ffffff;
        color: #333;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 0.85em;
        height: 120px; 
        width: 90%; 
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px; 
    }
    span{
        font-weight: bold;
    }

    .custom-widget-btn img {
        margin-bottom: 5px;
        width: 3.5em; /* Adjust as needed */
        height: auto; /* Maintain aspect ratio */
    }

    .custom-widget-btn:hover {
        background-color: #f0f0f0;
        border-color: #aaa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transform: translateY(-2px);
    }
</style>
