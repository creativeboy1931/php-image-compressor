$Preloader({
    backgroundColor:'green',
    TitleColor:'red',
    TitleText:'Minfy',
    greetingText:'ram ram',
    greetingColor:'black'
}); // preloader 

// check user is live or not 
$NetCut();

// basic activity
setTimeout(function(){
    $ToolTip({
        Msg:'hello bhaiya this is tool tip',
        Time:'4500', //bydefault 2.5s or 2500
    });
},7000);