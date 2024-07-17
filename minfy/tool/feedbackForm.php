<style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }
    .min_feedback_container{
        width: 100%;
        display: flex;
        justify-content: center;
        margin: 15px 0px;
    }
    .feedback_form_Bg{
        width: 100%;
        max-width: 337px;
        height: fit-content;
        box-shadow: inset 0px 0px 2000px #8c89cf6b;
        border-radius: 7px;
        border-bottom: 2px solid #01018154;
    }
    .header_skew{
        width: 100%;
        height: 40px;
        position: relative;
        top: 0px;
        left: 0px;
        background-color: #fdbc44;
        border-radius: 5px 5px 0px 0px;
        z-index: 1;
    }
    .header_skew1{
        background-color: #fdbc44;
        transform: skew(0deg, 354deg);
    }
    .header_skew2{
        height: 16px;
        margin-top: -10px;
        transform: skew(0deg, 2deg);
        background-color: #b37503;
        box-shadow: inset 0px 0px 2000px #8c89cf6b; 
    }
    .feedback_div{
        width: 100%;
        position: relative;
        width: 100%;
        padding: 12px 16px;
        z-index: 2;
    }

    .feedback_form_header{
        margin-top: -50px;
        -webkit-text-stroke: 0.5px #010181;
    }
    .feedback_form_body{
        width: 100%;
        display: flex;
        flex-direction: column;
        padding: 0px 4px;
        margin-top: 15px;
    }
    .Form_input{
        width: 100%;
        border-style: solid;
        border-color: #737373;
        border-width: 0px 0px 0.003px 0px;
        padding: 2px 4px;
        margin-top: 20px;
    }
    .Form_input:focus-within{
        border-color: #00dcff;
    }
    .Form_input input,.Form_input textarea{
        width: 100%;
        opacity: 0.799;
        color: black;
        font-weight: 500;
    }
    ::placeholder{
        color: black;
    }
    .InputTextAppearance{
        border-style: none;
        background: none;
        outline-style: none;
    }

    .feedback_form_btn{
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 22px;
        margin-bottom: 15px;

    }
    .feedback_form_btn button{
        background-color: #fdbc44;
        border-style: none;
        outline-style: none;
        font-weight: 550;
        color: rgb(0 0 0 / 80%);
        padding: 4.5px 0px;
        border-radius: 2px;
        box-shadow: 0.8px 0.8px 2.7px #4a4a4ae6;
        transition: all 0.4s;
    }
    .feedback_form_btn button:hover{
        background-color: #000000de;
        color: #fdbc44;
        opacity: 0.9;
    }
    .form_error{
        width: 97%;
        color: #da2d2d;
        font-size: 8px;
        font-weight: 580;
        text-align: left;
        margin-top: 2px;
        font-family: monospace;
        visibility: hidden;
        transition: visibility 0.02s ease-out;
    }

    /* Mobile screen start */
        @media only screen and (max-width: 599px) {
            /* .Form_input input,.Form_input textarea{
                font-size: clamp(16px,4.73vw,17px); 
            } */
            .feedback_form_header h2{
                font-size: clamp(23px,6.3vw,25px);
            }

            .feedback_form_btn button{
                width: clamp(75px,2.08vw,80px);
                font-size: clamp(13.45px,3.73vw,14.5px);
            }
        }
    /* Mobile screen end */

    /* Desktop screen start */
        @media only screen and (min-width: 600px) {
            .Form_input input,.Form_input textarea{
                font-size: clamp(15px,2.18vw,16px);
            }
            .feedback_form_header h2{
                font-size: clamp(21px,3.3vw,24px);
            }

            .feedback_form_btn button{
                width: clamp(75px,11.718vw,80px);
                font-size: clamp(13.45px,2.1015vw,14.5px);
            }
        }
    /* Desktop screen end */


</style>
<div class="min_feedback_container">
    <div class="feedback_form_Bg">
        <!-- bg shape -->
        <div class="header_skew">
        </div>
        <div class="header_skew2"></div>
       
        <!-- <div class="header_skew2"></div> -->

        <!-- form content -->
        <div class="feedback_div">
            <div class="feedback_form_header">
                <h2>Feedback Us</h2>
            </div>
            <div class="feedback_form_body">
                <div class="Form_input">
                    <input type="text" name="Name" id="FeedBackName" class="InputTextAppearance" placeholder="Full Name" spellcheck="false" data-type="name">
                </div>
                <p class="form_error">pls Enter valid Email</p>

                <div class="Form_input">
                    <input type="email" name="Email" id="FeedBackEmail" class="InputTextAppearance" placeholder="Email" spellcheck="false" data-type="email">
                </div>
                <p class="form_error">pls Enter valid Email</p>

                <div class="Form_input">
                    <textarea name="feedback" id="FeedBackMsg" cols="auto" rows="auto" class="InputTextAppearance" placeholder="Always Welcome for suggetion.." spellcheck="false" data-type="msg"></textarea>
                </div>
                <p class="form_error">pls Enter valid Email</p>
            </div>
            <div class="feedback_form_btn">
                <button>Submit</button>
            </div>
        </div>
    </div>
</div>
<script>
    // alert('feedback us');
FeedBackFormCtr();
function FeedBackFormCtr(){
    let name = document.querySelector("#FeedBackName");
    let email = document.querySelector("#FeedBackEmail");
    let msg = document.querySelector("#FeedBackMsg");
    let globalInput = document.querySelectorAll('.InputTextAppearance');
    // on submit
    document.querySelector('.feedback_form_btn button').addEventListener("click",function(){

        // check validation
        if(name.value ==""){
            show_error(name,"Name's are must be required");
            console.log('name not');

        }else if(email.value ==""){
            console.log('email not');
            show_error(email,"Email is must be required");

        }else if(msg.value ==""){
            console.log('msg not');
            show_error(msg,"always welcome for Suggetion");

        }else{
            // console.log(`Save form = ${name.value}  ${email.value}  ${msg.value} `);

            // save form input
            $ToAjax({
                url:'/minfy/assets/fn/save_formData.php',
                type:'POST',
                data:{name:name.value,email:email.value,msg:msg.value},
                success:function(data){
                    if(!data.status){
                        name.value = "";
                        email.value = "";
                        msg.value = "";
                        document.querySelector('.feedback_form_btn button').setAttribute('disabled',true);
                    }

                    //hide subloader

                    $ToolTip({
                        // properties
                        Msg:data.msg,
                        Time:5300, //bydefault 2.5s or 2500
                    });
                     console.log(data);
                },
                 json:true
            });

        }
    });

    // show erro msg
    function show_error(target,msg){
        target.parentElement.nextElementSibling.style = 'visibility: visible;';
        target.parentElement.nextElementSibling.textContent = msg;
        target.value = "";
        
    }


    // hide error msg And input change
    for(i = 0; i < globalInput.length; i++){

        // hide_error msg
        globalInput[i].addEventListener('focus',function(){
        let error =  this.parentElement.nextElementSibling;
        //    let error =  this.parentElement.nextSibling;
        //    error.style = 'visibility: visible;';
            error.style = 'visibility: hidden;';
        });

        // input  on change
        globalInput[i].addEventListener('change',function(){
            if(this.value != ""){
                console.log(this.dataset.type);
                // name
                let nameReg = /[\w]+[\s]+[\w]/gmi;
                if((this.value.match(nameReg) == null)&&(this.dataset.type == 'name')){
                    show_error(this,"pls Enter Full Name");
                }
                // email
                let emailReg = /@+./gmi;
                if((this.value.match(emailReg) == null)&&(this.dataset.type == 'email')){
                    show_error(this,"pls Provide proper Email address");
                }
            }
        });
    }
}
</script>