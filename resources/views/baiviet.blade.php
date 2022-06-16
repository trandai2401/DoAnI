<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('public') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/home/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">




    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">





    <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/2.4.0/socket.io.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.0/echo.common.min.js"></script>


</head>

<body>

    <div>
        <nav id="navbar_main" class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="image/header/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 nl" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trang Chủ</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Danh Mục
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bài viết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        </li>


                    </ul>


                    <div>
                        <ul class="navbar-nav me-auto my-2 my-lg-0 nl" style="--bs-scroll-height: 100px;">

                            <li class="nav-item  nav-item-icon">
                                <img src="image/header/facebook-app-symbol.png" alt="">
                            </li>
                            <li class="nav-item  nav-item-icon">
                                <img src="image/header/twitter.png" alt="">
                            </li>
                            <li class="nav-item  nav-item-icon">
                                <img src="image/header/instagram.png" alt="">
                            </li>
                        </ul>
                    </div>



                    <div style="background-color: #C82B2B;height: 100%;padding: 3px;border-radius:10px 0px 0px 10px;">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 nl" style="--bs-scroll-height: 100px;">
                            <li class="nav-item personal_item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff">

                                    <img id="avatar_personale" src="  {{ optional(auth()->user())->avt }}" alt=""
                                        style="  vertical-align: middle;
                                        width: 50px;
                                        height: 50px;
                                        border-radius: 50%;">

                                    {{ optional(auth()->user())->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
    </div>
    <div style="padding-top:95px"></div>
    <div>
        <div class="container" id="bai_viet" style="top:80px;padding-top:10px">
            <!-- Tác Giả và thông tin toihwiof giand ăng -->
            <div id="author_inf">

                <div id="avt_author">
                    <a class="nav-link " href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle=""
                        aria-expanded="false" style="color: #000000;font-size: 19px;">

                        <img id="avatar_personale"
                            src="https://cdnb.artstation.com/p/assets/images/images/019/697/901/large/wl-op-36s2.jpg?1564628205"
                            alt="" style="  vertical-align: middle;
                width: 50px;
                height: 50px;
                border-radius: 50%;">
                    </a>
                </div>
                <div id="name_and_time">
                    <div id="name_author">Trần Đại</div>
                    <p id="time_postion" style="display: inline">Ngày {{ date('d/m/Y', $baiViet->create_at) }}</p><br>

                </div>

            </div>


            <section class="ftco-section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="featured-carousel owl-carousel">

                                @foreach ($baiViet->image as $item)
                                    <div class="item">
                                        <div class="work">
                                            <div class="img d-flex align-items-center justify-content-center rounded"
                                                style="background-image: url({{ $item->tenhinhanh }});">
                                                <a href="#"
                                                    class="icon d-flex align-items-center justify-content-center">
                                                    <span class="ion-ios-search"></span>
                                                </a>
                                            </div>
                                            <div class="text pt-3 w-100 text-center">
                                                <h3><a href="#">Work 01</a></h3>
                                                <span>Web Design</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="item">
                                    <div class="work">
                                        <div class="img d-flex align-items-center justify-content-center rounded"
                                            style="background-image: url(images/work-2.jpg);">
                                            <a href="#" class="icon d-flex align-items-center justify-content-center">
                                                <span class="ion-ios-search"></span>
                                            </a>
                                        </div>
                                        <div class="text pt-3 w-100 text-center">

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="work">
                                        <div class="img d-flex align-items-center justify-content-center rounded"
                                            style="background-image: url(images/work-2.jpg);">
                                            <a href="#" class="icon d-flex align-items-center justify-content-center">
                                                <span class="ion-ios-search"></span>
                                            </a>
                                        </div>
                                        <div class="text pt-3 w-100 text-center">

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="work">
                                        <div class="img d-flex align-items-center justify-content-center rounded"
                                            style="background-image: url(images/work-1.jpg);">
                                            <a href="#" class="icon d-flex align-items-center justify-content-center">
                                                <span class="ion-ios-search"></span>
                                            </a>
                                        </div>
                                        <div class="text pt-3 w-100 text-center">
                                            <h3><a href="#">Work 01</a></h3>
                                            <span>Web Design</span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div><img src="image/BaiViet/not-favorite-yet.png" width="30px" alt=""> 1280
                <img src="image/BaiViet/bookmark.png" width="30px" alt="">
            </div>
            <div>
                {{ $baiViet->chitietbaiviet }}






            </div>
            <hr>



            <div id="app">
                <label style="display: inline;" id="trang-thai-cmt" for="">Trang thai <button type="button"
                        @click="changeTypeToCreate" class="btn btn-light"><img src="image/BaiViet/close.png"
                            width="15px" alt=""></button>
                </label>
                <div id="comment_uer">
                    <div id="avt_author_cmt" class="row md-8">
                        <a class="nav-link " href="#" id="a_avatar" role="button" data-bs-toggle=""
                            aria-expanded="false" style="color: #000000;font-size: 19px;">

                            <img id="avatar_personale" src="    {{ optional(auth()->user())->avt }}" alt="" style="  vertical-align: middle;
        width: 45px;
        height: 45px;
        border-radius: 50%;">
                        </a>
                    </div>
                    <div id="input_cmt">
                        <textarea v-model="message" @keyup.enter="sendMessage" aria-label="With textarea" rows="1"></textarea>
                    </div>
                    <button type="button" class="btn btn-light"><img src="image/BaiViet/attachment.png" width="25px"
                            alt=""></button>

                    <button @click="sendMessage" type="button" class="btn btn-light"><img
                            src="image/BaiViet/send-message.png" width="25px" alt=""></button>
                </div>

                <div>
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <div id='list_comment' class="comment-widgets m-b-20">
                        @foreach ( App\Models\BinhLuan::all() as $item)
                            <div id="comment_id_{{ $item->id }}" class="d-flex flex-row comment-row ">
                                <div class="p-2"><span class="round"><img
                                            src="{{$item->user->avt}}" alt="user" width="50"></span></div>
                                <div class="comment-text active w-100">
                                    <h5>{{$item->user->name}}</h5>
                                    <div class="comment-footer">
                                        <span class="date">{{ date('h:m d/m/Y', $item->create_at) }}</span>
                                        <span class="label label-success">Approved</span> <span
                                            class="action-icons active">
                                            @if (auth()->id() == $item->user_id)
                                                <p
                                                    @click="changeTypeToUpdate({{ $item->id }},'{{ $item->noidung }}')">
                                                    <i class="fa fa-pencil"></i></p>
                                                <p @click="deleteMessage({{$item->id}})" href="#" data-abc="true"><i
                                                        class="fa-solid fa-trash-can text-danger"></i></p>
                                            @endif

                                            <p href="#" data-abc="true"><i class="fa fa-heart text-danger"></i></p>
                                            <a href="#" data-abc="true" style="display: flex; float: right; text-decoration-line: none;"><i class="fa fa-heart" style="text-decoration-line: none; margin-top: 4px;margin-right: 5px"></i>12345</a>
                                        </span>
                                    </div>
                                    <p id='comment_content_{{$item->id}}' class="m-b-5 m-t-10">{{ $item->noidung }}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2"><span class="round"><img
                                        src="https://cdnb.artstation.com/p/assets/images/images/019/697/901/large/wl-op-36s2.jpg?1564628205"
                                        alt="user" width="50"></span></div>
                            <div class="comment-text w-100">
                                <h5>Samso Nagaro</h5>




                                <div class="comment-footer">
                                    <span class="date">April 14, 2019</span>
                                    <span class="label label-info">Pending</span> <span class="action-icons">

                                        <a style="display:flex;float:right;text-decoration-line: none;" href="#"
                                            data-abc="true"><i style="text-decoration-line: none;margin-top: 4px;"
                                                class="fa fa-heart"></i>12345</a>
                                    </span>
                                </div>
                                <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s,
                                    when an unknown printer took a galley of type and scrambled it</p>
                            </div>
                        </div>

                        <div class="d-flex flex-row comment-row ">
                            <div class="p-2"><span class="round"><img
                                        src="https://i.imgur.com/tT8rjKC.jpg" alt="user" width="50"></span></div>
                            <div class="comment-text active w-100">
                                <h5>Jonty Andrews</h5>
                                <div class="comment-footer">
                                    <span class="date">March 13, 2020</span>
                                    <span class="label label-success">Approved</span> <span
                                        class="action-icons active">
                                        <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a>
                                        <a href="#" data-abc="true"><i class="fa fa-rotate-right text-success"></i></a>
                                        <a href="#" data-abc="true"><i class="fa fa-heart text-danger"></i></a>
                                    </span>
                                </div>
                                <p class="m-b-5 m-t-10">Contrary to popular belief, Lorem Ipsum is not simply random
                                    text.
                                    It has roots in a piece of classical Latin literature from 45 BC, making it over
                                    2000
                                    years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                                    Virginia,
                                    looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum
                                    passage,
                                    and going through the cites</p>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>


    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    <div>Chaan</div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script src="js/jquery.min.js"></script> --}}
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                // var el = document.getElementById("navbar_main");
                // el.style.animationName = "example2"
                // document.getElementById("navbar_main").style.top = "0";
                // $("#navbar_main").animate({top: '0px'});
                $("#navbar_main").slideDown();
            } else {
                var el = document.getElementById("navbar_main");

                $("#navbar_main").slideUp();
                // el.style.top = "-72px";

                el
            }
            prevScrollpos = currentScrollPos;
        }
        $("textarea").each(function() {
            this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
        }).on("input", function() {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        });






        // var modal = document.getElementById("myModal");

        // // Get the image and insert it inside the modal - use its "alt" text as a caption
        // var img = document.getElementById("myImg");
        // var modalImg = document.getElementById("img01");

        // img.onclick = function() {
        //     console.log(this.style.backgroundImage.toString());
        //     modal.style.display = "block";
        //     modalImg.src = this.style.backgroundImage.toString().slice(5, -2);

        // }

        // // Get the <span> element that closes the modal
        // var span = document.getElementsByClassName("close")[0];

        // // When the user clicks on <span> (x), close the modal
        // span.onclick = function() {
        //     modal.style.display = "none";
        // }

        function deleteMessage(id){
            vue.deleteMessage(id);
        }
        function changeTypeToUpdate(comment_id, mess){
            vue.changeTypeToUpdate(comment_id,mess);
        }
    </script>










    <script>
        var vue = new Vue({
            el: "#app",
            data() {
                return {
                    id: {{ auth()->id() ?? 1 }},
                    message: "",
                    users: [],
                    messages: [],
                    typeOfMessage: "create",
                    comment_id_update: null
                }
            },
            methods: {
                sendMessage() {
                    if (this.typeOfMessage == 'create') {
                        this.sendMessageCreate(null);
                    } else {
                        this.sendMessageCreate('PATCH');
                    }
                    this.changeTypeToCreate();



                },
                sendMessageCreate(method) {
                    var data = {
                        // _method: method,
                        idBaiViet: {{ $idBaiViet }},
                        message: this.message,
                        comment_id: this.comment_id_update
                    }
                    if (method != null) {
                        data._method = method;
                    }
                    axios.post('/DoAnI/public/binhluan', data)
                },
                deleteMessage(id) {
                    this.comment_id_update = id;
                    this.sendMessageCreate('DELETE')
                },
                removeComment(id) {
                    document.getElementById('comment_id_'+id).remove();


                }
                ,
                changeTypeToCreate() {
                    this.typeOfMessage = 'create';
                    this.comment_id_update = null;

                    this.message = ""
                },
                changeTypeToUpdate(comment_id, mess) { 
                    this.message = mess
                    this.typeOfMessage = "update"
                    this.comment_id_update = comment_id;
                    document.querySelector('#trang-thai-cmt').scrollIntoView({
  behavior: 'smooth',
    block: "center"
});


                },

                appendComment(user, message,comment_id) {
                    var div = document.createElement('div')
                    var date = new Date(message.created_at);
                    var dateString = (date.getHours())+':'+date.getMinutes()+' '+date.getDate()+'/'+(date.getMonth()+1)+'/'+(1900+date.getYear());

                    div.innerHTML =
                        '<div id="comment_id_'+message.id+'" class="d-flex flex-row comment-row "> <div class="p-2"><span class="round"><img src="'+user.avt+'" alt="user" width="50"></span></div> <div class="comment-text active w-100"> <h5>'+user.name+'</h5> <div class="comment-footer"> <span class="date"> '+dateString+' </span> <span class="label label-success">Approved</span> <span class="action-icons active"> @if (auth()->id() == $item->user_id) <p onclick="changeTypeToUpdate( '+message.id+',\''+message.noidung+'\')"> <i class="fa fa-pencil"></i></p> <p onclick="deleteMessage('+message.id+')" href="#" data-abc="true"><i class="fa-solid fa-trash-can text-danger"></i></p> @endif <p href="#" data-abc="true"><i class="fa fa-heart text-danger"></i></p> <a href="#" data-abc="true" style="display: flex; float: right; text-decoration-line: none;"><i class="fa fa-heart" style="text-decoration-line: none; margin-top: 4px;margin-right: 5px"></i>12345</a> </span> </div> <p id="comment_content_'+message.id+'" class="m-b-5 m-t-10">'+message.noidung+'</p> </div> </div>'
                    let listComment = document.getElementById('list_comment');
                    listComment.insertBefore(div, listComment.childNodes[0]);
                },
                updateComment(message) {
                    document.getElementById('comment_content_'+message.id).innerHTML = message.noidung;
                    if({{auth()->user()->id}}== message.user_id){
                        document.querySelector('#comment_content_'+message.id).scrollIntoView({
                        behavior: 'smooth',
                            block: "center"
});
                    }

                    
                }

            },
            mounted() {
                var echo = new Echo({
                    broadcaster: "socket.io",
                    host: window.location.hostname + ':6001'
                })
                echo.join('baiviet.{{ $idBaiViet }}')
                    .here((users) => {
                        this.users = users
                    })
                    .listen('MessageSent', (event) => {
                        console.log(event);
                        if(event.type== 'create'){
                            this.appendComment(event.user, event.message);
                        }else if(event.type == 'update'){
                            this.updateComment(event.message);
                        }else{
                            this.removeComment(event.comment_id);
                        }
                        // this.messages.push(event);
                    });
            },

        })
    </script>
</body>

</html>
