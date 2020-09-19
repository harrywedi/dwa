@extends('layouts.adminmaster')

@section('title')
Add Booking {{ ucfirst(auth()->user()->role) }}
@endsection

@section('breadcrumb')
Add New Booking
@endsection


@section('content')
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-10 mb-3 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="e-profile">
                    <div class="tab-content pt-3">
                        <div class="tab-pane active">
                            <form class="form" method="POST" action="/post-new-booking" novalidate="">
                                @csrf
                                <h4>Booking</h4>
                                <hr class="mt-2 mb-3" />

                                        <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label>Select Parent</label>
                                        <select class="select2 form-control m-t-15"style="height: 36px;width: 100%;" name="parent_id">
                                                <option value=""></option>
                                                @foreach($parents as $parent)
                                                <option value="{{$parent->id}}">{{$parent->f_name." ".$parent->l_name}}</option>
                                                @endforeach
                                        </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label>Child</label>
                                        <select class="select2 form-control m-t-15"style="height: 36px;width: 100%;" name="child_id">
                                                <option value=""></option>
                                                @foreach($children as $child)
                                                <option value="{{$child->id}}">{{$child->f_name." ".$child->l_name}}</option>
                                                @endforeach
                                        </select>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label>Select Service</label>
                                        <select class="select2 form-control m-t-15"style="height: 36px;width: 100%;" name="service_id">

                                                <option value=""></option>
                                                @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->title}}</option>
                                                @endforeach
                                        </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label>Invoice Status</label>
                                        <select class="select2 form-control m-t-15"style="height: 36px;width: 100%;" name="status">

                                                <option value="pending">Pending</option>
                                                <option value="completed">Completed</option>
                                        </select>
                                                </div>

                                            </div>
                                        </div>
                                        <a id="addDatebtn" href="#" class="btn btn-success">Add Extra Dates</a>
                                        <br></br>
                                        <div id="booking-dates" class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <div class="input-group">
                                                    <input id="date" type="date" class="form-control" placeholder="mm/dd/yyyy" name="date[]" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">Add New Booking</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="../adminassets/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="../adminassets/dist/js/pages/mask/mask.init.js"></script>
<script src="../adminassets/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="../adminassets/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="../adminassets/assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
<script src="../adminassets/assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
<script src="../adminassets/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
<script src="../adminassets/assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
<script src="../adminassets/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../adminassets/assets/libs/quill/dist/quill.min.js"></script>
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
if(dd<10){
    dd='0'+dd
}
if(mm<10){
    mm='0'+mm
}

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("date").setAttribute("min", today);
    //***********************************//
    // For select 2
    //***********************************//
    $(".select2").select2();

    /*colorpicker*/
    $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            position: $(this).attr('data-position') || 'bottom left',

            change: function(value, opacity) {
                if (!value) return;
                if (opacity) value += ', ' + opacity;
                if (typeof console === 'object') {
                    console.log(value);
                }
            },
            theme: 'bootstrap'
        });

    });
    $("#addDatebtn").click(function(){
        var inputField="<div class='form-group col-md-4'><label>Date</label><input type='date' class='form-control' placeholder='' name='date[]' min='"+today+"' required></div></div>";
      $("#booking-dates").append(inputField);
    });

</script>
@endsection
