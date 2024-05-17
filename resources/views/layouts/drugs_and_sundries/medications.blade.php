@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Drugs and Sundries</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Drugs and Sundries</h3>
                        <div class="card-tools">
                            <a href="{{ route('medical-item-category-index') }}" class="btn btn-primary">Medical Item Categories</a>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDrugModal">
                                Add Drug or Sundries
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Table to display list of drugs and sundries -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through the drugs and sundries data -->
                                @foreach($drugsAndSundries as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->categories->name }}</td>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="float-right">
                        {{ $drugsAndSundries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- Add Drug Modal -->
<div class="modal fade" id="addDrugModal" tabindex="-1" role="dialog" aria-labelledby="addDrugModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="{{ route('drug-sundries-store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addDrugModalLabel">Add Drug or Sundries</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input class="form-control" name="code" type="text" placeholder="Code" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" type="text" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="drug_category" class="form-control">
                            <option>-- select option --</option>
                            @foreach($drugCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
