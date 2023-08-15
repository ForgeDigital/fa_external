<!DOCTYPE html>

<!-- Begin html document -->
<html lang="">

    <!-- Begin document header -->
    <head>
        <title>Registration Verification</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">

        <style>
            body
            {
                font-family: 'Merriweather', "Microsoft Sans Serif", monospace;
            }
            .container
            {
                margin: 0 auto;
                width: 700px;
            }
        </style>
    </head>
    <!-- End document header -->

    <!-- Begin page body -->
    <body style="background-color: #F1F3F4;">
        <div class="container" style="padding-top: 30px; padding-bottom: 30px">
            <div style="box-sizing:border-box; display:block; max-width:700px;">

                <!-- Begin main section -->
                <div style="clear:both; width:100%; background:#ffffff; border:1px solid rgb(218,220,224); border-radius:5px;">
                    <div style="width:100%; border-spacing:0; font-size:12px; border-collapse:separate!important;">

                        <!-- Begin main contents -->
                        <div style="box-sizing:border-box; font-size:12px; vertical-align:top; padding:30px">
                            <div style="box-sizing:border-box; width:100%; border-spacing:0; border-collapse: separate!important">

                                <!-- Begin top menu -->
                                @include('Common.pageTopMenu')
                                <!-- End top menu -->

                                <!-- Begin main message -->
                                <div style="">
                                    <div style="box-sizing: border-box; padding: 0; font-size: 14px; vertical-align: top">
                                        <div style="box-sizing: border-box">
                                            <h2 style="margin: 0 0 30px; font-weight :300; line-height: 1.5; font-size: 24px; color:#294661!important">
                                                Hi {{ $data['first_name'] }},
                                            </h2>
                                            <p style="margin: 0 0 20px; color: #294661; font-size: 14px; font-weight: 300">
                                                Thanks for joining the Forge family & welcome to the world of unique and exciting experiences. Discover music, exclusive content, live events, social interactions & one of a kind eCommerce - all bound together by a dynamic payment platform.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End main message -->

                                <!-- Begin last content -->
                                @include('Common.pageMessageEnd')
                                <!-- End last content -->

                            </div>
                        </div>
                        <!-- End main contents -->

                    </div>
                </div>
                <!-- End main section -->

                <!-- Begin footer section -->
                @include('Common.pageFooter')
                <!-- End footer section -->

            </div>
        </div>
    </body>
    <!-- End page body -->

</html>
<!-- End html document -->
