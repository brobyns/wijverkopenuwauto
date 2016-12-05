<div class="modal fade" id="createModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="createModalLabel">Voeg optie toe</h4>
            </div>
            {{Form::open(array('action' => array('VehiclePropertiesController@store'), 'method' => 'POST'))}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        {!! Form::label('name', 'Voertuigoptie') !!}
                    </div>
                    <div class="col-xs-6">
                        {!! Form::text('name', null,
                                array('required',
                                      'class'=>'input-manual',
                                      'placeholder'=>'Geef de naam van de optie in')) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row end-xs">
                    <div class="col-xs-4 col-sm-2">
                        {{ Form::submit('Bewaar', ['class' => 'btn btn-default btn-block']) }}
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        {{Form::button('Annuleer', array('class' => 'btn btn-default  btn-block', 'data-dismiss' => 'modal'))}}
                    </div>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>