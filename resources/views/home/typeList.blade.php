@extends('master')
@section('content')
    <ol class="breadcrumb hidden-xs">
        <li><a href="{{ url('/welcome') }}">Home</a></li>
        <li class="active">Employment Types</li>
    </ol>

    <h4 class="page-title">FOrm</h4>

    <div class="block-area" id="alternative-buttons">
        <h3 class="block-title">Staff List</h3>
        <a class="btn btn-sm" data-toggle="modal" data-target=".modalEmploymentType">New
        </a>
    </div>


    <div class="block-area" id="responsiveTable">

        <div class="table-responsive overflow">
            <table class="table tile table-striped" id="departmentsTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Created At</th>
                    <th>Name</th>
                    <th>Acronym</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('home.new')

@endsection


