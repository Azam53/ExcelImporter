@extends('layouts.app')

@section('content')
<div class="container">
        <h2 class="text-center">
            Edit List Item
        </h2>
<div class="row">
	{!! Form::model($employee,array('method' => 'POST','route' => ['listupdate', $employee->id], 'class' => 'form')) !!}

        {{ csrf_field() }}

         <div class="form-group">
            <label>Name * :</label>
                 {!! Form::text('name', $employee->name, ['class' => 'form-control','required','id'=>'name']) !!}
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label>Email * :</label>
                 {!! Form::text('email', $employee->email, ['class' => 'form-control','required','id'=>'email']) !!}
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label>DOB * :</label>
                 {!! Form::text('dob', $employee->dob, ['class' => 'form-control','required','id'=>'dob']) !!}
            @if ($errors->has('dob'))
                <span class="text-danger">{{ $errors->first('dob') }}</span>
            @endif
        </div>

        <div class="form-group">
        	          {!! Form::hidden('id',$employee->id ,['id'=>'employee_id']) !!}
                      {!! Form::button('SAVE', array('class'=>'btn btn-success btn-submit','id' =>'edit')) !!}     
        </div>
    {!! Form::close() !!}

</div>
</div>
@endsection