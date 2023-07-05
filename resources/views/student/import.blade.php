@extends('layout.app')
@section('title' , 'Thêm Sinh Viên')
@section('content')
<div class="col-md-6">
<div class="card">
<div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">assignment</i>
    </div>
    <div class="card-content">
    <h4 class="card-title">Thêm Sinh Viên</h4>	
    <div class="table-responsive">
		<form action="{{ route('student.importprocess') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-control">
				<input type="file" name="fileimport">
			</div>
			<div>
				<button type="submit" class="btn btn-fill btn-rose">Import</button>
			</div>
		</form>
	</div>
	</div>	
</div>	
</div>
@endsection