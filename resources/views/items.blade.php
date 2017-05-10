@extends('layouts.master')

@section('title', trans('items.title'))

@section('content')
    <div class="title m-b-md">
        {{ trans('items.page.title') }}
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
                <td>{{ trans('items.table.title') }}</td>
                <td>{{ trans('items.table.count') }}</td>
                <td>{{ trans('items.table.price') }}</td>
                <td>{{ trans('items.table.description') }}</td>
                <td>{{ trans('items.table.category') }}</td>
            </tr>

            @foreach($items as $item)
                <tr>
                    <td>{{ $item->title }} </td>
                    <td>{{ $item->count }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->category['title'] }}</td>

                    <td>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#editModal{{$item->id}}">
                            {{ trans('items.buttons.edit') }}
                        </button>
                        <a href="{{route('items.delete', ['id' => $item->id])}}">
                            <button type="button" class="btn btn-primary btn-lg">
                                {{ trans('items.buttons.delete') }}
                            </button>
                        </a>

                        {!! Form::open(['url' => route('items.edit', ['id' => $item->id])]) !!}
                        <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">{{ trans('items.forms.edit') }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <label>{{ trans('items.table.title') }}</label>
                                        <input name="title" type="text" class="form-control" value="{{$item->title}}">
                                        <label>{{ trans('items.table.count') }}</label>
                                        <input name="count" type="text" class="form-control" value="{{$item->count}}">
                                        <label>{{ trans('items.table.price') }}</label>
                                        <input name="price" type="text" class="form-control" value="{{$item->price}}">
                                        <label>{{ trans('items.table.description') }}</label>
                                        <input name="description" type="text" class="form-control"
                                               value="{{$item->description}}">
                                        <label>{{ trans('items.table.category') }}</label>
                                        {!! Form::select('category_id', $categories, null, ['placeholder' => $item->category['title']]) !!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">{{ trans('items.buttons.close') }}</button>
                                        <button type="submit"
                                                class="btn btn-primary">{{ trans('items.buttons.save') }}</button>
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
            {{ trans('items.buttons.new') }}
        </button>

        {!! Form::open(['url' => route('items.create')]) !!}
        <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('items.forms.new') }}</h4>
                    </div>
                    <div class="modal-body">
                        <label>{{ trans('items.table.title') }}</label>
                        <input name="title" type="text" class="form-control">
                        <label>{{ trans('items.table.count') }}</label>
                        <input name="count" type="text" class="form-control">
                        <label>{{ trans('items.table.price') }}</label>
                        <input name="price" type="text" class="form-control">
                        <label>{{ trans('items.table.description') }}</label>
                        <input name="description" type="text" class="form-control">
                        <label>{{ trans('items.table.category') }}</label>
                        {!! Form::select('category_id', $categories, null, ['placeholder' => 'Select category']) !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{ trans('items.buttons.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ trans('items.buttons.save') }}</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection