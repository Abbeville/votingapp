@extends('layouts.master')

@section('active-user.vote', 'active')

@section('content')

{{-- Check vote status to determine whether vote has started|Ended|Upcoming --}}

@if($setting['vote'] == 'ongoing')
<div class="intro-y grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Boxed Accordion -->
    <div class="col-span-12 lg:col-span-12">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Start Voting
                </h2>
            </div>
            <div class="p-5" id="boxed-accordion">
                <div class="preview">
                    <div class="accordion">
                      @forelse($contestants as $key => $contest)
                        <div class="accordion__pane border border-gray-200 dark:border-dark-5 p-4">
                            <a href="javascript:;" class="accordion__pane__toggle font-medium block"> 
                            {{ strtoupper($key) }}</a> 
                            <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">
                              <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                             @forelse($contest as $contestant) 
                                  <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                                      <div class="flex items-center border-b border-gray-200 dark:border-dark-5 px-5 py-4">
                                          <div class="w-10 h-10 flex-none image-fit">
                                              <img alt="img" class="rounded-full" src="{{ $contestant->user->profileUpdated() ? asset('uploads/'.$contestant->user->avatar_url)  :asset('/dist/images/profile-12.jpg') }}">
                                          </div>
                                          <div class="ml-3 mr-auto">
                                              <a href="#" class="font-medium">{{ $contestant->user->fullname }}</a> 
                                              <div class="flex text-gray-600 truncate text-xs mt-0.5"> <a class="text-theme-1 dark:text-theme-10 inline-block truncate" href="#">{{ $contestant->user->department->short_name}}</a> 
                                                {{-- <span class="mx-1">•</span> 11 seconds ago  --}}
                                              </div>
                                          </div>
                                          @hasVoted($contestant)
                                            <button class="button button--sm text-white bg-theme-9">Voted <i data-feather="check"></i></button>
                                          @else
                                            <button class="button button--sm text-white bg-theme-1 mr-2" onclick="vote('{{ $contestant->id }}', '{{ $contestant->contest_id }}')">Vote</button>
                                          @endhasVoted
                                      </div>
                                      <div class="p-5">
                                          <div class="h-40 xxl:h-56 image-fit">
                                              <img alt="img" class="rounded-md" src="{{ $contestant->user->profileUpdated() ? asset('uploads/'.$contestant->user->avatar_url)  :asset('/dist/images/profile-12.jpg') }}">
                                          </div>
                                      </div>
                                  </div>

                                  {{-- <div class="box">
                                      <div class="flex flex-col lg:flex-row items-center p-5">
                                          <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                              <img alt="img" class="rounded-full" src="{{ $contestant->user->profileUpdated() ? asset('uploads/'.$contestant->user->avatar_url)  :asset('/dist/images/profile-12.jpg') }}">
                                          </div>
                                          <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                              <a href="#" class="font-medium">{{ $contestant->user->fullname }}</a> 
                                              <div class="text-gray-600 text-xs mt-0.5">{{ $contestant->user->department->short_name}}</div>
                                          </div>
                                          <div class="flex mt-4 lg:mt-0">
                                            @hasVoted($contestant)
                                              <button class="button button--sm text-white bg-theme-9">Voted <i data-feather="check"></i></button>
                                            @else
                                              <button class="button button--sm text-white bg-theme-1 mr-2" onclick="vote('{{ $contestant->id }}', '{{ $contestant->contest_id }}')">Vote</button>
                                            @endhasVoted
                                          </div>
                                      </div>
                                  </div> --}}
                              @empty
                                {{ 'Can\'t find contestant' }}
                              @endforelse
                              </div>
                            </div>
                        </div>
                      @empty
                        {{ 'No Contestant to vote for' }}
                      @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Boxed Accordion -->
</div>

@elseif($setting['vote'] == 'ended')
  <div class="grid grid-cols-12 gap-6 mt-5">
      <!-- BEGIN: FAQ Menu -->
      <a href="#" class="intro-y col-span-12 lg:col-span-12 box py-10 border-2 border-theme-1 dark:border-theme-1">
          <i data-feather="shield-off" class="w-12 h-12 text-theme-1 dark:text-theme-10 mx-auto"></i> 
          <div class="font-medium text-center text-base mt-3">Vote has Ended</div>
          <div class="text-gray-600 mt-2 w-3/4 text-center mx-auto">Oops! Vote has ended for this</div>
      </a>
    </div>
@else
  <div class="grid grid-cols-12 gap-6 mt-5">
      <!-- BEGIN: FAQ Menu -->
      <a href="#" class="intro-y col-span-12 lg:col-span-12 box py-10 border-2 border-theme-1 dark:border-theme-1">
          <i data-feather="shield" class="w-12 h-12 text-theme-1 dark:text-theme-10 mx-auto"></i> 
          <div class="font-medium text-center text-base mt-3">Vote will start in</div>
          <div class="text-gray-600 mt-2 w-3/4 text-center mx-auto">Countdown Timer</div>
      </a>
    </div>
@endif

@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">
  
  function vote(contestant_id, contest_id){

    var user_id = '{{ auth()->user()->id }}';
    var _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
           type:'POST',
           url:'{{ route('user.vote') }}',
           data:{contestant_id:contestant_id, contest_id:contest_id, voter_id:user_id, _token:_token},
           success:function(data){
              window.location.reload();
           }
        });
  }
</script>
@endsection