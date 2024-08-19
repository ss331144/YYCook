///////*constent*//////
/*the arrayList of users*/      let userList=[ ['iman@gmail.com',10,'iman12'],['saharyaccov@gmail.com',100,'sahar']  ]
/*for change color pair */      let choise = 0
/*for Email&password check*/    var count = 0
///*for Email&password check*/    var nameU = ""

///////*mathods*///////
//add account to list !no need!
function addUserTOArrray(email , password){
    let new_account = [email, password] 

    userList = userList.push(new_account); // הוספת המשתמש החדש למערך
    
 }

 //check account in list
function checkUserInArrayList(){
    try{
    if (userList[0]==null) alert("user not found")
    else{   
               let a = 0
               let email = document.getElementById("inp-email").value
               let password = document.getElementById("inp-password").value
               const arr = [email , password]
               //check user in array
               for ( a ; a<userList.length; a++){
                   const find = userList[a]
                   //if find same user
                   if( find[0]==email && find[1]==password){
                       
                       
                       document.getElementById("submit").style.border = "2px solid rgb(0,225,0)"
                       document.getElementById("img_png_id").style.border = "2px solid rgb(0,225,0)"
                       //change the place of btn 
                       if(choise %2 ==0 ){
                       document.getElementById("submit").style.marginLeft = "-3.7%"
                       }
                       else document.getElementById("submit").style.marginLeft = "3.4%"
                       
                       let userName = find[0]
                       window.location.href = `mainSecreen.html?userName=${userName}`;
                       return find[0]
                       }
                   }
                   console.log(userList)
               }   
               
                //send req mathod for add account
               //try set it in LogIn page
               //user NoT Found mathod!
               //addUserTOArrray(document.getElementById("inp-email").value,document.getElementById("inp-password").value)
               //alert("user not found")
            
               document.getElementById("submit").style.border = "2px solid rgb(225,0,0)"
               document.getElementById("inp-email").style.border = "2px solid rgb(225,0,0)"        
               document.getElementById("inp-password").style.border = "2px solid rgb(225,0,0)"        
               if(choise %2 ==0 ){
                document.getElementById("submit").style.marginLeft = "7%"
            }
               else document.getElementById("submit").style.marginLeft = "-7%"
               choise ++ 
               document.getElementById("img_png_id").style.border = "2px solid rgb(225,0,0)"        
 }catch(error){
    alert("Error")
}
}

 //over page to parameter
 function overpage(name){
    try{
        window.location.href = name
    }catch(error){
        alert('error')
    }
}


//check the email
function checkEmail(){
try{
    const email = document.getElementById("inp-email")
    
    if (!email.validity.typeMismatch) {
        count=1
        document.getElementById("inp-email").style.color = "green"
        document.getElementById("inp-email").style.border = "2px solid rgb(0,225,0)"
        document.getElementById("img_login").style.border = "2px solid rgb(0,225,0)"
        
        
    }
    else{
        document.getElementById("inp-email").style.color = "red"
        document.getElementById("inp-email").style.border = "2px solid rgb(225,0,0)"
        document.getElementById("img_login").style.border = "2px solid rgb(225,0,0)"
        
        count=0
        
        
    }
    return count
    }catch(error){  
        alert("again")
    }
}    
 //check the password
function checkPassword() {
    try{
        
            let pass = document.getElementById("inp-password").value;
            let valid = document.getElementById("inp-validate").value;
            
    
    
                if (pass === valid && pass.split("").length>0    ) {
                document.getElementById("inp-password").style.color = "green"
                document.getElementById("inp-validate").style.color = "green"
                document.getElementById("inp-password").style.border = "2px solid rgb(0,255,0)"
                document.getElementById("inp-validate").style.border = "2px solid rgb(0,255,0)"
                count=1
                
                
                
            } else {
                document.getElementById("inp-password").style.color = "red"
                document.getElementById("inp-validate").style.color = "red"
                document.getElementById("inp-password").style.border = "2px solid rgb(255,0,0)"
                document.getElementById("inp-validate").style.border = "2px solid rgb(255,0,0)"
                count=0
                
                
            }
            return count
            
        }catch(error){
            alert("error")
            
        }
        
    }
//if email and password is ok
function passwordEmailBoss(text){
    let a =checkEmail()
    let b =checkPassword()
    if(a+b===2){
        try{
            addUserTOArrray(document.getElementById("inp-email").value,document.getElementById('inp-password').value)
        }catch(error){
            alert("can't add user")
        }
        alert(text)
        console.log(userList)
        overpage('Home_Login.html')
        
    }
}




function massagebox(x){
    
    document.getElementById("massagebox").innerText = `welcome to success studios ` + x; 

}

function changeColor(){
    document.body.style.background = document.getElementById("IDchangeColor").value

    
}
function returnBG(){
    document.body.style.backgroundImage = "url('https://img.freepik.com/free-vector/futuristic-background-design_23-2148503793.jpg?size=626&ext=jpg')"
}



//hostage bthn code
(function () {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "https://bringthemhomenow.net/1.1.0/hostages-ticker.js";
    script.setAttribute(
      "integrity",
      "sha384-DHuakkmS4DXvIW79Ttuqjvl95NepBRwfVGx6bmqBJVVwqsosq8hROrydHItKdsne"
    );
        
    script.setAttribute("crossorigin", "anonymous");
    document.getElementsByTagName("head")[0].appendChild(script);
  })();

  
  function checkPassForChangePass(){
    const a = document.getElementById("inp-password").value
    const a1 = document.getElementById("inp-validate").value
    if (a===a1) {
        alert("changed")
        overpage('Home_Login.html')
    }
}