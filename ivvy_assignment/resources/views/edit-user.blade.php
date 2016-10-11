@extends('layouts.default')
@section('content')
                <div class="pull-right">
                <button type="button" class="btn btn-success" onclick="window.location.href='/'">
                      @lang('messages.list_users')
                </button>
                </div>
            </div>
        </div>
        <!-- Edit User -->
        <div class="modal-content">
            <div class="modal-dialog">
                <h4 class="modal-title" id="myModalLabel">@lang('messages.edit_user')</h4>
              
                <div class="form-group">
                    {!! Form::model($user, [
                                                'method' => 'POST',
                                                'url' => ['edit', $user->id]
                                            ]
                                    )
                    !!}
                        
                        @include('partials.user_form')

                        <div class="form-group">
                            <button type="submit" class="btn crud-submit btn-success">Edit</button>
                        </div>
                      {!! Form::close() !!}
                </div>
            </div> 
        </div>
@stop