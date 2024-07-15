<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
      
        .carousel {
            display: flex;
            width: 100%;
        }
        .carousel-item {
            min-width: 100%;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-item img {
            width: 100%;
            object-fit: cover;
        }
        swiper-container {
      width: 100%;
      height: 100%;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    swiper-container {
      width: 100%;
      height: 300px;
      margin: 20px auto;
    }

    .append-buttons {
      text-align: center;
      margin-top: 20px;
    }

    .append-buttons button {
      display: inline-block;
      cursor: pointer;
      border: 1px solid #007aff;
      color: #007aff;
      text-decoration: none;
      padding: 4px 10px;
      border-radius: 4px;
      margin: 0 10px;
      font-size: 13px;
    }
    
    </style>

</head>
<body>
    <div class="bg-white">
        <header class="sticky top-0 bg-white z-50 shadow">
            <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="border-b border-gray-200">
                    <div class="flex h-16 items-center">
                        <!-- Logo -->
                        <div class="ml-4 flex lg:ml-0">

                            <a href="{{route('home.index')}}" class="flex-shrink-0">
                                <img src="https://tailus.io/sources/blocks/stats-cards/preview/images/logo.svg" class="w-32" alt="tailus logo">
                            </a>
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6 ml-8">
                                <a href="{{route('home.products')}}" class="text-sm font-medium text-gray-700 hover:text-gray-800">Sản phẩm</a>
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Về chúng tôi</a>
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                <a href="#" id="openContactModal" class="contact-link text-sm font-medium text-gray-700 hover:text-gray-800">Liên hệ</a>
                            </div>
                        </div>
    
                        <div class="ml-auto flex items-center">
                            
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->role === 'admin')
                                            <a href="{{ url('/editor') }}" class="text-sm font-medium text-gray-700 hover:text-gray-800">Dashboard</a>
                                        @else
                                        
                                            <form action="{{ route('logout') }}">
                                                @csrf
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                             this.closest('form').submit();" class="text-sm font-medium text-gray-700 hover:text-gray-800">
                                                    Logout
                                                </a>
                                            </form>
                                        @endif
                                        @else
                                            <a href="{{route('login')}}" class="text-sm font-medium text-gray-700 hover:text-gray-800">Đăng nhập</a>
                                            <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                        
                                            @if (Route::has('register'))
                                            <a href="{{route('register')}}" class="text-sm font-medium text-gray-700 hover:text-gray-800">Đăng ký</a>
                                        @endif
                                    @endauth
                                @endif
                            </div>
    
                <!-- Search -->
                            <div class="flex lg:ml-6 mt-2">
                                <a href="#" id="searchBtn" class="p-2 text-gray-400 hover:text-black">
                                    <span class="sr-only">Search</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </a>
                            </div>
                            
                <!-- Cart -->

                            @php
                                $totalQuantity = 0;
                            @endphp
                            
                            <div class="ml-4 flow-root lg:ml-6 ">
                                <a href="{{route('cart.index')}}">
                                    <div class="flex justify-center items-center">
                                        <div class="relative py-2">
                                    <div class="t-0 absolute left-3">
                                        @foreach ($cartItems as $item)
                                            @php
                                                $totalQuantity += $item->quantity;
                                            @endphp
                                        @endforeach
                                        <p class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white">{{ $totalQuantity }}</p>
                                    
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="file: mt-4 h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                    </div>
                                    </div>
                                </a>
                            </div>
                            <style>
                                .hover-trigger .hover-target {
                                    display: none;
                                }
                                
                                .hover-trigger:hover .hover-target {
                                    display: block;
                                }
                                </style>
                            <div class="ml-4 flow-root lg:ml-6 mt-3">
                                <a href="{{route('order.information')}}" class="relative hover-trigger">
                                    <svg fill="#000000" class="w-6 h-6" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="m15.66 7-.91-2.68L8.62.85a1.28 1.28 0 0 0-1.24 0L1.25 4.32.34 7a1.24 1.24 0 0 0 .58 1.5l.33.18V11a1.25 1.25 0 0 0 .63 1l5.5 3.11a1.28 1.28 0 0 0 1.24 0l5.5-3.11a1.25 1.25 0 0 0 .63-1V8.68l.33-.18a1.24 1.24 0 0 0 .58-1.5zM10 9.87l-.48-1.28L14 6.13l.44 1.28zM8 1.94 13.46 5 8 8 2.54 5zM1.52 7.41 2 6.13l4.48 2.46L6 9.87zm1 1.95 4.25 2.32.62-1.84v3.87L2.5 11zM13.5 11l-4.88 2.71V9.84l.63 1.84 4.25-2.32z"></path></g></svg>
                                        <div class="absolute w-32 bg-white border border-grey-100 px-4 py-2 hover-target">
                                            Đơn hàng
                                        </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    
<!-- --------Modal ----------->
<div id="contactModal" class="fixed inset-0 z-50 hidden overflow-y-auto flex items-center justify-center">
    <div class="bg-white w-1/3 md:max-w-3xl mx-6 p-6 rounded-lg shadow-lg">
      <div class="flex justify-end">
        <button id="closeModalBtn" class="text-gray-500 hover:text-gray-600 focus:outline-none">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <div class="text-center mb-4">
        <h2 class="text-lg font-medium text-gray-800">Liên hệ</h2>
      </div>
      <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Họ và tên</label>
          <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
          <label for="message" class="block text-sm font-medium text-gray-700">Nội dung</label>
          <textarea id="message" name="message" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        </div>
        <div class="mt-6">
          <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Gửi</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('contactModal');
      const link = document.querySelector('.contact-link');
      const closeModalBtn = document.getElementById('closeModalBtn');
      link.addEventListener('click', function (event) {
        event.preventDefault();
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
      });
      closeModalBtn.addEventListener('click', function () {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
      });
      modal.addEventListener('click', function (event) {
        if (event.target === modal) {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
          document.body.classList.remove('overflow-hidden');
        }
      });
      document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
          document.body.classList.remove('overflow-hidden');
        }
      });
    });
  </script> 
    



    <div id="searchModal"
    class="fixed inset-0 z-50 hidden overflow-y-auto flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white w-full md:max-w-3xl mx-6 p-6 rounded-lg shadow-lg">
        <div class="flex justify-end">
            <button id="closeSearchBtn" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="text-center mb-4">
            <h2 class="text-lg font-medium text-gray-800">Tìm kiếm</h2>
        </div>
      <form action="{{ route('products.search') }}" method="GET">
        @csrf
        <div class="mb-4">
          <label for="search" class="block text-sm font-medium text-gray-700">Nhập sản phẩm</label>
          <input type="text" id="search" name="search" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mt-6">
            <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Gửi</button>
          </div>
      </form>
    </div>
</div>

<!-- JavaScript để điều khiển hiển thị modal -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchBtn = document.getElementById('searchBtn');
        const searchModal = document.getElementById('searchModal');
        const closeSearchBtn = document.getElementById('closeSearchBtn');

        // Lắng nghe sự kiện click vào nút tìm kiếm
        searchBtn.addEventListener('click', function (event) {
            event.preventDefault();
            searchModal.classList.remove('hidden');
            searchModal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        });

        // Đóng modal tìm kiếm khi click vào nút close
        closeSearchBtn.addEventListener('click', function () {
            searchModal.classList.add('hidden');
            searchModal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        });

        // Đóng modal tìm kiếm khi click ra ngoài modal
        searchModal.addEventListener('click', function (event) {
            if (event.target === searchModal) {
                searchModal.classList.add('hidden');
                searchModal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        });

        // Đóng modal tìm kiếm khi nhấn phím ESC
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                searchModal.classList.add('hidden');
                searchModal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });
</script>