console.log('root js in linked');
class _root{
    // js linker
    static $JsLinker(data){
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

    //test
    static ts(){
        alert("ts method invoced");
    }
    constructor(){
        alert("constructor called");
    }
};
function material(x){
    let t = new _root();
    /*$JsLinker({
        Namespace:"tool",
        src:"./basic.js"
    })*/
    _root.ts();
    x();
}