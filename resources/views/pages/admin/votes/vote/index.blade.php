@extends('layouts.master')

@section('active-admin.vote', 'side-menu--active')

@section('content')

<h2 class="intro-y text-lg font-medium mt-10">
    Votes
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        {{-- <a href="#"><button class="button text-white bg-theme-1 shadow-md mr-2">View Winners</button></a> --}}
        <div class="hidden md:block mx-auto text-gray-600">Total Votes ({{ $votes->count() }}) entries</div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-6 overflow-auto lg:overflow-visible">
        @forelse($contestants as $key => $contest)

            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">{{ strtoupper($key) }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Image</th>
                        <th class="whitespace-nowrap">Name</th>
                        <th>Department</th>
                        <th>Level</th>
                        <th>Vote Count</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contest as $contestant)

                        <tr class="intro-x">
                            <td> 
                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5"><img alt="img" class="rounded-full" src="{{ $contestant->user->profileUpdated() ? asset('uploads/'.$contestant->user->avatar_url)  :asset('/dist/images/profile-12.jpg') }}"> </div>
                            </td>

                            <td> 
                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ strtoupper($contestant->user->fullname) }} </div>
                            </td>

                            <td> 
                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $contestant->user->department->short_name}}</div>
                            </td>

                            <td> 
                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $contestant->user->level->name }}</div>
                            </td>

                            <td> 
                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $contestant->vote_count == null ? 0 : $contestant->vote_count }}</div>
                            </td>

                            {{-- <td class="table-report__action w-20">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal" onclick="window.currentContest='{{ route('admin.contestant.delete', $contestant->id) }}'"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                </div>
                            </td> --}}
                        </tr>

                    @empty

                     {{ 'No contestant to display' }}
                    @endforelse
                </tbody>
            </table>
        @empty
            {{ 'No contestant' }}
        @endforelse
    </div>
    <!-- END: Data List -->
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
            <button type="button" class="button w-24 bg-theme-6 text-white" onclick="window.location.replace(window.currentContest)">Delete</button>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->

@endsection