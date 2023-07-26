@extends('layouts.app', ['page' => __('Major'), 'pageSlug' => 'major'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">List Major</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('major.create') }}" class="btn btn-sm btn-primary">Creare Major</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Major</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listMajor as $major): ?>
                            <tr>
                                <td>{{ $major -> major_id }}</td>
                                <td><a href="{{ route('major.edit', $major ->major_id) }}">{{ $major -> major_name }}</a></td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#"
                                            role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('major.edit', $major ->major_id) }}">Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    {{ $listMajor->appends([
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
@endsection
