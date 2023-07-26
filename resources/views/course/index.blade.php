@extends('layouts.app', ['page' => __('Course'), 'pageSlug' => 'course'])

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="row">
					<div class="col-8">
						<h4 class="card-title">List Course</h4>
					</div>
					{{-- <div class="col-4 text-right">
						<a href="{{ route('course.create') }}" class="btn btn-sm btn-primary">Add Course</a>
					</div> --}}
				</div>
			</div>
			<div class="card-body">

				<div class="">
					<table class="table tablesorter " id="">
						<thead class=" text-primary">
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Course Name</th>
								<th scope="col">Content</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($ListCourse as $course): ?>
							<tr>
								<td>{{ $course -> course_id }}</td>
								<td>
									<a href="{{ route('course.edit', $course ->course_id) }}">{{ $course -> name }}</a>
								</td>
								<td style="width: 50%;"><p class="too-long-text">{{ $course -> content }}</p></td>
								<td class="text-right">
									<div class="dropdown">
										<a class="btn btn-sm btn-icon-only text-light" href="#"
											role="button" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v"></i>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
											<a class="dropdown-item" href="{{ route('course.edit', $course ->course_id) }}">Edit</a>
                                            {{-- <form action="{{ route('course.destroy', $course ->course_id) }}" method="post">
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
                    {{ $ListCourse->appends([
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
@if(Session("editcourse") != null)
<input type="hidden" id="editcourse" data-value="1" />
@endif
@endsection
