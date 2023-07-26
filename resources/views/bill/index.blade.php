@extends('layouts.app', ['page' => __('Bill'), 'pageSlug' => 'bill'])

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="row">
					<div class="col-8">
						<h4 class="card-title">List Bill</h4>
					</div>
					{{-- <div class="col-4 text-right">
						<a href="#" class="btn btn-sm btn-primary">Add Class</a>
					</div> --}}
                    {{-- <div class="col-2 text-right">
                        <a href="{{ route('testmail') }}" style="color: white !important" class="btn btn-sm btn-primary">Test</a>
                    </div> --}}
					<div class="col-4 text-right">
						<form action="">
							<div style="display: flex" class="form-group">
								<select name="paymethod" class="form-control" style="margin-right: 15px;">
									<option style="color: #9A9A9A;" value="">All method</option>
									<option style="color: #9A9A9A;" value="0"
									@if (isset($paymethod) && $paymethod == 0 )
										selected 
									@endif>Payment on delivery</option>
									<option style="color: #9A9A9A;" value="1"
									@if (isset($paymethod) && $paymethod == 1 )
										selected 
									@endif>E-Payment</option>
								</select>
								<select name="status" class="form-control" style="margin-right: 15px;">
									<option style="color: #9A9A9A;" value="">All Status</option>
									<option style="color: #9A9A9A;" value="0"
									@if (isset($status) && $status == 0 )
										selected 
									@endif>Pending</option>
									<option style="color: #9A9A9A;" value="1"
									@if (isset($status) && $status == 1 )
										selected 
									@endif>Approved</option>
									<option style="color: #9A9A9A;" value="2"
									@if (isset($status) && $status == 2 )
										selected 
									@endif>Cancelled</option>
								</select>
								<div class="text-right">
									<button class="btn btn-sm btn-primary">Search</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card-body">

				<div class="">
					<table class="table tablesorter " id="">
						<thead class=" text-primary">
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Student</th>
								<th scope="col">Date</th>
								<th scope="col">Total Price</th>
								<th scope="col">Status</th>
								<th scope="col">Payment Method</th>
								<th scope="col">Editor</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($listBill as $bill): ?>
							<tr>
								<td>{{ $bill -> bill_id }}</td>
								<td><a href="{{ route('bill.edit', $bill->bill_id) }}">{{ $bill -> name }}</a></td>
								<td>{{ $bill -> order_date }}</td>
								<td>
									<p style="font-weight: 600;color: red;font-style: italic;">{{ number_format($bill -> total_price) }}đ</p></td>
								<td id="stt{{$bill ->bill_id}}">{{ $bill -> StatusText }}</td>
								<td><?php
									if($bill -> pay_method == 0){
										echo "Payment on delivery";
									}else{
										echo "E-Payment";
									}
								?></td>
								<td>
									<?php
									foreach($listAdmin as $admin): 
										if($admin->user_id == $bill->editor_id){
											if($admin->role == 1){
												echo $admin->name;
											}else{
												echo "User";
											}
										}
									endforeach; 
									?>
								</td>
								<td class="text-right">
									<div class="dropdown">
										<a class="btn btn-sm btn-icon-only text-light" href="#"
											role="button" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v"></i>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
											<a class="dropdown-item" href="{{ route('bill.edit', $bill->bill_id) }}">Detail</a>
                                            @if($bill -> status == 0)
                                            <form class="order" method="post" action="{{ route('bill.update', $bill->bill_id) }}" autocomplete="off">
                                                @csrf
                                                @method('put')
                                                <input type="text" name="status" value="1" style="display:none" readonly>
                                                <?php 
                                                $a = [];
                                                $b = [];
                                                $c = [];
                                                $d = [];
                                                foreach($billdt as $detail): 
                                                    if($detail->bill_id == $bill->bill_id){
                                                        $a[] = $detail->qty_bill;
                                                        $b[] = $detail->qty;
                                                        $c[] = $detail->book_id; 
                                                        $d[] = $detail->qty_received; 
                                                    }
                                                endforeach;
                                                $qty_bill = implode(',', $a);
                                                $qty_book = implode(',', $b);
                                                $book_id = implode(',', $c);
                                                $qty_received = implode(',', $d);
                                                ?>
                                                <input type="text" name="qty_bill" value="{{ $qty_bill}}" style="display:none" readonly>  
                                                <input type="text" name="qty_book" value="{{ $qty_book}}" style="display:none" readonly>   
                                                <input type="text" name="book_id" value="{{ $book_id}}" style="display:none" readonly>   
                                                <input type="text" name="qty_received" value="{{ $qty_received}}" style="display:none" readonly>
												<input type="submit" class="dropdown-item" value="Approve">
                                            </form>
                                            <form class="order" method="post" action="{{ route('bill.update', $bill->bill_id) }}" autocomplete="off">
                                                @csrf
                                                @method('put')
                                                <input type="text" name="status" value="2" style="display:none" readonly>
                                                <input type="submit" class="dropdown-item" value="Cancel">
                                            </form>
                                            @endif
										</div>
									</div>
								</td>
							</tr>
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
