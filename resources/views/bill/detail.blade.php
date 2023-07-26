@extends('layouts.app', ['page' => __('Bill detail'), 'pageSlug' => 'bill'])

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
					<div class="col-2 text-right dis-after">
                        <form class="order" method="post" action="{{ route('bill.update', $bill->bill_id) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <input type="text" name="status" value="1" style="display:none" readonly>
                            <?php 
                            $a = [];
                            $b = [];
                            $c = [];
                            $d = [];
                            foreach($listDetailBillAll as $detail): 
                                $a[] = $detail->qty_bill;
                                $b[] = $detail->qty;
                                $c[] = $detail->book_id; 
                                $d[] = $detail->qty_received; 
                            endforeach ;
                            $qty_bill = implode(',', $a);
                            $qty_book = implode(',', $b);
                            $book_id = implode(',', $c);
                            $qty_received = implode(',', $d);?>
                            <input type="text" name="qty_bill" value="{{ $qty_bill}}" style="display:none" readonly>  
                            <input type="text" name="qty_book" value="{{ $qty_book}}" style="display:none" readonly>   
                            <input type="text" name="book_id" value="{{ $book_id}}" style="display:none" readonly>   
                            <input type="text" name="qty_received" value="{{ $qty_received}}" style="display:none" readonly>
						    <button class="btn btn-sm btn-primary">Approve</button>
                        </form>
					</div>
					<div class="col-2 text-right">
                        <form class="order" method="post" action="{{ route('bill.update', $bill->bill_id) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <input type="text" name="status" value="2" style="display:none" readonly>
						    <button class="btn btn-sm btn-primary btn-after">Cancel</button>
                        </form>
					</div>
					@elseif($bill -> status == 2)
					<div class="col-2 text-right">
						<button class="btn btn-sm btn-primary btn-after" disabled>This order has been cancelled</button>
					</div>
					@elseif($bill -> status == 1)
					<div class="col-2 text-right">
						<button class="btn btn-sm btn-primary btn-after" disabled>This order has been approved</button>
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
								<th scope="col">Image</th>
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
								<td>
                                    <div class="img-book2">
										<img src="{{ asset('uploads/books/'.$detail ->image)}}" alt="">
                                    </div>
								</td>
								<td>{{ $detail -> book_name }}</td>
								<td>{{ $detail -> qty_bill }}</td>
								<td><p style="font-weight: 600;color: red;font-style: italic;">{{ number_format($detail -> book_price) }}đ</p></td>
								<td><p style="font-weight: 600;color: red;font-style: italic;">{{ number_format(($detail -> book_price)*($detail -> qty_bill)) }}đ</p></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
                    {{ $listDetailBill->appends([
                        'search' => $search,
                    ])->links() }}
					<div style="padding-top: 30px; display: flex; flex-direction: column;">
						<div style="display: flex;"> Total Price : &nbsp<p style="font-weight: 600;color: red;font-style: italic;">{{ number_format($bill->total_price)}}đ</p></div>
					</div>
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
