<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

    <aside class="overflow-y-auto ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
    <div>
        <div class="-mx-6 px-6 py-4">
            <a href="{{route('home.index')}}" title="home">
                <img src="https://tailus.io/sources/blocks/stats-cards/preview/images/logo.svg" class="w-32" alt="tailus logo">
            </a>
        </div>

    @auth
        <div class="mt-8 text-center">
            <a href="{{ route('users.edit', Auth::user()->id) }}">
                <img src="{{ asset(Auth::user()->avt) }}" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
                <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">{{ Auth::user()->name }}</h5>
                <span class="hidden text-gray-400 lg:block">{{ Auth::user()->role }}</span>
            </a>
        </div>
    @endauth

        
        <ul class="space-y-2 tracking-wide mt-8">
            <li>
                <a href="{{route('assign.role-form')}}" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.0667 5C21.6586 5.95805 22 7.08604 22 8.29344C22 11.7692 19.1708 14.5869 15.6807 14.5869C15.0439 14.5869 13.5939 14.4405 12.8885 13.8551L12.0067 14.7333C11.272 15.465 11.8598 15.465 12.1537 16.0505C12.1537 16.0505 12.8885 17.075 12.1537 18.0995C11.7128 18.6849 10.4783 19.5045 9.06754 18.0995L8.77362 18.3922C8.77362 18.3922 9.65538 19.4167 8.92058 20.4412C8.4797 21.0267 7.30403 21.6121 6.27531 20.5876C6.22633 20.6364 5.952 20.9096 5.2466 21.6121C4.54119 22.3146 3.67905 21.9048 3.33616 21.6121L2.45441 20.7339C1.63143 19.9143 2.1115 19.0264 2.45441 18.6849L10.0963 11.0743C10.0963 11.0743 9.3615 9.90338 9.3615 8.29344C9.3615 4.81767 12.1907 2 15.6807 2C16.4995 2 17.282 2.15509 18 2.43738" stroke="#e1ff00" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.8851 8.29353C17.8851 9.50601 16.8982 10.4889 15.6807 10.4889C14.4633 10.4889 13.4763 9.50601 13.4763 8.29353C13.4763 7.08105 14.4633 6.09814 15.6807 6.09814C16.8982 6.09814 17.8851 7.08105 17.8851 8.29353Z" stroke="#e1ff00" stroke-width="1.5"></path> </g></svg>
                    <span class="-mr-1 font-medium">Cấp quyền</span>
                </a>
            </li>
{{-- ------------ category-------------- --}}
            <li>
                <a href="{{ route('insert_category') }}" class="px-4 py-3 flex items-center space-x-2 rounded-md text-gray-600 group hover:text-gray-700">
                    <svg viewBox="0 0 24 24" class="h-5 w-5" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{opacity:0.2;fill:none;stroke:#000000;stroke-width:5.000000e-02;stroke-miterlimit:10;} </style> <g id="grid_system"></g> 
                        <g id="_icons"> <g> <path d="M21.8,4.5c-0.3-0.7-0.9-1.3-1.6-1.6c-1.5-0.6-3.2,0.1-3.9,1.5l-4.6,10.3c-0.4,0.9-0.5,2-0.4,2.9l0.4,2.2 c0.1,0.3,0.3,0.6,0.6,0.7c0.1,0.1,0.3,0.1,0.4,0.1c0.2,0,0.4-0.1,0.5-0.2l1.9-1.2c0.9-0.6,1.5-1.3,1.9-2.3l4.6-10.3 C22.1,6,22.1,5.2,21.8,4.5z M15.4,16.3c-0.3,0.6-0.7,1-1.2,1.4l-0.7,0.4l-0.1-0.7c-0.1-0.6,0-1.2,0.2-1.8l3.5-8l1.8,0.7L15.4,16.3 z M20,5.9l-0.2,0.5L18,5.7l0.2-0.5c0.2-0.4,0.5-0.6,0.9-0.6c0.1,0,0.3,0,0.4,0.1C19.7,4.8,19.9,5,20,5.2c0,0,0,0,0,0 C20.1,5.5,20.1,5.7,20,5.9z"></path> <path d="M3,17h4c0.6,0,1-0.4,1-1s-0.4-1-1-1H3c-0.6,0-1,0.4-1,1S2.4,17,3,17z"></path> <path d="M9,19H3c-0.6,0-1,0.4-1,1s0.4,1,1,1h6c0.6,0,1-0.4,1-1S9.6,19,9,19z"></path> 
                        </g> </g> </g></svg>
                    <span class="font-medium">Thêm danh mục</span>
                </a>
            </li>

            <li>
                <a href="{{ route('categories.index') }}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                        <path class="fill-current text-gray-600 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                    </svg>
                    <span class="group-hover:text-gray-700">Danh sách danh mục</span>
                </a>
                
            </li>
{{-- ----------------products --------------------------}}
            <li>
                <a href="{{route('products.create')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg version="1.1" class="w-5 h-5" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .blueprint_een{fill:#111918;} </style> 
                            <path class="blueprint_een" d="M30.707,9.293L26,4.586V1c0-0.552-0.448-1-1-1H3C2.448,0,2,0.448,2,1v30c0,0.552,0.448,1,1,1 h22c0.552,0,1-0.448,1-1V15.414l4.707-4.707C31.098,10.317,31.098,9.683,30.707,9.293z M11.921,17.628l4.452,4.452l-5.194,0.742 L11.921,17.628z M17.146,21.439l-4.586-4.586l8.293-8.293l4.586,4.586L17.146,21.439z M26.146,12.439l-4.586-4.586L24,5.414v0 L28.586,10L26.146,12.439z M4,30V2h20v2l-4,4H8v1h11l-2,2H8v1h8l-2,2H8v1h5l-1.764,1.764c-0.069,0.069-0.124,0.15-0.17,0.236H8v1 h2.857l-0.286,2H8v1h2.429l-0.286,2H8v1h2l6.67-0.953c0.214-0.031,0.413-0.13,0.566-0.283L24,16v14H4z"></path> 
                        </g></svg>
                    <span class="group-hover:text-gray-700">Thêm sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="{{route('product.index')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg viewBox="0 0 16 16" class="w-5 h-5" id="meteor-icon-kit__solid-products-s" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 5H14C15.1046 5 16 5.89543 16 7V14C16 15.1046 15.1046 16 14 16H7C5.89543 16 5 15.1046 5 14V7C5 5.89543 5.89543 5 7 5zM3 11H2C0.89543 11 0 10.1046 0 9V2C0 0.89543 0.89543 0 2 0H9C10.1046 0 11 0.89543 11 2V3H7C4.79086 3 3 4.79086 3 7V11z" fill="#141414"></path>
                    </g></svg>
                    <span class="group-hover:text-gray-700">Danh sách sản phẩm</span>
                </a>
            </li>
{{-- ------------------orders -----------------}}
            <li>
                <a href="{{route('orders.index')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.9844 10C21.9473 8.68893 21.8226 7.85305 21.4026 7.13974C20.8052 6.12523 19.7294 5.56066 17.5777 4.43152L15.5777 3.38197C13.8221 2.46066 12.9443 2 12 2C11.0557 2 10.1779 2.46066 8.42229 3.38197L6.42229 4.43152C4.27063 5.56066 3.19479 6.12523 2.5974 7.13974C2 8.15425 2 9.41667 2 11.9415V12.0585C2 14.5833 2 15.8458 2.5974 16.8603C3.19479 17.8748 4.27063 18.4393 6.42229 19.5685L8.42229 20.618C10.1779 21.5393 11.0557 22 12 22C12.9443 22 13.8221 21.5393 15.5777 20.618L17.5777 19.5685C19.7294 18.4393 20.8052 17.8748 21.4026 16.8603C21.8226 16.1469 21.9473 15.3111 21.9844 14" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M21 7.5L17 9.5M12 12L3 7.5M12 12V21.5M12 12C12 12 14.7426 10.6287 16.5 9.75C16.6953 9.65237 17 9.5 17 9.5M17 9.5V13M17 9.5L7.5 4.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                    <span class="group-hover:text-gray-700">Đơn hàng</span>
                </a>
            </li>
{{-- ------------------chart -----------------}}

            <li>
                <a href="{{route('chart.sales_by_day')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 22H2" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M21 22V14.5C21 13.6716 20.3284 13 19.5 13H16.5C15.6716 13 15 13.6716 15 14.5V22" stroke="#000000" stroke-width="1.5"></path> <path d="M15 22V9M9 22V5C9 3.58579 9 2.87868 9.43934 2.43934C9.87868 2 10.5858 2 12 2C13.4142 2 14.1213 2 14.5607 2.43934C15 2.87868 15 3.58579 15 5V5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 22V9.5C9 8.67157 8.32843 8 7.5 8H4.5C3.67157 8 3 8.67157 3 9.5V16M3 22V19.75" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                    <span class="group-hover:text-gray-700">Doanh thu</span>
                </a>
            </li>

            <li>
                <a href="{{route('contact.index')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    <span class="group-hover:text-gray-700">Contact</span>
                </a>
            </li>
        </ul>
    </div>
{{-- ------------------logout -----------------}}

    <div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
            <a href="{{route('logout')}}" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="group-hover:text-red-700">Logout</span>
            </a>
    </div>
</aside>
{{-- ------------------menu ngang -----------------}}

<div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
        <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block"></h5>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="flex space-x-4">
                <!--search bar -->
                <div hidden class="md:block">
                    <div class="relative flex items-center text-gray-400 focus-within:text-cyan-400">
                        <span class="absolute left-4 h-6 flex items-center pr-3 border-r border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current" viewBox="0 0 35.997 36.004">
                                <path id="Icon_awesome-search" data-name="search" d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z"></path>
                            </svg>
                        </span>
                        <form action="{{ route('product.admin_search') }}" method="GET" class="w-full">
                            <input type="search" name="query" id="query" placeholder="Search here" class="w-full pl-14 pr-4 py-2.5 rounded-xl text-sm text-gray-600 outline-none border border-gray-300 focus:border-cyan-300 transition">
                        </form>
                    </div>
                </div>
                <button aria-label="search" class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200 md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 mx-auto fill-current text-gray-600" viewBox="0 0 35.997 36.004">
                        <path id="Icon_awesome-search" data-name="search" d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z"></path>
                    </svg>
                </button>
                <!--/search bar -->

                <button aria-label="chat" class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-auto text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                </button>
    <!-- --------------notification--------- -->
                    @php
                    $count_order = 0;
                @endphp

                @foreach ($orders as $item)
                    @if ($item->status == 'chờ xác nhận')
                        @php
                            $count_order++;
                        @endphp
                    @endif
                @endforeach

                <a href="{{route('orders.index')}}">
                    <button aria-label="notification" class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
                        <div class="relative h-32 w-32">
                            <div class="absolute left-0 top-0 bg-red-500 rounded-full">
                                <span class="text-sm text-white p-1">{{$count_order}}</span>
                            </div>
                            <div class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gray-600 w-6 h-6" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                                </svg>
                            </div>
                        </div>
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
