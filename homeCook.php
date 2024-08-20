<?php
session_start();
include 'configCook.php'; // קישור למסד הנתונים

// ודא שיש לך את הערכים המתאימים במשתני המושב
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Studios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header class="text-white text-center py-4">
        <h1 id="home-heading" class="display-4">!שמחים שחזרת 
            <br> <?php echo htmlspecialchars($_SESSION['username']);?> , <?php echo htmlspecialchars($_SESSION['age']); ?></h1>
                <hr>
        <p class="main">.שמחים שחזרת לקנות ממגוון העוגיות והסגונונות , הבחירה תשלח ישירות אל הוואטצאפ בהודעה</p>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="images\מלוחות.jpeg"  alt="Drama Series">
                    <div class="card-body">
                        <h3 class="card-title">עוגיות מלוחות</h3>
                        <p class="card-text"><input id="saltCque" type='number' min='0' max='30' step='5' placeholder='0'> : כמות</p>
                        <h3>סה"כ : <span id='numSlat'>0</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="images\מכונה ארוכות.jpeg" alt="Action Series">
                    <div class="card-body">
                        <h3 class="card-title">עוגיות מכונה</h3>
                        <p class="card-text"><input id="Mque" type='number' min='0' max='30' step='5' placeholder='0'> : כמות</p>
                        <h3>סה"כ : <span id='numMachine'>0</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="images\תמרים.jpeg"  alt="Comedy Series">
                    <div class="card-body">
                        <h3 class="card-title">מגולגלות</h3>
                        <p class="card-text"><input id="Rque" type='number' min='0' max='30' step='5' placeholder='0'> : כמות</p>
                        <p>
                            <select id="selectMenu" >
                    <option value="שוקולד">שוקולד</option>
                    <option value="תמרים">תמרים</option> </select> : מילוי
                        <h3>סה"כ : <span id='numRoll'>0</span></h3>
                    </div>
                </div>
            </div>
            <div id='totalprice' >
                    <h4>תשלום : <span id='totalPrice'>0</span></h4>
                <div>
            <button class='btn text-black text-center btn-lg' id='sendmassage' onclick='sendM()'>שלח הודעה בוואטצאפ</button>
        </div>
    </div>
    
    <footer class="text-white text-center py-3">
        <p>&copy; 2024 - All rights reserved</p>
    </footer>
    

    <script>
        let OneCookieRoll = 2.20;
        let OneCookieMachine = 2.10;
        let OneCookieSlat = 1.5;
        
        

        var totalPrice = 0;


        var numMachineElement = document.getElementById('numMachine');
        var numRollElement = document.getElementById('numRoll');
        var numSlatElement = document.getElementById('numSlat');
         document.getElementById('Rque').addEventListener('change', function() {
        
            
            let selectedValue = parseInt(this.value);
            
                numRollElement.innerHTML = (selectedValue )*OneCookieRoll;
                updateTotalPrice(numSlatElement.innerHTML , numMachineElement.innerHTML , numRollElement.innerHTML);
        
    });
    document.getElementById('Mque').addEventListener('change',function(){
        
        let numMachineElement = document.getElementById('numMachine');
        let selectedValue = parseInt(this.value);
            
                numMachineElement.innerHTML = (selectedValue )*OneCookieMachine;
                updateTotalPrice(numSlatElement.innerHTML , numMachineElement.innerHTML , numRollElement.innerHTML);

    });
    document.getElementById('saltCque').addEventListener('change', function(){
        
        let numSlatElement = document.getElementById('numSlat');
        let selectedValue = parseInt(this.value);
            
                numSlatElement.innerHTML = (selectedValue )*OneCookieSlat;
            updateTotalPrice(numSlatElement.innerHTML , numMachineElement.innerHTML , numRollElement.innerHTML);
    });
    function updateTotalPrice(x,y,z){
        document.getElementById('totalPrice').innerHTML = parseFloat(x) + parseFloat(y) + parseFloat(z);
        totalPrice = parseFloat(document.getElementById('totalPrice').innerHTML);
        // console.log(totalPrice); 
    }
    function sendM(){
        var tasty = document.getElementById('selectMenu').value;
        const phoneNum = '972524738622';
        let message = `שלום , 
אני רוצה להזמין : 
, עוגיות מלוחות ${numSlat.innerHTML} יחידות 
, עוגיות מכונה ${numMachine.innerHTML} יחידות 
. עוגיות מגולגלות ${numRoll.innerHTML} יחידות בטעם ${tasty} 
העלות הכוללת היא ${totalPrice} ש"ח. 
  תודה!` ;

// קידוד ההודעה למטרת URL
    const encodedMessage = encodeURIComponent(message);

// בניית ה-URL לשליחת ההודעה
    const whatsappURL = `https://wa.me/${phoneNum}?text=${message}`;

// הפנייה ללינק כדי לפתוח את WhatsApp עם ההודעה
    window.location.href = whatsappURL;
        
    }



    


    </script>
</body>
</html>
