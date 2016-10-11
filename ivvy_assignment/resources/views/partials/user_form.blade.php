<div class="form-group">
    <label class="control-label" for="title">@lang('messages.first_name'):</label>
        {!! Form::text('first_name') !!}    
    <div class="help-block with-errors"></div>
</div>

<div class="form-group">
    <label class="control-label" for="title">@lang('messages.last_name'):</label>
        {!! Form::text('last_name') !!}
    <div class="help-block with-errors"></div>
</div>

<div class="form-group">
    <label class="control-label" for="title">@lang('messages.birth_date'):</label>
        {!! Form::text('birth_date', '' ,array('id' => 'datepicker')) !!}
    <div class="help-block with-errors"></div>
</div>

<div class="form-group">
    <label class="control-label" for="title">@lang('messages.gender'):</label>
        {!! Form::radio('gender', 'male') !!}
        Male
        {!! Form::radio('gender', 'female') !!}
        Female
    <div class="help-block with-errors"></div>
</div>