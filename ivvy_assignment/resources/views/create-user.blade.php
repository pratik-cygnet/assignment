@extends('layouts.default')
@section('content')
                <div class="pull-right">
                <button type="button" class="btn btn-success" onclick="window.location.href='/'">
                      @lang('messages.list_users')
                </button>
                </div>
            </div>
        </div>
        <!-- Create User -->
                
            <div class="modal-content">
                <div class="modal-dialog">
                    <h4 class="modal-title" id="myModalLabel">Create User</h4>
              
                    {!! Form::open(array('url'=>'save','method'=>'POST', 'files'=>true)) !!}
                         
                         @include('partials.user_form')
                         
                        <div class="form-group">
                            <label class="control-label" for="title">Zip File:</label>
                            {!! Form::file('user_files') !!}
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                             {!! Form::submit('Create User', array('class'=>'btn btn-success')) !!}
                        </div>
                    {!! Form::close() !!}
              
                </div>
          </div>
@stop