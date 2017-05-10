@extends('layouts.master')

@section('title', trans('items.title'))

@section('content')
    <style>
        table, tr, td {
            border: double;
            font-size: 20px;
        }
    </style>
    <div class="title m-b-md">
        {{ trans('items.page.title') }}
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
        @if(!$items->toArray())
            <div>
                <h2>{{ trans('items.page.none') }}</h2>
            </div>
        @else
            <table>
                <tbody>
                <tr>
                    <td>
                        <strong style="font-size: 30px">
                            {{ trans('items.table.title') }}
                        </strong>
                    </td>
                    <td>
                        <strong style="font-size: 30px">
                            {{ trans('items.table.count') }}
                        </strong>
                    </td>
                    <td>
                        <strong style="font-size: 30px">
                            {{ trans('items.table.price') }}
                        </strong>
                    </td>
                    <td>
                        <strong style="font-size: 30px">
                            {{ trans('items.table.description') }}
                        </strong>
                    </td>
                    <td>
                        <strong style="font-size: 30px">
                            {{ trans('items.table.category') }}
                        </strong>
                    </td>
                </tr>

                @foreach($items as $item)
                    <tr>
                        <td>
                            <strong>
                                {{ $item->title }}
                            </strong>
                        </td>
                        <td>
                            <strong>
                                {{ $item->count }}
                            </strong>
                        </td>
                        <td>
                            <strong>
                                {{ $item->price }}
                            </strong>
                        </td>
                        <td>
                            <strong>
                                {{ $item->description }}
                            </strong>
                        </td>
                        <td>
                            <strong>
                                {{ $item->category['title'] }}
                            </strong>
                        </td>

                        <td>
                            <strong>
                                <button type="button" class="btn-success" data-toggle="modal"
                                        data-target="#editModal{{$item->id}}">
                                    {{ trans('items.buttons.edit') }}
                                </button>
                                <a href="{{route('items.delete', ['id' => $item->id])}}">
                                    <button type="button" class="btn-danger">
                                        {{ trans('items.buttons.delete') }}
                                    </button>
                                </a>
                            </strong>

                            {!! Form::open(['url' => route('items.edit', ['id' => $item->id])]) !!}
                            <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                <strong>{{ trans('items.forms.edit') }}</strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            <label>{{ trans('items.table.title') }}</label>
                                            <strong>
                                                <input name="title" type="text" class="form-control"
                                                       value="{{$item->title}}">
                                            </strong>
                                            <label>{{ trans('items.table.count') }}</label>
                                            <strong>
                                                <input name="count" type="text" class="form-control"
                                                       value="{{$item->count}}">
                                            </strong>
                                            <label>{{ trans('items.table.price') }}</label>
                                            <strong>
                                                <input name="price" type="text" class="form-control"
                                                       value="{{$item->price}}">
                                            </strong>
                                            <label>{{ trans('items.table.description') }}</label>
                                            <strong>
                                                <input name="description" type="text" class="form-control"
                                                       value="{{$item->description}}">
                                            </strong>
                                            <label>{{ trans('items.table.category') }}</label>
                                            <strong>
                                                {!! Form::select('category_id', $categories, null, ['placeholder' => $item->category['title']]) !!}
                                            </strong>
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
        @endif
        <div style="margin-top: 30px">
            @if($categories)
                <div style="margin-top: 30px">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#newModal">
                        <strong>
                            {{ trans('items.buttons.new') }}
                        </strong>
                    </button>

                    @else
                        <div>
                            <h3>{{ trans('items.page.sorry') }}</h3>
                        </div>
                    @endif
                </div>
                {!! Form::open(['url' => route('items.create')]) !!}
                <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><strong>{{ trans('items.forms.new') }}</strong></h4>
                            </div>
                            <div class="modal-body">
                                <label><strong>{{ trans('items.table.title') }}</strong></label>
                                <strong>
                                    <input name="title" type="text" class="form-control">
                                </strong>
                                <label><strong>{{ trans('items.table.count') }}</strong></label>
                                <strong>
                                    <input name="count" type="text" class="form-control">
                                </strong>
                                <label><strong>{{ trans('items.table.price') }}</strong></label>
                                <strong>
                                    <input name="price" type="text" class="form-control">
                                </strong>
                                <label><strong>{{ trans('items.table.description') }}</strong></label>
                                <strong>
                                    <input name="description" type="text" class="form-control">
                                </strong>
                                <label><strong>{{ trans('items.table.category') }}</strong></label>
                                <strong>
                                    {!! Form::select('category', $categories, null, ['placeholder' => 'Select category']) !!}
                                </strong>
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