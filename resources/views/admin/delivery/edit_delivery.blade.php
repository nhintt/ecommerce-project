@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật phí vận chuyển
                        </header>

                        <div class="panel-body">

                            <div class="position-center">
                                @foreach($edit_delivery as $key => $fee)
                                <form role="form" action="{{URL::to('/update-delivery/'.$fee->fee_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phí vận chuyển</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Làm ơn nhập phí vận chuyển" name="fee_value" class="form-control" id="exampleInputEmail1" value="{{$fee->fee_feeship}}">
                                </div>


                                <button type="submit" name="edit_delivery" class="btn btn-info">Cập nhật phí vận chuyển</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection
