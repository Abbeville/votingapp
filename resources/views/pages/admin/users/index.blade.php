@extends('layouts.master')

@section('content')

<h2 class="intro-y text-lg font-medium mt-10">
                    Student List
                </h2>
<div class="grid grid-cols-12 gap-6 mt-5">

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('admin.users.create') }}"><button class="button text-white bg-theme-1 shadow-md mr-2">Add New Student</button></a>
        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of {{ $users->count() }} entries</div>
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
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">PHOTO</th>
                    <th class="whitespace-nowrap">FULLNAME</th>
                    <th class="text-center whitespace-nowrap">MATRIC</th>
                    <th class="text-center whitespace-nowrap">TEMPLATE</th>
                    <th class="text-center whitespace-nowrap">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

                    @php
                        // $finger          = getUserFinger($row['user_id']);
                        $register           = '';
                        $verification       = '';
                        $url_register       = '';
                        $url_verification   = App\Http\Controllers\BiometricController::getVerificationLink($user->id);
                        $url_register       = App\Http\Controllers\BiometricController::getRegistrationLink($user->id);

                        if(count($user->fingers) == 0){
                            $register = "<a href='$url_register' class='button button--sm sm:w-32 inline-block mr-1 mb-2 text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300' onclick=\"user_register('".$user->id."','".$user->name."')\">Capture</a>";
                        }
                        else{
                            $verification = "<a href='#' class='btn btn-xs btn-success'>Captured</a>";
                            // $verification = "<a href='$url_verification' class='btn btn-xs btn-success'>Login</a>";

                        }
                    @endphp
                    <tr class="intro-x">
                        <td>{{ $loop->iteration }}</td>
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                    <img alt="{{ $user->fullname() }}" class="tooltip rounded-full" src="{{ asset('uploads/'.$user->avatar_url) }}" title="{{ $user->fullname() }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="font-medium whitespace-nowrap">{{ $user->fullname() }}</a> 
                        </td>
                        <td>{{ $user->matric }}</td>
                        {{-- <td>{{ $url_register }}</td> --}}
                        <td><code id="user_finger_{{ $user->id }}">{{ count($user->fingers) }}</code></td>
                        <td class="w-40">
                            {!! $register.' '.$verification !!}
                        </td>
                    </tr>
                @endforeach
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

@endsection

@section('scripts')

<script type="text/javascript">

    /**
 * jQuery Timer Plugin (jquery.timer.js)
 * @version 1.0.1
 * @author James Brooks <jbrooksuk@me.com>
 * @website http://james.brooks.so
 * @license MIT - http://jbrooksuk.mit-license.org
 */

(function($) {
    jQuery.timer = function(interval, callback, options) {
        // Create options for the default reset value
        var options = jQuery.extend({ reset: 500 }, options);
        var interval = interval || options.reset;

        if(!callback) { return false; }

        var Timer = function(interval, callback, disabled) {
            // Only used by internal code to call the callback
            this.internalCallback = function() { callback(self); };

            // Clears any timers
            this.stop = function() { clearInterval(self.id); };
            // Resets timers to a new time
            this.reset = function(time) {
                if(self.id) { clearInterval(self.id); }
                var time = time || options.reset;

                this.id = setInterval(this.internalCallback, time);
            };

            // Set the interval time again
            this.interval = interval;
            
            // Set the timer, if enabled
            if (!disabled) {
                this.id = setInterval(this.internalCallback, this.interval);
            }

            var self = this;
        };

        // Create a new timer object
        return new Timer(interval, callback, options.disabled);
    };
})(jQuery);


    /**
     * Jquery Ajax Loading Mask
     * Author: Kevin Sakhuja
     *
     * Usage: $(element).loadingMask({ stop: true });
     *
     */

    (function($) {
      $.fn.ajaxMask = function(options) {

        return this.each(function() {
            var settings = $.extend({
                  stop: false,
                }, options);

            if (!settings.stop) {
              var loadingDiv = $('<div class="ajax-mask"><div class="loading"><img src="assets/image/loading-spinner-grey.gif"/>&nbsp;&nbsp;<span>' + 'Please wait...' + '</span></div></div>')
                .css({
                  'position': 'absolute',
                  'top': 0,
                  'left':0,
                  'width':'100%',
                  'height':'100%',
                });

              $(this).css({ 'position':'relative' }).append(loadingDiv);
            } else {
              $('.ajax-mask').remove();
            }
        });

      }
    })(jQuery);

    $('title').html('User');

    function user_delete(user_id, user_name) {

        var r = confirm("Delete user "+user_name+" ?");

        if (r == true) {

            push('user.php?action=delete&user_id='+user_id);

        }
    }
    
    function user_register(user_id, user_name) {

        $('body').ajaxMask();

        regStats = 0;
        regCt = -1;
        try
        {
            timer_register.stop();
        }
        catch(err)  
        {
            console.log('Registration timer has been init');
        }
        
        
        var limit = 4;
        var ct = 1;
        var timeout = 5000;
        
        timer_register = $.timer(timeout, function() {                  
            console.log("'"+user_name+"' registration checking...");
            user_checkregister(user_id,$("#user_finger_"+user_id).html());
            if (ct>=limit || regStats==1) 
            {
                timer_register.stop();
                console.log("'"+user_name+"' registration checking end");
                if (ct>=limit && regStats==0)
                {
                    alert("'"+user_name+"' registration fail!");
                    $('body').ajaxMask({ stop: true });
                }                       
                if (regStats==1)
                {
                    $("#user_finger_"+user_id).html(regCt);
                    alert("'"+user_name+"' registration success!");
                    $('body').ajaxMask({ stop: true });
                    load('user.php?action=index');
                }
            }
            ct++;
        });
    }
    
    function user_checkregister(student_id, current) {
        $.ajax({
            url         :   "{{ url('admin/checkreg/') }}/"+student_id+"/"+current,
            type        :   "GET",
            dataType    :   "json",
            success     :   function(data)
            {
                try
                {
                    console.log(data+' Data coming from Biometric checkreg method');
                    var res = jQuery.parseJSON(data);   
                    if (res.result)
                    {
                        regStats = 1;
                        $.each(res, function(key, value){
                            if (key=='current')
                            {                                                       
                                regCt = value;
                            }
                        });
                    }
                }
                catch(err)
                {

                    console.log('Could fetch result');
                    // alert(err.message);
                }
            }
        });
    }

</script>


@endsection