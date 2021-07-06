@extends('layouts.master')

@section('active-admin.dashboard', 'side-menu--active')

@section('content')

<div class="grid grid-cols-12 gap-6">
  <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
    <!-- BEGIN: General Report -->
    <div class="col-span-12 mt-8">
      <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
          Admin Dashboard
        </h2>
        <a href="#" class="ml-auto flex text-theme-1 dark:text-theme-10">
          <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload
          Data
        </a>
      </div>
      <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
          <div class="report-box zoom-in">
            <div class="box p-5">
              <div class="flex">
                <i
                  data-feather="users"
                  class="report-box__icon text-theme-10"
                ></i>
                <div class="ml-auto">
                  {{-- <div
                    class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                    title="33% Higher than last month"
                  >
                    33%
                    <i data-feather="chevron-up" class="w-4 h-4"></i>
                  </div> --}}
                </div>
              </div>
              <div class="text-3xl font-bold leading-8 mt-6">{{ $registered }}</div>
              <div class="text-base text-gray-600 mt-1">Registered Students</div>
            </div>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
          <div class="report-box zoom-in">
            <div class="box p-5">
              <div class="flex">
                <i
                  data-feather="credit-card"
                  class="report-box__icon text-theme-11"
                ></i>
                <div class="ml-auto">
                  {{-- <div
                    class="report-box__indicator bg-theme-6 tooltip cursor-pointer"
                    title="2% Lower than last month"
                  >
                    2%
                    <i data-feather="chevron-down" class="w-4 h-4"></i>
                  </div> --}}
                </div>
              </div>
              <div class="text-3xl font-bold leading-8 mt-6">{{ 0 }}</div>
              <div class="text-base text-gray-600 mt-1">Contestants</div>
            </div>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
          <div class="report-box zoom-in">
            <div class="box p-5">
              <div class="flex">
                <i
                  data-feather="monitor"
                  class="report-box__icon text-theme-12"
                ></i>
                <div class="ml-auto">
                  {{-- <div
                    class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                    title="12% Higher than last month"
                  >
                    12%
                    <i data-feather="chevron-up" class="w-4 h-4"></i>
                  </div> --}}
                </div>
              </div>
              <div class="text-3xl font-bold leading-8 mt-6">{{ 0 }}</div>
              <div class="text-base text-gray-600 mt-1">
                Votes
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- END: General Report -->
    <!-- BEGIN: Sales Report -->
    {{-- <div class="col-span-12 lg:col-span-6 mt-8">
      <div class="intro-y block sm:flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">Payment Report</h2>
        <div
          class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300"
        >
          <i
            data-feather="calendar"
            class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"
          ></i>
          <input
            type="text"
            class="datepicker input w-full sm:w-56 box pl-10"
          />
        </div>
      </div>
      <div class="intro-y box p-5 mt-12 sm:mt-5">
        <div class="flex flex-col xl:flex-row xl:items-center">
          <div class="flex">
            <div>
              <div
                class="text-theme-20 dark:text-gray-300 text-lg xl:text-xl font-bold"
              >
                @mon($thisMonth)
              </div>
              <div class="mt-0.5 text-gray-600 dark:text-gray-600">
                This Month
              </div>
            </div>
            <div
              class="w-px h-12 border border-r border-dashed border-gray-300 dark:border-dark-5 mx-4 xl:mx-6"
            ></div>
            <div>
              <div
                class="text-gray-600 dark:text-gray-600 text-lg xl:text-xl font-medium"
              >
                @mon($lastMonth)
              </div>
              <div class="mt-0.5 text-gray-600 dark:text-gray-600">
                Last Month
              </div>
            </div>
          </div>
        </div>
        <div class="report-chart">
          <canvas
            id="report-line-chart"
            height="169"
            class="mt-6"
          ></canvas>
        </div>
      </div>
    </div --}}>
    <!-- END: Sales Report -->
    <!-- BEGIN: Weekly Top Seller -->
    {{-- <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
      <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
          Departments Report
        </h2>
      </div>
      <div class="intro-y box p-5 mt-5">
        <canvas
          class="mt-3"
          id="report-pie-chart"
          height="300"
        ></canvas>
        <div class="mt-8">
          @foreach($departments as $department)
            <div class="flex items-center">
              <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
              <span class="truncate">{{ $department->short_name }}</span>
              <div
                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"
              ></div>
              <span class="font-medium xl:ml-auto">20%</span>
            </div>
          @endforeach
        </div>
      </div>
    </div> --}}
    <!-- END: Weekly Top Seller -->
    
    

    <!-- BEGIN: Weekly Top Products -->
    {{-- <div class="col-span-12 mt-6">
      <div class="intro-y block sm:flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
          Recent Transactions
        </h2>
      </div>
      <div
        class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0"
      >
        <table class="table table-report sm:mt-2">
          <thead>
            <tr>
              <tr>
                  <th class="whitespace-nowrap">#</th>
                  <th class="whitespace-nowrap">Matric No</th>
                  <th class="whitespace-nowrap">Trx Ref</th>
                  <th class="text-center whitespace-nowrap">Fee Code</th>
                  <th class="text-center whitespace-nowrap">Approved Amount</th>
                  <th class="text-center whitespace-nowrap">Trx Date</th>
                  <th class="text-center whitespace-nowrap">Payment Status</th>
              </tr>
            </tr>
          </thead>
          <tbody>
            @foreach($recentTransactions as $transaction)

            @php
                switch($transaction->status){
                    case 'success':
                        $status_color = '9';
                        break;
                    case 'pending':
                        $status_color = '12';
                        break;
                    case 'failed':
                        $status_color = '6';
                        break;
                    default:
                        break;
                    }
            @endphp

            <tr class="intro-x">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->user->matric }}</td>
                <td>{{ $transaction->txref }}</td>
                <td>{{ $transaction->fee_code }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->created_at->format('M j, Y H:ia') }}</td>
                <td>
                    <div class="flex items-center justify-center text-theme-{{ $status_color }}"></i> {{ $transaction->status }} </div>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div
        class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3"
      >
        <ul class="pagination">
          <li>
            <a class="pagination__link" href="#">
              <i class="w-4 h-4" data-feather="chevrons-left"></i>
            </a>
          </li>
          <li>
            <a class="pagination__link" href="#">
              <i class="w-4 h-4" data-feather="chevron-left"></i>
            </a>
          </li>
          <li><a class="pagination__link" href="#">...</a></li>
          <li><a class="pagination__link" href="#">1</a></li>
          <li>
            <a class="pagination__link pagination__link--active" href="#"
              >2</a
            >
          </li>
          <li><a class="pagination__link" href="#">3</a></li>
          <li><a class="pagination__link" href="#">...</a></li>
          <li>
            <a class="pagination__link" href="#">
              <i class="w-4 h-4" data-feather="chevron-right"></i>
            </a>
          </li>
          <li>
            <a class="pagination__link" href="#">
              <i class="w-4 h-4" data-feather="chevrons-right"></i>
            </a>
          </li>
        </ul>
        <select class="w-20 input box mt-3 sm:mt-0">
          <option>10</option>
          <option>25</option>
          <option>35</option>
          <option>50</option>
        </select>
      </div>
    </div> --}}
    <!-- END: Weekly Top Products -->
  </div>
</div>

@endsection