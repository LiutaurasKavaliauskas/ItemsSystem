@extends('layouts.master')

@section('title', trans('categories.page.title'))

@section('content')
    <style>
        table, tr, td {
            border: double;
            font-size: 20px;
        }
    </style>
    <div class="title m-b-md">
        {{ trans('categories.page.title') }}
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        @if(!$categories->toArray())
            <div>
                <h2>No categories yet!</h2>
            </div>
        @else
            <table>
                <tbody>
                <tr>
                    <td>
                        <strong style="font-size: 30px">
                            {{ trans('categories.table.title') }}
                        </strong>
                    </td>
                </tr>

                @foreach($categories as $category)
                    <tr>
                        <td>
                            <strong>
                                {{ $category->title }}
                            </strong>
                        </td>

                        <td>
                            <strong>
                                <button type="button" class="btn-success" data-toggle="modal"
                                        data-target="#editModal{{$category->id}}">
                                    {{ trans('categories.buttons.edit') }}
                                </button>
                                <button type="button" class="btn-danger" data-toggle="modal"
                                        data-target="#deleteModal{{$category->id}}">
                                    {{ trans('categories.buttons.delete') }}
                                </button>
                                <a href="{{route('categories.show', ['id' => $category->id])}}">
                                    <button type="button" class="btn-info">
                                        {{ trans('categories.buttons.items') }}
                                    </button>
                                </a>
                            </strong>

                            {!! Form::open(['url' => route('categories.edit', ['id' => $category->id])]) !!}
                            <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"
                                                id="myModalLabel"><strong>{{ trans('categories.forms.edit') }}</strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>{{ trans('categories.table.title') }}</label>
                                            <strong>
                                                <input name="title" type="text" class="form-control"
                                                       value="{{$category->title}}">
                                            </strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">
                                                <strong>{{ trans('categories.buttons.close') }}</strong></button>
                                            <button type="submit"
                                                    class="btn btn-primary">
                                                <strong>{{ trans('categories.buttons.save') }}</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}

                            {!! Form::open() !!}
                            <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"
                                                id="myModalLabel"><strong
                                                        style="color: red">{!! trans('categories.forms.delete') !!}</strong>
                                            </h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">
                                                <strong>{{ trans('categories.buttons.no') }}</strong></button>
                                            <a href="{{route('categories.delete', ['id' => $category->id])}}">
                                                <button type="button"
                                                        class="btn btn-primary">
                                                    <strong>{{ trans('categories.buttons.yes') }}</strong></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        @endif
        <div style="margin-top: 30px">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#newModal">
                <strong>
                    {{ trans('categories.buttons.new') }}
                </strong>
            </button>
        </div>

        {!! Form::open(['url' => route('categories.create')]) !!}
        <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>{{ trans('categories.forms.new') }}</strong>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <label><strong>{{ trans('categories.table.title') }}</strong></label>
                        <strong>
                            <input name="title" type="text" class="form-control">
                        </strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal"><strong>{{ trans('categories.buttons.close') }}</strong></button>
                        <button type="submit" class="btn btn-primary">
                            <strong>{{ trans('categories.buttons.save') }}</strong></button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection