<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8">
        <link href="{{ asset('dist/images/logo.jpg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="nigeria animal science student association">
        <meta name="keywords" content="nassa, funaab, animal, science, student, association">
        <meta name="author" content="ABBEVILLE">
        <title>Student Sign Up - Voting App</title>
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
                        <img alt="Voting App" class="w-6" src="dist/images/logo.jpg">
                        <span class="text-white text-lg ml-3"> Biometric Voting<span class="font-medium">App</span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Voting App" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            A Biometric voting App
                            <br>
                            create your account.
                        </div>
                        {{-- <div class="-intro-x mt-5 text-lg text-white dark:text-gray-500">Nigeria Animal Science Student Association (Funaab)</div> --}}
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign Up
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 dark:text-gray-500 xl:hidden text-center">Biometric Vote App</div>
                        <form  method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="intro-x mt-8">
                                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" name="firstname" placeholder="First Name">

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" name="lastname" placeholder="Last Name">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" name="matric" placeholder="Matric">

                                @error('matric')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="email" class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error('email') border-theme-6 @enderror" name="email" placeholder="Email">

                                @error('email')
                                    <span class="text-theme-6" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="number" class="intro-x login__input input input--lg border border-gray-300 block mt-4" name="phone_number" placeholder="Phone Number">

                                <div class="mt-4">
                                    <select class="input border w-full mr-2" name="department_id">
                                        <option selected="" disabled="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>    
                                </div>

                                <div class="mt-4">
                                    <select class="input border w-full mr-2" name="level_id">
                                        <option selected="" disabled="">Select Level</option>
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>    
                                </div>

                                <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4 @error('password') border-theme-6 @enderror" name="password" placeholder="Password">

                                @error('password')
                                    <span class="text-theme-6" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                {{-- <a href="#" class="intro-x text-gray-600 block mt-2 text-xs sm:text-sm">What is a secure password?</a>  --}}
                                <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" name="password_confirmation" placeholder="Password Confirmation">
                            </div>
                            
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button class="button button--lg w-full xl:w-32 text-white bg-theme-9 xl:mr-3 align-top">Register</button>
                                <button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300 mt-3 xl:mt-0 align-top">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        <!-- END: Dark Mode Switcher-->
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
    </body>

</html>