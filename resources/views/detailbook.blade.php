@extends('layouts.app', ['page' => __('List Book'), 'pageSlug' => 'listbook'])

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="row">
					<div class="col-8">
						<h4 class="card-title">Book Detail</h4>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="detail-book">
                    <div class="dt-img-book" style="max-height:300px">
                        <img src="{{ asset('uploads/books/'.$book->image)}}">
                    </div>
					<div class="info-book">
						<div class="book-detail">
							<div class="d_flex pb_10"><p style="padding-top: 5px;text-wrap: nowrap; width: 100px;">Book Name: &nbsp</p> <p style="font-size: 20px;font-weight: 500;padding-left: 10px;">{{ $book->book_name }}</p></div>
							<div class="d_flex pb_10"><p style="padding-top: 5px;text-wrap: nowrap; width: 100px;">Price:&nbsp</p> <p style="font-size: 20px; color:red;padding-left: 10px;font-style: italic;font-weight: 600;"> {{ number_format($book->price) }}đ</p></div>
							<div class="d_flex pb_10"><p style="padding-top: 5px;text-wrap: nowrap; width: 100px;">Category:&nbsp</p> <p style="font-size: 17px;padding-left: 10px;padding-top: 4px;">  {{ $book->category_name }}</p></div>
							<div class="d_flex pb_10"><p style="padding-top: 5px;text-wrap: nowrap; width: 100px;">Major:&nbsp</p> <p style="font-size: 17px; color:blue; padding-left: 10px;padding-top: 4px;">  {{ $book->major_name }}</p></div>
							<div class="d_flex">
								<p style="padding-top: 5px;text-wrap: nowrap; width: 100px;">Subject:&nbsp</p>
								<p style="font-size: 17px;padding-left: 10px;padding-top: 4px;">
									@if($book->subject_name == "")
										{{ "Không" }}
									@else
										@foreach ($listsubject as $subject)  
											@if ($subject->subject_id == $book->subject_id)
												{{ $subject->name }}
											@endif
										@endforeach
									@endif
								</p>
							</div> 
						</div>
						<div class="add-cart">
							<a onclick="AddToCart({{ $book->book_id }})" class="btn btn-sm btn-primary c_white">Add to Cart</a>
						</div>
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
