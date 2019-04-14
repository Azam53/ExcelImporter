@extends('layouts.app')

@section('content')
<div class="container">
        <h2 class="text-center">
            Imported List
        </h2>
 
        @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
 
    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('error') }}</strong>
    </div>
    @endif
 
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <div>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
</div>
@endif

    <div class="row">
               
                                        <table  id="list" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <?php if(empty($sort)) { ?>
                                                    <th><a href="/list/DESC">DOB <i class="fa fa-sort"></i></a></th>
                                                    <?php }if($sort == 'DESC'){  ?>
                                                    <th><a href="/list">DOB <i class="fa fa-sort"></i></a></th>
                                                     <?php } ?>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                        @if(count($employees) > 0)        

                                            @php $counter = 1 @endphp    

                                            @foreach($employees as $employee)    
                                                <tr>
                                                    <td>{{ $counter }}</td>
                                                    <td>{{ $employee->name }}</td>
                                                    <td>{{ $employee->email}}</td>
                                                    <td>{{ $employee->dob}}</td>
                                                    <td><span class="pull-left">
                                                        <a href="/editlistitem/{{$employee->id}}" title="Click to edit"><button class="btn"><i class="fa fa-pencil"></i></button></a>
                                                        </span>
                                                        <span class="pull-right">
                                                        <a href="/deletelistitem/{{$employee->id}}" title="Click to delete" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn"><i class="fa fa-trash"></i></button></a>
                                                        <span>
                                                    </td>
                                                </tr>
                                            
                                            @php $counter++ @endphp  

                                            @endforeach   
                                        @else
                                                <tr>
                                                       <td colspan="3"><center>No records found</center></td>

                                                </tr>    
                                        @endif     
                                               
                                            </tbody>
                                        </table>
                                    
                                    <!-- /.table-responsive -->
                               
                            </div>

 

 
</div>

@endsection