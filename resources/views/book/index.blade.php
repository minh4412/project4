@extends('layouts.app', ['page' => __('Book'), 'pageSlug' => 'book'])

@section('content')
<?php echo $major; ?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
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
                    <div class="col-2 text-right">
                        <a href="{{ route('book.create') }}" class="btn btn-sm btn-primary">Create Book</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Book</th>
                                <th scope="col">Category</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Major</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
								<th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listBook as $book): ?>
                            <tr>
                                <td>{{ $book -> book_id }}</td>
								<td>
                                    <div class="img-book2">
                                        <a href="{{ route('book.edit', $book ->book_id) }}">
                                            <img src="{{ asset('uploads/books/'.$book ->image)}}" alt="">
                                        </a>
                                    </div>
								</td>
                                <td><a href="{{ route('book.edit', $book ->book_id) }}">{{ $book -> book_name }}</a></td>
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
                                <td>{{ $book -> major_name }}</td>
                                <td>{{ $book -> qty }}</td>
                                <td>
                                    <p style="font-weight: 600;color: red;font-style: italic;">{{number_format($book->price)}}đ</p>
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
                                            <a class="dropdown-item" href="{{ route('book.edit', $book ->book_id) }}">Edit</a>
                                            <form action="{{ route('book.destroy', $book ->book_id) }}" method="post">
                                                @csrf
                                                @METHOD('DELETE')
                                                <input type="submit" class="dropdown-item" value="Delete">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    {{ $listBook->appends([
                        'search' => $search
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
@if(Session("editbook") != null)
<input type="hidden" id="editbook" data-value="1" />
@endif
@if(Session("addbook") != null)
<input type="hidden" id="addbook" data-value="1" />
@endif
@endsection
