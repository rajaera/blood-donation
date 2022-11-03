@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                  {{ __('Camp List') }} 
                  <a href="{{ route('camp.create') }}" class="btn btn-outline-secondary float-right" role="button" aria-pressed="true"><i class="bi bi-plus"></i>&nbsp;Register New Camp</a>                  
                </div>                
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>                            
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created At</th>                            
                            <th scope="col">&nbsp;</th>   
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($camps as $camp)
                              @php
                                $counter = $loop->index + 1;                               
                              @endphp
                            <tr>
                                <th scope="row"> {{ $counter }} </th>                                
                                <td>{{ $camp->name }}</td>
                                <td>{{ $donor->description }}</td>
                                <td>{{ date('d/m/Y', strtotime($camp->created_at)) }}</td>                                
                                <td>
                                  <a class="btn btn-outline-secondary" href="{{ route('camp.show', $camp->id) }}" role="button" title="View Camp"><i class="bi bi-eye"></i></a>
                                  <a class="btn btn-outline-secondary" href="{{ route('camp.edit', $camp->id) }}" role="button" title="Edit Camp"><i class="bi bi-pencil-fill"></i></a>  
                                </td>                             
                              </tr>
                            @endforeach
                          
                          
                        </tbody>
                      </table>
                </div> 
                
                  <div class="card-footer">
                    <div class="row  float-right">
                      <div class="md-col-12"> 
                        {!! $donors->withQueryString()->links() !!}
                      </div>
                    </div>
                  </div>
                
                
            </div>
        </div>
    </div>
</div>

@endsection