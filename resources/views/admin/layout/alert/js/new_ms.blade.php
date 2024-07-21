        {{-- new_msg --}}
        <audio  id="new_msg_alert">
            <source src="{{asset('agent/audio/notification.mp3')}}"  type="audio/mpeg">
        </audio>
        <script>


            // alert msg
                var audio_msg = document.getElementById("new_msg_alert");


                function playAudio() {

                    audio_msg.play();

                }

                function pauseAudio() {
                audio_msg.pause();

                }
                setInterval(function () {
                $.get({
                    url: '{{url('Agent/new_msg_checked')}}',
                    dataType: 'json',

                    success: function (response) {

                        let data = response.data;
                        if (data.new_msg > 0) {
                            playAudio();
                            $('#new_msg').appendTo("body").modal('show');



                        }
                    },
                });
            }, 10000);

            function check_new_msg() {
                location.href = '{{url('Agent/Users-Message')}}';
            }

        </script>
