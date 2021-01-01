@extends('layouts.app')
@push('style')
    
@endpush


@section('content')
    <div class="container">
       <h2>Categories</h2>

       <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
              {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Funniest buddy of the year">
                    </div>
                        <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr>
                      <td>{{$category->name}}</td>
                      <td><span class="fa fa-trash"></span></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            
        </div>
   </div>
    </div>
@endsection



@push('script')
    
@endpush