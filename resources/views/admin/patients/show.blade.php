@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.patients.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.patients.fields.huduma-no')</th>
                            <td field-key='huduma_no'>{{ $patient->huduma_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.name')</th>
                            <td field-key='name'>{{ $patient->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.conatct')</th>
                            <td field-key='conatct'>{{ $patient->conatct }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.zone')</th>
                            <td field-key='zone'>{{ $patient->zone->zone_id ?? '' }}</td>
<td field-key='name'>{{ isset($patient->zone) ? $patient->zone->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patients.fields.hospital')</th>
                            <td field-key='hospital'>{{ $patient->hospital->hospital_id ?? '' }}</td>
<td field-key='first_name'>{{ isset($patient->hospital) ? $patient->hospital->first_name : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.patients.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


