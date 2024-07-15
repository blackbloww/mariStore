@include('layout.index-header')
<div class="flex mx-auto p-4">
    <!-- Hình ảnh sản phẩm -->
    <div class="flex-shrink-0 mr-4">
        <div class="bg-white rounded-lg shadow-lg p-4">
            <img src="{{ asset($product->img) }}" alt="Product Image" class="w-auto h-auto object-cover rounded-lg mb-4">
        </div>
    </div>
    
    <!-- Thông tin sản phẩm -->
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <div class="flex flex-col">
            <div>
                <h1 class="text-2xl font-bold mb-4">Tên sản phẩm: {{ $product->name }}</h1>
                <p class="text-xl font-semibold text-gray-800 mb-4">Giá: {{ number_format($product->price, 0, ',', '.') }} đ</p>
    
                <!-- Kích thước sản phẩm -->
                <div class="flex mb-4">
                    <span class="mr-2">Kích thước:</span>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
                        <label>
                            <input type="radio" value="28" class="peer hidden" name="size">
                            <div class="hover:bg-gray-50 flex items-center justify-center px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                <h2 class="font-medium text-gray-700">28</h2>
                            </div>
                        </label>
                        <label>
                            <input type="radio" value="29" class="peer hidden" name="size">
                            <div class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                <h2 class="font-medium text-gray-700">29</h2>
                            </div>
                        </label>
                        <label>
                            <input type="radio" value="30" class="peer hidden" name="size">
                            <div class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                <h2 class="font-medium text-gray-700">30</h2>
                            </div>
                        </label>
                        <label>
                            <input type="radio" value="31" class="peer hidden" name="size">
                            <div class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                <h2 class="font-medium text-gray-700">31</h2>
                            </div>
                        </label>
                    </div>
                </div>
    
                <div class="flex items-center border-gray-100 mb-4">
                    <span class="mr-2">Số lượng: </span>
                    <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="decreaseQuantity()"> - </span>
                    <input id="quantity-input" class="h-8 w-8 border bg-white text-center text-xs outline-none" name="quantity" type="number" value="1" min="1">
                    <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="increaseQuantity()"> + </span>
                </div>
    
                <input type="hidden" name="sale" value="{{ $product->sale }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="img" value="{{ $product->img }}">
                <input type="hidden" name="name" value="{{ $product->name }}">

    
                <a href="#" class="focus:outline-none underline underline-offset-4" onclick="my_modal_5.showModal()">Hướng dẫn chọn size:</a>
            </div>
    
            <div class="flex mt-8">
                {{-- <button type="submit">
                <a href="{{route('cart.check')}}" class="inline-block text-white font-bold py-2.5 px-4 bg-gradient-to-r from-red-300 to-red-500 border border-transparent transform hover:scale-110 hover:border-white transition-transform duration-3000 ease-in-out">
                    Mua ngay
                    
                </a>
            </button> --}}
            @if(Auth::user())
                <button type="submit" target="_blank" class="group ml-4 relative overflow-hidden bg-white border border-black focus:ring-4 focus:ring-blue-300 inline-flex items-center px-7 py-2.5 text-black justify-center">
                    <span class="z-40 text-red-600">Thêm vào giỏ hàng</span>
                    <svg class="z-40 text-red-500 ml-2 -mr-1 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#1C274C" stroke-width="1.5"></path>
                        <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#1C274C" stroke-width="1.5"></path>
                        <path d="M2 3L2.26121 3.09184C3.5628 3.54945 4.2136 3.77826 4.58584 4.32298C4.95808 4.86771 4.95808 5.59126 4.95808 7.03836V9.76C4.95808 12.7016 5.02132 13.6723 5.88772 14.5862C6.75412 15.5 8.14857 15.5 10.9375 15.5H12M16.2404 15.5C17.8014 15.5 18.5819 15.5 19.1336 15.0504C19.6853 14.6008 19.8429 13.8364 20.158 12.3075L20.6578 9.88275C21.0049 8.14369 21.1784 7.27417 20.7345 6.69708C20.2906 6.12 18.7738 6.12 17.0888 6.12H11.0235M4.95808 6.12H7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                    <div class="absolute inset-0 h-[200%] w-[200%] rotate-45 translate-x-[-70%] transition-all group-hover:scale-100 bg-red-500/30 group-hover:translate-x-[50%] z-20 duration-1000"></div>
                </button>
            @else 
                <a href="{{route('login')}}" target="_blank" class="group ml-4 relative overflow-hidden bg-white border border-black focus:ring-4 focus:ring-blue-300 inline-flex items-center px-7 py-2.5 text-black justify-center">
                    <span class="z-40 text-red-600">Thêm vào giỏ hàng</span>
                    <svg class="z-40 text-red-500 ml-2 -mr-1 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#1C274C" stroke-width="1.5"></path>
                        <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#1C274C" stroke-width="1.5"></path>
                        <path d="M2 3L2.26121 3.09184C3.5628 3.54945 4.2136 3.77826 4.58584 4.32298C4.95808 4.86771 4.95808 5.59126 4.95808 7.03836V9.76C4.95808 12.7016 5.02132 13.6723 5.88772 14.5862C6.75412 15.5 8.14857 15.5 10.9375 15.5H12M16.2404 15.5C17.8014 15.5 18.5819 15.5 19.1336 15.0504C19.6853 14.6008 19.8429 13.8364 20.158 12.3075L20.6578 9.88275C21.0049 8.14369 21.1784 7.27417 20.7345 6.69708C20.2906 6.12 18.7738 6.12 17.0888 6.12H11.0235M4.95808 6.12H7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                    <div class="absolute inset-0 h-[200%] w-[200%] rotate-45 translate-x-[-70%] transition-all group-hover:scale-100 bg-red-500/30 group-hover:translate-x-[50%] z-20 duration-1000"></div>
                </a>
            @endif
            </div>
        </div>
    </form>
</div>

<script>
    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity-input');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }

    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity-input');
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    }
</script>
<dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box p-6 bg-white rounded-lg shadow-lg">
        <h3 class="text-lg font-bold mb-4">Hướng dẫn chọn size</h3>
        <p class="mb-4">01. Vẽ khung bàn chân<br>
            Đặt bàn chân lên tờ giấy trắng, dùng bút đánh dấu theo khung bàn chân trên giấy</p>
        <p class="mb-4">02. Đo chiều dài bàn chân<br>
            Dùng thước đo chiều lớn nhất từ mũi chân đến gót chân trên khung bàn chân đã đánh dấu</p>
        <p class="mb-4">03. Đo độ rộng vòng chân<br>
            Lấy thước dây quấn quanh 1 vòng bàn chân từ khớp ngón chân cái đến khớp ngón chân út</p>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn bg-red-500 text-white px-4 py-2 rounded-md hover:bg-gray-300 focus:outline-none">Close</button>
            </form>
        </div>
    </div>
    
</dialog>
<!-- detail------------ -->
<div class="bg-gray-100 font-sans flex items-center justify-center w-full">
    <div x-data="{ openTab: 1 }" class="p-8">
        <div class="w-full">
            <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md w-full">
                <button x-on:click="openTab = 1" :class="{ 'bg-blue-600 text-white': openTab === 1, 'text-blue-600': openTab !== 1 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Mô tả sản phẩm</button>
                <button x-on:click="openTab = 2" :class="{ 'bg-blue-600 text-white': openTab === 2, 'text-blue-600': openTab !== 2 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Đánh giá</button>
            </div>

            <div x-show="openTab === 1" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600" style="display: none;">
                <h2 class="text-2xl font-semibold mb-2 text-blue-600">TÊN SẢN PHẨM: {{$product->name}}</h2>
                <p class="text-gray-700">Mô tả: {{ $product->description }}</p>
            </div>

            <div x-show="openTab === 2" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600" style="display: none; min-width:500px;">
                <div class="mt-4 rounded shadow">
                    <div class="bg-gray-100 p-3 rounded-t">
                        <h6 class="text-lg font-semibold mb-0">Đánh giá sản phẩm</h6>
                    </div>
                
                    @foreach($commands as $key => $command)
                        <div class="review bg-white shadow-md rounded-md p-4 @if ($key > 0) hidden @endif">
                            <div class="flex items-center">
                                <strong class="text-gray-900">{{ $command->user->name }}</strong>
                                <div class="ml-auto flex">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $command->rating)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-400 w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M5.753.432a1.42 1.42 0 0 1 2.494 0l1.879 3.815 4.198.612a1.42 1.42 0 0 1 .786 2.419l-3.046 2.97.719 4.184a1.42 1.42 0 0 1-2.064 1.497l-3.75-1.97-3.75 1.97a1.42 1.42 0 0 1-2.064-1.497l.72-4.184-3.047-2.97a1.42 1.42 0 0 1 .786-2.42l4.197-.612 1.88-3.814z"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-300 w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M5.753.432a1.42 1.42 0 0 1 2.494 0l1.879 3.815 4.198.612a1.42 1.42 0 0 1 .786 2.419l-3.046 2.97.719 4.184a1.42 1.42 0 0 1-2.064 1.497l-3.75-1.97-3.75 1.97a1.42 1.42 0 0 1-2.064-1.497l.72-4.184-3.047-2.97a1.42 1.42 0 0 1 .786-2.42l4.197-.612 1.88-3.814z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                    
                            <div class="flex mt-2">
                                <p class="text-sm text-gray-600 pl-2">Mặt hàng: {{ Str::limit($command->product->name, 15, '...') }} x {{ $command->quantity }}</p>
                                <div class="ml-auto">
                                    <p class="text-sm text-gray-600">{{ $command->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            
                            <p class="text-gray-800 mt-2">{{ $command->review }}</p>
                        </div>
                        @if (!$loop->last)
                            <hr class="my-4">
                        @endif
                    @endforeach
                    
                    @if (count($commands) > 1)
                        <div id="read-more-button" class="text-center mt-3">
                            <button class="btn btn-outline-primary" onclick="toggleReviews()">Xem thêm</button>
                        </div>
                    @endif
                </div>
            </div>                                                                      
        </div>

    </div>
</div>

<script>
    function toggleReviews() {
        var reviews = document.querySelectorAll('.review');
        var button = document.getElementById('read-more-button');

        for (var i = 1; i < reviews.length; i++) {
            reviews[i].style.display = 'block';
        }

        button.style.display = 'none';
    }
</script>

@include('layout.index-footer')