@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contact-companies.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.name')</th>
                            <td field-key='name'>{{ $contact_company->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.address')</th>
                            <td field-key='address'>{{ $contact_company->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.website')</th>
                            <td field-key='website'>{{ $contact_company->website }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.email')</th>
                            <td field-key='email'>{{ $contact_company->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.zone-id')</th>
                            <td field-key='zone_id'>{{ $contact_company->zone_id }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#contacts" aria-controls="contacts" role="tab" data-toggle="tab">Hospital</a></li>
<li role="presentation" class=""><a href="#patients" aria-controls="patients" role="tab" data-toggle="tab">Patients</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="contacts">
<table class="table table-bordered table-striped {{ count($contacts) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.contacts.fields.company')</th>
                        <th>@lang('quickadmin.contacts.fields.first-name')</th>
                        <th>@lang('quickadmin.contacts.fields.phone1')</th>
                        <th>@lang('quickadmin.contacts.fields.phone2')</th>
                        <th>@lang('quickadmin.contacts.fields.email')</th>
                        <th>@lang('quickadmin.contacts.fields.skype')</th>
                        <th>@lang('quickadmin.contacts.fields.address')</th>
                        <th>@lang('quickadmin.contacts.fields.hospital-id')</th>
                        <th>@lang('quickadmin.contacts.fields.hospital-level')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($contacts) > 0)
            @foreach ($contacts as $contact)
                <tr data-entry-id="{{ $contact->id }}">
                    <td field-key='company'>{{ $contact->company->name ?? '' }}</td>
                                <td field-key='first_name'>{{ $contact->first_name }}</td>
                                <td field-key='phone1'>{{ $contact->phone1 }}</td>
                                <td field-key='phone2'>{{ $contact->phone2 }}</td>
                                <td field-key='email'>{{ $contact->email }}</td>
                                <td field-key='skype'>{{ $contact->skype }}</td>
                                <td field-key='address'>{{ $contact->address }}</td>
                                <td field-key='hospital_id'>{{ $contact->hospital_id }}</td>
                                <td field-key='hospital_level'>{{ $contact->hospital_level }}</td>
                                                                <td>
                                    @can('contact_view')
                                    <a href="{{ route('admin.contacts.show',[$contact->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('contact_edit')
                                    <a href="{{ route('admin.contacts.edit',[$contact->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('contact_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.contacts.destroy', $contact->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="14">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="patients">
<table class="table table-bordered table-striped {{ count($patients) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.patients.fields.huduma-no')</th>
                        <th>@lang('quickadmin.patients.fields.name')</th>
                        <th>@lang('quickadmin.patients.fields.conatct')</th>
                        <th>@lang('quickadmin.patients.fields.zone')</th>
                        <th>@lang('quickadmin.patients.fields.hospital')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($patients) > 0)
            @foreach ($patients as $patient)
                <tr data-entry-id="{{ $patient->id }}">
                    <td field-key='huduma_no'>{{ $patient->huduma_no }}</td>
                                <td field-key='name'>{{ $patient->name }}</td>
                                <td field-key='conatct'>{{ $patient->conatct }}</td>
                                <td field-key='zone'>{{ $patient->zone->zone_id ?? '' }}</td>
                                <td field-key='hospital'>{{ $patient->hospital->hospital_id ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('patient_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.patients.restore', $patient->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('patient_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.patients.perma_del', $patient->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('patient_view')
                                    <a href="{{ route('admin.patients.show',[$patient->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('patient_edit')
                                    <a href="{{ route('admin.patients.edit',[$patient->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('patient_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.patients.destroy', $patient->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contact_companies.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


