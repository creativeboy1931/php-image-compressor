<?php
include($_SERVER['DOCUMENT_ROOT'].'/minfy/tool/header.php');
?>

<div class="home_upload_img_container">
    <form method="post" id="form_submit" enctype="multipart/form-data">
        <label for="home_upload_img">
        <div class="home_img_upload_box">
            <div class="upload_icon">
                <img src="/minfy/assets/img/upload.png" alt="Upload images" srcset="">
            </div>
            <strong>Drop your PNG & JPEG file here !</strong>
            <p>Upto 10 Images , Max 7 MB each</p>
            <input type="file" name="home_upload_img" id="home_upload_img" accept="image/png, image/jpg, image/jpeg" multiple style="visibility: hidden; width:0px;height:0px;">
        </div>
        </label>
    </form>
    <div class="home_upload_btn_box">
        <button id="Advance_Btn">Advance</button>
        <button id="home_crop_img">Crop</button>
    </div>
</div>
<div class="home_main_container">
    <div class="output_img_container">
        
        <div class="home_output_img_box">
            <div class="output_img_header">Selected images</div>
            <div class="home_output_img">

            </div>
        </div>
    </div>
    <div class="home_context_body">
        <div class="home_context_heading">
            <h1>Smart PNG and JPEG compression</h1>
            <p>More than thousand time PNG and JPEG images optimized and still continued!</p>
        </div>
        <div class="home_context_section">
            <!-- minfy context -->
            <div class="home_context_sec1">
                <div class="sec1_context_box">
                    <strong>What does Minfy do?</strong>
                    <p><b>Minfy</b> uses smart lossy compression techniques to reduce the file size of your JPEG and PNG files.
                    By selectively decreasing the number of colors in the image, fewer bytes are required to store the data. The effect is nearly invisible but it makes a very large difference in file size!</p>
                </div>
                <div class="sec1_context_box">
                    <strong>How does it work?</strong>
                    <p>When you upload a PNG (Portable Network Graphics) file, similar colors in your image are combined. This technique is called “quantization”. By reducing the number of colors, 24-bit PNG files can be converted to much smaller 8-bit indexed color images. All unnecessary metadata is stripped too. The result better PNG files with 99% support for transparency. Have your cake and eat it too!
                    In the above image the file size is reduced by more than 50%. I have excellent eyesight but can’t spot the difference either! Use the optimized image to save bandwidth and loading time and your website visitors will thank you.</p>
                </div>
                <div class="sec1_context_box">
                    <strong>Why should I use Minfy?</strong>
                    <p>PNG is useful because it’s the only widely supported format that can store partially transparent images.
                    The format uses compression, but the files can still be large. Use <b>Minfy</b> to shrink images for your apps and sites. It will use less bandwidth and load faster.</p>
                </div>
                <div class="sec1_context_box">
                    <strong>Is it supported everywhere?</strong>
                    <p>Excellent question! The files produced by Minfy are displayed perfectly on all modern browsers including mobile devices. Still need to support Internet Explorer 6? It normally ignores PNG transparency and displays a solid background color.</p>
                </div>
                <div class="sec1_context_box">
                    <strong>Why did we create Minfy?</strong>
                    <p>Excellent question! We frequently use PNG images, but were frustrated with the load times. We created <b>Minfy</b> in our quest to make our own websites faster and more fun to use with the best compression.
                    In 2019 , fistly  we successfully done that image compression.Compressing images with the website is free for everyone and we like to keep it that way!
                    If you like <b>Minfy</b> please support & contribute by making a <a href="">donation</a>.</p>
                </div>
            </div>
            <!-- feedback + add's section -->
            <div class="home_context_sec2">
                <!-- ad's section -->
                <div class="context_sec2_ads_body">
                    <img src="/minfy/assets/img/ads/ad1.jpg" alt="loading...." srcset="">
                </div>
                <!-- feedback form -->
                <div class="context_sec2_feedback">
                    <?php include($_SERVER['DOCUMENT_ROOT'].'/minfy/tool/feedbackForm.php');?>
                </div>
            </div>
        </div>
    </div>
    <!-- home Advance option start -->
        <div class="advance_modelbox" style="display: none;">
                <div class="advance_box" style="display: none;">
                    <div class="advance_input_item" style="margin-top:25px;">
                        <label for="ad_quality_select">Quality Reducing </label>
                        <select name="" id="ad_quality_select">
                            <option value="2">50%</option>
                            <option value="1.65">40%</option>
                            <option value="1.42" selected>30%</option>
                            <option value="1.2">20%</option>
                        </select>
                    </div>
                    <div class="advance_input_item">
                        <label for="ad_waterMark">Water Mark</label> <br>
                        <input type="text" name="" id="ad_waterMark" spellcheck="false" >
                    </div>
                    <div class="advance_input_item" style="display: flex;justify-content: space-around;width: 100%;">
                        <button id="advance_crop_img">Crop</button>
                        <button id="advance_crop_img_hide">Cancel</button>
                    </div>
                </div>

                <!-- download box start-->
                    <div class="download_img_box" style="display:none;">
                        <div class="download_img_header">
                            Minfyed images
                        </div>
                        <div class="download_output_img" id="download_img_container">
                            
                  
                            <!-- <div class="output_img_item_box">
                                <img src="/minfy/assets/img/bg1.jpg" alt="Minfyed images" srcset="">
                                <button class="download_btn" data-imgLocation="ram123">
                                 <i>{}</i>
                                 <img src="/minfy/assets/img/logos/download.png" alt="download" srcset="">
                                </button>
                            </div> -->
                      
                            
                        </div>
                        <div class="download_all_btn">
                            <button id="download_all">
                                <a href="/minfy/assets/img/item/minfy.zip" download="minfyZip">
                                    Download all
                                </a>
                            </button>
                        </div>
                    </div>
                <!-- download box end-->

        </div>
    <!-- home Advance option end -->
</div>
<script>
     $NetCut(); //Material js
     $Preloader({
        TitleText:'Minfy',
        greetingText:'Thank you for waiting !'
    }); //Material js
  // under construction error tooltip start
    ErrorToolTip();
    function ErrorToolTip(){
       let x =  document.querySelectorAll('._underConstructionError');
       for(i = 0; i < x.length; i++){
           x[i].addEventListener('click',function(e){
                e.preventDefault;
                $ToolTip({
                    // BgColor:'red',
                    // TextColor:'black',
                    Msg:'Under Construction pls try again later',
                    time:3000
                });
           });
       }
    }
  // under construction error tooltip start

    let img = document.getElementById('home_upload_img');
    var imgData = []; //image data for store globle img file from input 
    img.addEventListener('change', function(){
        document.querySelector('.home_output_img').innerHTML = "";
        const size = 7340032; // byte 1048576(binary) = 1MB
        var ImgEx = /(\.png|\.jpg|\.jpeg)$/i;

        let tempFallback = 1; // temp fallback control on image limiter

            for(let files of this.files){
                // img type check
                if(!ImgEx.exec(files.name)){
                    // alert("pls only select PNG , JPEG OR JPG images!");
                    console.log('image is not supported');
                    imgPreview(imgData);
                    continue;
                }else{

                    // image size limeter
                    if (files.size <= size) {
                        console.log(tempFallback);

                        // temp fallback if for control on image limiter
                        if(tempFallback < 10){
                            //  Limit number of images are uploaded
                            if(imgLimiter()){
                                // check img dublicase
                                if(imgDuplicase(files.name)){
                                    var reader = new FileReader();
                                    reader.readAsDataURL(files); // convert to base64 string
                                    reader.onload = (e)=>{
                                        imgData.push({
                                            'name' : files.name,
                                            'url' : e.target.result,
                                            'file' : files
                                        });
                                        setTimeout(function(){
                                            imgPreview(imgData);
                                        }, 0);
                                        document.getElementById('form_submit').reset();
                            
                                    }
                                }else{
                                    console.log('same image selected');
                                    imgPreview(imgData);
                                    continue;
                                }
                            }else{
                                console.log('img limiter max of 10');
                                document.getElementById('form_submit').reset();
                                imgPreview(imgData);
                                break;
                            }
                        }

                    }else{
                        document.getElementById('form_submit').reset();
                        imgPreview(imgData);
                        alert(' Pls only select below 7MB size of image!');
                        continue;
                    }
                }
             tempFallback ++; // temp fallback control on image limiter
            }

           // show Advance model box for Add Water mark start
            setTimeout(()=>{
                document.querySelector('#home_crop_img').addEventListener('click',SaveImg);
                document.querySelector('#Advance_Btn').addEventListener('click',function(){
                    if(imgData.length > 0){
                        let modalbox = document.querySelector('.advance_modelbox');
                        let advanceOption = document.querySelector('.advance_box');
                        modalbox.style = ('display:flex;');
                        advanceOption.style = ('display:flex;');
                        document.querySelector('#advance_crop_img').addEventListener('click',function(){
                            let ad_quality = document.getElementById('ad_quality_select').value;
                            let ad_water_mark = document.getElementById('ad_waterMark').value;
                            let data = {};
                            if(ad_quality != ''){
                                data['ad_quality'] = ad_quality;
                            }
                            if(ad_water_mark != ''){
                                data['ad_water_mark'] = ad_water_mark;
                            }
                            SaveImg(data); // call function for save selected image
                        });

                        // hide Advance crop modal box
                        document.querySelector('#advance_crop_img_hide').addEventListener('click',function(){
                            document.querySelector('.advance_modelbox').style = "display:none;";
                            document.getElementById('ad_waterMark').value ="";
                            document.getElementById('ad_quality_select').value = 1.42;
                        });
                    }
                });
            },0);
           // show Advance model box for Add Water mark end

    });

  //  save and crop imgae after img uploading
    async function SaveImg(data){
        if(imgData.length > 0){
            let img = document.getElementById('home_upload_img');
            let formdata = new FormData();
            let index = 0;
            for(let i=0;i< imgData.length;i++){
                formdata.append(`file${i}`,imgData[i]['file']);
                index ++;
            }
            formdata.append(`index`,index);
            if(data['ad_water_mark']){
                formdata.append(`ad_water_mark`,data['ad_water_mark']);
            }
            if(data['ad_quality']){
                formdata.append(`ad_quality`,data['ad_quality']);
            }

            let url = '/minfy/assets/fn/crop.php';
            await fetch(url,{
                method:"POST",
                body: formdata
            }).then(async function(response){
                if(response.status === 200){
                    let data = await response.json();
                //    let data = await response.text();
                    if(data['status']){
                        console.log(data['status']);
                        console.log(data['msg']);
                    }else{

                        // formate html for show preview after compression
                        let formate = "";
                        for(x = 0; x <= data['index'];x++){
                            formate += `
                            <div class="output_img_item_box">
                                <img src="${data['file'+x].replace("C:/xampp/htdocs/","/")}" alt="Minfyed images" srcset="">
                                    <button class="download_btn" data-imgLocation="${data['file'+x]}">
                                        <a href="${data['file'+x].replace("C:/xampp/htdocs/","/")}" download="MinfyImg${x}">
                                            <img src="/minfy/assets/img/logos/download.png" alt="download" srcset="">
                                        </a>
                                    </button>
                            </div>
                            `;
                            // console.log(data['file'+x]);
                        }

                        // show download img box
                        setTimeout(function(){
                            let x = document.querySelector('.download_output_img');
                            document.querySelector('.advance_box').style ="display:none;";
                            document.querySelector('.advance_modelbox').style ="display:flex;";
                            document.querySelector('.download_img_box').style ="display:flex;";
                            x.insertAdjacentHTML('afterbegin',formate);

                            // hide or delete downloadable img
                            let hide_download = document.querySelectorAll('.download_btn');
                            for(var i = 0; i < hide_download.length; i++) {
                                hide_download[i].addEventListener("click",hide_Download_img);
                            }
                        },0);

                    }
                }else{
                    return false;
                }
            }).catch(function(e){
                console.log('error found! on fetching data in Toajax '+ e.stock);
                return false;
            });
        }
    }

  // preview img before uploading start
    function imgPreview(img){
        if(img.length > 0){

            let formate ="";
            let x = document.querySelector('.home_output_img');
            // x.innerHTML="";
            img.forEach(e => {
                formate += `<div class="output_img_item_box">
                <img src="${e.url}" alt="selected images" srcset="">
                <b onclick="deletImg(${img.indexOf(e)},this)">x</b></div>`;
            });

            setTimeout(function(){
                x.innerHTML = formate;
                // x.insertAdjacentHTML('afterbegin',formate);
            },0);
        }
    }
  // preview img before uploading end

  //   check imgage duplicase 
    function imgDuplicase(data){
        let z = true
        if(imgData.length > 0){
            for(x = 0; x < imgData.length; x++){
                if(imgData[x].name == data){
                    z = false;
                    break;
                }
            }
        }
        return z;
    }
  // limit number of images are 10
    function imgLimiter(){
        let z = false;
        if(imgData.length < 10){
            z = true;
        }
        console.log(`check lenght of imgData `+imgData.length);
        return z;
    }

  // remove unused imge from img selecton or preview box
    function deletImg(index,e){
        // .document.querySelector('.output_img_item_box')
       let q = e.parentElement;
       q.classList.add('output_img_item_box_removed');
        imgData.splice(index,1);
        setTimeout(() => {
            q.style = 'display:none;';
        },200);
    }
  // remove unused imge from img selecton or preview box


  // hide dowloadable img item start
    function hide_Download_img(){
        let imgLocation = this.dataset.imglocation;
        // console.log(imgLocation);
        let x = this.parentElement;
        x.classList.add("output_img_item_box_active");
        console.log("btn click for download");

        setTimeout(function(){
            x.remove(); // remove parent div of downloadable img

            // delete img from server
            setTimeout(function(){
                DelImgToServer(imgLocation) //delete img to server
            },1500);
        },200);

        if(1 >= document.querySelectorAll('.download_btn').length){
            fn_hide_img_download(); // hide advance modalbox & empty imgData array
        }
    }

  // hide dowloadable img item end

 //   delete img after download from server start
    function DelImgToServer(loca){
        console.log(loca);
        $ToAjax({
            url:'/minfy/assets/fn/del_img.php',
            type:'POST',
            data:{imgLocation:loca},
            success:function(data){
                 console.log(data);
            },
            json:true
        });
    }
 //   delete img after download from server end

 //   hide modalbox ,empty imgData & remove img preview start
    function fn_hide_img_download(){
        document.querySelector('.advance_modelbox').style ="display:none;";
        document.querySelector('.download_img_box').style ="display:none;";

        imgData = []; // empty imgData and delete old preview img item
        document.querySelector('.home_output_img').innerHTML="";
    }
 //   hide modalbox ,empty imgData & remove img preview start

 //  download all img at once start
    document.getElementById('download_all').addEventListener('click',function(){
        console.log('all btn clicked');

        //delet images from server
        let x = document.getElementById('download_img_container').children;
        for(i = 0; i < x.length; i++){
            let link = x[i].children[1].dataset.imglocation;
            console.log(link);
            DelImgToServer(link);
        }

        setTimeout(function(){
            fn_hide_img_download(); // hide advance modalbox & empty imgData array

            // hide subloader
        },100);
    });
 //  download all img at once end
</script>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/minfy/tool/footer.php');
?>