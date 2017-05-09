@extends('layouts.master')
@section('items')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Items
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
                    <td>Title</td>
                    <td>Count</td>
                    <td>Price</td>
                    <td>Description</td>
                </tr>

                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->title }} </td>
                        <td>{{ $item->count }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->description }}</td>

                        <td>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editModal{{$item->id}}">
                            Edit item
                        </button>
                        <a href="{{route('items.delete', ['id' => $item->id])}}">
                            <button type="button" class="btn btn-primary btn-lg">
                                Delete item
                            </button>
                        </a>

                        {!! Form::open(['url' => route('items.edit', ['id' => $item->id])]) !!}
                        <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Item Edit Form</h4>
                                    </div>
                                    <div class="modal-body">
                                        <label>Title</label>
                                        <input name="title" type="text" class="form-control" value="{{$item->title}}">
                                        <label>Count</label>
                                        <input name="count" type="text" class="form-control" value="{{$item->count}}">
                                        <label>Price</label>
                                        <input name="price" type="text" class="form-control" value="{{$item->price}}">
                                        <label>Description</label>
                                        <input name="description" type="text" class="form-control" value="{{$item->description}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
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
                New Item
            </button>

            {!! Form::open(['url' => route('items.create')]) !!}
            <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">New Item Form</h4>
                        </div>
                        <div class="modal-body">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control">
                            <label>Count</label>
                            <input name="count" type="text" class="form-control">
                            <label>Price</label>
                            <input name="price" type="text" class="form-control">
                            <label>Description</label>
                            <input name="description" type="text" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection