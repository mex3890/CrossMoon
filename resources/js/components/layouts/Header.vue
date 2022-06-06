<template>
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="header">
            <a class="navbar-logo" :href="urlWelcome">
                <img :src="srcLogo" alt="@crossmoon">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul id="ul-links" v-if="parseInt(isAuthenticated)" class="navbar-nav nav-links">
                    <li><a :href="urlHome">Home</a></li>
                    <li><a href="#">Posts</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a :href="urlAssignments">Assignments</a></li>
                </ul>
            </div>
            <!-- Right Side Of Navbar -->
            <ul id="ul-auth" class="navbar-nav collapse navbar-collapse">
                <!-- Authentication Links -->

                <li v-if="!parseInt(isAuthenticated)" class="nav-item">
                    <a class="nav-link" :href="urlLogin">Login</a>
                </li>

                <li v-if="!parseInt(isAuthenticated)" class="nav-item">
                    <a class="nav-link" :href="urlRegister">Register</a>
                </li>

                <li v-if="parseInt(isAuthenticated)" class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bxs-user'></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" :href="urlLogin"
                           onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">Logout
                        </a>

                        <form id="logout-form" :action="urlLogout" method="POST" class="d-none">
                            <input type="hidden" name="_token" :value="csrfToken">
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    props: [
        'urlWelcome',
        'urlHome',
        'urlAssignments',
        'isAuthenticated',
        'urlLogin',
        'urlRegister',
        'userName',
        'urlLogout',
        'csrfToken',
        'srcLogo'],
    data() {
        return {}
    },
}
</script>
