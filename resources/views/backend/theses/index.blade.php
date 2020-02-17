@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('home'),
        'Tugas Akhir' => '#',
    ]) !!}
@endsection

@section('toolbar')
    {{-- {!! cui_toolbar_btn(route('admin.students.create'), 'icon-plus', 'Tambah Mahasiswa') !!} --}}
    <!-- Button trigger modal -->
    <div class="text-right">
        <button class="btn" data-toggle="modal" data-target="#model_pembimbing"> <i class='icon-plus'></i> Ajukan pembimbing</button>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">

            <div class="card">
                {{-- CARD HEADER--}}
                <div class="card-header">
                        <strong><i class="fa fa-list "></i> List Tugas Akhir</strong>
                        @include('backend.theses._modal')
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Topik Tugas AKhir</th>
                            <th class="text-center">Judul Tugas Akhir</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Detail</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($theses as $thesis)
                                <tr>
                                    <td class="text-center">{{ $thesis->topics_name }}</td>
                                    <td class="text-center">{{ $thesis->title }}</td>
                                    <td class="text-center">               
                                       @foreach ($t_statuses as $key => $val)                                           
                                            @if ($key == $thesis->status)
                                                {{ $val }}
                                            @endif
                                       @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('students.theses.show', [$thesis->id])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{-- <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $theses->links() }}
                            </div>
                        </div>
                    </div>                 --}}
                </div><!--card-body-->
            </div><!--card-->

            <br><br>

            <div class="card">
                {{-- CARD HEADER--}}
                <div class="card-header">
                        <strong><i class="fa fa-list "></i> List Pengajuan Tugas Akhir</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Topik Tugas AKhir</th>
                            <th class="text-center">Judul Tugas Akhir</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Detail</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($theses2 as $value)
                                <tr>
                                    <td class="text-center">{{ $value->topics_name }}</td>
                                    <td class="text-center">{{ $value->title }}</td>
                                    <td class="text-center">               
                                        @foreach ($t_statuses as $key => $val)                                           
                                            @if ($key == $value->status)
                                                {{ $val }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('students.theses.show', [$value->id])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $theses2->links() }}
                            </div>
                        </div>
                    </div>
                </div><!--card-body-->
            </div><!--card-->

        </div><!--col-->
    </div><!--row-->
@endsection
