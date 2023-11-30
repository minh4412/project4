@extends('layouts.app', ['page' => __('Student'), 'pageSlug' => 'student'])

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="row">
					<div class="col-8">
						<h4 class="card-title">List Student</h4>
					</div>
					{{-- <div class="col-4 text-right"></div> --}}
					<div class="col-4 text-right">
						<form action="">
							<div style="display: flex" class="form-group">
								<select name="grade" class="form-control" style="margin-right: 15px;">
                                    <option style="color: #9A9A9A;" value="">All Class</option>
                                    @foreach($listgrade as $g)
                                        <option style="color: #9A9A9A;"  value="{{ $g->class_id }}"
                                        @if (isset($grade) && $grade == $g->class_id )
                                            selected
                                        @endif> {{ $g->code }}</option>
                                    @endforeach
								</select>
								<div class="text-right">
									<button class="btn btn-sm btn-primary">Search</button>
								</div>
							</div>
						</form>
					</div>
					{{-- <div class="col-2 text-right">
						<a href="#" class="btn btn-sm btn-primary">Add Student</a>
					</div> --}}
				</div>
			</div>
			<div class="card-body">

				<div class="">
					<table class="table tablesorter " id="">
						<thead class=" text-primary">
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Student Name</th>
								<th scope="col">Student Email</th>
								<th scope="col">Gender</th>
								<th scope="col">Date</th>
								<th scope="col">Class</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($ListStudent as $student): ?>
							<tr>
								<td>{{ $student -> user_id }}</td>
								<td>
									<a href="{{ route('student.edit', $student ->user_id ) }}">{{ $student -> name }}</a>
								</td>
								<td>{{ $student -> email }}</td>
								<td>{{ $student -> GenderName }}</td>
								<td>{{ $student -> date }}</td>
								<td>{{ $student -> code }}</td>
								<td class="text-right">
									<div class="dropdown">
										<a class="btn btn-sm btn-icon-only text-light" href="#"
											role="button" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v"></i>
										</a>
										<div
											class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
											<a class="dropdown-item" href="{{ route('student.edit', $student ->user_id ) }}">Edit</a>
											{{-- <a class="dropdown-item" href="#">Delete</a> --}}
										</div>
									</div>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
                    {{ $ListStudent->appends([
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
@if(Session("editstudent") != null)
<input type="hidden" id="editstudent" data-value="1" />
@endif
@endsection
