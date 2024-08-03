<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Class</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>

<body>
  <main>
    <div class="container my-5">
      <div class="bg-light p-5 rounded">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Class</h2>
        <form action="{{route('classes.update', $class->id)}}" method="POST" class="px-md-5"  enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">Class Name:</label>
            <div class="col-md-10">
              <input type="text" placeholder="English Class" class="form-control py-2" name='class_name' value="{{old('class_name',$class->class_name)}}" />
              @error('class_name')
                <div class="alert alert-warning">{{$message}}</div>
              @enderror
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">Capacity:</label>
            <div class="col-md-10">
              <input type="number" step="1" placeholder="Enter capacity" class="form-control py-2" name='capacity' value="{{old('capacity',$class->capacity)}}" />
              @error('capacity')
                <div class="alert alert-warning">{{$message}}</div>
              @enderror
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">Price:</label>
            <div class="col-md-10">
              <input type="number" step="0.1" placeholder="Enter price" class="form-control py-2" name='price' value="{{old('price',$class->price)}}"/>
              @error('price')
                <div class="alert alert-warning">{{$message}}</div>
              @enderror
            </div>
          </div>
          <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Time:</label
              >
              <div class="col-md-10">
                <label for="" class="form-label">From <input type="time" class="form-control" name="time_from" value="{{old('time_from',$class->time_from)}}"></label>
                @error('time_from')
                <div class="alert alert-warning">{{$message}}</div>
                @enderror
                <label for="" class="form-label">To <input type="time" class="form-control" name="time_to" value="{{old('time_to',$class->time_to)}}"></label>
                @error('time_to')
                <div class="alert alert-warning">{{$message}}</div>
                @enderror
              </div>
            </div>
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">Is Fulled:</label>
            <div class="col-md-10">
              <input  type="checkbox" class="form-check-input" style="padding: 0.7rem;" name='is_fulled' @checked(old('is_fulled',$class->is_fulled))/>
              @error('is_fulled')
                <div class="alert alert-warning">{{$message}}</div>
              @enderror
            </div>
            <hr>
            <div class="form-group mb-3 row">
              <label class="form-label col-md-2 fw-bold text-md-end" for="">Image:</label>
               <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image" value="{{old('image',$class->image)}}">
                @error('image')
                  <div class="alert alert-warning">{{$message}}</div>
                @enderror
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label class="form-label col-md-2 fw-bold text-md-end" for=""></label>
          <div class="col-sm-10">
          <img src="{{ asset($class->image) }}" style="width: 30%;height: 100%"/>
          </div>
            </div>
          <div class="text-md-end">
            <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
              Edit Class
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
