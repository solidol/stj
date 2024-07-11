@extends('layouts.app-nosidebar')


@section('title', 'Електронна база коледжу')

@section('content')
    <div class="baloon">
        <nav aria-label="breadcrumb" class="m-3 d-md-block d-none breadcrumb-sm">
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

        <nav aria-label="breadcrumb" class="m-3 d-md-none">
            <ol class="breadcrumb">
                <li class="btn btn-primary m-1">
                    <a href="{{ URL::route('mdb.index') }}" class="text-decoration-none text-white">
                        Уся база
                    </a>
                </li>

                @foreach ($dir->breadcrumbs as $bcItem)
                    <li class="btn btn-primary m-1">
                        <a href="{{ URL::route('mdb.index') }}?dir={{ $bcItem->path }}"
                            class="text-decoration-none text-white">
                            {{ $bcItem->title }}
                        </a>
                    </li>
                @endforeach

            </ol>
        </nav>


        <div class="my-1 table-responsive">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="w-5 text-center">
                            <a href="{{ URL::route('mdb.index') }}?dir={{ $dir->pathto }}">
                                <i class="bi bi-arrow-left-square fs-2 text-white"></i>
                            </a>
                        </th>
                        <th class="">Ім'я файла</th>
                        <th class="w-15">Розмір</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($dir->dirs as $dItem)
                        <tr>
                            <td class="text-center"><img src="/assets/img/_folder.png" style="width:32px;"></td>
                            <td><a href="{{ URL::route('mdb.index') }}?dir={{ $dItem->path }}"
                                    title="">{{ $dItem->title }}</a></td>
                            <td>[DIR]</td>

                        </tr>
                    @endforeach

                    @foreach ($dir->files as $fItem)
                        <tr>
                            <td class="text-center"><img src="/assets/img/{{ $fItem->icon }}" style="width:32px;"></td>
                            <td><a href="{{ $fItem->url }}" title="">{{ $fItem->basename }}</a></td>
                            <td>{{ $fItem->filesizeStr }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop
