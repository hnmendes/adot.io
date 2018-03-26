<!-- Rodapé -->
<footer class="page-footer teal">


    <div class="col l3 s12">
        <h5 class="white-text center">ONGS</h5>
        <ul class="center">
            <li>
                <a class="white-text" href="https://www.facebook.com/Ong-PetPe-142450352523901/">PET PE |</a>
                <a class="white-text" href="#!">União |</a>
                <a class="white-text" href="https://www.facebook.com/DesabandoneCaruaru/">Desabandone |</a>
                <a class="white-text" href="https://www.facebook.com/MPColinaPE/timeline">Movimento</a>
            </li>

            <li>
                <img src="\views\_images\petpe.jpg" style="width: 50px; height: 50px;">
                <img src="\views\_images\uniao.jpg" style="width: 50px; height: 50px;">
                <img src="\views\_images\desabandone.jpg" style="width: 50px; height: 50px;">
                <img src="\views\_images\movimento.jpg" style="width: 50px; height: 50px;">
            </li>
        </ul>

    </div>
    <div class="footer-copyright">
        <div class="container center">
            &copy; Copyright adot.io 2018
        </div>
    </div>
</div>
</footer>
<!-- Fim rodapé -->

<!--  Scripts-->
<script src="views\_css\js\jquery.js"></script>
<script src="views\_css\js\jquery.validate.js"></script>
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


    // $('#close').modal('close');

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

    
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
  }
  );
</script>


</body>
</html>
