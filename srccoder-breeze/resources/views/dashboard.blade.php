<x-app>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

     <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            {{--  <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">  --}}
                    {{ __("Welcome to your personal srccoder user page.") }}
                {{--  </div>
            </div>  --}}
        </div>
        <div class="col-xs-6">
            {{--  <div class="bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">  --}}
                    {{ __("You can use this page to manage your account.") }}
                {{--  </div>
            </div>  --}}
        </div>
    </div>
</div>
<div class="grid grid-flow-row auto-rows-max">
    <div>01</div>
    <div>02</div>
    <div>03</div>
  </div>

  <div class="flex">
    <div class="w-1/2 bg-red-500">
      <!-- Content for the first div -->
    </div>
    <div class="w-1/2 bg-blue-500">
      <!-- Content for the second div -->
    </div>
  </div>

  
  
</x-app>
