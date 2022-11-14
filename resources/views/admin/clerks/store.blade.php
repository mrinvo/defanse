@extends('admin.master.masterar')
@section('name')
تقديم طلب
@endsection
@section('content')

<div class="row">

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
                    <select name="jop_id" class="form-control">
                        @foreach ($jops as $jop)

                        <option value="{{ $jop->id }}">{{ $jop->name_ar }}</option>

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
                  <input type="text" class="form-control" name="name" placeholder="Enter ...">
                </div>
              </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label> الامارة</label>
                    <select name="emirate" class="form-control">


                      <option value="Dubai">Dubai</option>
                      <option value="Abu_Dhabi">Abu Dhabi</option>
                      <option value="Ajman">Ajman</option>
                      <option value="Umm_Al-Quwain">Umm Al-Quwain</option>
                      <option value="Fujairah">Fujairah</option>
                      <option value="Ras_Al_Khaimah">Ras AlKhaimah</option>
                      <option value="Sharjah">Sharjah</option>


                  </select>
                  </div>
                  </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label> المؤهل العلمي</label>
                    <input type="text" class="form-control" name="education" placeholder="Enter ...">
                  </div>
                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>تاريخ الميلاد </label>
                    <input type="date" class="form-control" name="dop" placeholder="Enter ...">
                  </div>
                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>رقم الجوال</label>
                    <input type="number" class="form-control" name="phone" placeholder="Enter ...">
                  </div>
                </div>


            </div>


            <div class="row">
                <div class="col-sm-12">
                  <!-- textarea -->
                  <div class="form-group">

                    <input type="submit" class="btn btn-info" name="" value="تحقق" placeholder="Enter ...">
                  </div>
                </div>

            </div>






        </div>










          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
