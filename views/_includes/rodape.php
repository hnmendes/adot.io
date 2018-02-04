<!-- Rodapé -->
<footer class="page-footer teal">


    <div class="col l3 s12">
        <h5 class="white-text">ONGS</h5>
        <ul>
            <li><a class="white-text" href="#!">ONG 1</a></li>
            <li><a class="white-text" href="#!">ONG 2</a></li>
            <li><a class="white-text" href="#!">ONG 3</a></li>
            <li><a class="white-text" href="#!">ONG 4</a></li>
        </ul>

    </div>
    <div class="footer-copyright">
        <div class="container center">
            &copy; Copyright text
        </div>
    </div>
    </div>
</footer>
<!-- Fim rodapé -->

<!--  Scripts-->
<script src="views\_css\js\jquery.validate.js"></script>
<script src="views\_css\js\jquery.js"></script>
<script src="views\_css\js\materialize.js"></script>
<script src="views\_css\js\init.js"></script>

<script>
    $('.modal').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacidade do background modal
            inDuration: 300, // Transição em duração
            outDuration: 300, // Transição fora de duração
            startingTop: '4%', // Starting top style attribute
            endingTop: '10%', // Ending top style attribute
            ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.

                console.log(modal, trigger);
            },
            complete: function() { } // Callback for Modal close
        }
    );

    $('.carousel.carousel-slider').carousel({fullWidth: true});

    $(document).ready(function() {
        $('select').material_select();
    });

    $( "#send" ).click(function() {
        var count = $("#options :selected").length;
        alert( count );
    });

    $(document).ready(function(){
        $('.slider').slider();
    });


</script>
</body>
</html>
