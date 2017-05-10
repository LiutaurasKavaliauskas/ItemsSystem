@extends('layouts.master')

@section('title', trans('index.page.title'))

@section('content')
    <div class="title m-b-md">
        {{ trans('index.page.message') }}
    </div>

    <div class="panel-title">
        <strong>
            {!! trans('index.page.about')  !!}
        </strong>
    </div>

    <div style="margin-top: 30px">
        <a href="{{ route('items') }}">
            <button type="button" class="btn btn-primary btn-lg">
                <strong>
                    {{ trans('index.buttons.items') }}
                </strong>
            </button>
        </a>

        <a href="{{ route('categories') }}">
            <button type="button" class="btn btn-primary btn-lg">
                <strong>
                    {{ trans('index.buttons.categories') }}
                </strong>
            </button>
        </a>
    </div>

    <div style="margin-top: 30px">
        <a href="https://github.com/LiutaurasKavaliauskas/ItemsSystem"><strong>GitHub</strong></a>
    </div>
@endsection