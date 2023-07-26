@extends('layouts.app', ['page' => __('Class'), 'pageSlug' => 'class'])

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="row">
					<div class="col-8">
						<h4 class="card-title">List Class</h4>
					</div>
					{{-- <div class="col-4 text-right">
						<a href="{{ route('class.create') }}" class="btn btn-sm btn-primary">Add Class</a>
					</div> --}}
				</div>
			</div>
			<div class="card-body">

				<div class="">
					<table class="table tablesorter " id="">
						<thead class=" text-primary">
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Class</th>
								<th scope="col">Course</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($ListGrade as $class): ?>
							<tr>
								<td>{{ $class -> class_id }}</td>
								<td>
									<a href="{{ route('class.edit', $class ->class_id) }}">{{ $class -> code }}</a>
								</td>
								<td>{{ $class -> name }}</td>
								<td class="text-right">
									<div class="dropdown">
										<a class="btn btn-sm btn-icon-only text-light" href="#"
											role="button" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v"></i>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
											<a class="dropdown-item" href="{{ route('class.edit', $class ->class_id) }}">Edit</a>
											{{-- <form action="{{ route('class.destroy', $class ->class_id) }}" method="post">
                                                @csrf
                                                @METHOD('DELETE')
                                                <input type="submit" class="dropdown-item" value="Delete">
                                            </form> --}}
										</div>
									</div>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
                    {{ $ListGrade->appends([
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
@if(Session("editclass") != null)
<input type="hidden" id="editclass" data-value="1" />
@endif
@endsection
