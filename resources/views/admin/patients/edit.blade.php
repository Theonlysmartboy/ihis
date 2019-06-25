@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.patients.title')</h3>
    
    {!! Form::model($patient, ['method' => 'PUT', 'route' => ['admin.patients.update', $patient->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('huduma_no', trans('quickadmin.patients.fields.huduma-no').'', ['class' => 'control-label']) !!}
                    {!! Form::text('huduma_no', old('huduma_no'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('huduma_no'))
                        <p class="help-block">
                            {{ $errors->first('huduma_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.patients.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('conatct', trans('quickadmin.patients.fields.conatct').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('conatct', old('conatct'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('conatct'))
                        <p class="help-block">
                            {{ $errors->first('conatct') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('zone_id', trans('quickadmin.patients.fields.zone').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('zone_id', $zones, old('zone_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('zone_id'))
                        <p class="help-block">
                            {{ $errors->first('zone_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('hospital_id', trans('quickadmin.patients.fields.hospital').'', ['class' => 'control-label']) !!}
                    {!! Form::select('hospital_id', $hospitals, old('hospital_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('hospital_id'))
                        <p class="help-block">
                            {{ $errors->first('hospital_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

