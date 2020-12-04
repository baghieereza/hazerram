<!-- plugins:js -->
<script src="{{asset("assets/vendors/js/vendor.bundle.base.js")}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset("assets/vendors/chart.js/Chart.min.js")}}"></script>
<script src="{{asset("assets/vendors/progressbar.js/progressbar.min.js")}}"></script>
<script src="{{asset("assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-bar-rating/jquery.barrating.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-sparkline/jquery.sparkline.min.js")}}"></script>
<script src="{{asset("assets/vendors/raphael/raphael.min.js")}}"></script>
<script src="{{asset("assets/vendors/morris.js/morris.min.js")}}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset("assets/js/off-canvas.js")}}"></script>
<script src="{{asset("assets/js/hoverable-collapse.js")}}"></script>
<script src="{{asset("assets/js/template.js")}}"></script>
<script src="{{asset("assets/js/settings.js")}}"></script>
<script src="{{asset("assets/js/todolist.js")}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset("assets/js/dashboard.js")}}"></script>
<!-- End custom js for this page-->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-analytics.js"></script>

<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyBlVkImyOCYxRqcaBHsX_oAE9pqTEKnQfI",
        authDomain: "hazeram-3468f.firebaseapp.com",
        projectId: "hazeram-3468f",
        storageBucket: "hazeram-3468f.appspot.com",
        messagingSenderId: "940389268680",
        appId: "1:940389268680:web:20701eefd113d064c1f9fd",
        measurementId: "G-3VQ60P6FDN"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
</script>
