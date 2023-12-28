@extends('layouts.app-nosidebar')

@section('content')
    <h1>Електронна база коледжу</h1>


    <nav aria-label="breadcrumb" class="d-md-block d-none breadcrumb-sm">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ URL::route('mdb.index') }}">
                    Уся база
                </a>
            </li>

            @foreach ($dir->breadcrumbs as $bcItem)
                <li class="breadcrumb-item">
                    <a href="{{ URL::route('mdb.index') }}?dir={{ $bcItem->path }}">
                        {{ $bcItem->title }}
                    </a>
                </li>
            @endforeach

        </ol>
    </nav>

    <nav aria-label="breadcrumb" class="d-md-none">
        <ol class="breadcrumb">
            <li class="btn btn-primary m-1">
                <a href="{{ URL::route('mdb.index') }}" class="text-decoration-none text-white">
                    Уся база
                </a>
            </li>

            @foreach ($dir->breadcrumbs as $bcItem)
                <li class="btn btn-primary m-1">
                    <a href="{{ URL::route('mdb.index') }}?dir={{ $bcItem->path }}" class="text-decoration-none text-white">
                        {{ $bcItem->title }}
                    </a>
                </li>
            @endforeach

        </ol>
    </nav>


    <div class="mb-3 mt-1 table-responsive">

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="w-5"><a href="{{ URL::route('mdb.index') }}?dir={{ $dir->pathto }}"><img
                                src="/assets/img/arrow_180.png"></a></th>
                    <th>Ім'я файла</th>
                    <th class="w-15">Розмір</th>
                    <th class="w-5"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dir->dirs as $dItem)
                    <tr>
                        <td><img src="/assets/img/_folder.png" style="width:32px;"></td>
                        <td><a href="{{ URL::route('mdb.index') }}?dir={{ $dItem->path }}"
                                title="">{{ $dItem->title }}</a></td>
                        <td>[DIR]</td>
                        <td></td>
                    </tr>
                @endforeach

                @foreach ($dir->files as $fItem)
                    <tr>
                        <td><img src="/assets/img/{{ $fItem->icon }}" style="width:32px;"></td>
                        <td><a href="{{ $fItem->url }}" title="">{{ $fItem->basename }}</a></td>
                        <td>{{ $fItem->filesizeStr }}</td>
                        <td></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@stop
