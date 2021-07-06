<div class="top-bar">
          <!-- BEGIN: Breadcrumb -->
          <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
            <a href="#" class="">Application</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="#" class="breadcrumb--active">Dashboard</a>
          </div>
          <!-- END: Breadcrumb -->
          <!-- BEGIN: Search -->
          <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
              <input
                type="text"
                class="search__input input placeholder-theme-13"
                placeholder="Search..."
              />
              <i
                data-feather="search"
                class="search__icon dark:text-gray-300"
              ></i>
            </div>
            {{-- <a class="notification sm:hidden" href="#">
              <i
                data-feather="search"
                class="notification__icon dark:text-gray-300"
              ></i>
            </a> --}}
            {{-- <div class="search-result">
              <div class="search-result__content">
                <div class="search-result__content__title">Pages</div>
                <div class="mb-5">
                  <a href="#" class="flex items-center">
                    <div
                      class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"
                    >
                      <i class="w-4 h-4" data-feather="inbox"></i>
                    </div>
                    <div class="ml-3">Mail Settings</div>
                  </a>
                  <a href="#" class="flex items-center mt-2">
                    <div
                      class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"
                    >
                      <i class="w-4 h-4" data-feather="users"></i>
                    </div>
                    <div class="ml-3">Users & Permissions</div>
                  </a>
                  <a href="#" class="flex items-center mt-2">
                    <div
                      class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"
                    >
                      <i class="w-4 h-4" data-feather="credit-card"></i>
                    </div>
                    <div class="ml-3">Transactions Report</div>
                  </a>
                </div>
                <div class="search-result__content__title">Users</div>
                <div class="mb-5">
                  <a href="#" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                      <img
                        alt="Voting App"
                        class="rounded-full"
                        src="{{ asset('dist/images/profile-10.jpg') }}"
                      />
                    </div>
                    <div class="ml-3">Bruce Willis</div>
                    <div
                      class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                    >
                      brucewillis@left4code.com
                    </div>
                  </a>
                  <a href="#" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                      <img
                        alt="Voting App"
                        class="rounded-full"
                        src="{{ asset('dist/images/profile-5.jpg') }}"
                      />
                    </div>
                    <div class="ml-3">Kevin Spacey</div>
                    <div
                      class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                    >
                      kevinspacey@left4code.com
                    </div>
                  </a>
                  <a href="#" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                      <img
                        alt="Voting App"
                        class="rounded-full"
                        src="{{ asset('dist/images/profile-4.jpg') }}"
                      />
                    </div>
                    <div class="ml-3">Russell Crowe</div>
                    <div
                      class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                    >
                      russellcrowe@left4code.com
                    </div>
                  </a>
                  <a href="#" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                      <img
                        alt="Voting App"
                        class="rounded-full"
                        src="{{ asset('dist/images/profile-10.jpg') }}"
                      />
                    </div>
                    <div class="ml-3">Russell Crowe</div>
                    <div
                      class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                    >
                      russellcrowe@left4code.com
                    </div>
                  </a>
                </div>
                <div class="search-result__content__title">Products</div>
                <a href="#" class="flex items-center mt-2">
                  <div class="w-8 h-8 image-fit">
                    <img
                      alt="Voting App"
                      class="rounded-full"
                      src="{{ asset('dist/images/preview-15.jpg') }}"
                    />
                  </div>
                  <div class="ml-3">Oppo Find X2 Pro</div>
                  <div
                    class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                  >
                    Smartphone &amp; Tablet
                  </div>
                </a>
                <a href="#" class="flex items-center mt-2">
                  <div class="w-8 h-8 image-fit">
                    <img
                      alt="Voting App"
                      class="rounded-full"
                      src="{{ asset('dist/images/preview-12.jpg') }}"
                    />
                  </div>
                  <div class="ml-3">Dell XPS 13</div>
                  <div
                    class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                  >
                    PC &amp; Laptop
                  </div>
                </a>
                <a href="#" class="flex items-center mt-2">
                  <div class="w-8 h-8 image-fit">
                    <img
                      alt="Voting App"
                      class="rounded-full"
                      src="{{ asset('dist/images/preview-2.jpg') }}"
                    />
                  </div>
                  <div class="ml-3">Nike Air Max 270</div>
                  <div
                    class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                  >
                    Sport &amp; Outdoor
                  </div>
                </a>
                <a href="#" class="flex items-center mt-2">
                  <div class="w-8 h-8 image-fit">
                    <img
                      alt="Voting App"
                      class="rounded-full"
                      src="{{ asset('dist/images/preview-3.jpg') }}"
                    />
                  </div>
                  <div class="ml-3">Nike Air Max 270</div>
                  <div
                    class="ml-auto w-48 truncate text-gray-600 text-xs text-right"
                  >
                    Sport &amp; Outdoor
                  </div>
                </a>
              </div>
            </div> --}}
          </div>
          <!-- END: Search -->
          <!-- BEGIN: Notifications -->
          <div class="intro-x dropdown mr-auto sm:mr-6">
            <div
              class="dropdown-toggle notification notification--bullet cursor-pointer"
            >
              <i
                data-feather="bell"
                class="notification__icon dark:text-gray-300"
              ></i>
            </div>
            {{-- <div class="notification-content pt-2 dropdown-box">
              <div
                class="notification-content__box dropdown-box__content box dark:bg-dark-6"
              >
                <div class="notification-content__title">Notifications</div>
                <div class="cursor-pointer relative flex items-center">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                    <img
                      alt="Voting App"
                      class="rounded-full"
                      src="{{ asset('dist/images/profile-10.jpg') }}"
                    />
                    <div
                      class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"
                    ></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                    <div class="flex items-center">
                      <a href="javascript:;" class="font-medium truncate mr-5"
                        >Bruce Willis</a
                      >
                      <div
                        class="text-xs text-gray-500 ml-auto whitespace-nowrap"
                      >
                        06:05 AM
                      </div>
                    </div>
                    <div class="w-full truncate text-gray-600 mt-0.5">
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry. Lorem Ipsum has been the
                      industry&#039;s standard dummy text ever since the 1500
                    </div>
                  </div>
                </div>
                <div class="cursor-pointer relative flex items-center mt-5">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                    <img
                      alt="Voting App"
                      class="rounded-full"
                      src="{{ asset('dist/images/profile-5.jpg') }}"
                    />
                    <div
                      class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"
                    ></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                    <div class="flex items-center">
                      <a href="javascript:;" class="font-medium truncate mr-5"
                        >Kevin Spacey</a
                      >
                      <div
                        class="text-xs text-gray-500 ml-auto whitespace-nowrap"
                      >
                        01:10 PM
                      </div>
                    </div>
                    <div class="w-full truncate text-gray-600 mt-0.5">
                      Contrary to popular belief, Lorem Ipsum is not simply
                      random text. It has roots in a piece of classical Latin
                      literature from 45 BC, making it over 20
                    </div>
                  </div>
                </div>
                <div class="cursor-pointer relative flex items-center mt-5">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                    <img
                      alt="Voting App"
                      class="rounded-full"
                      src="{{ asset('dist/images/profile-4.jpg') }}"
                    />
                    <div
                      class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"
                    ></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                    <div class="flex items-center">
                      <a href="javascript:;" class="font-medium truncate mr-5"
                        >Russell Crowe</a
                      >
                      <div
                        class="text-xs text-gray-500 ml-auto whitespace-nowrap"
                      >
                        05:09 AM
                      </div>
                    </div>
                    <div class="w-full truncate text-gray-600 mt-0.5">
                      Contrary to popular belief, Lorem Ipsum is not simply
                      random text. It has roots in a piece of classical Latin
                      literature from 45 BC, making it over 20
                    </div>
                  </div>
                </div>
                <div class="cursor-pointer relative flex items-center mt-5">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                    <img
                      alt="Voting App"
                      class="rounded-full"
                      src="{{ asset('dist/images/profile-10.jpg') }}"
                    />
                    <div
                      class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"
                    ></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                    <div class="flex items-center">
                      <a href="javascript:;" class="font-medium truncate mr-5"
                        >Russell Crowe</a
                      >
                      <div
                        class="text-xs text-gray-500 ml-auto whitespace-nowrap"
                      >
                        06:05 AM
                      </div>
                    </div>
                    <div class="w-full truncate text-gray-600 mt-0.5">
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry. Lorem Ipsum has been the
                      industry&#039;s standard dummy text ever since the 1500
                    </div>
                  </div>
                </div>
                <div class="cursor-pointer relative flex items-center mt-5">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                    <img
                      alt="Voting App"
                      class="rounded-full"
                      src="{{ asset('dist/images/profile-1.jpg') }}"
                    />
                    <div
                      class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"
                    ></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                    <div class="flex items-center">
                      <a href="javascript:;" class="font-medium truncate mr-5"
                        >Denzel Washington</a
                      >
                      <div
                        class="text-xs text-gray-500 ml-auto whitespace-nowrap"
                      >
                        01:10 PM
                      </div>
                    </div>
                    <div class="w-full truncate text-gray-600 mt-0.5">
                      It is a long established fact that a reader will be
                      distracted by the readable content of a page when looking
                      at its layout. The point of using Lorem
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
          <!-- END: Notifications -->
          <!-- BEGIN: Account Menu -->
          <div class="intro-x dropdown w-8 h-8">
            <div
              class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in"
            >

              <img
                alt="Voting App"
                src="{{ Auth::user()->profileUpdated() ? asset('uploads/'.Auth::user()->avatar_url)  :asset('/dist/images/profile-12.jpg') }}"
              />
            </div>
            <div class="dropdown-box w-56">
              <div
                class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white"
              >
                <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                  <div class="font-medium">{{ auth()->user()->fullname() }}</div>
                  <div class="text-xs text-theme-41 mt-0.5 dark:text-gray-600">
                    {{ auth()->user()->matric }}
                  </div>
                </div>
                <div class="p-2">
                  <a
                    href="#"
                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                  >
                    <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile
                  </a>
                  <a
                    href="#"
                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                  >
                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset
                    Password
                  </a>

                </div>
                <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                  <a
                    href="#"
                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                  >
                    <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i>
                    Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END: Account Menu -->
        </div>