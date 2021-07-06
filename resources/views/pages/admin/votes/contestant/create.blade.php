@extends('layouts.master')

@section('active-admin.vote', 'side-menu--active')

@section('content')

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Add New Contestant
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{ route('admin.contestant.all') }}"><button type="button" class="button box text-gray-700 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-feather="eye"></i> Contestants </button></a>
        <button class="button text-white bg-theme-1 shadow-md flex items-center" onclick="document.getElementById('contestForm').submit()"> Save <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
    </div>
</div>
<form id="contestForm" action="{{ route('admin.contestant.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
       <!-- BEGIN: Post Content -->
       <div class="intro-y col-span-12 lg:col-span-8">
            <select data-search="true" class="tail-select w-full" name="user_id">
                <option selected="" disabled="">Select a Student</option>
                @foreach($users as $user) 
                   <option value="{{ $user->id }}">{{ ucfirst($user->fullname()) }} || {{ $user->matric }}</option>
                 @endforeach
            </select>
       </div>

       <div class="intro-y col-span-12 lg:col-span-8">
            <select class="input input--lg border mr-2 w-full" name="contest_id"> 
              <option disabled="" selected="">Select a Category</option>
              @foreach($contests as $contest) 
                <option value="{{ $contest->id }}">{{ ucfirst($contest->title) }}</option>
              @endforeach
            </select> 
       </div>
       <!-- END: Post Content -->
   </div> 
</form>


@endsection