@extends('layouts.master')

@section('title', trans('categories.page.title'))

@section('content')
    <div class="title m-b-md">
        {{ trans('categories.page.title') }}
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <table>
            <tbody>
            <tr>
                <td>{{ trans('categories.table.title') }}</td>
            </tr>

            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->title }} </td>

                    <td>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#editModal{{$category->id}}">
                            {{ trans('categories.buttons.edit') }}
                        </button>
                        <a href="{{route('categories.delete', ['id' => $category->id])}}">
                            <button type="button" class="btn btn-primary btn-lg">
                                {{ trans('categories.buttons.delete') }}
                            </button>
                        </a>
                        <a href="{{route('categories.show', ['id' => $category->id])}}">
                            <button type="button" class="btn btn-primary btn-lg">
                                {{ trans('categories.buttons.items') }}
                            </button>
                        </a>

                        {!! Form::open(['url' => route('categories.edit', ['id' => $category->id])]) !!}
                        <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"
                                            id="myModalLabel">{{ trans('categories.forms.edit') }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <label>{{ trans('categories.table.title') }}</label>
                                        <input name="title" type="text" class="form-control"
                                               value="{{$category->title}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">{{ trans('categories.buttons.close') }}</button>
                                        <button type="submit"
                                                class="btn btn-primary">{{ trans('categories.buttons.save') }}</button>
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
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#newModal">
            {{ trans('categories.buttons.new') }}
        </button>

        {!! Form::open(['url' => route('categories.create')]) !!}
        <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('categories.forms.new') }}</h4>
                    </div>
                    <div class="modal-body">
                        <label>{{ trans('categories.table.title') }}</label>
                        <input name="title" type="text" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{ trans('categories.buttons.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ trans('categories.buttons.save') }}</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection