<?php
//Este es el footer que solo se va a mostrar en el login
class pie{
    public static function login($controller){
        print('
<!-- Footer -->
</main>
<footer class="page-footer blue-grey darken-4">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Mens Closet</h5>
                <p class="grey-text text-lighten-4">Siempre a la vanguardia de la moda</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Redes Sociales</h5>
                <ul>
                <a  href="https://www.instagram.com/?hl=es-la" target="_blank"><img src="../../Resources/img/RedesS/insta.png" style="height: 32px" style=" width:32px"></a>
                <a  href="https://es-la.facebook.com/" target="_blank"><img src="../../Resources/img/RedesS/facebook.png" style="height: 32px" style=" width:32px"></a>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container" align="center">
            © 2019 Copyright Mens Closet
        </div>
    </div>
</footer>
    <script src="../../resources/js/jquery-3.2.1.min.js"></script>
    <script src="../../resources/js/materialize.min.js"></script>
    <script src="../../resources/js/sweetalert.min.js"></script>
    <script src="../../core/helpers/functions.js"></script>
    <script src="../../core/controllers/private/account.js"></script>
    <script src="../../core/controllers/private/'.$controller.'"></script>
</body>
</html>
');

        }
    }
?>
