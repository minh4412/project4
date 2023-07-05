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
		<form action="{{ route('student.store') }}" method="post">
			@csrf
			<div class="form-group">
                <label class="control-label">Tên sinh viên</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="control-label">Ngày sinh</label>
                <input type="date" name="birthdate" class="form-control datepicker"  required/>
            </div>
            <div class="form-group">
                <label class="control-label">Lớp</label>
                <select name="idGrade" class="form-control">
                @foreach ($ListGrade as $grade)
                        <option value="{{ $grade->idGrade }}">
                            {{ $grade->nameGrade }}
                        </option>
                @endforeach
            </select>
            <div class="form-group">
                <label class="control-label">Giới tính</label>
                <select name="gender" class="form-control">
						<option value="0">Nữ</option>
                        <option value="1">Nam</option>
			    </select>
            </div>
            <button type="submit" class="btn btn-fill btn-rose">Thêm</button>
		</form>
	</div>
	</div>	
</div>	
</div>
@endsection