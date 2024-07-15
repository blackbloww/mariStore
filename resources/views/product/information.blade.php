@include('layout.index-header')

<h2 class="text-2xl font-bold text-center mt-12 mb-10">Đơn hàng của bạn</h2>

    @if(count($orders) > 0)
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="w-1/12 py-2 text-center border-r">Họ tên</th>
                    <th class="w-1/12 py-2 text-center border-r">Email</th>
                    <th class="w-1/12 py-2 text-center border-r">Địa chỉ</th>
                    <th class="w-1/12 py-2 text-center border-r">Số ĐT</th>
                    <th class="w-2/12 py-2 text-center border-r">Tổng tiền</th>
                    @for ($i = 1; $i <= $orders->max(fn($order) => count($order->orderItems)); $i++)
                        <th class="py-2 text-center border-r border-b">Tên sản phẩm {{ $i }}</th>
                        <th class="py-2 text-center border-r border-b">Size {{ $i }}</th>
                    @endfor
                    <th class="w-1/12 py-2 text-center">Trạng thái</th>
                    <th class="w-1/12 py-2 text-center"></th> 
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr data-id="{{ $order->user_id }}" class="border-b hover:bg-red-50">
                        <td class="py-2 px-4 text-center border">{{ $order->name }}</td>
                        <td class="py-2 px-4 text-center border">{{ $order->email }}</td>
                        <td class="py-2 px-4 text-center border">{{ $order->address }}</td>
                        <td class="py-2 px-4 text-center border">{{ $order->phone }}</td>
                        <td class="py-2 px-4 text-center border">{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
            
                        @foreach($order->orderItems as $item)
                            <td class="py-2 px-4 text-center border">{{ $item->product->name }}</td>
                            <td class="py-2 px-4 text-center border">{{ $item->size->name }}</td>
                        @endforeach
           
                        @for ($i = count($order->orderItems); $i < $orders->max(fn($order) => count($order->orderItems)); $i++)
                            <td class="py-2 px-4"></td>
                            <td class="py-2 px-4"></td>
                        @endfor
                        <td class="py-2 px-4 text-center border">{{ $order->status }}</td>

                        @if($order->status == 'chờ xác nhận' || $order->status == 'đang chuẩn bị hàng')
                            <td class="py-2 px-4 text-center border">
                                <form id="cancel-form-{{ $order->id }}" action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="event.preventDefault(); confirmDelete({{ $order->id }});">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">
                                        Hủy đơn
                                    </button>
                                </form>
                            </td>
                        @elseif($order->status == 'hoàn thành')
                            <td class="py-2 px-4 text-center border">
                                
                                <a href="{{ route('orders.review', ['order_id' => $order->id, 'product_id' => $item->product->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">
                                    Đánh giá
                                </a>
                            </td>
                        @else
                            <td class="py-2 px-4 text-center border">
                                <form id="delete-form" method="POST" onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-1 px-2 rounded" disabled>
                                        Hủy đơn
                                    </button>
                                </form>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Bạn chưa có đơn hàng nào!!</p>
    @endif

    <script>
        function confirmDelete(orderId) {
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
                    document.getElementById('cancel-form-' + orderId).submit();
                }
            });
        }
    </script>