</div>
<script>
if ( window.history.replaceState ){window.history.replaceState( null, null, window.location.href );} // stop resubmission

//remove invalid class
$('div').bind('focus blur', function() {
  $("select").removeClass("is-invalid");
  $("input").removeClass("is-invalid");
  $(".selectize-control").removeClass("is-invalid");
});
$('input').bind('focus blur', function() {
  $("input").removeClass("is-invalid");
  $(".selectize-control").removeClass("is-invalid");
});
  //remove invalid class
</script>

<!-- CoreUI and necessary plugins-->
<script src="../resourcess/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="../resourcess/vendors/simplebar/js/simplebar.min.js"></script>
<!-- Plugins and scripts required by this view-->
<script src="../resourcess/vendors/@coreui/utils/js/coreui-utils.js"></script>

<!--scripts-->
<script type="module" src="../resourcess/js/sidebar.js"></script>
<script id="manage_user" src="effects/update-password_username.js" ></script>
<!--scripts end-->
</body>
</html>