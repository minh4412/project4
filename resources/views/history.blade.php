@extends('layouts.app', ['page' => __('Purchase history'), 'pageSlug' => 'purchase history'])

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="row">
					<div class="col-8">
						<h4 class="card-title">Purchase History</h4>
					</div>
				</div>
			</div>
			<div class="card-body">

				<div class="">
					<table class="table tablesorter " id="">
						<thead class=" text-primary">
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Date</th>
								<th scope="col">Total Price</th>
								<th scope="col">Status</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($listBill as $bill): ?>
							<tr>
								<td>{{ $bill -> bill_id }}</td>
								<td><a href="{{ route('history.edit', $bill->bill_id) }}">{{ $bill -> order_date }}</a></td>
								<td>{{ number_format($bill -> total_price) }}đ</td>
								<td id="status{{ $bill ->bill_id }}">{{ $bill -> StatusText }}</td>
								<td class="text-right">
									<div class="dropdown">
										<a class="btn btn-sm btn-icon-only text-light" href="#"
											role="button" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v"></i>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
											<a class="dropdown-item" href="{{ route('history.edit', $bill->bill_id) }}">Detail</a>
                                            @if($bill -> status == 0)
											<a id="btn-cancel{{$bill->bill_id}}" class="dropdown-item" data-toggle="modal" data-target="#cancelOrder{{$bill->bill_id}}">Cancel this Order</a>
                                            @endif
										</div>
									</div>
								</td>
							</tr>
							@if($bill ->status == 0)
							<div class="modal modal-search fade" id="cancelOrder{{$bill->bill_id}}" tabindex="-1" role="dialog" aria-labelledby="cancelOrder" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content my-modal">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
												<i class="tim-icons icon-simple-remove"></i>
											</button>
											<div class="d_flex form-comfirm">
												<p class="css-comfirm">Are you sure you want to cancel this order?</p>
												<div style="display:flex;justify-content: center;padding-top: 40px;padding-bottom: 30px;">
													<a data-dismiss="modal" onclick="CancelOrder({{$bill->bill_id}})" style ="padding: 10px 40px;color: white;" class="btn btn-sm btn-primary">Confirm</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif
							<?php endforeach ?>
						</tbody>
					</table>
                    {{ $listBill->appends([
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
@endsection
