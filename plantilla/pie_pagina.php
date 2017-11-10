<!--Global JS-->
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/waypoints/waypoints.min.js"></script>
    <script src="../js/application.js"></script>
    <!--Page Level JS-->
    <script src="../plugins/countTo/jquery.countTo.js"></script>
    <script src="../plugins/weather/js/skycons.js"></script>
    <!-- FlotCharts  -->
    <script src="../plugins/flot/js/jquery.flot.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.resize.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.canvas.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.image.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.categories.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.crosshair.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.errorbars.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.fillbetween.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.navigate.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.pie.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.selection.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.stack.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.symbol.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.threshold.min.js"></script>
    <script src="../plugins/flot/js/jquery.colorhelpers.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.time.min.js"></script>
    <script src="../plugins/flot/js/jquery.flot.example.js"></script>
    <!-- Morris  -->
    <script src="../plugins/morris/js/morris.min.js"></script>
    <script src="../plugins/morris/js/raphael.2.1.0.min.js"></script>
    <!-- Vector Map  -->
    <script src="../plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
    <!-- ToDo List  -->
    <script src="../plugins/todo/js/todos.js"></script>
    <!--Load these page level functions-->
    <script>
        $(document).ready(function() {
            app.timer();
            app.map();
            app.weather();
            app.morrisPie();
        });
    </script>
           <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46627904-1', 'authenticgoods.co');
        ga('send', 'pageview');

</script>

</body>

</html>
