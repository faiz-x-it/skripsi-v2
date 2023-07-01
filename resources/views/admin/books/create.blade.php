@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add new book</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Book create form</h6>
            </div>
            <div class="card-body">
                {!! Form::open(['method'=>'POST', 'action'=>'Admin\AdminBooksController@store', 'files'=>true]) !!}
                {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
                <div class="form-group">
                    {!! Form::label('title') !!}
                    {!! Form::text('title', null, ['class'=>'form-control '.($errors->has('slug')? 'is-invalid': ''), 'oninput' => 'generateSlug(this.value)']) !!}
                    @if($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('title')}}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {{-- {!! Form::label('slug') !!} --}}
                    {!! Form::hidden('slug', null, ['class'=>'form-control '.($errors->has('slug')? 'is-invalid': ''), 'id' => 'slug']) !!}
                    @if($errors->has('slug'))
                        <span class="invalid-feedback">
                            {{-- <strong>{{$errors->first('slug')}}</strong> --}}
                        </span>
                    @endif
                </div>
                
                <script>
                    function generateSlug(title) {
                        var slug = title.trim().replace(/\s+/g, '_');
                        document.getElementById('slug').value = slug;
                    }
                
                    // Generate slug on page load if 'title' has a value
                    window.addEventListener('DOMContentLoaded', function() {
                        var titleInput = document.getElementById('title');
                        if (titleInput.value !== '') {
                            generateSlug(titleInput.value);
                        }
                    });
                </script>
                
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
                    {!! Form::label('author_id', 'Author') !!}
                    {!! Form::select('author_id', App\Author::pluck('name', 'id'), null,['placeholder'=>'Select author','class'=>'form-control '.($errors->has('author_id')? 'is-invalid': '')]) !!}
                    @if($errors->has('author_id'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('author_id')}}</strong>
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
                    {!! Form::label('image_id', 'Book Image') !!}
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
