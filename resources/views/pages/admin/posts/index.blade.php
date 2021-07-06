@extends('layouts.master')

@section('active-admin.post', 'side-menu--active')

@section('content')

<h2 class="intro-y text-lg font-medium mt-10">
    Posts
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('admin.post.create') }}"><button class="button text-white bg-theme-1 shadow-md mr-2">Add New Post</button></a>
        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of {{ $posts->count() }} entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">IMAGES</th>
                    <th class="whitespace-nowrap">Title</th>
                    <th class="text-center whitespace-nowrap">Body</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
            	@forelse($posts as $post)

            		@php
            		    switch($post->status){
            		        case 1:
            		            $status_color = '9';
            		            $message = 'Published';
            		            break;
            		        case 0:
            		            $status_color = '12';
            		            $message = 'Not Published';
            		            break;
            		        default:
            		            break;
            		        }
            		@endphp
            		<tr class="intro-x">
            		    <td class="w-40">
            		        <div class="flex">
            		            <div class="w-10 h-10 image-fit zoom-in">
            		                <img alt="{{ $post->title }}" class="tooltip rounded-full" src="{{ asset($post->image) }}" title="{{ $post->slug }}">
            		            </div>
            		        </div>
            		    </td>
            		    <td> 
            		        <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $post->title }}</div>
            		    </td>
            		    <td class="text-center">{!! strlen($post->body) > 50 ? substr($post->body, 0, 50).'...' : $post->body !!}</td>
            		    <td class="w-40">
            		        <div class="flex items-center justify-center text-theme-{{ $status_color }}"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $message }} </div>
            		    </td>
            		    <td class="table-report__action w-56">
            		        <div class="flex justify-center items-center">
            		            {{-- <a class="flex items-center mr-3" href="javascript:;"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a> --}}
            		            <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal" onclick="window.currentPost='{{ route('admin.post.delete', $post->id) }}'"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
            		        </div>
            		    </td>
            		</tr>

            	@empty

            	 {{ 'No post to display' }}
            	@endforelse
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <ul class="pagination">
            <li>
                <a class="pagination__link" href="#"> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href="#"> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
            </li>
            <li> <a class="pagination__link" href="#">...</a> </li>
            <li> <a class="pagination__link" href="#">1</a> </li>
            <li> <a class="pagination__link pagination__link--active" href="#">2</a> </li>
            <li> <a class="pagination__link" href="#">3</a> </li>
            <li> <a class="pagination__link" href="#">...</a> </li>
            <li>
                <a class="pagination__link" href="#"> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href="#"> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
            </li>
        </ul>
        <select class="w-20 input box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
<div class="modal" id="delete-confirmation-modal">
    <div class="modal__content">
        <div class="p-5 text-center">
            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
            <div class="text-3xl mt-5">Are you sure?</div>
            <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
        </div>
        <div class="px-5 pb-8 text-center">
            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
            <button type="button" class="button w-24 bg-theme-6 text-white" onclick="window.location.replace(window.currentPost)">Delete</button>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->

@endsection