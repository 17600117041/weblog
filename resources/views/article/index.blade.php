@extends('layouts.app')
@section('styles')
    <style>
        ::selection {
            color: #ffffff;
            background: #e67e22;
            text-shadow: none;
        }
        .widget {
            margin-top: 35px;
        }
        .widget .title {
            color: #34495e;
            margin-top: 0;
            padding-bottom: 7px;
            border-bottom: 1px solid #ebebeb;
            margin-bottom: 21px;
            position: relative;
        }
        .widget .title:after {
            content: "";
            width: 90px;
            height: 1px;
            background: #18bc9c;
            position: absolute;
            left: 0;
            bottom: -1px;
        }
        .widget .tag-cloud a {
            border: 1px solid #ebebeb;
            padding: 2px 7px;
            color: #959595;
            line-height: 1.5em;
            display: inline-block;
            margin: 0 7px 7px 0;
            -webkit-transition: all 0.2s ease;
            -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }

        .widget .tag-cloud a:hover{
            color: #18bc9c;
        }

    </style>
@endsection
@section('content')
    @component('particals.jumbotron')
        <h3>{{ config('blog.article.title') }}</h3>

        <h6>{{ config('blog.article.description') }}</h6>
    @endcomponent

    @include('widgets.article')

    {{ $articles->links('pagination.default') }}

@endsection