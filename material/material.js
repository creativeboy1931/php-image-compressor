console.log('Material.js invoked');
// css linker start
function $CssLinker(data){
    // src or style , Namespace, callback
    let head = document.getElementsByTagName('head')[0];

   if(head.querySelector('#_Css'+data['Namespace'])){
        if(data['callback']){
            // callback();
            data['callback']();
        }
    }else{
        if(data['Src'] || data['src']){
            var putCss = document.createElement('link');
            if(data['Src']){
                putCss.setAttribute('href',data['Src']);
            }else{
                putCss.setAttribute('href',data['src']);
            }
            putCss.rel = 'stylesheet';
        }else{
            var putCss = document.createElement('style');
            putCss.textContent = data['style'];
        }
        putCss.type = 'text/css';
        putCss.async = true;
        putCss.id = "_Css"+data['Namespace'];
        head.appendChild(putCss);
        if(data['callback']){
            putCss.onload = function(){
                // data['callback']('ram');
                data['callback']();
            }
        }
    }
}

// js linker
function $JsLinker(data){
    let head = document.getElementsByTagName('head')[0];
        if(head.querySelector('#_Js'+data['Namespace'])){
            if(data['callback']){
                data['callback']();
            }
        }else{
            let putJs = document.createElement('script');
            if(data['Src'] || data['src']){
                if(data['src']){
                    putJs.src = data['src'];
                }else{
                    putJs.src = data['Src'];
                }
            }else{
                putJs.textContent = data['script'];
            }
            putJs.type = 'text/javascript';
            putJs.async = true;
            putJs.id = '_Js'+data['Namespace'];
            head.appendChild(putJs);
            if(data['callback']){
                putJs.onload = function(){
                    data['callback']();
                }
            }
        }
}
// preloader
function $Preloader(data){
    let body = document.getElementsByTagName('body')[0];
    let style = `:is(.main_loader_content,.main_loader_box,.main_loader_footer){display:flex}.main_loader_box{display:flex;width:100vw;height:100vh;position:fixed;top:0;left:0;justify-content:center;align-items:center;background-color:#f5f5f5;z-index:100;transition:all .5s ease-in}.main_loader_box_deactive{visibility:hidden;opacity:0}.main_loader_content{flex-direction:column;justify-content:center;align-items:center;background:0 0}.main_loader_header{width:100%;flex-basis:30%;display:flex;flex-direction:column;align-items:center;justify-content:flex-start}.main_loader_header strong{font-family:'Times New Roman',Times,serif;font-weight:200;text-shadow:0 0 3.5px #100b0b63;color:#2c2a2ae3}.main_loader_img{flex-basis:50%;margin:calc(100vh/4) 0 calc(100vh/10) 0}.main_loader_footer{flex-basis:20%;flex-direction:row;font-family:Arial,Helvetica,sans-serif;color:#747373;text-transform:capitalize}@media only screen and (max-width:599px){.main_loader_header strong{font-size:clamp(35px,9.72vw,40px)}.main_loader_img img{width:clamp(45px,12.5vw,50px);height:auto}}@media only screen and (min-width:600px){.main_loader_header strong{font-size:clamp(35px,6.25vw,40px)}.main_loader_img img{width:clamp(37px,5.78vw,42px);height:auto}}`;
    if(data){
        if(data['backgroundColor']){
            style += ` .main_loader_box{background-color: ${data['backgroundColor']};}`;
        }
        if(data['TitleColor']){
            style += ` .main_loader_header strong{color: ${data['TitleColor']};}`;
        }
        if(data['greetingColor']){
            style += ` .main_loader_footer{color: ${data['greetingColor']};}`;
        }
    }
    let ModalBox = document.createElement('div');
    ModalBox.className = 'main_loader_box';
    let Title = (data['TitleText']) ? data['TitleText'] :'Myhelper';
    let greeting = (data['greetingText']) ? data['greetingText'] :'your patience is really praiseworthy';
    ModalBox.innerHTML =`<div class="main_loader_box" style="display:flex"><div class="main_loader_content"><div class="main_loader_header"><strong>${Title}</strong></div><div class="main_loader_img"><img src="/material/img/subloader/subloader1.gif" alt="preloader"></div><div class="main_loader_footer"><p># ${greeting}</p></div></div></div>`;
    $CssLinker({
        style:style,
        Namespace:'Preloader'
    });
    body.appendChild(ModalBox);
    body.onload = function(){
        hidePreloader();
     }

    function hidePreloader(){
        setTimeout(function(){
            let x = document.querySelector('.main_loader_box');
   
            if(x.classList.add('main_loader_box_deactive')){
               x.remove();
            }
        },700);
    }
}
// ToolTip
function $ToolTip(data){
    let style = `.material_ToolTip_body{width:100vw;display:flex;justify-content:center;position:fixed;top:auto;bottom:20vh;left:auto;background:none;z-index:10;}.material_ToolTip_body p{width:fit-content;font-family:Arial,Helvetica,sans-serif;font-weight:normal;word-wrap:break-word;text-align:center;padding:8px 16px;border-radius:20vw;text-transform:lowercase;box-shadow:inset 0px 0px 200px #68686836;} @media only screen and(max-width:599px){.material_ToolTip_body p{max-width:clamp(280px,77.77vw,300px);font-size:clamp(12px,3.33vw,14px);}} @media only screen and(min-width:600px){ .material_ToolTip_body p{max-width:clamp(320px,50vw,350px);font-size:clamp(10px,1.56vw,11px);}}`;
    let htmlFormat = `<p class="header_ToolTip_text ToolTipBgColor TooltipClr">thank you !</p>`;
    let t = `2500`; //set time
    if(data){
        if(data.BgColor){
            style +=`.ToolTipBgColor{background-color:${data.BgColor};}`;
        }else{
            style +=`.ToolTipBgColor{background-color:#0e3953;}`;
        }
        if(data.TextColor){
            style +=`.TooltipClr{color:${data.TextColor};}`;
        }else{
            style +=`.TooltipClr{color:whitesmoke;}`;
        }

        // set html formate
        htmlFormat = (data.Msg || data.msg)?`<p class="header_ToolTip_text ToolTipBgColor TooltipClr">${data.msg || data.Msg}</p>`:`<p class="header_ToolTip_text ToolTipBgColor TooltipClr">thank you !</p>`;
        let t = (data.Time || data.time)?data.time || data.Time :`2500`; //set time
    }else{
        style +=`.ToolTipBgColor{background-color:#0e3953;}`;
        style +=`.TooltipClr{color:whitesmoke;}`;
    }
    

    $CssLinker({
        style:style,
        Namespace:'ToolTip'
    });

    let mydiv = document.createElement('div');
    mydiv.className = 'material_ToolTip_body';
    mydiv.innerHTML = htmlFormat;
    document.getElementsByTagName('body')[0].appendChild(mydiv);

    // remove tooltip
    setTimeout(() => {
        mydiv.remove();
    },t);
}
// internet checker
function $NetCut(data){
    let body = document.getElementsByTagName('body')[0];
    let style = `.rootCss{padding:0;margin:0;box-sizing:border-box;background:0 0}._Material_modalbox{width:100vw;height:100vh;position:fixed;top:0;left:0;display:none;justify-content:center;align-items:center;background-color:#282828c7;transition-delay:10ms;transition:opacity .4s ease-in,visibility .4s ease-in,z-index .4s ease-in;z-index:10}._Material_modalbox_active{display:flex;opacity:1;visibility:visible;z-index:10}._netCut_box{width:fit-content;height:fit-content;display:flex;flex-direction:column;align-items:center;background-color:#f5f5f5;box-shadow:0 0 2px .5px #0000005e;border-radius:7px;padding:20px 35px 20px 35px}._netCut_i{display:flex;align-items:center;justify-content:center;border:2px solid orange;font-size:17px;color:orange;border-radius:50%;font-family:Arial,Helvetica,sans-serif;margin:10px}._netCut_text{width:100%;text-align:center;background-color:#00000005;border-left:2.99px solid orange;padding:2px 3px}._netCut_text strong{color:#000000d9;font-family:'Times New Roman',Times,serif;letter-spacing:.5px;text-shadow:0 0 1px #726e6f91}._netCut_text p{margin-top:-1px;color:#00000085;font-family:'Lucida Sans','Lucida Sans Regular','Lucida Grande','Lucida Sans Unicode',Geneva,Verdana,sans-serif}._netCut_btn{margin-top:20px}._netCut_btn button{appearance:none;border-style:none;outline-style:none;background-color:#00fb4dd1;padding:2.3px 8px;border-radius:3px;color:#1c1a1adb;font-weight:600}._netCut_btn button:focus{background-color:#000000c7;color:#e7e7e7e0}@media only screen and (min-width:600px){._netCut_text strong{font-size:clamp(16px,2.18vw,17.5px)}._netCut_text p{font-size:clamp(8.4px,1.31vw,9.3px)}._netCut_i{width:clamp(30px,4.68vw,38px);height:clamp(30px,4.68vw,38px);font-size:clamp(20px,3.125vw,27.5px)}._netCut_btn button{font-size:13.3px}}@media only screen and (max-width:599px){._netCut_text strong{font-size:clamp(17.8px,4.55vw,19px)}._netCut_text p{font-size:clamp(9.7px,2.69vw,11.28px)}._netCut_i{width:clamp(42px,11.68vw,46px);height:clamp(42px,11.68vw,46px);font-size:clamp(27px,7.5vw,29.5px)}._netCut_btn button{font-size:14.5px}}`;
    if(data){
        if(data['positionX']){
            style += ` ._Material_modalbox{justify-content: ${data['positionX']};}`;
            console.log(data['positionX']);
        }
        if(data['positionY']){
            style += ` ._Material_modalbox{align-items: ${data['positionY']};}`;
        }
        if(data['backgroundColor']){
            style += ` ._netCut_box{background-color: ${data['backgroundColor']};}`;
        }
        if(data['titleClr']){
            style += ` ._netCut_text strong{color: ${data['titleClr']};}`;
        }
        if(data['titleIcon']){
            style += `._netCut_i{color: ${data['titleIcon']};}`;
            style +=` ._netCut_text,._netCut_i{border-color: ${data['titleIcon']};}`;
        }
        if(data['btnBg']){
            style += ` ._netCut_btn button{background-color: ${data['btnBg']};}`;
        }
        if(data['btnClr']){
            style += `._netCut_btn button{color: ${data['btnClr']};}`;
        }
    }
    let ModalBox = document.createElement('div');
    ModalBox.className = '_Material_modalbox';
    ModalBox.innerHTML = `<div class="rootCss _netCut_box"><div class="rootCss _netCut_i"><p>x</p></div><div class="rootCss _netCut_text"><strong>Network Disconnected</strong><br><p>pls check your internet connection</p></div><div class="rootCss _netCut_btn"><button>ok</button></div></div>`;
    $CssLinker({
        style:style,
        Namespace:'netCut'
    });
    body.appendChild(ModalBox);

    window.addEventListener('offline',function(data){
        let check_internet = document.querySelector('._Material_modalbox');
        check_internet.classList.add("_Material_modalbox_active");
        window.addEventListener('online',hide_check_internet);
        document.querySelector('._netCut_btn button').addEventListener('click',hide_check_internet);
        function hide_check_internet(){
            document.querySelector('._Material_modalbox').classList.remove('_Material_modalbox_active');
        }
    });
}

// Ajax request
async function $ToAjax(data){
    console.log(data.url);
    let formdata = new FormData();
    for(let [key,value] of Object.entries(data.data)){
        formdata.append(key,value);
     }
    var x = await fetch(data.url,{
        method:data.type,
        body: formdata
        // credentials: 'include'
    }).then(function(response){
        if(response.status === 200){
            if((data.JSON)||(data.json)){
                return response.json();
            }else{
                return response.text();
            }
        }else{
            return false;
        }
    }).catch(function(e){
        console.log('error found! on fetching data in Toajax '+ e.stock);
        return false;
    });
    data.success(x);
}

// material component
function Material(x){
    const selector = document.querySelector(x);
  // inner css listner start
    selector.css = function(style){
        for(let key in style){
            selector.style[key] = style[key];
            return selector;
        }
        // return selector.innerText;
    }
  // inner css listner end

 //  Html painter
    selector.HtmlPainter = function(data){
        if(data){
            selector.innerHTML = data;
            let scripts = selector.querySelectorAll("script");
            for (let x = 0; x < scripts.length; x++) {
                
                if (scripts[x].innerText) {
                    eval(scripts[x].innerText);
                    // CreatScript(xBox,scripts[x].innerText);
                    console.log('root js inoked');
                } else {
                    fetch(scripts[x].src).then(function (data) {
                        data.text().then(function (r) {
                            console.log('js linker inoked');
                            eval(r);
                            // CreatScript(xBox,r);
                        })
                    });
                }   
                    scripts[x].parentNode.removeChild(scripts[x]);
            }
            return selector;
        }else{
            return selector.innerHTML;
        }
     };

 //  copyright footer start
     selector.Footer = function(data){
        // style control 
        let style = `*{padding: 0px;margin: 0px;box-sizing: border-box;}.footer_hr{width: 100%;display: flex;justify-content: center;}.footer_hr hr{border-style: none;width: 15%;max-width: 70px;height: 3.2px;opacity: 0.8;border-radius: 10px;background-color: whitesmoke;}.material_footer_container{width: 100vw;display: flex;flex-direction: column;}.material_footer_social,.material_footer_menu,.material_footer_subMenu{width: 100%;display: flex;flex-direction: row;flex-wrap: wrap;justify-content: center;}.material_footer_social{padding: 30px 15px;}.material_footer_social .icons img{opacity: 0.8;transition: opacity 0.5s ease-out;}.material_footer_menu .item_menu{padding: 10px 0px;text-transform: uppercase;font-weight: bold;font-family: 'Times New Roman', Times, serif;}.material_footer_menu a{opacity: 0.8;}.material_footer_menu a,.material_footer_subMenu a{text-decoration: none;-webkit-appearance: none;-moz-appearance: none;transition: opacity 0.4s ease-out;}.material_footer_social img:hover,.material_footer_menu a:hover{opacity: 1;}.material_footer_subMenu{padding-top: 5px;padding-bottom: 15px;text-transform: capitalize;font-weight: normal;font-family: Arial, Helvetica, sans-serif;}.material_footer_subMenu a{opacity: 0.7;}.material_footer_subMenu a:hover{opacity: 0.9;}.material_footer_copyright{padding: 14px 0px;width: 100%;display: flex;flex-direction: column;align-items: center;}.copyright_text{line-height: 19px;text-align: center;font-weight: 600;font-family: 'Times New Roman', Times, serif;text-transform: capitalize;font-size: 14px;opacity: 0.9;letter-spacing: 0.5px;-webkit-text-stroke: 0.2px black;}.meta_text{font-weight: 500;font-family: Arial, Helvetica, sans-serif;text-transform: capitalize;font-size: 10px;margin-top: 15px;letter-spacing: 0.8px;text-align: center !important;}@media only screen and (max-width: 599px) {.material_footer_social{gap: 17px;}.material_footer_social img{width: clamp(35px,9.72vw,40px);height: clamp(35px,9.72vw,40px);}.material_footer_menu{gap: 11px;font-size: clamp(13px,3.61vw,15px);}.material_footer_subMenu{gap: 10px;font-size: clamp(13px,3.61vw,15px);}}@media only screen and (min-width: 600px){.material_footer_social{gap: clamp(15px,2.34vw,18px);}.material_footer_social img{width: clamp(30px,4.68vw,35px);height: clamp(30px,4.68vw,35px);}.material_footer_menu{gap: 12px;font-size: clamp(12px,1.87vw,13px);letter-spacing: 0.8px;}.material_footer_subMenu{gap: 10px;font-size: clamp(12px,1.87vw,13px);}}`;
        
        if(data.style){
            if(data.style.bgColor){
                style += `.bgColor{background-color:${data.style.bgColor} !important;}.textColor{color:#f5f5f5;}.subBg{background-color:rgb(7 7 7 / 20%);}`;
            }
            if(data.style.textColor){
                style += `.textColor{color:${data.style.textColor} !important;}.subBg{background-color:rgb(7 7 7 / 20%);}.bgColor{background-color:#0e3953;}`;
            }
            if(data.style.subBg){
                style += `.subBg{background-color:${data.style.subBg} !important;}.textColor{color:#f5f5f5;}.bgColor{background-color:#0e3953;}`;
            }
        }else{
            style += `.textColor{color:#f5f5f5;}`;
            style += `.bgColor{background-color:#0e3953;}`;
            style += `.subBg{background-color:rgb(7 7 7 / 20%);}`;
        }
     // html control start
        let html = `<div class="material_footer_container bgColor textColor"><div class="material_footer_social">`;
        // social btn
        if(data.socialBtn){
            if((data.socialBtn.facebook)||(data.socialBtn.Facebook)){
                html +=`<div class="icons"><a href="${data.socialBtn.facebook || data.socialBtn.Facebook}" target="_blank" rel="noopener noreferrer"><img src="/material/img/social-icon/facebook.png" alt="facebook"></a></div>`;
            }
            if((data.socialBtn.instagram)||(data.socialBtn.Instagram)){
                html +=`<div class="icons"><a href="${data.socialBtn.instagram || data.socialBtn.Instagram}" target="_blank" rel="noopener noreferrer"><img src="/material/img/social-icon/instagram.png" alt="instagram"></a></div>`;
            }
            if((data.socialBtn.linkedin)||(data.socialBtn.Linkedin)){
                html +=`<div class="icons"><a href="${data.socialBtn.Linkedin || data.socialBtn.linkedin}" target="_blank" rel="noopener noreferrer"><img src="/material/img/social-icon/linkedin.png" alt="linkedin"></a></div>`;
            }
            if((data.socialBtn.pinterest)|| (data.socialBtn.Pinterest)){
                html +=`<div class="icons"><a href="${data.socialBtn.pinterest || data.socialBtn.Pinterest}" target="_blank" rel="noopener noreferrer"><img src="/material/img/social-icon/pinterest.png" alt="pinterest"></a></div>`;
            }
             if((data.socialBtn.twitter)||(data.socialBtn.Twitter)){
                html +=`<div class="icons"><a href="${data.socialBtn.twitter || data.socialBtn.Twitter}" target="_blank" rel="noopener noreferrer"><img src="/material/img/social-icon/twitter.png" alt="twitter"></a></div>`;
            }
            if((data.socialBtn.whatsapp)||(data.socialBtn.Whatsapp)){
                html +=`<div class="icons"><a href="${data.socialBtn.whatsapp || data.socialBtn.Whatsapp}" target="_blank" rel="noopener noreferrer"><img src="/material/img/social-icon/whatsapp.png" alt="whatsapp"></a></div>`;
            }
                
        }
        html += `</div><div class="footer_hr"><hr></div><div class="material_footer_menu">`;
        // footer menu
        if((data.menu)||(data.Menu)){
            for(let [key,value] of Object.entries(data.menu || data.Menu)){
                html += `<div class="item_menu"><a href="${value}" target="_blank" rel="noopener noreferrer" class="textColor">${key}</a></div>`;
            }
        }

        html +=`</div><div class="material_footer_subMenu">`;
        // footer submenu
        if((data.subMenu)||(data.submenu)){
            let x = 0;
            for(let [key,value] of Object.entries(data.submenu || data.subMenu)){
                html += `<div class="item_menu"><a href="${value}" target="_blank" rel="noopener noreferrer" class="textColor">${key}</a></div>`;
                if(x < Object.entries(data.submenu || data.subMenu).length - 1){
                    html +=`<b>|</b>`;
                    x++;
                }
            }
        }
        // CopyRight Section
        if(data.copyRight){
            html += `</div><div class="material_footer_copyright subBg"><div class="copyright_text">`;
            // Footer copyRight
            if((data.copyRight.copyRight) || (data.copyRight.copyright)){
                html += data.copyRight.copyRight || data.copyRight.copyright;
            }else{
                html += `Copyright © 2021 All Right Reserved Under Myhelper`;
            }
            
            html +=`</div><div class="meta_text">`;
            // Footer meta info
            if((data.copyRight.meta) || (data.copyRight.Meta)){
                html += data.copyRight.meta || data.copyRight.Meta;
            }else{
                html += `Powered by <a href="https://www.myhelper.live/" target="_blank" style="text-decoration: none;-webkit-appearance: none;-moz-appearance: none;color:orange;"> Myhelper</a>`;
            }    
            html +=`</div></div></div>`;
        }else{
            html += `</div><div class="material_footer_copyright subBg"><div class="copyright_text">Copyright © 2021 All Right Reserved Under Myhelper</div><div class="meta_text">Powered by <a href="https://www.myhelper.live/" target="_blank" style="text-decoration: none;-webkit-appearance: none;-moz-appearance: none;color:orange;"> Myhelper</a></div></div></div>`;
        }
     // html control start

    $CssLinker({
        style:style,
        Namespace:'CopyRightFooter'
    });
        selector.innerHTML = html;
        return selector;
     }
 //  copyright footer end
 return selector;
}

