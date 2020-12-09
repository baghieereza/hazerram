<!DOCTYPE html>
<html lang="en">

@include("layouts.landingPage.head")
<!-- Mirrored from inovatik.com/evolo-landing-page/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Oct 2020 12:50:50 GMT -->
<body data-spy="scroll" data-target=".fixed-top">

<!-- Preloader -->
<div class="spinner-wrapper">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- end of preloader -->

@include("layouts.landingPage.navigation")


@yield("content")


@include("layouts.landingPage.footer")


@include("layouts.landingPage.js")




</body>

<!-- Mirrored from inovatik.com/evolo-landing-page/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Oct 2020 12:51:02 GMT -->
</html>
