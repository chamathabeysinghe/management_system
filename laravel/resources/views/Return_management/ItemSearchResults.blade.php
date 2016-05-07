@if($items->isEmpty())
    <h5 class="alert-danger center-align">No record found</h5>

@else
@foreach($items as $item)
        <fieldset class="form-group">
            <label for="item_name">Item Description :</label>
            <input class="form-control" id="item_name" type="text" value="{{$item->item_name}}" readonly>
        </fieldset>
        <fieldset class="form-group">
            <label for="project">Issued project :</label>
            <input class="form-control" id="project" type="text"  readonly>
        </fieldset>
        <fieldset class="form-group">
            <label for="supplier">Supplier :</label>
            <input class="form-control" id="supplier" type="text"  value="{{$item->owner_id}}" readonly>
        </fieldset>
        <fieldset class="form-group">
            <label for="warranty">Warranty :</label>
            <input class="form-control" id="warranty" type="text"  readonly>
        </fieldset>


@endforeach
@endif

