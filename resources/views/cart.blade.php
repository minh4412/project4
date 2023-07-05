@extends('layouts.app', ['page' => __('List Cart'), 'pageSlug' => 'cart'])

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="row">
					<div class="col-8">
						<h4 class="card-title">Cart</h4>
					</div>
                    <div class="col-2 text-right">
                        <a style="color: white !important" class="editall btn btn-sm btn-primary">Save All</a>
                    </div>
                    <div class="col-2 text-right">
                        <a style="color: white !important" class="deleteall btn btn-sm btn-primary">Delete All</a>
                    </div>
				</div>
			</div>
            <div class="card-body" id="list-cart">
            @include('cartdt')
            </div>
			{{-- <div class="card-body" id="list-cart">
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
                                        <input aria-label="quantity" class="input-qty" id="input-qty-{{$cart["productInfo"]->book_id}}" name="qty" type="number" value="{{ $cart["qty"] }}" data-val="{{ $cart["qty"] }}">
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
                    <a onclick="Order('{{ route('listbook.index')}}')" style ="padding: 10px 40px;color: white;" class="btn btn-sm btn-primary">Order confirmation</a>
                </div>
                @endif
			</div> --}}

			<div class="card-footer py-4">

				<nav class="d-flex justify-content-end" aria-label="...">

				</nav>
			</div>
		</div>
		<div class="alert alert-danger">a
			<span>
				<b> </b> This is a PRO feature!</span>
		</div>
	</div>
</div>
<div class="modal modal-search fade" id="popupOrder" tabindex="-1" role="dialog" aria-labelledby="popupOrder" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content my-modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
                <div class="d_flex form-comfirm">
                    <p class="css-comfirm">Are you sure you want to confirm this order?</p>
                    <div style="display:flex;justify-content: center;padding-top: 40px;padding-bottom: 30px;">
                        <a data-dismiss="modal" onclick="Order('{{ route('listbook.index')}}')" style ="padding: 10px 40px;color: white;" class="btn btn-sm btn-primary">Confirm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection