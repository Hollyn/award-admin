@extends('layouts.app')
@push('style')
    
@endpush


@section('content')
@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
    <div class="container">
       <h2>Candidates</h2>

       <div class="row">
            <div class="col-md-6">
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="name">Candidate name</label>
                  <input type="text" id="name" name="name" class="form-control" id="inputAddress2" placeholder="John Doe">
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select id="category" name="category" class="form-control">
                      <option value="0" selected>Choose...</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}" >{{$category->name}}</option>
                      @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($candidateCategories as $index => $candidateCategory)
                        <tr>
                          <th scope="row">{{$index + 1}}</th>
                          <td>{{$candidateCategory->candidate->name}}</td>
                          <td>{{$candidateCategory->category->name}}</td>
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