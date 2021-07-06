@extends('layouts.master')

@section('active-admin.create', 'active')

@section('content')

{{-- <h2 class="intro-y text-lg font-medium mt-10">
    New User
</h2> --}}

<!-- BEGIN: Vertical Form -->
<div class="intro-y box">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
        <h2 class="font-medium text-base mr-auto">
            New User
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
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-4">
                    <label>First Name</label>
                    <input type="text" name="firstname" class="input w-full border mt-2" value="">
                </div>

                <div class="mt-4">
                    <label>Last Name</label>
                    <input type="text" name="lastname" class="input w-full border mt-2" value="">
                </div>

                <div class="mt-4">
                    <label>Matric</label>
                    <input type="text" name="matric" class="input w-full border mt-2" value="">
                </div>

                <div class="mt-4">
                    <label>Email</label>
                    <input type="text" name="email" class="input w-full border mt-2" value="">
                </div>

                <div class="mt-4">
                    <label>Phone number</label>
                    <input type="text" name="phone_number" class="input w-full border mt-2" value="">
                </div>

                <div class="mt-3">
                    <label>Gender</label>
                    <div class="flex flex-col sm:flex-row mt-2">
                        <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                            <input type="radio" class="input border mr-2" id="horizontal-radio-chris-evans" name="gender" value="male">
                            <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">Male</label>
                        </div>
                        <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                            <input type="radio" class="input border mr-2" id="horizontal-radio-liam-neeson" name="gender" value="female">
                            <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">Female</label>
                        </div>
                    </div>
                </div>

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

                <div class="mt-3">
                    <label>Photo</label>
                     <input type="file" name="avatar" class="input w-full border mt-2">
                </div>

                {{-- <div class="mt-3">
                    <label>Password</label>
                     <input type="password" name="password" class="input w-full border mt-2" readonly="">
                </div>

                <div class="mt-3">
                    <label>Password Confirmation</label>
                     <input type="password" name="password_confirmation" class="input w-full border mt-2" readonly="">
                </div> --}}
                
                <button type="submit" class="button bg-theme-1 text-white mt-5">Save</button>
            </form>
        </div>
    </div>
</div>
<!-- END: Vertical Form -->

@endsection