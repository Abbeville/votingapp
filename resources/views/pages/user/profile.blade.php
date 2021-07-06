@extends('layouts.master')

@section('active-user.profile', 'active')

@section('content')

<h2 class="intro-y text-lg font-medium mt-10">
    Profile
</h2>

<!-- BEGIN: Vertical Form -->
<div class="intro-y box">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
        <h2 class="font-medium text-base mr-auto">
            Edit Profile
        </h2>
    </div>

    @if ($errors->any())

        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul> 
        </div>
    @endif

    <div class="p-5" id="vertical-form">
        <div class="preview">
            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-4">
                    <label>First Name</label>
                    <input type="text" name="firstname" class="input w-full border mt-2" value="{{ isset($user->firstname) ? $user->firstname : '' }}">
                </div>

                <div class="mt-4">
                    <label>Last Name</label>
                    <input type="text" name="lastname" class="input w-full border mt-2" value="{{ isset($user->lastname) ? $user->lastname : '' }}">
                </div>

                <div class="mt-4">
                    <label>Email</label>
                    <input type="text" name="email" class="input w-full border mt-2" readonly="" value="{{ isset($user->email) ? $user->email : '' }}">
                </div>

                <div class="mt-4">
                    <label>Phone number</label>
                    <input type="text" name="phone_number" class="input w-full border mt-2" value="{{ isset($user->phone_number) ? $user->phone_number : '' }}">
                </div>

                <div class="mt-3">
                    <label>Gender</label>
                    <div class="flex flex-col sm:flex-row mt-2">
                        <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                            <input type="radio" class="input border mr-2" id="horizontal-radio-chris-evans" name="gender" value="male">
                            <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans" {{ $user->gender == 'male' ? 'checked=""' : '' }}>Male</label>
                        </div>
                        <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                            <input type="radio" class="input border mr-2" id="horizontal-radio-liam-neeson" name="gender" value="female">
                            <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson" {{ $user->gender == 'female' ? 'checked=""' : '' }}>Female</label>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <label>Photo</label>
                     <input type="file" name="avatar" class="input w-full border mt-2" readonly="">
                </div>
                
                <button type="submit" class="button bg-theme-1 text-white mt-5">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- END: Vertical Form -->

@endsection