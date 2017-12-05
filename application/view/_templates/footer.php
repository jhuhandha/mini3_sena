<div class="am-footer">
<span>Copyright &copy;. All Rights Reserved. Amanda Responsive Bootstrap 4 Admin Dashboard.</span>
<span>Created by: ThemePixels, Inc.</span>
</div><!-- am-footer -->
</div><!-- am-mainpanel -->

<script>
    var uri = "<?php echo URL; ?>";
</script>

<script src="<?= URL ?>lib/jquery/jquery.js"></script>
<script src="<?= URL ?>lib/popper.js/popper.js"></script>
<script src="<?= URL ?>lib/bootstrap/bootstrap.js"></script>
<script src="<?= URL ?>lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?= URL ?>lib/jquery-toggles/toggles.min.js"></script>
<script src="<?= URL ?>lib/d3/d3.js"></script>
<script src="<?= URL ?>lib/rickshaw/rickshaw.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
<script src="<?= URL ?>lib/gmaps/gmaps.js"></script>
<script src="<?= URL ?>lib/Flot/jquery.flot.js"></script>
<script src="<?= URL ?>lib/Flot/jquery.flot.pie.js"></script>
<script src="<?= URL ?>lib/Flot/jquery.flot.resize.js"></script>
<script src="<?= URL ?>lib/flot-spline/jquery.flot.spline.js"></script>

<script src="<?= URL ?>js/amanda.js"></script>
<script src="<?= URL ?>js/ResizeSensor.js"></script>
<script src="<?= URL ?>js/dashboard.js"></script>


<script src="<?= URL ?>js/app.js"></script>


<?php 
    if(isset($_SESSION["mensaje"]) && $_SESSION["mensaje"] != null){
        echo $_SESSION["mensaje"];
        $_SESSION["mensaje"] = null;
        // unset($_SESSION["mensaje"]);
    }
?>
</body>
</html>


