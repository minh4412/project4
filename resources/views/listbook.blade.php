@extends('layouts.app', ['page' => __('List Book'), 'pageSlug' => 'listbook'])

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="row">
					<div class="col-4">
						<h4 class="card-title">List Book</h4>
					</div>
					<div class="col-8 text-right">
						<form action="">
							<div style="display: flex" class="form-group">
								<select name="major" class="form-control" style="margin-right: 15px;">
                                    <option style="color: #9A9A9A;"  value="">All Major</option>
                                    @foreach($listMajor as $m)
                                        <option style="color: #9A9A9A;"  value="{{ $m->major_id }}"
                                        @if (isset($major) && $major == $m->major_id )
                                            selected 
                                        @endif> {{ $m->major_name }}</option>
                                    @endforeach
								</select>
								<select name="category" class="form-control" style="margin-right: 15px;">
                                    <option style="color: #9A9A9A;"  value="">All Category</option>
                                    @foreach($listCategory as $c)
                                        <option style="color: #9A9A9A;"  value="{{ $c->category_id }}"
                                            @if (isset($category) && $category == $c->category_id )
                                                selected 
                                            @endif> {{ $c->category_name }}</option>
                                    @endforeach
								</select>
								<select name="subject" class="form-control" style="margin-right: 15px;">
                                    <option style="color: #9A9A9A;"  value="">All Subject</option>
                                    <option style="color: #9A9A9A;"  value="0"
                                    @if (isset($subject) && $subject == 0 )
                                        selected 
                                    @endif>Not in any subject</option>
                                    @foreach($listSubject as $s)
                                        <option style="color: #9A9A9A;"  value="{{ $s->subject_id }}"
                                            @if (isset($subject) && $subject == $s->subject_id )
                                                selected 
                                            @endif> {{ $s->name }}</option>
                                    @endforeach
								</select>
								<div class="text-right">
									<button class="btn btn-sm btn-primary">Search</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			{{-- <div class="card-body">
				<div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Book</th>
                                <th scope="col">Category</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listBook as $book): ?>
                            <tr>
                                <td>{{ $book -> book_id }}</td>
                                <td><a href="{{ route('listbook.show' , $book ->book_id )  }}">{{ $book -> book_name }}</a></td>
                                <td>{{ $book -> category_name }}</td>
                                <td>
                                <?php 
                                $a=[]; 
                                foreach ($listSubject as $sj): 
                                    if($book ->subject_id == $sj ->subject_id){
                                        $a[]=$sj->name;
                                    }
                                endforeach;
                                if(count($a)>0){
                                    echo $a[0];
                                } ?>
                                </td>
                                <td>{{ $book -> qty }}</td>
                                <td>{{ number_format($book -> price) }}đ</td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    {{ $listBook->appends([
                        'search' => $search
                    ])->links() }}
				</div>

			</div> --}}
            <div class="bookshop">
                @foreach ($listBook as $book)
                <div class="item-shop">
                    <div class="img-book">
                        <a href="{{ route('listbook.show' , $book ->book_id )  }}">
                            <img src="{{ asset('uploads/books/'.$book ->image)}}" alt="">
                        </a>
                    </div>
                    <div class="bookname">
                        <a href="{{ route('listbook.show' , $book ->book_id )  }}">{{ $book -> book_name }}</a>
                    </div>
                    <div class="price">
                        <p>{{ number_format($book -> price) }}đ</p>
                    </div>
                    <div class="subject">
                        <p>Subject:&nbsp
                            <?php 
                            $a=[]; 
                            foreach ($listSubject as $sj): 
                                if($book ->subject_id == $sj ->subject_id){
                                    $a[]=$sj->name;
                                }
                            endforeach;
                            if(count($a)>0){
                                echo $a[0];
                            }else{
                                echo "Not in any subject";
                            } ?>
                            </p>
                    </div>
                    <div class="category">
                        <p>Category:&nbsp{{ $book -> category_name }}</p>
                    </div>
                    <div class="category">
                        <p>Major:&nbsp{{ $book -> major_name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pag">
                {{ $listBook->appends([
                    'search' => $search
                ])->links() }}
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
