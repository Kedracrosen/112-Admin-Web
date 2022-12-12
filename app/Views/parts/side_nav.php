  <!-- Left Sidenav -->
  <div class="left-sidenav">
            <ul class="metismenu left-sidenav-menu">
                <li <?= $active = ( $page == 'console' ) ? 'class="mm-active"' : ''; ?> >
                    <a href="<?= base_url('console') ?>"><i class="ti-home"></i><span>Dashboard</span></a>
                </li>
                <li <?= $active = ( $page == 'emergencies' ) ? 'class="mm-active"' : ''; ?> >
                    <a href="<?= base_url('console/emergencies') ?>"><i class="ti-heart-broken"></i><span>Emergencies</span></a>
                </li>
                <li <?= $active = ( $page == 'rescue-team' ) ? 'class="mm-active"' : ''; ?> >
                    <a href="<?= base_url('console/rescue_teams') ?>"><i class="ti-shield"></i><span>Rescue Team</span></a>
                </li>
                <li <?= $active = ( $page == 'users' ) ? 'class="mm-active"' : ''; ?> >
                    <a href="<?= base_url('console/users') ?>"><i class="ti-user"></i><span>Users </span></a>
                </li>

                <!-- <li <?= $active = ( $page == 'chat' ) ? 'class="mm-active"' : ''; ?> >
                    <a href="<?= base_url('console/chat') ?>"><i class="ti-user"></i><span>Chat</span></a>
                </li> -->

                <li <?= $active = ( $page == 'log' ) ? 'class="mm-active"' : ''; ?> >
                    <a href="<?= base_url('console/log') ?>"><i class="ti-file"></i><span>Activity Log</span></a>
                </li>
                <li <?= $active = ( $page == 'profile' ) ? 'class="mm-active"' : ''; ?> >
                    <a href="<?= base_url('console/profile') ?>"><i class="ti-user"></i><span>Profile</span></a>
                </li>
            </ul>
        </div>
        <!-- end left-sidenav-->