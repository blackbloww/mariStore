@include('layout.index-header')
@php
  $total = 0;
  $sale = 0;
@endphp
<div class="bg-gray-100 pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Giỏ hàng</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
      <div class="rounded-lg md:w-2/3">
@if(count($cartItems)>0)
    @foreach ($cartItems as $item)
    <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">

          <img src="{{ asset($item['img']) }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
          
          <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0">
              <h2 class="text-lg font-bold text-gray-900">{{$item->product['name']}}</h2>
              <p class="mt-1 text-xs text-gray-700">Size:{{$item['size']}}</p>
            </div>
            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
              <form action="{{route('cart.update',$item['id'])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex items-center border-gray-100 quantity-controls">
                  <button class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="decreaseQuantity({{ $item['id'] }})"> - </button>
                  <input id="quantity-{{ $item['id'] }}" class="h-8 w-8 border bg-white text-center text-xs outline-none" name="quantity" type="number" value="{{ $item['quantity'] }}" min="1" />
                  <button class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="increaseQuantity({{ $item['id'] }})"> + </button>
                </div>
              </form>
              <div class="flex items-center space-x-4">
                <p class="text-sm">{{number_format($item['price'],0,',','.')}}đ</p>
              </div>
              <form id="delete-form-{{ $item['id'] }}" action="{{ route('cart.remove', $item['id']) }}" method="POST" onsubmit="return confirmDelete(event, {{ $item['id'] }})">
                @csrf
                @method('DELETE')
                  <button type="submit">
                    <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 7H20" stroke="#fa0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10L7.70141 19.3578C7.87432 20.3088 8.70258 21 9.66915 21H14.3308C15.2974 21 16.1257 20.3087 16.2986 19.3578L18 10" stroke="#fa0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#fa0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                  </button>
              </form>
            </div>
          </div>
        </div>
        @php
          $itemTotal = $item['quantity'] * $item['price'];
          $total += $itemTotal;
          $sale += $item['sale']*$item['quantity'];
        @endphp

    @endforeach
   
      </div>
      <!-- Sub total -->
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Tổng tiền:</p>
          <p class="text-gray-700">{{ number_format($total, 0, ',', '.') }}đ</p>

        </div>
        <div class="flex justify-between">
          <p class="text-gray-700">Triết khấu</p>
          <p class="text-gray-700">{{number_format($sale, 0, ',', '.')}}đ</p>
        </div>
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Tổng tiền: </p>
          <p class="text-lg font-bold">  {{ number_format($total-$sale, 0, ',', '.') }}đ</p>
        </div>
        <a href="{{route('cart.check')}}"><button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 text-blue-50 hover:bg-blue-600"> Thanh toán</button></a>
      </div>
    </div>
</div> 
@else 
  Bạn chưa mua gì!!!!!!!!! 
  @endif


<script>
  function confirmDelete(event, itemId) {
      event.preventDefault(); // Prevent the form from submitting immediately
  
      Swal.fire({
          title: 'Bạn có chắc chắn?',
          text: "Bạn sẽ không thể hoàn tác hành động này!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Có, xóa nó!',
          cancelButtonText: 'Hủy'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('delete-form-' + itemId).submit();
          }
      });
  }
  
  function increaseQuantity(itemId) {
      var quantityInput = document.getElementById('quantity-' + itemId);
      var currentQuantity = parseInt(quantityInput.value);
      quantityInput.value = currentQuantity + 1;
      // Optionally, you can send an AJAX request to update the quantity in the backend
  }
  
  function decreaseQuantity(itemId) {
      var quantityInput = document.getElementById('quantity-' + itemId);
      var currentQuantity = parseInt(quantityInput.value);
      if (currentQuantity > 1) {
          quantityInput.value = currentQuantity - 1;
          // Optionally, you can send an AJAX request to update the quantity in the backend
      }
  }
  </script>
