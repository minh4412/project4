<div class="">
    <table class="table tablesorter " id="">
        <thead class=" text-primary">
            <tr>
                <th scope="col">Book</th>
                <th scope="col">Image</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">TotalPrice</th>
                <th scope="col">Save</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody style="border-bottom: 0.0625rem solid rgba(34, 42, 66, 0.2);">
            @if(Session::has("cart") != null)
            @foreach (Session::get("cart")->listproduct as $cart)
            <tr>
                <td>{{ $cart["productInfo"]->book_name }}</td>
                <td>
                    <div class="img-book2">
                        <img src="{{ asset('uploads/books/'.$cart["productInfo"]->image)}}" alt="">
                    </div>
                </td>
                <td>
                    <div class="buttons_added">
                        <input class="minus is-form" type="button" value="-">
                        <input aria-label="quantity" class="input-qty" id="input-qty-{{$cart["productInfo"]->book_id}}" name="qty" type="number" value="{{ ($cart["qty"] > 0) ? $cart["qty"] : 1 }}" data-id="{{$cart["productInfo"]->book_id}}" data-val="{{ ($cart["qty"] > 0) ? $cart["qty"] : 1 }}">
                        <input class="plus is-form" type="button" value="+">
                    </div>
                </td>
                <td>{{ $cart["productInfo"]->price }}</td>
                <td>{{ number_format($cart["price"]) }}đ</td>
                <td>
                    <div style="padding-left: 10px;">
                        <a onclick="UpdateItemCart({{ $cart['productInfo']->book_id }})" style="cursor: pointer;"><i class="tim-icons icon-check-2"></i></a>
                    </div>
                </td>
                <td>
                    <div style="padding-left: 13px;">
                        <a onclick="DeleteItemCart({{ $cart['productInfo']->book_id }})" style="cursor: pointer;"><i class="tim-icons icon-trash-simple"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<div style="padding-top: 30px; display: flex; flex-direction: column;">
    <div style="display: flex;"> Total Item In Cart : &nbsp<p class="titem">{{ (Session("cart") != null) ?  Session("cart")->totalqty : 0 }}</p></div>
    <div style="display: flex;"> Total Price : &nbsp<p class="tprice">{{ (Session("cart") != null) ? number_format(Session("cart")->totalprice) : 0 }}đ</p></div>
</div>
@if(Session("cart") != null)
<div style="display: flex;justify-content: center;padding-top: 40px;">
    {{-- <form action="{{url('/epayment')}}" method="POST">
        @csrf
        <button type="submit" name="redirect" style="padding: 10px 40px;color: white;margin-right:40px" class="btn btn-sm btn-primary">
            {{ __('E-payment') }}
        </button>
    </form> --}}
    <button style="padding: 10px 40px;color: white;margin-left:40px" class="btn btn-sm btn-primary" id="search-button" data-toggle="modal" data-target="#popupOrder">
        {{ __('Order confirmation') }}
    </button>
</div>
@endif
@if(Session("success") != null)
<input type="hidden" id="hdnSession" data-value="0" />
@elseif(Session("fail") != null)
<input type="hidden" id="hdnSession" data-value="1" />
@endif