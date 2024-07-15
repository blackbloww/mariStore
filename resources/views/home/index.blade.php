@include('layout.index-header')
{{-- ----------------slide ------------------- --}}
    <div id="carousel" class="carousel">
        <div class="carousel-item">
            <img src="https://img.pikbest.com/origin/10/00/55/34mpIkbEsTI9M.jpg!w700wp" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="https://img.pikbest.com/origin/10/00/55/34mpIkbEsTI9M.jpg!w700wp" alt="Slide 2">
        </div>
    </div>
{{-- ------------------------san pham moi  -----------------------}}
    <div class="flex flex-col md:flex-row items-center justify-center md:justify-between">
        <div class="md:w-2/5 mx-4">
            <h4 class="text-lg font-semibold">Sản phẩm mới</h4>
            <p class="text-sm text-gray-600 mb-4">Chọn lựa những thiết kế hợp xu hướng nhất</p>
            <div>
              <a href="{{route('home.products')}}" class="w-64 py-2 px-4 bg-transparent text-black font-semibold border border-black rounded hover:bg-red-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">Xem thêm</a>
    </div>
        </div>
        <div class="md:w-3/5 mx-4 mt-4 md:mt-0">
            <swiper-container class="mySwiper w-full" slides-per-view="3" centered-slides="true" space-between="30" pagination="true" pagination-type="fraction" navigation="true">
              @foreach ($products as $product)
                <swiper-slide class="bg-gray-200 rounded-md p-4"><a href="{{route('detail',$product->id)}}"><img class="w-72 h-72" src="{{$product->img}}" alt=""></a></swiper-slide>
              @endforeach
            </swiper-container>
        </div>
    </div>
    
{{-- ------------------------san pham nike  -----------------------}}
<div class="flex items-center justify-center space-x-4">
  <hr class="w-64 border-t-1">
  <span class="text-xl font-bold">Giày NIKE</span>
  <hr class="w-64 border-t-1">
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
  @foreach ($productsCategory1 as $product)
      <div class="flex items-center justify-center p-2">
        <div class="relative w-full h-full">
          <a href="{{route('detail',$product->id)}}">
            <img src="{{$product->img}}" alt="Product Image" class="w-full h-full object-cover rounded-lg shadow-lg">
          </a>
          <p class="text-center">{{ \Illuminate\Support\Str::limit($product->name, 30, '...') }}</p>
          <p class="text-center font-bold text-xl">{{number_format($product->price,0,',','.')}} đ</p>
          <span class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-bl-lg">NEW</span>
        </div>
      </div>
  @endforeach
</div>



{{-- ------------------------san pham vans  -----------------------}}
<div class="flex items-center justify-center space-x-4 mt-32">
    <hr class="w-64 border-t-1">
    <span class="text-xl font-bold">Giày VANS</span>
    <hr class="w-64 border-t-1">
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
  @foreach ($productsCategory2 as $product1)
      <div class="flex items-center justify-center p-2">
        <div class="relative w-full h-full">
          <a href="{{route('detail',$product1->id)}}">
            <img src="{{$product1->img}}" alt="Product1 Image" class="w-full h-full object-cover rounded-lg shadow-lg">
          </a>
          <p class="text-center">{{ \Illuminate\Support\Str::limit($product1->name, 30, '...') }}</p>
          <p class="text-center font-bold text-xl">{{number_format($product1->price,0,',','.')}} đ</p>
          <span class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-bl-lg">NEW</span>
        </div>
      </div>
  @endforeach
</div>
{{-- ------------------------san pham   -----------------------}}
<div class="flex items-center justify-center space-x-4 mt-32">
    <hr class="w-64 border-t-1">
    <span class="text-xl font-bold">Giày JODAN</span>
    <hr class="w-64 border-t-1">
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 mb-32">
  @foreach ($productsCategory3 as $product2)
      <div class="flex items-center justify-center p-2">
        <div class="relative w-full h-full">
          <a href="{{route('detail',$product2->id)}}">
            <img src="{{$product2->img}}" alt="Product2 Image" class="w-full h-full object-cover rounded-lg shadow-lg">
          </a>
          <p class="text-center">{{ \Illuminate\Support\Str::limit($product2->name, 30, '...') }}</p>
          <p class="text-center font-bold text-xl">{{number_format($product2->price,0,',','.')}} đ</p>
          <span class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-bl-lg">NEW</span>
        </div>
      </div>
  @endforeach
</div>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  <script>
    const swiperEl = document.querySelector('swiper-container');
    const swiper = swiperEl.swiper;

    var appendNumber = 4;
    var prependNumber = 1;
    document
      .querySelector(".prepend-2-slides")
      .addEventListener("click", function (e) {
        e.preventDefault();
        swiper.prependSlide([
          '<swiper-slide>Slide ' + --prependNumber + "</swiper-slide>",
          '<swiper-slide>Slide ' + --prependNumber + "</swiper-slide>",
        ]);
      });
    document
      .querySelector(".prepend-slide")
      .addEventListener("click", function (e) {
        e.preventDefault();
        swiper.prependSlide(
          '<swiper-slide>Slide ' + --prependNumber + "</swiper-slide>"
        );
      });
    document
      .querySelector(".append-slide")
      .addEventListener("click", function (e) {
        e.preventDefault();
        swiper.appendSlide(
          '<swiper-slide>Slide ' + ++appendNumber + "</swiper-slide>"
        );
      });
    document
      .querySelector(".append-2-slides")
      .addEventListener("click", function (e) {
        e.preventDefault();
        swiper.appendSlide([
          '<swiper-slide>Slide ' + ++appendNumber + "</swiper-slide>",
          '<swiper-slide>Slide ' + ++appendNumber + "</swiper-slide>",
        ]);
      });
  </script>
<script>
    let currentIndex = 0;
    const items = document.querySelectorAll('.carousel-item');
    const intervalTime = 2000; 
    function showSlide(index) {
        const totalItems = items.length;
        if (index >= totalItems) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = totalItems - 1;
        } else {
            currentIndex = index;
        }
        const offset = -currentIndex * 100;
        items.forEach(item => {
            item.style.transform = `translateX(${offset}%)`;
        });
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }

    setInterval(nextSlide, intervalTime); // Change slide every 2 seconds

    showSlide(currentIndex);
</script>

@include('layout.index-footer')