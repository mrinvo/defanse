@extends('admin.master.masterar')
@section('name')
تفاصيل طلب
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <button class="btn btn-info" onclick="window.print()">طباعة</button>
    </div>

</div>

<br>
<br>

<div class="row">
    <!-- passport -->
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="card card-info">
            <div class="card-header">
            <h3 class="card-title" style="float: right;">حالة الطلب  </h3>
            </div>


            <!-- /.card-header -->
            <div class="card-body">
                <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.clerk.status') }}">
                @csrf

                <input type="hidden" value="{{ $clerk->id }}" name="id">
                <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                    <label> حالة الطلب  </label>
                    <select  name="status" class="form-control">
                        <option {{ ($clerk->status == 'new' ? 'selected' : '') }} value="new">جديد</option>
                        <option  {{ ($clerk->status == 'pending' ? 'selected' : '') }}  value="pending">تحت المراجعة</option>
                        <option  {{ ($clerk->status == 'rejected' ? 'selected' : '') }}  value="accepted">تم القبول</option>
                        <option  {{ ($clerk->status == 'accepted' ? 'selected' : '') }}  value="rejected">تم الرفض</option>
                    </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">

                    <input type="submit" value="تغير الحالة" class="btn btn-info" name="" placeholder="Enter ...">
                    </div>
                </div>


                </div>

            </div>


            </form>
            </div>
            <!-- /.card-body -->
    </div>
    <!-- end passport -->
    <!-- right column -->
    <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title" style="float: right;">المعلومات الشخصية </h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        @endif


        <!-- /.card-header -->
        <div class="card-body">
          <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.clerk.store') }}">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <!-- select -->
                    <div class="form-group">
                    <label>اختارالوظيفة</label>
                    <select disabled name="jop_id" class="form-control">
                        @foreach ($jops as $jop)

                        <option  {{ ($clerk->jop_id == $jop->id) ? 'selected' : '' }} value="{{ $jop->id }}">{{ $jop->name_ar }}</option>

                        @endforeach
                    </select>
                    </div>
                </div>
            </div>


            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>الاسم كامل</label>
                  <input disabled value="{{ $clerk->name }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                </div>
              </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label> الامارة</label>
                    <select disabled name="emirate" class="form-control">


                      <option {{ ($clerk->emirate == 'Dubai') ? 'selectd' : '' }} value="Dubai">Dubai</option>
                      <option {{ ($clerk->emirate == 'Abu_Dhabi') ? 'selectd' : '' }} value="Abu_Dhabi">Abu Dhabi</option>
                      <option {{ ($clerk->emirate == 'Ajman') ? 'selectd' : '' }} value="Ajman">Ajman</option>
                      <option {{ ($clerk->emirate == 'Umm_Al-Quwain') ? 'selectd' : '' }} value="Umm_Al-Quwain">Umm Al-Quwain</option>
                      <option {{ ($clerk->emirate == 'Fujairah') ? 'selectd' : '' }} value="Fujairah">Fujairah</option>
                      <option {{ ($clerk->emirate == 'Ras_Al_Khaimah') ? 'selectd' : '' }} value="Ras_Al_Khaimah">Ras AlKhaimah</option>
                      <option {{ ($clerk->emirate == 'Sharjah') ? 'selectd' : '' }} value="Sharjah">Sharjah</option>


                  </select>
                  </div>
                  </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label> المؤهل العلمي</label>
                    <input disabled value="{{ $clerk->education }}" type="text" class="form-control" name="education" placeholder="Enter ...">
                  </div>
                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>تاريخ الميلاد </label>
                    <input disabled value="{{ $clerk->dob }}" type="date" class="form-control" name="dop" placeholder="Enter ...">
                  </div>
                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>رقم الجوال</label>
                    <input disabled value="{{ $clerk->phone }}" type="number" class="form-control" name="phone" placeholder="Enter ...">
                  </div>
                </div>


            </div>


            <div class="row">
                <div class="col-sm-12">
                  <!-- textarea -->
                  <div class="form-group">
                    <label> نبذة مختصرة</label>
                    <textarea class="form-control" name="" id="" >
                        {{ $clerk->summury }}
                    </textarea>

                  </div>
                </div>

            </div>






        </div>










          </form>
        </div>
        <!-- /.card-body -->
    </div>
      <!-- /.card -->

          <!-- paprse and docs -->



@isset($files)



        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title" style="float: right;"> الملفات و المستندات</h3><br/>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>نوع الملف</th>
                        <th>مشاهدة</th>
                        <th>تحميل</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($files as $file)
                        <tr>
                            <td>
                               @if($file->type == 'id')
                                صورة الهوية
                               @elseif ($file->type == 'pass')
                                صورة جواز السفر
                                @elseif ($file->type == 'education')
                                المؤهل العلمي
                                @elseif($file->type == 'service')
                                الخدمة الوطنية
                                @elseif($file->type == 'qualifier')
                                خلاصة القيد

                               @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ $file->file }}">مشاهدة</a>
                            </td>
                            <td>
                                <button class="btn btn-info" onclick="window.open('{{ $file->file }}').print()">تحميل</button>

                            </td>
                        </tr>


                        @endforeach

                    </tbody>
                    <tfoot>
                    <tr>

                        <th>نوع الملف</th>
                        <th>مشاهدة</th>
                        <th>تحميل</th>
                    </tr>
                    </tfoot>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
            <!-- end papers and docs -->
@endisset

@isset($details)


    <!-- home service -->
    <div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title" style="float: right;">بينات الخدمة الوطنية</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        @endif


        <!-- /.card-header -->
        <div class="card-body">
        <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.clerk.store') }}">
            @csrf

            <div class="row">
            <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                <label> الرقم العسكري</label>
                <input disabled value="{{ $details->mil_no }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                </div>
            </div>
            <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                <label>  رقم الدفعة</label>
                <input disabled value="{{ $details->mil_batch_no }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                </div>
            </div>


            </div>

        </div>


        </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- end home service -->

    <!-- passport -->
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="card card-info">
            <div class="card-header">
            <h3 class="card-title" style="float: right;">بينات جواز السفر</h3>
            </div>


            <!-- /.card-header -->
            <div class="card-body">
                <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.clerk.store') }}">
                @csrf

                <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                    <label> رقم جواز السفر</label>
                    <input disabled value="{{ $details->pass_no }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                    <label>تاريخ الاصدار</label>
                    <input disabled value="{{ $details->pass_export_no }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                    <label>تاريخ الانتهاء</label>
                    <input disabled value="{{ $details->pass_expire_no }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                    </div>
                </div>


                </div>

            </div>


            </form>
            </div>
            <!-- /.card-body -->
    </div>
    <!-- end passport -->

@endisset

    @foreach ($fams as $fam)

        @if($fam->relation_type == 'father')

            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title" style="float: right;">  معلومات الاب</h3>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.clerk.store') }}">
                        @csrf

                        <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label>اسم الاب بالكامل</label>
                            <input disabled value="{{ $fam->name }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label> جهة العمل</label>
                            <input disabled value="{{ $fam->work }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label> الجنسية</label>
                            <input disabled value="{{ $fam->nationality }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>


                        </div>

                    </div>


                    </form>
                    </div>
                    <!-- /.card-body -->
            </div>


        @elseif($fam->relation_type == 'mother')
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title" style="float: right;">  معلومات الام</h3>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.clerk.store') }}">
                        @csrf

                        <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label>اسم الام بالكامل</label>
                            <input disabled value="{{ $fam->name }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label> جهة العمل</label>
                            <input disabled value="{{ $fam->work }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label> الجنسية</label>
                            <input disabled value="{{ $fam->nationality }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>


                        </div>

                    </div>


                    </form>
                    </div>
                    <!-- /.card-body -->
            </div>


        @elseif($fam->relation_type == 'father_uncle')
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title" style="float: right;">  معلومات الاعمام والعمات</h3>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.clerk.store') }}">
                        @csrf

                        <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label>اسم العم او العمة</label>
                            <input disabled value="{{ $fam->name }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label> جهة العمل</label>
                            <input disabled value="{{ $fam->work }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label> الجنسية</label>
                            <input disabled value="{{ $fam->nationality }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>


                        </div>

                    </div>


                    </form>
                    </div>
                    <!-- /.card-body -->
            </div>

        @elseif($fam->relation_type == 'mother_aunt')

            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title" style="float: right;">  معلومات الخال والخالات </h3>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('admin.clerk.store') }}">
                        @csrf

                        <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label>اسم الخال و الخالة بالكامل</label>
                            <input disabled value="{{ $fam->name }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label> جهة العمل</label>
                            <input disabled value="{{ $fam->work }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label> الجنسية</label>
                            <input disabled value="{{ $fam->nationality }}" type="text" class="form-control" name="name" placeholder="Enter ...">
                            </div>
                        </div>


                        </div>

                    </div>


                    </form>
                    </div>
                    <!-- /.card-body -->
            </div>

        @endif


    @endforeach



</div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
  <br>
  <br>
  <br>
  <br>
@endsection

@section('script')

<script>
    const box = document.getElementById('box');

function handleRadioClick() {
  if (document.getElementById('show').checked) {
    box.style.display = 'block';
  } else {
    box.style.display = 'none';
  }
}

const radioButtons = document.querySelectorAll('input[name="have_discount"]');
radioButtons.forEach(radio => {
  radio.addEventListener('click', handleRadioClick);
});

</script>
<script>


    $(document).ready(function(){

        $('#img').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);

        });

    });
</script>
@endsection
