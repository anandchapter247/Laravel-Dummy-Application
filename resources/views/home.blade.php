@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-9">
                        </div>
                        <div class="col-sm-3">
                            <a href="{{ route('addBlog') }}"><button class="btn btn-primary pull-right"><i class="fa fa-plus"></i>&nbsp; Add New</button></a>
                        </div>
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = (($blogs->currentPage() - 1) * $blogs->perPage()) + 1; ?>
                            @if(!empty($blogs))
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->summary }}</td>
                                        <td>{{ $blog->created_at }}</td>
                                        <td>
                                            <button href="{{ route('deleteBlog') }}" id="{{ $blog->id }}" class="btn-sm btn btn-danger delete"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                   <?php $i ++ ?>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">No Blogs Found</td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
