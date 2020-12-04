<!DOCTYPE html>
<html lang="en">
 @include("layouts.users.head")
<body class="rtl">
<div class="container-scroller">

    @include("layouts.users.header")

    <div class="container-fluid page-body-wrapper">


        @yield("content")

    </div>

 </div>

 @include("layouts.users.js")

@yield("script")
</body>

 </html>
