<!DOCTYPE html>
<html lang="en">

<head>
    @include("layouts.head")
</head>

<body>

    @include("layouts.preloader")
   
    <div class="wrapper">

        @include("layouts.header")

        @yield("hero")
        
        <!--body content start-->
        <section class="body-content">

            @yield("content")

        </section>
        <!--body content end-->

        @include("layouts.footer")

    </div>

    @include('layouts.js')
</body>

</html>
