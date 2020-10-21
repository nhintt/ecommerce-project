@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lý vận chuyển
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">

      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">

      </div>
    </div>
    <div class="table-responsive">
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
        <table class="table table-striped b-t b-light">
            <thread>
                <tr>
                    <th style="with:20px"></th>
                    <th>Tên thành phố</th>
                    <th>Tên quận huyện</th>
                    <th>Tên xã phường</th>
                    <th>Phí ship</th>
                    <th></th>
                </tr>
            </thread>
            <tbody>
                @php
                    $i = 0;
                @endphp

                @foreach($feeship as $key => $fee)

                @php
                    $i++;
                @endphp
                    <tr>
                        <td><i>{{$i}}</i></td>
                        <td>{{ $fee->city->name_city }}</td>
                        <td>{{ $fee->province->name_quanhuyen }}</td>
                        <td>{{ $fee->wards->name_xaphuong }}</td>
                        <td contenteditable data-feeship_id=" {{ $fee->fee_id }}" class="fee_feeship_edit"> {{ number_format($fee->fee_feeship,0,',','.') }} VND</td>
                        <td>
                            <a href="{{URL::to('/edit-delivery/'.$fee->fee_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a onclick="return confirm('Bạn có chắc là muốn xóa phí vận chuyển này không?')" href="{{URL::to('/delete-feeship/'.$fee->fee_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <footer class="panel-footer">
      <div class="row">


        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>



@endsection
