<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Similar image</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('image_manage')}}">Similar image</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="{{route('image.add')}}">Add image</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

</nav>
<div class="container">

    @php
            $arr = [];
            @endphp

    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}


                    {{--<?php foreach ($image_result as  $image ): ?>--}}
                    {{--@if(isset($image->iamgemodel) && !in_array($image->image_id, $arr))--}}
                        {{--@php--}}
                            {{--array_push($arr, $image->image_id);--}}
                        {{--@endphp--}}

                        {{--<div class="col-lg-3 col-md-4 col-sm-6 img-thumbnail" >--}}
                            {{--<img alt="picture"  src="{{Storage::url($image->iamgemodel->image)}}"--}}
                                 {{--class="img-fluid">--}}
                        {{--</div>--}}

                    {{--@endif--}}
                    {{--<?php endforeach ?>--}}

                {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}

    <div class="container">
            <div class="row justify-content-center">
                <div class="card">

                    <div class="card-header" >
                        Similar image
                    </div>
                </div>
            </div>
        <div class="row">


            <?php foreach ($image_result as  $image ): ?>
            {{--@if(isset($image->iamgemodel) && !in_array($image->image_id, $arr))--}}
                {{--@php--}}
                    {{--array_push($arr, $image->image_id);--}}
                {{--@endphp--}}
            <div class="col-sm-3 img-thumbnail">
                        <img alt="picture"  src="{{Storage::url($image->image)}}" style="width: 500px;height: 300px"
                             class="img-fluid">
                    </div>

                {{--@endif--}}
                <?php endforeach ?>


        </div>
    </div>





                        {{--{{ $image->iamgemodel->image }}--}}

                {{--<img src="{{Storage::url($image->iamgemodel->image)}}" alt="no image" width="150px">--}}


                {{--Confidence: <strong><?php echo number_format($image_filter->percent * 100 , 2) ?>--}}
                {{--</strong><br><br>--}}


</div>
</body>
</html>