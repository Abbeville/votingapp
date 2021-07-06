@extends('layouts.master')

@section('active-admin.vote', 'side-menu--active')

@section('content')

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Add New Category
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{ route('admin.category.all') }}"><button type="button" class="button box text-gray-700 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-feather="eye"></i> Categories </button></a>
        <button class="button text-white bg-theme-1 shadow-md flex items-center" onclick="document.getElementById('categoryForm').submit()"> Save <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
    </div>
</div>
<form id="categoryForm" action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
       <!-- BEGIN: Post Content -->
       <div class="intro-y col-span-12 lg:col-span-8">
           <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13" placeholder="Title" name="title" required="">
       </div>
       <!-- END: Post Content -->
   </div> 
</form>


@endsection