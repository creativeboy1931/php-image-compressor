<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Make your website faster and save bandwidth. Minfy optimizes your PNG and JPEG images by 30-50% while preserving full transparency!">
    <meta name="copyright" content="Make your website faster and save bandwidth. Minfy optimizes your PNG and JPEG images by 30-50% while preserving full transparency!">
    <meta name="keywords" content=" compress image, Make your website faster and save bandwidth with Minfy, image resizer,resize image">
    <title>Minfy – Compress PNG and JPEG images intelligently</title>
    <!-- links fonts -->
    <link rel="stylesheet" href="/minfy/assets/fonts/nunito.css">
    <link rel="stylesheet" href="/minfy/assets/fonts/baloo2.css">
    <link rel="stylesheet" href="/minfy/assets/fonts/poppines.css">
    <link rel="stylesheet" href="/minfy/assets/fonts/mukta.css">
    <link rel="stylesheet" href="/minfy/assets/fonts/vododaras.css">
    <link rel="stylesheet" href="/minfy/assets/fonts/patrik.css">
    <link rel="stylesheet" href="/minfy/assets/fonts/spinc.css">
    <link rel="stylesheet" href="/minfy/assets/css/main.css">

    <!-- Material js  -->
    <script src="/material/material.js"></script>
<style>
 /* main header start */
    /* root css start*/
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            scrollbar-width: none;
        }
        *::-webkit-scrollbar{
            width: 0px;
            height: 0px;
        }
        /* width 100vw */
        .main_header_container,.mobile_navbar_body,.desktop_navbar_body,.mobile_menu_option_body{
            width: 100vw;
        }
        /* height 100vh */
        /* display flex */
        .mobile_menu_option_body,.desktop_menu_option_body{
            display: flex;
        }
        /* flex row */
       .mobile_menu_option_body,.desktop_navbar_body,.desktop_menu_option_body{
            flex-direction: row;
        }
        /* flex cols */

        .main_header_container{
            /* background-color: #d4f1ffba; */
            background-color: #d4f1ff94; 
            opacity: 0.98;
            z-index: 10;
        }

        .navbar_option{
            color: black;
            -webkit-text-stroke:1px #0000008c;
            font-family: 'Times New Roman', Times, serif;
            opacity: 0.8;
            transition: opacity 0.5s ease-in-out;
        }
        .navbar_option_active{
            opacity: 1;
        }
        .TopBottomBorder{
            border-top: 0.8px solid #00000040;
            border-bottom: 0.8px solid #00000040;
        }
        .LogoText{
            font-family: 'spincycle';
            text-shadow: 0 0 1.2px #090942b0;
            font-weight: 500;
        }
        /* Mobile screen start */
            @media only screen and (max-width: 599px) {
                .main_header_container{
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    padding: 5px 0px 0px 0px;
                    box-shadow: 1px 0px 2px #000000c9;
                }
                .desktop_navbar_body{
                    display: none;
                }
                .mobile_navbar_body{
                    display: flex;
                }
                .mobile_menu_option_body{
                    justify-content: space-evenly;
                    align-items: center;
                }
                .mobile_menu_option{
                    color: black;
                }
                .mobile_logo {
                    font-size: calc(100vw/11);
                }
                /* .mobile_logo img{
                    margin-top: -8px;
                    width: 50px;
                    height: auto;
                } */


            }
        /* Mobile screen end */

        /* Desktop screen start */
            @media only screen and (min-width: 600px) {
                .main_header_container{
                    position: fixed;
                    top: 0px;
                    left: 0px;
                    padding: 5px 0px;
                    border-bottom: 0.8px solid #28464cd6;
                }
                .mobile_navbar_body{
                    display: none;
                }
                .desktop_navbar_body{
                    display: flex;
                }
                .desktop_logo{
                    flex-basis: 30%;
                    font-size: 31px;
                    padding-left: 1%;
                }
                /* .desktop_logo img{
                    width: 40px;
                    height: auto;
                    margin-left: 10px;
                } */
                .desktop_menu_option_body{
                    width: -webkit-fill-available;
                    width: -moz-available;
                    align-items: center;
                    flex-direction: row;
                    justify-content: flex-end;
                }
                .desktop_menu_option{
                    margin-right: clamp(50px,7.81vw,75px);
                }
            }
        /* Desktop screen end */

 /* main header end */
</style>
</head>
<body onunload="alert('thank you for visiting')">
<!-- univesal div start -->
  <div style="width: 100vw; height:fit-content; display:flex;flex-direction:column;">
    <!-- main header start -->
        <div class="main_header_container">
            <!-- Desktop menu start-->
                <div class="desktop_navbar_body">
                    <div class="desktop_logo TopBottomBorder LogoText">
                        <!-- <img src="/minfy/assets/img/logo.png" alt="" srcset=""> -->
                        <span style="color:#fdbc44;margin-right: 2.2px;">M</span><span style="color:#1acb04;">in</span><span style="color:#010181;font-family:Arial, Helvetica, sans-serif;">fy</span>
                        <sub style="color:crimson;font-size: 9px;font-family: Arial, Helvetica, sans-serif;margin-left: -4%;">Be a <span style="color:#ff9933;">My</span><span style="color:black;">helper</span>..</sub>
                    </div>
                    <div class="desktop_menu_option_body TopBottomBorder">
                        <div class="desktop_menu_option navbar_option _underConstructionError">WEB</div>
                        <div class="desktop_menu_option navbar_option _underConstructionError">BLOG</div>
                        <div class="desktop_menu_option navbar_option _underConstructionError">API</div>
                        <div class="desktop_menu_option navbar_option _underConstructionError">TERM</div>
                    </div>
                </div>
            <!-- Desktop menu end-->
            <!-- Mobile menu start-->
                <div class="mobile_navbar_body">
                    <div class="mobile_menu_option_body">
                        <div class="mobile_menu_option navbar_option _underConstructionError">WEB</div>
                        <div class="mobile_menu_option navbar_option _underConstructionError">BLOG</div>
                        <div class="mobile_logo LogoText">
                            <!-- <img src="/minfy/assets/img/logo.png" alt="" srcset=""> -->
                            <span style="color:#fdbc44;margin-right: 2.2px;">m</span><span style="color:#1acb04;">in</span><span style="color:#010181;font-family:Arial, Helvetica, sans-serif;">fy</span>
                        </div>
                        <div class="mobile_menu_option navbar_option _underConstructionError">API</div>
                        <div class="mobile_menu_option navbar_option _underConstructionError">TERM</div>
                    </div>
                </div>
            <!-- Mobile menu end-->
        </div>
    <!-- main header end -->