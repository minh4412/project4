@extends('layouts.app', ['page' => __('Purchase history'), 'pageSlug' => 'purchase history'])

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="row">
					<div class="col-8">
						<h4 class="card-title">Bill Detail</h4>
					</div>
                    @if($bill -> status == 0)
					<div class="col-4 text-right">
						<button data-toggle="modal" data-target="#cancelOrder" class="btn btn-sm btn-primary btn-now">Cancel this Order</button>
					</div>
					@elseif($bill -> status == 2)
					<div class="col-4 text-right">
						<button class="btn btn-sm btn-primary" disabled>This order has been cancelled</button>		
					</div>
					@elseif($bill -> status == 1)
					<div class="col-4 text-right">
						<button class="btn btn-sm btn-primary" disabled>This order has been approved</button>		
					</div>
                    @endif
				</div>
			</div>
			<div class="card-body">

				<div class="">
					<table class="table tablesorter " id="">
						<thead class=" text-primary">
							<tr>
								<th scope="col">NO</th>
								<th scope="col">Book</th>
								<th scope="col">Quantity</th>
								<th scope="col">Price</th>
								<th scope="col">Total Price</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($listDetailBill as $detail): ?>
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $detail -> book_name }}</td>
								<td>{{ $detail -> qty_bill }}</td>
								<td>{{ number_format($detail -> book_price) }}đ</td>
								<td>{{ number_format(($detail -> book_price)*($detail -> qty_bill)) }}đ</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
                    {{ $listDetailBill->appends([
                        'search' => $search,
                    ])->links() }}
				</div>

			</div>

			<div class="card-footer py-4">

				<nav class="d-flex justify-content-end" aria-label="...">

				</nav>
			</div>
		</div>
		<div class="alert alert-danger">
			<span>
				<b> </b> This is a PRO feature!</span>
		</div>
	</div>
</div>
<div class="modal modal-search fade" id="cancelOrder" tabindex="-1" role="dialog" aria-labelledby="cancelOrder" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content my-modal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
					<i class="tim-icons icon-simple-remove"></i>
				</button>
				<div class="d_flex form-comfirm">
					<p class="css-comfirm">Are you sure you want to cancel this order?</p>
					<div style="display:flex;justify-content: center;padding-top: 40px;padding-bottom: 30px;">
						<a data-dismiss="modal" onclick="CancelOrder2({{$bill->bill_id}})" style ="padding: 10px 40px;color: white;" class="btn btn-sm btn-primary">Confirm</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
