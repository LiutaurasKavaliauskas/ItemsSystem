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
                </tr>

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->title }} </td>

                        <td>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editModal{{$category->id}}">
                            Edit category
                        </button>
                        <a href="{{route('categories.delete', ['id' => $category->id])}}">
                            <button type="button" class="btn btn-primary btn-lg">
                                Delete category
                            </button>
                        </a>

                        {!! Form::open(['url' => route('categories.edit', ['id' => $category->id])]) !!}
                        <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Category Edit Form</h4>
                                    </div>
                                    <div class="modal-body">
                                        <label>Title</label>
                                        <input name="title" type="text" class="form-control" value="{{$category->title}}">
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

            {!! Form::open(['url' => route('categories.create')]) !!}
            <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">New Category Form</h4>
                        </div>
                        <div class="modal-body">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control">
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