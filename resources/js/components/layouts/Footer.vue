<template>
    <footer>
        <div class="footer">
            <p><span>Copyright</span> ©CrossMoon <span>{{year}}</span></p>
            <div class="social-medias">
                <ul>
                    <li>
                        <a href="#">
                            <i class='bx bxl-instagram-alt'></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bxl-facebook-circle' ></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bxl-twitter' ></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        data() {
            return {
                year: new Date().getFullYear()
            }
        }
    }
</script>
