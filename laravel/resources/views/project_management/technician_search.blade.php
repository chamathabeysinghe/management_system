<div class="row">
    <div class="col s12 m6">
        <?php
            $technicians=$data[0];
            $resultDetails=$data[1];

        ?>

        @for($i=0;$i<sizeof($technicians);$i+=1)

            <p>
                <input type="checkbox" name="selection[]" value="{{$technicians[$i]->id}}" id="{{$technicians[$i]->id}}" />
                <label for="{{$technicians[$i]->id}}">{{$technicians[$i]->name}}</label>
                @if($resultDetails[$i]!='')
                <a href="" class="secondary-content tooltipped" data-position="right" data-tooltip="{{$resultDetails[$i]}}"><i class="material-icons right" style="color: #ff1744;">info</i></a>
                @endif
            </p>
        @endfor
        <script>
            $(document).ready(function(){
                $('.tooltipped').tooltip({delay: 50});
            });
        </script>
    </div>
</div>