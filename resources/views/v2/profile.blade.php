@extends('v2.index')
@section('konten_area')
<main class="bg_gray" style="transform: none; margin-top:70px;">
    <style>
        .file-drop-area {
            position: relative;
            display: flex;
            align-items: center;
            max-width: 100%;
            padding: 25px;
            border: 1px dashed rgba(255, 255, 255, 0.4);
            border-radius: 3px;
            transition: .2s
        }

        .choose-file-button {
            flex-shrink: 0;
            background-color: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            padding: 8px 15px;
            margin-right: 10px;
            font-size: 12px;
            text-transform: uppercase
        }

        .file-message {
            font-size: small;
            font-weight: 300;
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            widows: 100%;
            cursor: pointer;
            opacity: 0
        }

    </style>
    <div class="container margin_60_20">
        <form action="{{ url('update/profile-v2') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="theiaStickySidebar"
                        style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 810px;">
                        <div class="box_order">
                            <div class="head">
                                <h3>Foto Profile</h3>
                            </div>
                            <!-- /head -->
                            <div class="main">
                                <div class="col-sm-12">
                                    @if(Auth::user()->foto_profile == null)
                                    <img style="width:100%; height:100%;"
                                        src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                        class="rounded float-left" alt="...">
                                    @else
                                    <img style="width:100%; height:100%;"
                                        src="{{ asset('upload/foto_profile/'.Auth::user()->foto_profile) }}"
                                        class="rounded float-left" alt="...">
                                    @endif
                                    <br>
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                    <div class="file-drop-area"> <span class="choose-file-button">Choose Files</span>
                                        <span class="file-message">or drag and drop files here</span> <input type="file"
                                            class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" name="foto_profile"> </div>
                                    <div id="divImageMediaPreview"> </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <!-- /box_order_form -->
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="theiaStickySidebar"
                        style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 810px;">

                        <div class="box_order">
                            <div class="head">
                                <div class="title">
                                    <h3>Personal</h3>
                                </div>
                            </div>
                            <!-- /head -->
                            <div class="main">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                        <input name="name" type="text" value="{{ Auth::user()->name }}"
                                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input name="email" value="{{ Auth::user()->email }}" type="email"
                                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" value="{{ Auth::user()->tanggal_lahir }}"
                                            type="date" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nomor HP</label>
                                        <input name="no_hp" value="{{ Auth::user()->no_wa }}" type="text"
                                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Nomor HP">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <textarea name="alamat" class="form-control"
                                            rows="3">{{ Auth::user()->alamat }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password Baru</label>
                                        <input name="pass" type="password" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>

                                </div>
                                <button type="submit" class="btn_1 gradient full-width mb_5 order ">Perbarui</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /col -->
        </form>

    </div>
    <!-- /row -->
    </div>
    <!-- /container -->

</main>
@endsection
@section('js')
<script>
    $(document).on('change', '.file-input', function () {


        var filesCount = $(this)[0].files.length;

        var textbox = $(this).prev();

        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }



        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#divImageMediaPreview");
            dvPreview.html("");
            $($(this)[0].files).each(function () {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = $("<img />");
                    img.attr("style", "width: 150px; height:150px; padding: 10px");
                    img.attr("src", e.target.result);
                    dvPreview.append(img);
                }
                reader.readAsDataURL(file[0]);
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }


    });

</script>
@endsection
