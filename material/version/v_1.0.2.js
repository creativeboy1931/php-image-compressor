/*
# Porpose : maretial js for my BCA 
# Slogn : No need to write more css and html
# Type : js Library 
# Auther : Purushottam sahu 
# Auther url : purushottam1931@gmail.com 
# Version : 1.0.2
# Release Date : 21/11/2021
# Licence : Public - all rights resurved under www.myhelper.live
*/
console.log('material js invoked');

// ########################################## Default export object #############################################
let ap ='ram sahu';
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

  // DOM Event listner start
    selector.click = function(val){
        selector.addEventListener('click',function(){
            val(this);
        });
        return selector;
    }
  // DOM Event listner end
  return selector;
////// default function ///////

}
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
export default { Material, ap };
// ############################################ Assets object ################################################
