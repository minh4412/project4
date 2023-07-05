<div class="">
    <table class="table tablesorter " id="">
        <thead class=" text-primary">
            <tr>
                <th scope="col">Book</th>
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
                    <div class="buttons_added">
                        <input class="minus is-form" type="button" value="-">
                        <input aria-label="quantity" class="input-qty" id="input-qty-{{$cart["productInfo"]->book_id}}" name="qty" type="number" value="{{ $cart["qty"] }}" data-id="{{$cart["productInfo"]->book_id}}" data-val="{{ $cart["qty"] }}">
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
    <button style="padding: 10px 40px;color: white;" class="btn btn-sm btn-primary" id="search-button" data-toggle="modal" data-target="#popupOrder">
        {{ __('Order confirmation') }}
    </button>
</div>
@endif