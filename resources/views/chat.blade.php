<html>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
        rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="{{ asset('/style/chat/style.css') }}" type="text/css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/2.4.0/socket.io.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.0/echo.common.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh Mục
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
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff">

                                    <img id="avatar_personale" src="  {{ optional(auth()->user())->avt }}"
                                        alt=""
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
    <div id="app" class="">
        <h3 class=" text-center">Messaging </h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="inbox_chat">

                        @foreach ($person_received as $user)
                            <div onclick="onClickChatBoxUser({{ $user->person_received_id }},'{{ $user->avt }}','{{ $user->name }}')"
                                class="chat_list" id="chatBox_{{ $user->person_received_id }}">
                                <div class="chat_people">
                                    <div class="chat_img" style="border-radius: 50%;overflow: hidden;"> <img
                                            src="{{ $user->avt }}" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>{{ $user->name }} <span class="chat_date">Dec 25</span></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="mesgs">
                    <div class="msg_history">
                        <div class="line_message" v-for="message in messages">
                            <div v-if="message.person_send_id!== id" class="incoming_msg">
                                <div style="border-radius: 50%;overflow: hidden;" class="incoming_msg_img"> <img
                                        :src="avtChatBox" alt="sunil">
                                </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg" style="margin-bottom: 20px">

                                        <p>@{{ message.noidung }}</p>
                                        <span class="time_date"> 11:01 AM | June 9
                                            <i class="fa fa-pencil text-success"></i>
                                            <i class="fa-solid fa-trash-can text-danger"></i></span>

                                    </div>
                                </div>
                            </div>
                            <div v-else class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>@{{ message.noidung }}</p>
                                    <span class="time_date"> <i class="fa fa-pencil text-success"></i>
                                        <i class="fa-solid fa-trash-can text-danger"></i> 11:01 AM | June 9</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input v-model="message" @keyup.enter="sendMessage" type="text" class="write_msg"
                                placeholder="Type a message" />
                            <button @click="sendMessage" class="msg_send_btn" type="button"><i
                                    class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="public_vue"></div>
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {

                $("#navbar_main").slideDown();
            } else {
                var el = document.getElementById("navbar_main");

                $("#navbar_main").slideUp();

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


        function updateListMessages(data) {
            data.forEach(function(mess) {
                personal_vue.messages.push(mess);
            })
            setTimeout(function() {
             
                        $(".msg_history").animate({
                            scrollTop:   $(".msg_history")[0].scrollHeight
                        },500);
                    
            }, 10)


            // personal_vue.messages.push()
        }

        function getMessagesByIdUser(user_id) {
            axios.post('/DoAnI/public/messages', {
                user_id: user_id
            }).then(function(res) {
                console.log(res.data)
                updateListMessages(res.data);

            })

        }

        function onClickChatBoxUser(user_id, avtChatBox, nameChatBox) {
            personal_vue.messages = [];
            personal_vue.avtChatBox = avtChatBox;
            personal_vue.nameChatBox = nameChatBox;
            personal_vue.user_id = user_id;
            getMessagesByIdUser(user_id);

        }
    </script>
    <script>
        var personal_vue =
            new Vue({
                el: "#app",
                data() {
                    return {
                        id: {{ auth()->id() }},
                        user_id: null,
                        message: "",
                        users: [],
                        messages: [],
                        avtChatBox: "",
                        nameChatBox: ""
                    }
                },
                methods: {
                    sendMessage() {
                        axios.post('/DoAnI/public/message', {
                            message: this.message,
                            user_id: this.user_id
                        })
                        this.message = ""
                    },
                    scrollToBottom() {
                        $(".msg_history").animate({
                            scrollTop:   $(".msg_history")[0].scrollHeight
                        },500);
                    },
                    pushMessage(event) {
                        this.messages.push(event.message);
                        setTimeout(() => {
                            this.scrollToBottom(), 50
                        })
                    }
                },
                mounted() {
                    var echo = new Echo({
                        broadcaster: "socket.io",
                        host: window.location.hostname + ':6001'
                    })

                    echo.join('chat.{{ auth()->id() }}')
                        .here((users) => {
                            this.users = users
                        })
                        .listen('ChatEvent', (event) => {
                            console.log(event.status);
                            console.log(this.user_id);

                            if (event.type == 'create') {
                                if (event.message.person_received_id == this.user_id || event.message
                                    .person_send_id == this.user_id) {
                                    this.pushMessage(event);
                                }
                            }
                        });
                },
            })
    </script>
</body>

</html>
