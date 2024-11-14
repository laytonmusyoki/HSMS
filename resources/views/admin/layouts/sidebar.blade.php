<aside class="sidebar-wrapper">
  <div class="sidebar-header">
    <div class="logo-icon">
      <img src="/assets/images/logo-icon.png" class="logo-img" alt="">
    </div>
    <div class="logo-name flex-grow-1">
      <h5 class="mb-0">HSMS</h5>
    </div>
    <div class="sidebar-close">
      <span class="material-icons-outlined">close</span>
    </div>
  </div>
  <div class="sidebar-nav" data-simplebar="true">
    
      <!--navigation-->
      
      <ul class="metismenu" id="sidenav">
        <li class="active">
          <a href="{{ route('admin.dashboard') }}">
              <div class="parent-icon"><i class="material-icons-outlined">dashboard</i></div>
              <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li class="sidebar-section" id="sidebar-students" style="display: none">
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
            </div>
            <div class="menu-title">Students</div>
          </a>
          <ul>
            <li><a href="{{ route('admin.students') }}"><i class="material-icons-outlined">arrow_right</i>All students</a>
            </li>
            <li><a href="widgets-advance.html"><i class="material-icons-outlined">arrow_right</i>Advance</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-section" id="sidebar-classes" style="display: none">
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">class</i>
            </div>
            <div class="menu-title">Classes</div>
          </a>
          <ul>      
            <li><a href="{{ route('admin.subjects') }}"><i class="material-icons-outlined">arrow_right</i>Manage Class Subjects</a>
            </li>
            <li><a href="{{ route('admin.myClasses') }}"><i class="material-icons-outlined">arrow_right</i>My Classes</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-section" id="sidebar-teachers" style="display: none">
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
            </div>
            <div class="menu-title">Teachers</div>
          </a>
          <ul>
            <li><a href="{{ route('admin.teachers') }}"><i class="material-icons-outlined">arrow_right</i>Manage Teachers</a>
            </li>       
            <li><a href="{{ route('admin.teacher.departments') }}"><i class="material-icons-outlined">arrow_right</i>Departments</a>
            </li>
            <li><a href="component-cards-contact.html"><i class="material-icons-outlined">arrow_right</i>Contacts</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-section" id="sidebar-class-teachers" style="display: none">
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">class</i>
            </div>
            <div class="menu-title">Class Teachers</div>
          </a>
          <ul>
            <li><a href="{{ route('admin.classes') }}"><i class="material-icons-outlined">arrow_right</i>teachers</a>
            </li>       
            <li><a href="{{ route('admin.stream') }}"><i class="material-icons-outlined">arrow_right</i>My class</a>
            </li>
            <li><a href="{{ route('admin.myStudents') }}"><i class="material-icons-outlined">arrow_right</i>My Students</a>
            </li>
          </ul>
        </li>
        
        <li class="sidebar-section" id="sidebar-timetable" style="display: none">
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">card_giftcard</i>
            </div>
            <div class="menu-title">Timetable</div>
          </a>
          <ul>
            <li><a href="component-alerts.html"><i class="material-icons-outlined">arrow_right</i>Alerts</a>
            </li>
            <li><a href="component-accordions.html"><i class="material-icons-outlined">arrow_right</i>Accordions</a>
            </li>
            <li><a href="component-badges.html"><i class="material-icons-outlined">arrow_right</i>Badges</a>
            </li>
            <li><a href="component-buttons.html"><i class="material-icons-outlined">arrow_right</i>Buttons</a>
            </li>
            <li><a href="component-carousels.html"><i class="material-icons-outlined">arrow_right</i>Carousels</a>
            </li>
            <li><a href="component-media-object.html"><i class="material-icons-outlined">arrow_right</i>Media
                Objects</a>
            </li>
            <li><a href="component-modals.html"><i class="material-icons-outlined">arrow_right</i>Modals</a>
            </li>
            <li><a href="component-navs-tabs.html"><i class="material-icons-outlined">arrow_right</i>Navs & Tabs</a>
            </li>
            <li><a href="component-navbar.html"><i class="material-icons-outlined">arrow_right</i>Navbar</a>
            </li>
            <li><a href="component-paginations.html"><i class="material-icons-outlined">arrow_right</i>Pagination</a>
            </li>
            <li><a href="component-popovers-tooltips.html"><i class="material-icons-outlined">arrow_right</i>Popovers
                & Tooltips</a>    
            </li>
            <li><a href="component-progress-bars.html"><i class="material-icons-outlined">arrow_right</i>Progress</a>
            </li>
            <li><a href="component-spinners.html"><i class="material-icons-outlined">arrow_right</i>Spinners</a>
            </li>
            <li><a href="component-notifications.html"><i
                  class="material-icons-outlined">arrow_right</i>Notifications</a>
            </li>
            <li><a href="component-avtars-chips.html"><i class="material-icons-outlined">arrow_right</i>Avatrs &
                Chips</a>
            </li>
            <li><a href="component-typography.html"><i class="material-icons-outlined">arrow_right</i>Typography</a>
             </li>
             <li><a href="component-text-utilities.html"><i class="material-icons-outlined">arrow_right</i>Utilities</a>
             </li>
          </ul>
        </li>
        <li class="sidebar-section" id="sidebar-results" style="display: none">
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">view_agenda</i>
            </div>
            <div class="menu-title">Marks and Results</div>
          </a>
          <ul>
            <li><a href="icons-line-icons.html"><i class="material-icons-outlined">arrow_right</i>Line Icons</a>
            </li>
            <li><a href="icons-boxicons.html"><i class="material-icons-outlined">arrow_right</i>Boxicons</a>
            </li>
            <li><a href="icons-feather-icons.html"><i class="material-icons-outlined">arrow_right</i>Feather
                Icons</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-section" id="sidebar-games" style="display: none">
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">api</i>
            </div>
            <div class="menu-title">Inter-Class Games</div>
          </a>
          <ul>
            <li><a href="table-basic-table.html"><i class="material-icons-outlined">arrow_right</i>Basic Table</a>
            </li>
            <li><a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Data Table</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-section" id="sidebar-communication" style="display: none">
          <a href="javascrpt:;">
            <div class="parent-icon"><i class="material-icons-outlined">support</i>
            </div>
            <div class="menu-title">Parent Communication</div>
          </a>
        </li>
        <li class="sidebar-section" id="sidebar-attendance" style="display: none">
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">apps</i>
            </div>
            <div class="menu-title">Attendance Tracking</div>
          </a>
          <ul>
            <li><a href="app-fullcalender.html"><i class="material-icons-outlined">arrow_right</i>Calendar</a>
            </li>
            <li><a href="app-to-do.html"><i class="material-icons-outlined">arrow_right</i>To do</a>
            </li>
            <li><a href="app-invoice.html"><i class="material-icons-outlined">arrow_right</i>Invoice</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-section" id="sidebar-system-settings" style="display: none">
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">settings</i>
            </div>
            <div class="menu-title">System Setting</div>
          </a>
          <ul>
            <li><a href="{{ route('admin.users') }}"><i class="material-icons-outlined">arrow_right</i>Users <span class="badge bg-info ml-2">{{ \App\Models\User::count() }}</span></a></a>
            </li>
            <li><a href="{{ route('admin.roles') }}"><i class="material-icons-outlined">arrow_right</i>Roles</a>
            </li>
            <li><a href="{{ route('admin.permissions') }}"><i class="material-icons-outlined">arrow_right</i>Permissions</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-section" id="sidebar-profile" style="display: none">
          <a href="user-profile.html">
            <div class="parent-icon"><i class="material-icons-outlined">person</i>
            </div>
            <div class="menu-title">User Profile</div>
          </a>
        </li>
       </ul>
      <!--end navigation-->
  </div>
  <div class="sidebar-bottom gap-4">
      <div class="dark-mode">
        <a href="javascript:;" class="footer-icon dark-mode-icon">
          <i class="material-icons-outlined">dark_mode</i>  
        </a>
      </div>
      <div class="dropdown dropup-center dropup dropdown-laungauge">
        <a class="dropdown-toggle dropdown-toggle-nocaret footer-icon" href="avascript:;" data-bs-toggle="dropdown"><img src="/assets/images/county/02.png" width="22" alt="">
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="/assets/images/county/01.png" width="20" alt=""><span class="ms-2">English</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="/assets/images/county/02.png" width="20" alt=""><span class="ms-2">Catalan</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="/assets/images/county/03.png" width="20" alt=""><span class="ms-2">French</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="/assets/images/county/04.png" width="20" alt=""><span class="ms-2">Belize</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="/assets/images/county/05.png" width="20" alt=""><span class="ms-2">Colombia</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="/assets/images/county/06.png" width="20" alt=""><span class="ms-2">Spanish</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="/assets/images/county/07.png" width="20" alt=""><span class="ms-2">Georgian</span></a>
          </li>
          <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="/assets/images/county/08.png" width="20" alt=""><span class="ms-2">Hindi</span></a>
          </li>
        </ul>
      </div>
      <div class="dropdown dropup-center dropup dropdown-help">
        <a class="footer-icon  dropdown-toggle dropdown-toggle-nocaret option" href="javascript:;"
          data-bs-toggle="dropdown" aria-expanded="false">
          <span class="material-icons-outlined">
            info
          </span>
        </a>
        <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
          <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                class="material-icons-outlined fs-6">inventory_2</i>Archive All</a></div>
          <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                class="material-icons-outlined fs-6">done_all</i>Mark all as read</a></div>
          <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                class="material-icons-outlined fs-6">mic_off</i>Disable Notifications</a></div>
          <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                class="material-icons-outlined fs-6">grade</i>What's new ?</a></div>
          <div>
            <hr class="dropdown-divider">
          </div>
          <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                class="material-icons-outlined fs-6">leaderboard</i>Reports</a></div>
        </div>
      </div>

  </div>
</aside>