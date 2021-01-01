@extends('layouts.app')
@push('style')
    
@endpush


@section('content')
    <div class="container">
        <h2>Vote Results</h2>
        <div class="row">
            @foreach ($candidateCategoryNames as $categoryName => $candidateNames)
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="card" >
                    <div class="card-header">
                        {{$categoryName}}
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <table style="margin-bottom:0px" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Candidate Name</th>
                                    <th scope="col"># votes</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidateNames as $candidateName => $nbrVote)
                                        <tr>
                                            <td>{{$candidateName}}</td>
                                            <td>{{$nbrVote}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                  </div>
            </div>
                
            @endforeach
        </div>
        
    </div>
@endsection



@push('script')
    
@endpush