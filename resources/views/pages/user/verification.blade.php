<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8">
        <link href="{{ asset('dist/images/logo.jpg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="ABBEVILLE">
        <title>Student Login - Voting App</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="#" class="-intro-x flex items-center pt-5">
                        <img alt="Nassa Funaab" class="w-6" src="{{ asset('dist/images/logo.jpg') }}">
                        <span class="text-white text-lg ml-3"> Biometric Voting<span class="font-medium">App</span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Vote App" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/illustration.svg') }}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            2nd Factor Authentication
                            <br>
                            sign in to your account.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white dark:text-gray-500">To start voting</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Thumb Verification. </div>

                        <a href="{{ $url_verification }}" class="button button--lg w-full xl:w-32 text-white bg-theme-9 xl:mr-3 align-top">Verify Your Thumb</a>

                        
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: Dark Mode Switcher-->

        </div>
        <!-- END: Dark Mode Switcher-->
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        @include('layouts.partials.scripts')
        <script type="text/javascript">
    		url = '{{ $url_verification }}';

    			$(document).ready(function() {
    		       window.location = url;
    		    });
        </script>
    </body>

</html>