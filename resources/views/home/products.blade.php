@include('layout.index-header')

<p class="font-bold text-2xl text-center mt-4">Sản phẩm</p>
{{-- -------------menu start---------------- --}}

<div class="flex justify-between items-center w-full border-b border-t border-gray-300 mt-4 h-16">
    <div class="flex-1 flex items-center justify-center border-r border-gray-300 py-2">
        @php
            $count = count($products);
        @endphp
        <span class="text-center">{{$count}} sản phẩm</span>
    </div>
    <div class="flex-1 flex items-center justify-center py-2">
        <div class="relative inline-block text-left">
            <button id="dropdown-button" class="inline-flex z-50 justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.57956 5.87979C7.57956 5.72066 7.51634 5.56804 7.40382 5.45552C7.2913 5.343 7.13869 5.27979 6.97956 5.27979C6.82043 5.27979 6.66781 5.343 6.55529 5.45552C6.44277 5.56804 6.37956 5.72066 6.37956 5.87979V16.4318L5.00456 15.0558C4.94874 15 4.88249 14.9557 4.80956 14.9255C4.73664 14.8953 4.65849 14.8797 4.57956 14.8797C4.50063 14.8797 4.42247 14.8953 4.34955 14.9255C4.27663 14.9557 4.21037 15 4.15456 15.0558C4.09874 15.1116 4.05447 15.1779 4.02427 15.2508C3.99406 15.3237 3.97852 15.4019 3.97852 15.4808C3.97852 15.5597 3.99406 15.6379 4.02427 15.7108C4.05447 15.7837 4.09874 15.85 4.15456 15.9058L6.55456 18.3038L6.56356 18.3118C6.67613 18.4218 6.82763 18.4827 6.985 18.4814C7.14237 18.4801 7.29283 18.4166 7.40356 18.3048L9.80356 15.9048C9.91627 15.7922 9.97965 15.6395 9.97974 15.4801C9.97984 15.3208 9.91664 15.168 9.80406 15.0553C9.69147 14.9426 9.53872 14.8792 9.37941 14.8791C9.2201 14.879 9.06727 14.9422 8.95456 15.0548L7.57956 16.4328V5.87979ZM11.7796 7.07978C11.7796 6.92065 11.8428 6.76804 11.9553 6.65552C12.0678 6.543 12.2204 6.47978 12.3796 6.47978H20.7796C20.9387 6.47978 21.0913 6.543 21.2038 6.65552C21.3163 6.76804 21.3796 6.92065 21.3796 7.07978C21.3796 7.23891 21.3163 7.39153 21.2038 7.50405C21.0913 7.61657 20.9387 7.67978 20.7796 7.67978H12.3796C12.2204 7.67978 12.0678 7.61657 11.9553 7.50405C11.8428 7.39153 11.7796 7.23891 11.7796 7.07978ZM12.3796 10.0798C12.2204 10.0798 12.0678 10.143 11.9553 10.2555C11.8428 10.368 11.7796 10.5207 11.7796 10.6798C11.7796 10.8389 11.8428 10.9915 11.9553 11.104C12.0678 11.2166 12.2204 11.2798 12.3796 11.2798H18.3796C18.5387 11.2798 18.6913 11.2166 18.8038 11.104C18.9163 10.9915 18.9796 10.8389 18.9796 10.6798C18.9796 10.5207 18.9163 10.368 18.8038 10.2555C18.6913 10.143 18.5387 10.0798 18.3796 10.0798H12.3796ZM12.3796 13.6798C12.2204 13.6798 12.0678 13.743 11.9553 13.8555C11.8428 13.968 11.7796 14.1207 11.7796 14.2798C11.7796 14.4389 11.8428 14.5915 11.9553 14.704C12.0678 14.8166 12.2204 14.8798 12.3796 14.8798H15.9796C16.1387 14.8798 16.2913 14.8166 16.4038 14.704C16.5163 14.5915 16.5796 14.4389 16.5796 14.2798C16.5796 14.1207 16.5163 13.968 16.4038 13.8555C16.2913 13.743 16.1387 13.6798 15.9796 13.6798H12.3796ZM12.3796 17.2798C12.3008 17.2798 12.2227 17.2953 12.1499 17.3255C12.0771 17.3556 12.011 17.3998 11.9553 17.4555C11.8996 17.5112 11.8554 17.5774 11.8252 17.6502C11.7951 17.723 11.7796 17.801 11.7796 17.8798C11.7796 17.9586 11.7951 18.0366 11.8252 18.1094C11.8554 18.1822 11.8996 18.2483 11.9553 18.304C12.011 18.3598 12.0771 18.404 12.1499 18.4341C12.2227 18.4643 12.3008 18.4798 12.3796 18.4798H13.5796C13.6583 18.4798 13.7364 18.4643 13.8092 18.4341C13.882 18.404 13.9481 18.3598 14.0038 18.304C14.0595 18.2483 14.1037 18.1822 14.1339 18.1094C14.164 18.0366 14.1796 17.9586 14.1796 17.8798C14.1796 17.801 14.164 17.723 14.1339 17.6502C14.1037 17.5774 14.0595 17.5112 14.0038 17.4555C13.9481 17.3998 13.882 17.3556 13.8092 17.3255C13.7364 17.2953 13.6583 17.2798 13.5796 17.2798H12.3796Z" fill="black"></path>
                </svg>
                <span class="text-center">Sắp xếp</span>
            </button>
            <div id="dropdown-menu" class="origin-top-right z-50 absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                    <a href="{{ route('sort', ['sort' => 'asc', 'field' => 'price']) }}" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">
                        Giá tăng dần
                    </a>
                    <a href="{{ route('sort', ['sort' => 'desc', 'field' => 'price']) }}" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">
                        Giá giảm dần
                    </a>
                    
                    {{-- <a href="#" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">Item 3</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- -------------------products start---------------- --}}

<div class="flex">
{{-- -------------------left---------------- --}}

    <form action="{{ route('filter') }}" method="GET" class="w-1/4 shadow-lg p-4 bg-white rounded-lg">
        <p class="font-bold mb-2">Giá:</p>
        <div class="mb-2">
            <input type="checkbox" name="price" value="< 500.000đ" id="price1" class="mr-2 w-4 h-4">
            <label for="price1">< 500.000đ</label>
        </div>
        <div class="mb-2">
            <input type="checkbox" name="price" value="< 1.000.000đ" id="price2" class="mr-2 w-4 h-4">
            <label for="price2">< 1.000.000đ</label>
        </div>
        <hr>
        {{-- <p class="font-bold mb-2">Màu sắc:</p>
        <div class="mb-2">
            <input type="checkbox" name="color" value="Đen" id="color1" class="mr-2 w-4 h-4">
            <label for="color1">Đen</label>
        </div>
        <div class="mb-2">
            <input type="checkbox" name="color" value="Trắng" id="color2" class="mr-2 w-4 h-4">
            <label for="color2">Trắng</label>
        </div> --}}
        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Lọc</button>
    </form>
    

{{-- -------------------right---------------- --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
        @foreach ($products as $product)
            <div class="flex items-center justify-center p-2">
                <div class="relative w-full">
                    <a href="{{route('detail',$product->id)}}">
                    <img src="{{$product->img}}" alt="Product Image" class="w-full object-cover rounded-lg shadow-lg" style="height:350px">
                    </a>
                    <p class="text-center">{{ \Illuminate\Support\Str::limit($product->name, 30, '...') }}</p>
                    <p class="text-center font-bold text-xl">{{number_format($product->price,0,',','.')}} đ</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="mt-4">
    {{ $products->links() }}
</div>




{{---------- option radio --- --}}
<script>
    // document.querySelectorAll('input[type="checkbox"][name="color"]').forEach(checkbox => {
    //     checkbox.addEventListener('change', function() {
    //         document.querySelectorAll('input[type="checkbox"][name="color"]').forEach(cb => {
    //             if (cb !== this) cb.checked = false;
    //         });
    //     });
    // });

    document.querySelectorAll('input[type="checkbox"][name="price"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            document.querySelectorAll('input[type="checkbox"][name="price"]').forEach(cb => {
                if (cb !== this) cb.checked = false;
            });
        });
    });
</script>

{{---------- dropdown --- --}}

<script>
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('dropdown-menu');
    let isDropdownOpen = false;

    function toggleDropdown() {
        isDropdownOpen = !isDropdownOpen;
        if (isDropdownOpen) {
            dropdownMenu.classList.remove('hidden');
        } else {
            dropdownMenu.classList.add('hidden');
        }
    }

    // toggleDropdown();

    dropdownButton.addEventListener('click', toggleDropdown);

    window.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            isDropdownOpen = false;
        }
    });
</script>