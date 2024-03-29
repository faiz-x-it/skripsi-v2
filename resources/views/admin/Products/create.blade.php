@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add new product</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">product create form</h6>
            </div>
            <div class="card-body">
                {!! Form::open(['method'=>'POST', 'action'=>'Admin\AdminProductController@store', 'files'=>true]) !!}

                <div class="form-group">
                    {!! Form::label('title') !!}
                    {!! Form::text('title', null, ['class'=>'form-control '.($errors->has('title')? 'is-invalid': '')]) !!}
                    @if($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('title')}}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('slug') !!}
                    {!! Form::text('slug', null, ['class'=>'form-control '.($errors->has('slug')? 'is-invalid': '')]) !!}
                    @if($errors->has('slug'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('slug')}}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('description') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control '.($errors->has('description')? 'is-invalid': ''), 'rows'=>10]) !!}
                    @if($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('description')}}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                    {!! Form::label('creator_id', 'user') !!}
                    {!! Form::select('creator_id', App\User::where('id', 2)->pluck('name', 'id'), null,['placeholder'=>'Select user','class'=>'form-control '.($errors->has('creator_id')? 'is-invalid': '')]) !!}
                    @if($errors->has('creator_id'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('creator_id')}}</strong>
                        </span>
                    @endif
                </div>
                

                <div class="form-group">
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id', App\Category::pluck('name', 'id'), null,['placeholder'=>'Select category','class'=>'form-control '.($errors->has('category_id')? 'is-invalid': '')]) !!}
                    @if($errors->has('category_id'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('category_id')}}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('warna', 'Regular Price') !!}
                    {!! Form::text('warna', null, ['class'=>'form-control '.($errors->has('warna')? 'is-invalid': '')]) !!}
                    @if($errors->has('warna'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('warna')}}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('tema', 'Discount Rate') !!}
                    {!! Form::text('tema', null, ['class'=>'form-control '.($errors->has('tema')? 'is-invalid': '')]) !!}
                    @if($errors->has('tema'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('tema')}}</strong>
                        </span>
                    @endif
                </div>
                <input type="hidden" name="price">

                <div class="form-group">
                    {!! Form::label('model') !!}
                    {!! Form::text('model', null, ['class'=>'form-control '.($errors->has('model')? 'is-invalid': '')]) !!}
                    @if($errors->has('model'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('model')}}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('init_price', 'Regular Price') !!}
                    {!! Form::text('init_price', null, ['class'=>'form-control '.($errors->has('init_price')? 'is-invalid': '')]) !!}
                    @if($errors->has('init_price'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('init_price')}}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('discount_rate', 'Discount Rate') !!}
                    {!! Form::text('discount_rate', null, ['class'=>'form-control '.($errors->has('discount_rate')? 'is-invalid': '')]) !!}
                    @if($errors->has('discount_rate'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('discount_rate')}}</strong>
                        </span>
                    @endif
                </div>
                <input type="hidden" name="price">

                <div class="form-group">
                    {!! Form::label('quantity') !!}
                    {!! Form::text('quantity', null, ['class'=>'form-control '.($errors->has('quantity')? 'is-invalid': '')]) !!}
                    @if($errors->has('quantity'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('quantity')}}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('image_id', 'product Image') !!}
                    {!! Form::file('image_id', ['class'=>'form-control '.($errors->has('image_id')? 'is-invalid': '')]) !!}
                    <small>Max size 1MB</small>
                    @if($errors->has('image_id'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('image_id')}}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
                    {!! Form::reset('Reset', ['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        /*
         making slug automatically
        */
        $('#title').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug');
            theSlug = theTitle.replace(/&/g, '-and-')
                .replace(/[^a-z$0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '')

            slugInput.val(theSlug);
        });
    </script>
@endsection
